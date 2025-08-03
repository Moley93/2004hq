let monsterDrops = {};
let sharedDrops = {};
let itemList = {};
let activeSearchTerm = "";

const SHARED_TABLE_ICONS = {
  'randomherb': 'unidentified_guam',
  'randomjewel': 'uncut_dragonstone',
  'ultrarare_getitem': 'dragon_med_helm',
  'megararetable': 'dragonshield_a'
};

Promise.all([
  fetch('js/droptables/monster_drops.json').then(res => res.json()),
  fetch('js/droptables/shared_drops.json').then(res => res.json()),
  fetch('js/itemlist.json').then(res => res.json())
]).then(([monsterData, sharedData, itemData]) => {
  monsterDrops = monsterData;
  sharedDrops = sharedData;
  itemList = itemData.reduce((map, item) => {
    map[item.debugname] = item.name;
    return map;
  }, {});
  populateNPCDropdown();
  loadNPCFromURL();
});

function populateNPCDropdown() {
  const select = document.getElementById('npcSelect');
  select.innerHTML = '<option value="">Select NPC...</option>';
  for (const npcKey in monsterDrops) {
    const npc = monsterDrops[npcKey];
    const option = document.createElement('option');
    option.value = npcKey;
    
    if (npc.name) {
      option.textContent = npc.name;
    } else {
      option.textContent = npcKey;
      option.style.color = 'red';
    }
    select.appendChild(option);
  }
}

function findNPC(npcName) {
  if (monsterDrops[npcName]) {
    return monsterDrops[npcName];
  }
  return null;
}

function getURLParameter(name) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(name);
}

function updateURL(npcName) {
  const url = new URL(window.location);
  if (npcName) {
    url.searchParams.set('npc', npcName);
  } else {
    url.searchParams.delete('npc');
  }
  window.history.pushState({}, '', url);
}

function loadNPCFromURL() {
  const npcFromURL = getURLParameter('npc');
  if (npcFromURL) {
    const npcData = findNPC(npcFromURL);
    if (npcData) {
      const select = document.getElementById('npcSelect');
      select.value = npcFromURL;
      renderDrops(npcData, activeSearchTerm);
      document.getElementById('itemSearch').value = '';
      activeSearchTerm = '';
    }
  }
}

