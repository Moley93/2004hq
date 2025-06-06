let mode = 'smelting_bars';
function setMode(selectedMode) {
    mode = selectedMode;
    document.getElementById("metalSelection").style.display = (mode === 'smelting') ? 'none' : 'block';
    runCalc();
}
const smithingXP = {
    "bronze": {
        "Bronze Dagger": { bars: 1, xp: 12.5, level: 1 },
        "Bronze Axe": { bars: 1, xp: 12.5, level: 1 },
        "Bronze Mace": { bars: 1, xp: 12.5, level: 2 },
        "Bronze Med Helm": { bars: 1, xp: 12.5, level: 3 },
        "Bronze Sword": { bars: 1, xp: 12.5, level: 4 },
        "Bronze Dart Tip": { bars: 1, xp: 12.5, level: 4 },
        "BronzecraftWire": { bars: 1, xp: 12.5, level: 4 },
        "Bronze Scimitar": { bars: 2, xp: 25, level: 5 },
        "Bronze Arrowheads": { bars: 1, xp: 12.5, level: 5 },
        "Bronze Longsword": { bars: 2, xp: 25, level: 6 },
        "Bronze Full Helm": { bars: 2, xp: 25, level: 7 },
        "Bronze Knife": { bars: 1, xp: 12.5, level: 7 },
        "Bronze Sq Shield": { bars: 2, xp: 25, level: 8 },
        "Bronze Warhammer": { bars: 3, xp: 37.5, level: 9 },
        "Bronze Battleaxe": { bars: 3, xp: 37.5, level: 10 },
        "Bronze Chainbody": { bars: 3, xp: 37.5, level: 11 },
        "Bronze Kiteshield": { bars: 3, xp: 37.5, level: 12 },
        "Bronze 2h Sword": { bars: 3, xp: 37.5, level: 14 },
        "Bronze Platelegs": { bars: 3, xp: 37.5, level: 16 },
        "Bronze Plateskirt": { bars: 3, xp: 37.5, level: 16 },
        "Bronze Platebody": { bars: 5, xp: 62.5, level: 18 }
    },
    "iron": {
        "Iron Dagger": { bars: 1, xp: 25, level: 15 },
        "Iron Axe": { bars: 1, xp: 25, level: 16 },
        "Iron Mace": { bars: 1, xp: 25, level: 17 },
        "Iron Med Helm": { bars: 1, xp: 25, level: 18 },
        "Iron Sword": { bars: 1, xp: 25, level: 19 },
        "Iron Dart Tip": { bars: 1, xp: 25, level: 19 },
        "Iron Scimitar": { bars: 2, xp: 50, level: 20 },
        "Iron Arrowheads": { bars: 1, xp: 25, level: 20 },
        "Iron Longsword": { bars: 2, xp: 50, level: 21 },
        "Iron Full Helm": { bars: 2, xp: 50, level: 22 },
        "Iron Knife": { bars: 1, xp: 25, level: 22 },
        "Iron Sq Shield": { bars: 2, xp: 50, level: 23 },
        "Iron Warhammer": { bars: 3, xp: 75, level: 24 },
        "Iron Battleaxe": { bars: 3, xp: 75, level: 25 },
        "Iron Chainbody": { bars: 3, xp: 75, level: 26 },
        "Iron Kiteshield": { bars: 3, xp: 75, level: 27 },
        "Iron 2h Sword": { bars: 3, xp: 75, level: 29 },
        "Iron Platelegs": { bars: 3, xp: 75, level: 31 },
        "Iron Plateskirt": { bars: 3, xp: 75, level: 31 },
        "Iron Platebody": { bars: 5, xp: 125, level: 33 }                  
    },
    "steel": {
        "Steel Dagger": { bars: 1, xp: 37.5, level: 30 },
        "Steel Axe": { bars: 1, xp: 37.5, level: 31 },
        "Steel Mace": { bars: 1, xp: 37.5, level: 32 },
        "Steel Med Helm": { bars: 1, xp: 37.5, level: 33 },
        "Steel Sword": { bars: 1, xp: 37.5, level: 34 },
        "Nails": { bars: 1, xp: 37.5, level: 34 },
        "Steel Dart Tip": { bars: 1, xp: 37.5, level: 34 },
        "Steel Scimitar": { bars: 2, xp: 75, level: 35 },
        "Steel Arrowheads": { bars: 1, xp: 37.5, level: 35 },
        "mCannonball": { bars: 1, xp: 50, level: 35 },
        "Steel Longsword": { bars: 2, xp: 75, level: 36 },
        "Studs": { bars: 1, xp: 37.5, level: 36 },
        "Steel Full Helm": { bars: 2, xp: 75, level: 37 },
        "Steel Knife": { bars: 1, xp: 37.5, level: 37 },
        "Steel Sq Shield": { bars: 2, xp: 75, level: 38 },
        "Steel Warhammer": { bars: 3, xp: 112.5, level: 39 },
        "Steel Battleaxe": { bars: 3, xp: 112.5, level: 40 },
        "Steel Chainbody": { bars: 3, xp: 112.5, level: 41 },
        "Steel Kiteshield": { bars: 3, xp: 112.5, level: 42 },
        "Steel 2h Sword": { bars: 3, xp: 112.5, level: 44 },
        "Steel Platelegs": { bars: 3, xp: 112.5, level: 46 },
        "Steel Plateskirt": { bars: 3, xp: 112.5, level: 46 },
        "Steel Platebody": { bars: 5, xp: 187.5, level: 48 }
    },
    "mithril": {
        "Mithril Dagger": { bars: 1, xp: 50, level: 50 },
        "Mithril Axe": { bars: 1, xp: 50, level: 51 },
        "Mithril Mace": { bars: 1, xp: 50, level: 52 },
        "Mithril Med Helm": { bars: 1, xp: 50, level: 53 },
        "Mithril Sword": { bars: 1, xp: 50, level: 54 },
        "Mithril Dart Tip": { bars: 1, xp: 50, level: 54 },
        "Mithril Scimitar": { bars: 2, xp: 100, level: 55 },
        "Mithril Arrowheads": { bars: 1, xp: 50, level: 55 },
        "Mithril Longsword": { bars: 2, xp: 100, level: 56 },
        "Mithril Full Helm": { bars: 2, xp: 100, level: 57 },
        "Mithril Knife": { bars: 1, xp: 50, level: 57 },
        "Mithril Sq Shield": { bars: 2, xp: 100, level: 58 },
        "Mithril Warhammer": { bars: 3, xp: 150, level: 59 },
        "Mithril Battleaxe": { bars: 3, xp: 150, level: 60 },
        "Mithril Chainbody": { bars: 3, xp: 150, level: 61 },
        "Mithril Kiteshield": { bars: 3, xp: 150, level: 62 },
        "Mithril 2h Sword": { bars: 3, xp: 150, level: 64 },
        "Mithril Platelegs": { bars: 3, xp: 150, level: 66 },
        "Mithril Plateskirt": { bars: 3, xp: 150, level: 66 },
        "Mithril Platebody": { bars: 5, xp: 250, level: 68 } 
    },
    "adamant": {
        "Adamant Dagger": { bars: 1, xp: 62.5, level: 70 },
        "Adamant Axe": { bars: 1, xp: 62.5, level: 71 },
        "Adamant Mace": { bars: 1, xp: 62.5, level: 72 },
        "Adamant Med Helm": { bars: 1, xp: 62.5, level: 73 },
        "Adamant Sword": { bars: 1, xp: 62.5, level: 74 },
        "Adamant Dart Tip": { bars: 1, xp: 62.5, level: 74 },
        "Adamant Scimitar": { bars: 2, xp: 125, level: 75 },
        "Adamant Arrowheads": { bars: 1, xp: 62.5, level: 75 },
        "Adamant Longsword": { bars: 2, xp: 125, level: 76 },
        "Adamant Full Helm": { bars: 2, xp: 125, level: 77 },
        "Adamant Knife": { bars: 1, xp: 62.5, level: 77 },
        "Adamant Sq Shield": { bars: 2, xp: 125, level: 78 },
        "Adamnt Warhammer": { bars: 3, xp: 187.5, level: 79 },
        "Adamant Battleaxe": { bars: 3, xp: 187.5, level: 80 },
        "Adamant Chainbody": { bars: 3, xp: 187.5, level: 81 },
        "Adamant Kiteshield": { bars: 3, xp: 187.5, level: 82 },
        "Adamant 2h Sword": { bars: 3, xp: 187.5, level: 84 },
        "Adamant Platelegs": { bars: 3, xp: 187.5, level: 86 },
        "Adamant Plateskirt": { bars: 3, xp: 187.5, level: 86 },
        "Adamant Platebody": { bars: 5, xp: 312.5, level: 88 } 
    },
    "rune": {
        "Rune Dagger": { bars: 1, xp: 75, level: 85 },
        "Rune Axe": { bars: 1, xp: 75, level: 86 },
        "Rune Mace": { bars: 1, xp: 75, level: 87 },
        "Rune Med Helm": { bars: 1, xp: 75, level: 88 },
        "Rune Sword": { bars: 1, xp: 75, level: 89 },
        "Rune Dart Tip": { bars: 1, xp: 75, level: 89 },
        "Rune Scimitar": { bars: 2, xp: 150, level: 90 },
        "Rune Arrowheads": { bars: 1, xp: 75, level: 90 },
        "Rune Longsword": { bars: 2, xp: 150, level: 91 },
        "Rune Full Helm": { bars: 2, xp: 150, level: 92 },
        "Rune Knife": { bars: 1, xp: 75, level: 92 },
        "Rune Sq Shield": { bars: 2, xp: 150, level: 93 },
        "Rune Warhammer": { bars: 3, xp: 225, level: 94 },
        "Rune Battleaxe": { bars: 3, xp: 225, level: 95 },
        "Rune Chainbody": { bars: 3, xp: 225, level: 96 },
        "Rune Kiteshield": { bars: 3, xp: 225, level: 97 },
        "Rune 2h Sword": { bars: 3, xp: 225, level: 99 },
        "Rune Platelegs": { bars: 3, xp: 225, level: 99 },
        "Rune Plateskirt": { bars: 3, xp: 225, level: 99 },
        "Rune Platebody": { bars: 5, xp: 375, level: 99 } 
    }
};

