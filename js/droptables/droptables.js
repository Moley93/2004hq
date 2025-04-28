// JSON data placeholders
let monsterDrops = {};
let sharedDrops = {};
let itemList = {};
let activeSearchTerm = "";

const prettyNames = {
  // Shared tables
  randomherb: "Random Herb Table",
  randomjewel: "Random Jewel Table",
  ultrarare_getitem: "Ultra Rare Table",
  megararetable: "Mega Rare Table",
  randomjunk: "Random Junk Table",
  // NPCs
  bandit: "Bandit",
  _bandit_camp_leader: "Bandit Camp Leader",
  bandit_camp_leaders: "Bandit Camp Leader",
  _barbarian: "Barbarian",
  gunthor_the_brave: "Gunthor the Brave",
  _bear: "Bear",
  _black_demon: "Black Demon",
  black_dragon: "Black Dragon",
  black_knight: "Black Knight",
  black_knight_aggre: "Black Knight (Aggressive)",
  blue_dragon: "Blue Dragon",
  chaos_druid: "Chaos Druid",
  chaos_druid_warrior: "Chaos Druid Warrior",
  chaos_dwarf: "Chaos Dwarf",
  _chicken: "Chicken",
  _cow: "Cow",
  dark_warrior: "Dark Warrior",
  dark_wizard_earth: "Dark Wizard (Earth)",
  dark_wizard_water: "Dark Wizard (Water)",
  druid: "Druid",
  dwarf_1: "Dwarf",
  dwarf_2: "Dwarf",
  dwarf_3: "Dwarf",
  earth_warrior: "Earth Warrior",
  entrana_firebird: "Entrana Firebird",
  farmer: "Farmer",
  fire_giant: "Fire Giant",
  giant: "Giant",
  giant_rat1: "Giant Rat",
  giant_rat2: "Giant Rat",
  goblin_unarmed1: "Goblin",
  goblin_unarmed2: "Goblin",
  goblin_staff: "Goblin (Staff)",
  goblin_sword: "Goblin (Sword)",
  greater_demon: "Greater Demon",
  green_dragon: "Green Dragon",
  guard: "Guard",
  guard_aggressive: "Guard (Aggressive)",
  hill_giant: "Hill Giant",
  hobgoblin: "Hobgoblin",
  ice_giant: "Ice Giant",
  ice_warrior: "Ice Warrior",
  icefiend: "Icefiend",
  imp: "Imp",
  jogre: "Jogre",
  jungle_spider: "Jungle Spider",
  killerwatt: "Killerwatt",
  king_black_dragon: "King Black Dragon",
  lesser_demon: "Lesser Demon",
  moss_giant: "Moss Giant",
  mugger: "Mugger",
  ogre: "Ogre",
  pirate: "Pirate",
  pyrefiend: "Pyrefiend",
  red_dragon: "Red Dragon",
  rockslug: "Rockslug",
  rogue: "Rogue",
  oomlie_bird: "Oomlie Bird",
  salarins_the_twisted: "Salarin the Twisted",
  shadow_warrior: "Shadow Warrior",
  skeleton1: "Skeleton 1",
  skeleton2: "Skeleton 2",
  skeleton3: "Skeleton 3",
  skeleton4: "Skeleton 4",
  thief: "Thief",
  tribesman: "Tribesman",
  ugthanki: "Ugthanki",
  unicorn: "Unicorn",
  white_knight: "White Knight",
  wizard: "Wizard",
  soldier: "Soldier",
  tower_guard: "Tower Guard",
  colonel_radick: "Colonel Radick",
  zombie1: "Zombie 1",
  zombie2: "Zombie 2",
  zombie3: "Zombie 3",
  zombie_entrana: "Zombie (Entrana)"
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
});