function renderDrops(npcData, searchTerm = "") {
  const container = document.getElementById('dropTableContainer');
  let html = '<h2>Drops for ' + (npcData.name || 'Unknown NPC') + '</h2>';
  html += '<table class="calculators" width="100%">';

  let guaranteedRows = [];
  let rollableRows = [];

  const matchesSearch = (debugName) => {
    if (!searchTerm) return false;
    const readable = itemList[debugName]?.toLowerCase() || "";
    return debugName.toLowerCase().includes(searchTerm) || readable.includes(searchTerm);
  };

  if (npcData.guaranteed && npcData.guaranteed.length > 0) {
    npcData.guaranteed.forEach(item => {
      const isMatch = matchesSearch(item);
      guaranteedRows.push({
        html: `<tr${isMatch ? ' style="background:rgba(85, 62, 5, 0.62);"' : ''}>
                 <td><canvas data-itemname="${item}" data-show-label="inline"></canvas></td>
                 <td>1</td>
                 <td>Always</td>
               </tr>`,
        match: isMatch
      });
    });
  }

  if (npcData.roll_table && npcData.roll_table.length > 0) {
    for (const roll of npcData.roll_table) {
      const [itemName, amount] = roll.item;
      if (itemName.startsWith('~')) {
        const sharedTableName = itemName.slice(1);
        const sharedTable = sharedDrops[sharedTableName];
        if (sharedTable) {
          const iconItem = SHARED_TABLE_ICONS[sharedTableName];
          const iconHtml = iconItem ? `<canvas data-itemname="${iconItem}" data-show-label="none"></canvas>` : '';
          
          rollableRows.push({
            html: `<tr>
              <td colspan="2">
                <div style="display: flex; align-items: center; justify-content: center; gap: 5px;">
                  ${iconHtml}
                  <span class="shared-table-toggle" onclick="openSharedTableModal('${sharedTableName}', '${searchTerm}', '${roll.chance}', '${(npcData.name || 'Unknown NPC')} (${roll.chance})')">${sharedTable.name || sharedTableName}</span>
                </div>
              </td>
              <td>${roll.chance}</td>
            </tr>`,
            match: false
          });
        }
      } else {
        if (itemName.includes('aboveground =') && itemName.includes('underground =')) {
          const parts = itemName.split('|').map(part => part.trim());
          let abovegroundItem = '';
          let undergroundItem = '';
          
          parts.forEach(part => {
            if (part.startsWith('aboveground =')) {
              abovegroundItem = part.replace('aboveground =', '').trim();
            } else if (part.startsWith('underground =')) {
              undergroundItem = part.replace('underground =', '').trim();
            }
          });
          
          const isAboveMatch = matchesSearch(abovegroundItem);
          const isUnderMatch = matchesSearch(undergroundItem);
          const isMatch = isAboveMatch || isUnderMatch;
          
          rollableRows.push({
            html: `<tr${isMatch ? ' style="background: rgba(85, 62, 5, 0.62);"' : ''}>
              <td>
                <div style="display: flex; align-items: center; gap: 10px;">
                  <canvas data-itemname="${abovegroundItem}" data-show-label="inline"></canvas> or 
                  <canvas data-itemname="${undergroundItem}" data-show-label="inline"></canvas>
                </div>
              </td>
              <td>${formatAmount(amount)}</td>
              <td>${roll.chance}</td>
            </tr>`,
            match: isMatch
          });
        } else {
          const isMatch = matchesSearch(itemName);
          rollableRows.push({
            html: `<tr${isMatch ? ' style="background: rgba(85, 62, 5, 0.62);"' : ''}>
                     <td><canvas data-itemname="${itemName}" data-show-label="inline"></canvas></td>
                     <td>${formatAmount(amount)}</td>
                     <td>${roll.chance}</td>
                   </tr>`,
            match: isMatch
          });
        }
      }
    }
  }

  html += '<tr><th>Item</th><th>Amount</th><th>Chance</th></tr>';

  guaranteedRows.filter(r => r.match).forEach(r => html += r.html);
  guaranteedRows.filter(r => !r.match).forEach(r => html += r.html);

  rollableRows.filter(r => r.match).forEach(r => html += r.html);
  rollableRows.filter(r => !r.match).forEach(r => html += r.html);

  if (npcData.clue_scroll) {
    const [chance, rawTier] = npcData.clue_scroll.split(' ');
    const tier = rawTier.charAt(0).toUpperCase() + rawTier.slice(1);
    const isClueMatch = searchTerm.includes('clue') || tier?.toLowerCase().includes(searchTerm);
    html += `<tr${isClueMatch ? ' style="background: rgba(85, 62, 5, 0.62);"' : ''}>
      <td><canvas data-itemname="trail_clue_easy_simple001" data-show-label="inline" data-name-append="(${tier})"></canvas></td>
      <td>1</td>
      <td>${chance}</td>
    </tr>`;
  }

  html += '</table>';
  container.innerHTML = html;
  
  if (!document.getElementById('exactChanceStyles')) {
    const style = document.createElement('style');
    style.id = 'exactChanceStyles';
    style.textContent = `
      .exact-chance-indicator {
        color: #888;
        font-size: 11px;
        cursor: help;
        margin-left: 3px;
      }
      .exact-chance-indicator:hover {
        color: #ccc;
      }
    `;
    document.head.appendChild(style);
  }
  
  window.safeRenderAllSprites();
}

function formatAmount(amount) {
  if (Array.isArray(amount)) {
    if (amount.length === 2) {
      return amount[0] + '-' + amount[1];
    }
    return amount.join(', ');
  }
  return amount;
}

