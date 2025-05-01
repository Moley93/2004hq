(async function() {
  const raw = await fetch('js/itemlist.json').then(r => r.json());
  const items = raw
    .filter(i => i.name && !i.debugname.startsWith('cert_'))
    .map(i => {
      const dn = i.debugname;
      const dnSpaced = dn.replace(/_/g, ' ');
      const tags = [i.name, i.id, dn, dnSpaced].join(' ').toLowerCase();
      return { ...i, searchTags: tags };
    })
    .sort((a, b) => a.name.localeCompare(b.name));

  const search1 = document.getElementById('search1');
  const search2 = document.getElementById('search2');
  const container = document.getElementById('item-tables-container');

  [search1, search2].forEach(input => {
    const wrapper = document.createElement('div');
    wrapper.className = 'search-wrapper';
    input.parentNode.insertBefore(wrapper, input);
    wrapper.appendChild(input);

    const sugg = document.createElement('ul');
    sugg.className = 'suggestions';
    wrapper.appendChild(sugg);
    input.suggBox = sugg;

    input.addEventListener('input', onType);
    input.addEventListener('blur', () => setTimeout(() => input.suggBox.innerHTML = '', 150));
  });

  function onType(e) {
    const val = e.target.value.toLowerCase().trim();
    const box = e.target.suggBox;
    box.innerHTML = '';
    if (!val) return;

    const terms = val.split(/\s+/).filter(Boolean);
    const matches = items.filter(it =>
      terms.every(t => it.searchTags.includes(t))
    ).slice(0, 10);

    matches.forEach(it => {
      const li = document.createElement('li');
      const icon = document.createElement('canvas');
      icon.width = 20;
      icon.height = 20;
      icon.dataset.itemname = it.debugname;
      icon.dataset.size = 20;
      icon.dataset.showLabel = 'false';
      li.appendChild(icon);
      if (typeof renderSpriteToCanvas === 'function') {
        renderSpriteToCanvas(it.debugname, icon);
      }
      const text = document.createTextNode(` ${it.name} (${it.id})`);
      li.appendChild(text);
      li.addEventListener('mousedown', () => {
        e.target.value = `${it.name} (${it.id})`;
        box.innerHTML = '';
        updateDisplay();
      });
      box.appendChild(li);
    });
  }

  function parseSelectedId(str) {
    const m = str.match(/\((\d+)\)$/);
    return m ? parseInt(m[1], 10) : null;
  }

  function formatWeight(g) {
    if (g >= 100) {
      const s = (g / 1000).toFixed(2).replace(/\.?0+$/, '');
      return `${s} KG`;
    }
    return `${g} grams`;
  }

  const slotNames = {
    hat: 'Head', torso: 'Body', legs: 'Legs',
    hands: 'Gloves', feet: 'Boots', ring: 'Ring',
    quiver: 'Quiver', righthand: 'Weapon', lefthand: 'Shield',
    front: 'Amulet', back: 'Cape'
  };

  function addPair(row, label, value, colspanValue = 1) {
    row.insertCell().textContent = label;
    const cell = row.insertCell();
    if (colspanValue > 1) cell.colSpan = colspanValue;
    cell.textContent = value;
  }

  function renderTable(item) {
    const table = document.createElement('table');
    table.className = 'calculators';

    let row = table.insertRow();
    const iconCell = row.insertCell(); iconCell.colSpan = 6;
    const canvas = document.createElement('canvas');
    const size = 60;
    canvas.width = size; canvas.height = size;
    canvas.dataset.itemname = item.debugname;
    canvas.dataset.size = size;
    canvas.dataset.showLabel = 'true';
    iconCell.appendChild(canvas);
    if (typeof renderSpriteToCanvas === 'function') renderSpriteToCanvas(item.debugname, canvas);

    row = table.insertRow();
    const descCell = row.insertCell(); descCell.colSpan = 6;
    descCell.textContent = item.desc || '-';

    const cost = item.cost || 0;
    row = table.insertRow();
    addPair(row, 'Shop Cost', cost.toLocaleString());
    addPair(row, 'Low Alch', Math.floor(cost * 0.4).toLocaleString());
    addPair(row, 'High Alch', Math.floor(cost * 0.6).toLocaleString());

    row = table.insertRow();
    addPair(row, 'Weight', formatWeight(item.weight || 0), item.wearpos ? 1 : 2);
    addPair(row, 'Members-only', item.members ? 'Yes' : 'No', item.wearpos ? 1 : 2);
    if (item.wearpos) addPair(row, 'Equip Slot', slotNames[item.wearpos] || item.wearpos);

    const b = item.bonuses || {};
    if (Object.values(b).some(v => v)) {
      row = table.insertRow();
      const sep = row.insertCell(); sep.colSpan = 6;
      sep.textContent = '--- Equip Bonuses ---';

      row = table.insertRow();
      addPair(row, 'Strength Bonus', b.strengthbonus || '-', 2);
      addPair(row, 'Prayer Bonus', b.prayerbonus || '-', 2);

      row = table.insertRow();
      addPair(row, 'Stab Attack', b.stabattack || '-');
      addPair(row, 'Slash Attack', b.slashattack || '-');
      addPair(row, 'Crush Attack', b.crushattack || '-');

      row = table.insertRow();
      addPair(row, 'Stab Defence', b.stabdefence || '-');
      addPair(row, 'Slash Defence', b.slashdefence || '-');
      addPair(row, 'Crush Defence', b.crushdefence || '-');

      row = table.insertRow();
      addPair(row, 'Magic Attack', b.magicattack || '-');
      addPair(row, 'Magic Defence', b.magicdefence || '-');
      addPair(row, 'Magic Bonus', b.magicbonus || '-');

      row = table.insertRow();
      addPair(row, 'Ranged Attack', b.rangeattack || '-');
      addPair(row, 'Ranged Defence', b.rangedefence || '-');
      addPair(row, 'Ranged Bonus', b.rangebonus || '-');
    }

    return table;
  }

  function updateDisplay() {
    container.innerHTML = '';
    container.classList.remove('compare-mode');
    const v1 = search1.value.trim();
    const v2 = search2.value.trim();
    const id1 = parseSelectedId(v1);
    const id2 = parseSelectedId(v2);
    const it1 = id1 != null ? items.find(i => i.id === id1) : null;
    const it2 = id2 != null ? items.find(i => i.id === id2) : null;

    if (it1) container.appendChild(renderTable(it1));
    else if (v1) container.innerHTML = `<p style="color:red">Item “${v1}” not found.</p>`;

    if (it2) {
      container.classList.add('compare-mode');
      container.appendChild(document.createElement('hr'));
      container.appendChild(renderTable(it2));
    } else if (v2) container.innerHTML += `<p style="color:red">Item “${v2}” not found.</p>`;
  }

  [search1, search2].forEach(el => el.addEventListener('change', updateDisplay));
  updateDisplay();
})();