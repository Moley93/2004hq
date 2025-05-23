let mode = 'npcs';

function setMode(newMode) {
    mode = newMode;
    runCalc();
}

function runCalc() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);

    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }
    
    const xpNeeded = targetXP - currentXP;
    const npcs = {
        "Man/Woman": { xp: 8, level: 1 },
        "Farmer": { xp: 14.5, level: 10 },
        "Warrior/Al Kharid warrior": { xp: 26, level: 25 },
        "Digsite Workman": { xp: 10.4, level: 10 },
        "Rogue": { xp: 36.5, level: 32 },
        "Guard": { xp: 46.8, level: 40 },
        "Knight of Ardougne": { xp: 84.3, level: 55 },
        "Yanille Watchman": { xp: 137.5, level: 65 },
        "Paladin": { xp: 151.8, level: 70 },
        "Gnome": { xp: 198.3, level: 75 },
        "Hero": { xp: 273.3, level: 80 }
    };
    
    const stalls = {
        "Bakery Stall": { xp: 16, level: 5 },
        "Tea Stall": { xp: 16, level: 5 },
        "Silk Stall": { xp: 24, level: 20 },
        "Fur Stall": { xp: 36, level: 35 },
        "Silver Stall": { xp: 54, level: 50 },
        "Spice Stall": { xp: 81, level: 65 },
        "Gem Stall": { xp: 16, level: 75 }
    };
    
    const chests = {
        "10 Coin Chest": { xp: 7.8, level: 1 },
        "Nature Rune Chest": { xp: 25, level: 28 },
        "50 Coin Chest": { xp: 125, level: 43 },
        "Steel Arrowtips Chest": { xp: 150, level: 47 },
        "Blood Rune Chest": { xp: 250, level: 59 },
        "Ardougne Castle Chest": { xp: 500, level: 72 }
    };
    
    // Update progress bar
    updateProgressBar(currentXP, targetXP);

    // Clear previous results
    const tableBody = document.querySelector("#resultsTable tbody");
    tableBody.innerHTML = "";
    
    // Generate table based on option selected
    const dataSet = mode === 'chests' ? chests : mode === 'stalls' ? stalls : npcs;
    for (let source in dataSet) {
        let { xp, level } = dataSet[source];
        let count = Math.ceil(xpNeeded / xp);
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${level}</td>
            <td><img src="img/calculators/thieving/${source.toLowerCase().replace(/\s+/g, '_').replace('/', '_')}.png" height=32px alt="${source}"><br>${source}</td>
            <td>${xp}</td>
            <td>${count.toLocaleString()}</td>
        `;
        tableBody.appendChild(row);
    }
}