function formatNumber(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

function getApproximateFraction(numerator, denominator) {
  if (numerator === 1 || denominator <= 100) {
    return null;
  }
  
  const decimal = numerator / denominator;
  
  const commonFractions = [
    {n: 1, d: 2}, {n: 1, d: 3}, {n: 2, d: 3}, {n: 1, d: 4}, {n: 3, d: 4},
    {n: 1, d: 5}, {n: 2, d: 5}, {n: 3, d: 5}, {n: 4, d: 5}, {n: 1, d: 6}, {n: 5, d: 6},
    {n: 1, d: 8}, {n: 3, d: 8}, {n: 5, d: 8}, {n: 7, d: 8}, {n: 1, d: 10}, {n: 3, d: 10}, {n: 7, d: 10}, {n: 9, d: 10},
    {n: 1, d: 12}, {n: 5, d: 12}, {n: 7, d: 12}, {n: 11, d: 12}, {n: 1, d: 16}, {n: 3, d: 16}, {n: 5, d: 16}, {n: 7, d: 16}, {n: 9, d: 16}, {n: 11, d: 16}, {n: 13, d: 16}, {n: 15, d: 16},
    {n: 1, d: 20}, {n: 3, d: 20}, {n: 7, d: 20}, {n: 9, d: 20}, {n: 11, d: 20}, {n: 13, d: 20}, {n: 17, d: 20}, {n: 19, d: 20},
    {n: 1, d: 25}, {n: 2, d: 25}, {n: 3, d: 25}, {n: 4, d: 25}, {n: 6, d: 25}, {n: 7, d: 25}, {n: 8, d: 25}, {n: 9, d: 25}, {n: 11, d: 25}, {n: 12, d: 25}, {n: 13, d: 25}, {n: 14, d: 25}, {n: 16, d: 25}, {n: 17, d: 25}, {n: 18, d: 25}, {n: 19, d: 25}, {n: 21, d: 25}, {n: 22, d: 25}, {n: 23, d: 25}, {n: 24, d: 25}
  ];
  
  let closestFraction = null;
  let smallestDifference = Infinity;
  
  for (const frac of commonFractions) {
    const fracDecimal = frac.n / frac.d;
    const difference = Math.abs(decimal - fracDecimal);
    
    if (difference < smallestDifference && difference < 0.02) {
      smallestDifference = difference;
      closestFraction = frac;
    }
  }
  
  return closestFraction;
}

function calculateChance(chanceValue, rollBase) {
  if (typeof chanceValue === 'string' && chanceValue.includes('/')) {
    return chanceValue;
  }
  
  const chance = parseInt(chanceValue);
  if (isNaN(chance) || !rollBase) {
    return chanceValue;
  }
  
  function gcd(a, b) {
    return b === 0 ? a : gcd(b, a % b);
  }
  
  const divisor = gcd(chance, rollBase);
  const numerator = chance / divisor;
  const denominator = rollBase / divisor;
  
  const exactFraction = numerator === 1 ? 
    `1/${formatNumber(denominator)}` : 
    `${formatNumber(numerator)}/${formatNumber(denominator)}`;
  
  const approx = getApproximateFraction(numerator, denominator);
  if (approx) {
    return `~${approx.n}/${approx.d} <span class="exact-chance-indicator" title="Exact: ${exactFraction}">[?]</span>`;
  }
  
  return exactFraction;
}

function calculateChanceNoApprox(chanceValue, rollBase) {
  if (typeof chanceValue === 'string' && chanceValue.includes('/')) {
    return chanceValue;
  }
  
  const chance = parseInt(chanceValue);
  if (isNaN(chance) || !rollBase) {
    return chanceValue;
  }
  
  function gcd(a, b) {
    return b === 0 ? a : gcd(b, a % b);
  }
  
  const divisor = gcd(chance, rollBase);
  const numerator = chance / divisor;
  const denominator = rollBase / divisor;
  
  return numerator === 1 ? 
    `1/${formatNumber(denominator)}` : 
    `${formatNumber(numerator)}/${formatNumber(denominator)}`;
}

function getRollBase(sharedTable) {
  const ringOfWealthCheckbox = document.getElementById('ringOfWealthCheckbox');
  const isRingOfWealthEquipped = ringOfWealthCheckbox && ringOfWealthCheckbox.checked;
  
  if (isRingOfWealthEquipped && sharedTable.roll_base_ring_of_wealth) {
    return sharedTable.roll_base_ring_of_wealth;
  }
  
  return sharedTable.roll_base || 128;
}

function calculateTotalChance(sharedTableChance, itemChance, rollBase) {
  let sharedNumerator, sharedDenominator;
  if (typeof sharedTableChance === 'string' && sharedTableChance.includes('/')) {
    const parts = sharedTableChance.split('/');
    sharedNumerator = parseInt(parts[0].replace(/,/g, ''));
    sharedDenominator = parseInt(parts[1].replace(/,/g, ''));
  } else {
    const chance = parseInt(sharedTableChance);
    if (isNaN(chance)) return 'Unknown';
    
    function gcd(a, b) { return b === 0 ? a : gcd(b, a % b); }
    const divisor = gcd(chance, rollBase);
    sharedNumerator = chance / divisor;
    sharedDenominator = rollBase / divisor;
  }
  
  let itemNumerator, itemDenominator;
  if (typeof itemChance === 'string' && itemChance.includes('/')) {
    const parts = itemChance.split('/');
    itemNumerator = parseInt(parts[0].replace(/,/g, ''));
    itemDenominator = parseInt(parts[1].replace(/,/g, ''));
  } else {
    const chance = parseInt(itemChance);
    if (isNaN(chance)) return 'Unknown';
    
    function gcd(a, b) { return b === 0 ? a : gcd(b, a % b); }
    const divisor = gcd(chance, rollBase);
    itemNumerator = chance / divisor;
    itemDenominator = rollBase / divisor;
  }
  
  const totalNumerator = sharedNumerator * itemNumerator;
  const totalDenominator = sharedDenominator * itemDenominator;
  
  function gcd(a, b) { return b === 0 ? a : gcd(b, a % b); }
  const finalDivisor = gcd(totalNumerator, totalDenominator);
  const finalNumerator = totalNumerator / finalDivisor;
  const finalDenominator = totalDenominator / finalDivisor;
  
  const exactFraction = finalNumerator === 1 ? 
    `1/${formatNumber(finalDenominator)}` : 
    `${formatNumber(finalNumerator)}/${formatNumber(finalDenominator)}`;
  
  const approx = getApproximateFraction(finalNumerator, finalDenominator);
  if (approx) {
    return `~${approx.n}/${approx.d} <span class="exact-chance-indicator" title="Exact: ${exactFraction}">[?]</span>`;
  }
  
  return exactFraction;
}

function openSharedTableModal(sharedTableName, searchTerm = "", parentChance = null, chainPath = "") {
  const sharedTable = sharedDrops[sharedTableName];
  if (!sharedTable) return;

  const matchesSearch = (debugName) => {
    if (!searchTerm) return false;
    const readable = itemList[debugName]?.toLowerCase() || "";
    return debugName.toLowerCase().includes(searchTerm) || readable.includes(searchTerm);
  };

  let modal = document.getElementById('sharedTableModal');
  if (!modal) {
    modal = document.createElement('div');
    modal.id = 'sharedTableModal';
    modal.className = 'modal';
    modal.innerHTML = `
      <div class="modal-content">
        <span class="close" onclick="closeSharedTableModal()">&times;</span>
        <h2 id="modalTitle"></h2>
        <div id="modalTableContainer"></div>
      </div>
    `;
    document.body.appendChild(modal);

    const style = document.createElement('style');
    style.textContent = `
      .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.28);
      }
      .modal-content {
        background-color: rgba(0, 0, 0, 0.9);
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 600px;
        max-width: 800px;
        max-height: 80vh;
        border-radius: 5px;
        overflow: auto;
      }
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
      }
      .nested-shared-table {
        cursor: pointer;
        color: #0066cc;
        text-decoration: underline;
      }
      .nested-shared-table:hover {
        color: #004499;
      }
      .modal-content table.calculators {
        margin: 20px auto;
        border-collapse: collapse;
        align-items: center;
        vertical-align: center;
        width: 100%;
      }
      .modal-content table.calculators th,
      .modal-content table.calculators td {
        border: 1px solid #382418;
        padding: 5px;
        text-align: center;
        vertical-align: center;
      }
      .modal-content table.calculators th {
        background-color: #222;
        color: white;
      }
      .modal-content table.calculators td {
        background-color: #1a1a1a;
        color: white;
      }
      .note-indicator {
        color: #888;
        font-size: 11px;
        cursor: help;
        margin-left: 5px;
      }
      .note-indicator:hover {
        color: #ccc;
      }
      .exact-chance-indicator {
        color: #888;
        font-size: 11px;
        cursor: help;
        margin-left: 3px;
      }
      .exact-chance-indicator:hover {
        color: #ccc;
      }
    `;
    document.head.appendChild(style);
  }

  document.getElementById('modalTitle').textContent = chainPath ? 
    `${chainPath} → ${sharedTable.name || sharedTableName}` : 
    (sharedTable.name || sharedTableName);
  
  let tableHtml = '<table class="calculators" width="100%">';
  if (parentChance) {
    tableHtml += '<tr><th>Item</th><th>Amount</th><th>Chance</th><th>Total Chance</th></tr>';
  } else {
    tableHtml += '<tr><th>Item</th><th>Amount</th><th>Chance</th></tr>';
  }
  
  let totalUsedSlots = 0;
  const rollBase = getRollBase(sharedTable);
  
  sharedTable.roll_table.forEach(subRoll => {
    const [subItem, subAmount] = subRoll.item;
    
    if (subItem.startsWith('~')) {
      const nestedTableName = subItem.slice(1);
      if (sharedDrops[nestedTableName]) {
        const nestedTable = sharedDrops[nestedTableName];
        const isTableMatch = searchTerm && (nestedTableName.toLowerCase().includes(searchTerm) || 
          (nestedTable.name && nestedTable.name.toLowerCase().includes(searchTerm)));
        
        const chanceValue = parseInt(subRoll.chance) || 0;
        totalUsedSlots += chanceValue;
        
        let nestedParentChance = parentChance;
        if (parentChance) {
          nestedParentChance = calculateTotalChance(parentChance, subRoll.chance, rollBase);
        }
        
        const totalChanceHtml = parentChance ? `<td>${calculateTotalChance(parentChance, subRoll.chance, rollBase)}</td>` : '';
        const noteHtml = subRoll.note ? ` <span class="note-indicator" title="${subRoll.note}">[?]</span>` : '';
        const iconItem = SHARED_TABLE_ICONS[nestedTableName];
        const iconHtml = iconItem ? `<canvas data-itemname="${iconItem}" data-show-label="none"></canvas> ` : '';
        
        const currentTableName = sharedTable.name || sharedTableName;
        const currentChance = calculateChanceNoApprox(subRoll.chance, rollBase);
        const newChainPath = chainPath ? `${chainPath} → ${currentTableName} (${currentChance})` : `${currentTableName} (${currentChance})`;
        
        tableHtml += `<tr${isTableMatch ? ' style="background:rgba(85, 62, 5, 0.62);"' : ''}>
          <td colspan="2">
            <div style="display: flex; align-items: center; justify-content: center; gap: 5px;">
              ${iconHtml}<span class="nested-shared-table" onclick="openSharedTableModal('${nestedTableName}', '${searchTerm}', '${nestedParentChance || 'null'}', '${newChainPath}')">${nestedTable.name || nestedTableName}</span>${noteHtml}
            </div>
          </td>
          <td>${calculateChance(subRoll.chance, rollBase)}</td>
          ${totalChanceHtml}
        </tr>`;
      } else {
        const chanceValue = parseInt(subRoll.chance) || 0;
        totalUsedSlots += chanceValue;
        
        const totalChanceHtml = parentChance ? `<td>${calculateTotalChance(parentChance, subRoll.chance, rollBase)}</td>` : '';
        const noteHtml = subRoll.note ? ` <span class="note-indicator" title="${subRoll.note}">[?]</span>` : '';
        
        tableHtml += `<tr>
          <td colspan="2">${nestedTableName} (Missing Table)${noteHtml}</td>
          <td>${calculateChance(subRoll.chance, rollBase)}</td>
          ${totalChanceHtml}
        </tr>`;
      }
    } else {
      if (subItem.includes('aboveground =') && subItem.includes('underground =')) {
        const parts = subItem.split('|').map(part => part.trim());
        let abovegroundItem = '';
        let undergroundItem = '';
        
        parts.forEach(part => {
          if (part.startsWith('aboveground =')) {
            abovegroundItem = part.replace('aboveground =', '').trim();
          } else if (part.startsWith('underground =')) {
            undergroundItem = part.replace('underground =', '').trim();
          }
        });
        
        const isAboveMatch = matchesSearch(abovegroundItem);
        const isUnderMatch = matchesSearch(undergroundItem);
        const isMatch = isAboveMatch || isUnderMatch;
        
        const chanceValue = parseInt(subRoll.chance) || 0;
        totalUsedSlots += chanceValue;
        
        const totalChanceHtml = parentChance ? `<td>${calculateTotalChance(parentChance, subRoll.chance, rollBase)}</td>` : '';
        const noteHtml = subRoll.note ? ` <span class="note-indicator" title="${subRoll.note}">[?]</span>` : '';
        
        tableHtml += `<tr${isMatch ? ' style="background:rgba(85, 62, 5, 0.62);"' : ''}>
          <td>
              <canvas data-itemname="${abovegroundItem}" data-show-label="inline"></canvas>
              or
              <canvas data-itemname="${undergroundItem}" data-show-label="inline"></canvas>${noteHtml}
          </td>
          <td>${formatAmount(subAmount)}</td>
          <td>${calculateChance(subRoll.chance, rollBase)}</td>
          ${totalChanceHtml}
        </tr>`;
      } else {
        const isMatch = matchesSearch(subItem);
        const chanceValue = parseInt(subRoll.chance) || 0;
        totalUsedSlots += chanceValue;
        
        const totalChanceHtml = parentChance ? `<td>${calculateTotalChance(parentChance, subRoll.chance, rollBase)}</td>` : '';
        const noteHtml = subRoll.note ? ` <span class="note-indicator" title="${subRoll.note}">[?]</span>` : '';
        
        tableHtml += `<tr${isMatch ? ' style="background:rgba(85, 62, 5, 0.62);"' : ''}>
          <td><canvas data-itemname="${subItem}" data-show-label="inline"></canvas>${noteHtml}</td>
          <td>${formatAmount(subAmount)}</td>
          <td>${calculateChance(subRoll.chance, rollBase)}</td>
          ${totalChanceHtml}
        </tr>`;
      }
    }
  });
  
  const nothingSlots = rollBase - totalUsedSlots;
  if (nothingSlots > 0) {
    const isNothingMatch = searchTerm && searchTerm.includes('nothing');
    const totalChanceHtml = parentChance ? `<td>${calculateTotalChance(parentChance, nothingSlots, rollBase)}</td>` : '';
    
    tableHtml += `<tr${isNothingMatch ? ' style="background:rgba(85, 62, 5, 0.62);"' : ''} style="color: #888;">
      <td style="font-style: italic;">Nothing</td>
      <td>-</td>
      <td>${calculateChance(nothingSlots, rollBase)}</td>
      ${totalChanceHtml}
    </tr>`;
  }
  
  tableHtml += '</table>';
  document.getElementById('modalTableContainer').innerHTML = tableHtml;
  
  modal.style.display = 'block';
  
  window.safeRenderAllSprites();
}

function closeSharedTableModal() {
  const modal = document.getElementById('sharedTableModal');
  if (modal) {
    modal.style.display = 'none';
  }
}

window.onclick = function(event) {
  const modal = document.getElementById('sharedTableModal');
  if (event.target === modal) {
    closeSharedTableModal();
  }
}

document.getElementById('itemSearch').addEventListener('input', function() {
  activeSearchTerm = this.value.trim().toLowerCase();
  const select = document.getElementById('npcSelect');
  select.innerHTML = '<option value="">Select NPC...</option>';

  if (!activeSearchTerm) {
    populateNPCDropdown();
    return;
  }

  const matchedNPCs = new Map();

  for (const npcKey in monsterDrops) {
    const npc = monsterDrops[npcKey];
    let foundReason = "";

    if (npc.guaranteed && npc.guaranteed.some(item => {
      const readable = itemList[item]?.toLowerCase() || "";
      return item.toLowerCase().includes(activeSearchTerm) || readable.includes(activeSearchTerm);
    })) {
      foundReason = "guaranteed";
    }

    if (!foundReason && npc.roll_table) {
      for (const roll of npc.roll_table) {
        const [itemName] = roll.item;
        const readable = itemList[itemName]?.toLowerCase() || "";
        if (itemName.toLowerCase().includes(activeSearchTerm) || readable.includes(activeSearchTerm)) {
          foundReason = "rollable";
          break;
        }
      }
    }

    if (!foundReason && npc.clue_scroll) {
      const [, tier] = npc.clue_scroll.split(' ');
      if ((tier && tier.toLowerCase().includes(activeSearchTerm)) || activeSearchTerm.includes('clue')) {
        foundReason = "clue";
      }
    }

    if (foundReason) matchedNPCs.set(npcKey, foundReason);
  }

  if (matchedNPCs.size === 0) {
    const option = document.createElement('option');
    option.disabled = true;
    option.textContent = 'No NPCs found';
    select.appendChild(option);
  } else {
    for (const [npcName, reason] of matchedNPCs.entries()) {
      const option = document.createElement('option');
      option.value = npcName;
      const npcData = monsterDrops[npcName];
      
      if (npcData.name) {
        option.textContent = npcData.name;
      } else {
        option.textContent = npcName;
        option.style.color = 'red';
      }
      
      option.style.fontWeight = 'bold';
      if (npcData.name) {
        option.style.color = reason === 'clue' ? 'blue' : 'green';
      } else {
        option.style.color = 'darkred';
      }
      select.appendChild(option);
    }

    if (matchedNPCs.size === 1) {
      const firstMatch = select.options[1].value;
      select.value = firstMatch;
      const npcData = findNPC(firstMatch);
      if (npcData) {
        renderDrops(npcData, activeSearchTerm);
        updateURL(firstMatch);
      }
    }
  }
});

document.getElementById('itemSearch').addEventListener('keydown', function(e) {
  if (e.key === 'Enter') {
    const select = document.getElementById('npcSelect');
    if (select.options.length > 1) {
      e.preventDefault();
      select.selectedIndex = 1;
      const npcData = findNPC(select.value);
      if (npcData) {
        renderDrops(npcData, activeSearchTerm);
        updateURL(select.value);
      }
    }
  }
});

npcSelect.addEventListener('change', () => {
  const selectedNPC = npcSelect.value;
  if (selectedNPC) {
    const npcData = findNPC(selectedNPC);
    if (npcData) {
      renderDrops(npcData, activeSearchTerm);
      updateURL(selectedNPC);
    }
  } else {
    document.getElementById('dropTableContainer').innerHTML = '';
    updateURL(null);
  }
});

window.addEventListener('popstate', function() {
  loadNPCFromURL();
});

document.addEventListener('DOMContentLoaded', function() {
  const ringOfWealthCheckbox = document.getElementById('ringOfWealthCheckbox');
  if (ringOfWealthCheckbox) {
    ringOfWealthCheckbox.addEventListener('change', function() {
      const npcSelect = document.getElementById('npcSelect');
      if (npcSelect.value) {
        const npcData = findNPC(npcSelect.value);
        if (npcData) {
          renderDrops(npcData, activeSearchTerm);
        }
      }
    });
  }
});