const smeltingXP = {
    "Bronze Bar": { xp: 6.2, level: 1 },
    "Iron Bar": { xp: 12.5, level: 15 },
    "Silver Bar": { xp: 13.7, level: 20 },
    "Steel Bar": { xp: 17.5, level: 30 },
    "Gold Bar": { xp: 22.5, level: 40 },
    "Goldsmith Gauntlets": { xp: 56.2, level: 40 },
    "Mithril Bar": { xp: 30, level: 50 },
    "Adamantite Bar": { xp: 37.5, level: 70 },
    "Runite Bar": { xp: 50, level: 85 }
};

const barXP = {
    "bronze": 6.2, "iron": 12.5, "steel": 17.5,
    "mithril": 22.5, "adamant": 37.5, "rune": 50
};

function runCalc() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetXP = parseInt(document.getElementById("targetXP").value);
    const xpNeeded = targetXP - currentXP;

    const selectedMetal = document.getElementById("metalType").value;
    const smithingData = smithingXP[selectedMetal];
    const smeltingData = smeltingXP
    
    updateProgressBar(currentXP, targetXP);

    const tableElem = document.querySelector("#resultsTable");
    const tableBody = tableElem.querySelector("tbody");
    const tableHead = tableElem.querySelector("thead");
    tableHead.innerHTML = "";
    let headerRow = document.createElement("tr");

    if (mode === 'smelting') {
        headerRow.innerHTML = `<th>Level</th><th>Item</th><th>XP per Smelt</th><th>Total Bars</th>`;
    } else {
        headerRow.innerHTML = `<th>Level</th><th>Item</th><th>Bars Needed</th><th>Total Items</th>`;
    }
    
    tableHead.appendChild(headerRow);

    tableBody.innerHTML = "";

    if (mode === 'smelting') {
        for (const [item, data] of Object.entries(smeltingData)) {
            // Skip items above target level
            // Use for later
        //    if (data.level > targetLevel) continue;
    
            const amountNeeded = Math.ceil(xpNeeded / data.xp);
    
            const row = document.createElement("tr");
            let iteminfo = `data-itemname="${item.toLowerCase().replace(/\s+/g, "_")}"`;
            if (item == "Goldsmith Gauntlets") {
                iteminfo = `data-itemname="gold_bar" data-name-append="(Goldsmith Gauntlets)"`;
            }
            row.innerHTML = `
                <td>${data.level}</td>
                <td><canvas ${iteminfo} data-show-label="inline"></canvas></td>
                <td>${data.xp}</td>
                <td>${amountNeeded.toLocaleString()}</td>
            `;
            tableBody.appendChild(row);
        }
    } else {
        for (const [item, data] of Object.entries(smithingData)) {
            // Skip items above target level
            // Use for later
        //    if (data.level > targetLevel) continue;
            
            let amountNeeded;

            if (mode === 'smelting_bars') {
                const barXPvalue = barXP[selectedMetal];
                amountNeeded = Math.ceil(xpNeeded / ( data.xp + (data.bars * barXPvalue)));
            } else {
                amountNeeded = Math.ceil(xpNeeded / data.xp);
            }

            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${data.level}</td>
                <td><canvas data-itemname="${item.toLowerCase().replace(/\s+/g, "_")}" data-show-label="inline"></canvas></td>
                <td>${data.bars}</td>
                <td>${amountNeeded.toLocaleString()}</td>
            `;
            tableBody.appendChild(row);
        }
    }
    
    window.safeRenderAllSprites();
}