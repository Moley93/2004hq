// itemlist.js
(async function() {

  // 1) load & filter
  const allItems = await fetch('js/itemlist.json').then(r => r.json());
  const items = allItems
    .filter(i => i.name && !i.debugname.startsWith('cert_'))
    .sort((a, b) => a.name.localeCompare(b.name));

  // 2) populate datalist
  const datalist = document.getElementById('items-list');
      items.forEach(item => {
      const opt = document.createElement('option');
      // display "Name (ID)"
      opt.value = `${item.name} (${item.id})`;
      datalist.appendChild(opt);
  });

  // 3) inputs & container
  const search1 = document.getElementById('search1');
  const search2 = document.getElementById('search2');
  const container = document.getElementById('item-tables-container');

  // 4) slot lookup
  const slotNames = {
    hat: 'Head', torso: 'Body', legs: 'Legs',
    hands: 'Gloves', feet: 'Boots', ring: 'Ring',
    quiver: 'Quiver', righthand: 'Weapon', lefthand: 'Shield',
    front: 'Amulet', back: 'Cape'
  };

  // 5) weight formatter
  function formatWeight(g) {
    if (g >= 100) {
      let s = (g / 1000).toFixed(2).replace(/\.?0+$/, '');
      return `${s} KG`;
    }
    return `${g} grams`;
  }

  // helper to insert label/value pair
  function addPair(row, label, value) {
    row.insertCell().textContent = label;
    row.insertCell().textContent = value;
  }

  // 6) build one item’s table
  function renderTable(item) {
    const table = document.createElement('table');
    table.className = 'calculators';

    // — Icon row (canvas spans 6)
    let row = table.insertRow();
    const iconCell = row.insertCell();
    iconCell.colSpan = 6;
    
    const canvas = document.createElement('canvas');
    canvas.dataset.itemname  = item.debugname;
    canvas.dataset.size      = 60;
    canvas.dataset.showLabel = 'true';
    
    iconCell.appendChild(canvas);
    if (typeof renderSpriteToCanvas === 'function') {
      renderSpriteToCanvas(item.debugname, canvas);
    }

    // — Description row (spans 6)
    row = table.insertRow();
    const descCell = row.insertCell();
    descCell.colSpan = 6;
    descCell.textContent = item.desc || '-';

    // — Cost / Low / High Alch (3 pairs = 6 cells)
    const cost = item.cost || 0;
    row = table.insertRow();
    addPair(row, 'Shop Cost',  cost.toLocaleString());
    addPair(row, 'Low Alch',   Math.floor(cost * 0.4).toLocaleString());
    addPair(row, 'High Alch',  Math.floor(cost * 0.6).toLocaleString());

    // ——— Weight / Members / (Equip) ———
    row = table.insertRow();

    // Weight label
    row.insertCell().textContent = 'Weight';
    // Weight value, colspan=2 if no equip slot
    const wVal = row.insertCell();
    wVal.colSpan = item.wearpos ? 1 : 2;
    wVal.textContent = formatWeight(item.weight || 0);

    // Members-only label
    row.insertCell().textContent = 'Members';
    // Members-only value, colspan=2 if no equip slot
    const mVal = row.insertCell();
    mVal.colSpan = item.wearpos ? 1 : 2;
    mVal.textContent = item.members ? 'Yes' : 'No';

    // If it’s equipable, add the two Equip Slot cells (each colspan=1)
    if (item.wearpos) {
      row.insertCell().textContent = 'Equip Slot';
      row.insertCell().textContent = slotNames[item.wearpos] || item.wearpos;
    }

    // — Bonuses section (only if any non-zero)
    const b = item.bonuses || {};
    if (Object.values(b).some(v => v)) {
      // header full width
      row = table.insertRow();
      const sep = row.insertCell();
      sep.colSpan = 6;
      sep.textContent = '--- Equip Bonuses ---';

      // Strength / Prayer
      row = table.insertRow();

      // Strength Bonus label
      row.insertCell().textContent = 'Strength Bonus';
      // Strength value, colspan=2
      const sb = row.insertCell();
      sb.colSpan = 2;
      sb.textContent = b.strengthbonus || '-';

      // Prayer Bonus label
      row.insertCell().textContent = 'Prayer Bonus';
      // Prayer value, colspan=2
      const pb = row.insertCell();
      pb.colSpan = 2;
      pb.textContent = b.prayerbonus || '-';

      // Stab/Slash/Crush Attack
      row = table.insertRow();
      addPair(row, 'Stab Attack',  b.stabattack  || '-');
      addPair(row, 'Slash Attack', b.slashattack || '-');
      addPair(row, 'Crush Attack', b.crushattack || '-');

      // Stab/Slash/Crush Defence
      row = table.insertRow();
      addPair(row, 'Stab Defence',  b.stabdefence  || '-');
      addPair(row, 'Slash Defence', b.slashdefence || '-');
      addPair(row, 'Crush Defence', b.crushdefence || '-');

      // Magic Attack/Defence/Bonus
      row = table.insertRow();
      addPair(row, 'Magic Attack',  b.magicattack  || '-');
      addPair(row, 'Magic Defence', b.magicdefence || '-');
      addPair(row, 'Magic Bonus',   b.magicbonus   || '-');

      // Ranged Attack/Defence/Bonus
      row = table.insertRow();
      addPair(row, 'Ranged Attack',  b.rangeattack   || '-');
      addPair(row, 'Ranged Defence', b.rangedefence  || '-');
      addPair(row, 'Ranged Bonus',   b.rangebonus    || '-');
    }

    return table;
  }

  // 7) update display on input change
  function updateDisplay() {
    container.innerHTML = '';
    container.classList.remove('compare-mode');
    const v1 = search1.value.trim();
    const v2 = search2.value.trim();

    // helper: given a string like "Name (1234)", return the numeric ID or null
    function parseSelectedId(str) {
      const m = str.match(/\((\d+)\)$/);
      return m ? parseInt(m[1], 10) : null;
    }

    const id1 = parseSelectedId(v1);
    const id2 = parseSelectedId(v2);

    // find by id if present, otherwise fallback to first matching name
    const it1 = id1 != null
      ? items.find(i => i.id === id1)
      : items.find(i => i.name === v1.replace(/\s*\(\d+\)$/, ''));

    const it2 = id2 != null
      ? items.find(i => i.id === id2)
      : items.find(i => i.name === v2.replace(/\s*\(\d+\)$/, ''));

    const divider = document.createElement('hr');
    if (v1) {
      if (it1) {
        container.appendChild(renderTable(it1));
      } else {
        container.innerHTML = `<p style="color:red">Item “${v1}” not found.</p>`;
      }
    }
    if (v2) {
      if (it2) {
        container.classList.add('compare-mode');
        container.appendChild(divider);
        container.appendChild(renderTable(it2));
      } else {
        container.innerHTML += `<p style="color:red">Item “${v2}” not found.</p>`;
      }
    }
  }

  // 8) wire up both inputs
  [search1, search2].forEach(el =>
    el.addEventListener('change', updateDisplay)
  );
})();