function populateNPCDropdown() {
  const select = document.getElementById('npcSelect');
  select.innerHTML = '<option value="">Select NPC...</option>';
  for (const npcGroup in monsterDrops) {
    monsterDrops[npcGroup].forEach(npc => {
      const option = document.createElement('option');
      option.value = npc.npc;
      option.textContent = prettyNames[npc.npc] || npc.npc.replace(/^_/, '');
      select.appendChild(option);
    });
  }
}

function findNPC(npcName) {
  for (const group in monsterDrops) {
    const found = monsterDrops[group].find(npc => npc.npc === npcName);
    if (found) return found;
  }
  return null;
}

function renderDrops(npcData, searchTerm = "") {
  const container = document.getElementById('dropTableContainer');
  let html = '<h2>Drops for ' + (prettyNames[npcData.npc] || npcData.npc.replace(/^_/, '')) + '</h2>';
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
          const id = 'shared_' + sharedTableName;
          rollableRows.push({
            html: `<tr>
              <td colspan="2">
                <span class="shared-table-toggle" onclick="toggleSharedTable('${id}')">${prettyNames[sharedTableName] || sharedTableName}</span>
              </td>
              <td>${roll.chance}</td>
            </tr>
            <tr id="${id}" class="shared-table-content">
              <td colspan="3">
                <table class="calculators" width="100%">
                  <tr><th>Item</th><th>Amount</th><th>Chance</th></tr>` +
            sharedTable.roll_table.map(subRoll => {
              const [subItem, subAmount] = subRoll.item;
              const isSubMatch = matchesSearch(subItem);
              return `<tr${isSubMatch ? ' style="background: rgba(85, 62, 5, 0.62);"' : ''}>
                        <td><canvas data-itemname="${subItem}" data-show-label="inline"></canvas></td>
                        <td>${formatAmount(subAmount)}</td>
                        <td>${subRoll.chance}</td>
                      </tr>`;
            }).join('') +
            '</table></td></tr>',
            match: false
          });
        }
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
  renderAllSprites();
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

function toggleSharedTable(id) {
  const el = document.getElementById(id);
  el.style.display = (el.style.display === 'none' || el.style.display === '') ? 'block' : 'none';
}

// Search
document.getElementById('itemSearch').addEventListener('input', function() {
  activeSearchTerm = this.value.trim().toLowerCase();
  const select = document.getElementById('npcSelect');
  select.innerHTML = '<option value="">Select NPC...</option>';

  if (!activeSearchTerm) {
    populateNPCDropdown();
    return;
  }

  const matchedNPCs = new Map();

  for (const npcGroup in monsterDrops) {
    for (const npc of monsterDrops[npcGroup]) {
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

      if (foundReason) matchedNPCs.set(npc.npc, foundReason);
    }
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
      option.textContent = prettyNames[npcName] || npcName.replace(/^_/, '');
      option.style.fontWeight = 'bold';
      option.style.color = reason === 'clue' ? 'blue' : 'green';
      select.appendChild(option);
    }

    if (matchedNPCs.size === 1) {
      const firstMatch = select.options[1].value;
      select.value = firstMatch;
      const npcData = findNPC(firstMatch);
      if (npcData) {
        renderDrops(npcData, activeSearchTerm);
      }
    }
  }
});

// Enter Key shortcut
document.getElementById('itemSearch').addEventListener('keydown', function(e) {
  if (e.key === 'Enter') {
    const select = document.getElementById('npcSelect');
    if (select.options.length > 1) {
      e.preventDefault();
      select.selectedIndex = 1;
      const npcData = findNPC(select.value);
      if (npcData) {
        renderDrops(npcData, activeSearchTerm);
      }
    }
  }
});

// Load on select change
npcSelect.addEventListener('change', () => {
  const selectedNPC = npcSelect.value;
  if (selectedNPC) {
    const npcData = findNPC(selectedNPC);
    if (npcData) {
      renderDrops(npcData, activeSearchTerm);
    }
  } else {
    document.getElementById('dropTableContainer').innerHTML = '';
  }
});
