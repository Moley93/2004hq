async function fetchMagicXP() {
    const username = document.getElementById("username").value.trim();
    if (!username) return alert("Please enter a username.");

    const apiUrl = `pages/api/LSHiscoresProxy.php?username=${encodeURIComponent(username)}`;

    try {
        // Fetch data from the API through the CORS proxy
        const response = await fetch(apiUrl);
        
        // Check if the request was successful
        if (!response.ok) throw new Error("Failed to fetch data.");

        const data = await response.json(); // Convert response to JSON

        // Find the Magic XP data (Type 7 corresponds to Magic)
        const magicData = data.find(stat => stat.type === 7);

        if (magicData) {
            const magicXP = Math.floor(magicData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = magicXP; // Autofill the XP field
        } else {
            alert("Magic XP not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
}

// Calculate how many casts needed
function calculateSpells() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);

    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }
    
    const xpNeeded = targetXP - currentXP;
    const spells = [
        { name: "Wind Strike", xp: 5.5, level: 1 },
        { name: "Confuse", xp: 13, level: 3 },
        { name: "Water Strike", xp: 7.5, level: 5 },
        { name: "Earth Strike", xp: 9.5, level: 9 },
        { name: "Weaken", xp: 21, level: 11 },
        { name: "Fire Strike", xp: 11.5, level: 13 },
        { name: "Wind Bolt", xp: 13.5, level: 17 },
        { name: "Curse", xp: 29, level: 19 },
        { name: "Bind", xp: 30, level: 20 },
        { name: "Water Bolt", xp: 16.5, level: 23 },
        { name: "Earth Bolt", xp: 19.5, level: 29 },
        { name: "Fire Bolt", xp: 22.5, level: 35 },
        { name: "Crumble Undead", xp: 24.5, level: 39 },
        { name: "Wind Blast", xp: 25.5, level: 41 },
        { name: "Water Blast", xp: 28.5, level: 47 },
        { name: "Iban Blast", xp: 30, level: 50 },
        { name: "Snare", xp: 60, level: 50 },
        { name: "Earth Blast", xp: 31.5, level: 53 },
        { name: "Fire Blast", xp: 34.5, level: 59 },
        { name: "Saradomin Strike", xp: 35, level: 60 },
        { name: "Claws of Guthix", xp: 35, level: 60 },
        { name: "Flames of Zamorak", xp: 35, level: 60 },
        { name: "Wind Wave", xp: 36, level: 62 },
        { name: "Water Wave", xp: 37.5, level: 65 },
        { name: "Vulnerability", xp: 76, level: 66 },
        { name: "Earth Wave", xp: 40, level: 70 },
        { name: "Enfeeble", xp: 89, level: 73 },
        { name: "Fire Wave", xp: 42.5, level: 75 },
        { name: "Entangle", xp: 90, level: 79 },
        { name: "Stun", xp: 80, level: 80 }
    ];
    spells.sort((a, b) => a.level - b.level);
    const nonCombatspells = [
        { name: "Low Level Alchemy", xp: 31, level: 21 },
        { name: "High Level Alchemy", xp: 65, level: 55 },
        { name: "Superheat Item", xp: 53, level: 43 },
        { name: "Charge", xp: 180, level: 80 },
        { name: "Bones to Bananas", xp: 25, level: 15 },
        { name: "Lvl-1 Enchant", xp: 17.5, level: 7 },
        { name: "Lvl-2 Enchant", xp: 37, level: 27 },
        { name: "Lvl-3 Enchant", xp: 59, level: 49 },
        { name: "Lvl-4 Enchant", xp: 67, level: 57 },
        { name: "Lvl-5 Enchant", xp: 78, level: 68 },
        { name: "Telekinetic Grab", xp: 43, level: 33 },
        { name: "Charge Water Orb", xp: 56, level: 56 },
        { name: "Charge Earth Orb", xp: 70, level: 60 },
        { name: "Charge Fire Orb", xp: 73, level: 63 },
        { name: "Charge Air Orb", xp: 76, level: 66 },
        { name: "Varrock Teleport", xp: 35, level: 25 },
        { name: "Lumbridge Teleport", xp: 41, level: 31 },
        { name: "Falador Teleport", xp: 47, level: 37 },
        { name: "Camelot Teleport", xp: 55.5, level: 45 },
        { name: "Ardougne Teleport", xp: 61, level: 51 },
        { name: "Watchtower Teleport", xp: 68, level: 61 }
    ];
    nonCombatspells.sort((a, b) => a.level - b.level);
    
    const progressPercentage = ((currentXP / targetXP) * 100).toFixed(1);
    const progressBar = document.getElementById("progressBar");
    progressBar.style.width = `${progressPercentage}%`;
    progressBar.textContent = `${progressPercentage}%`;
    const tableBody = document.querySelector("#resultsTable tbody");
    const tableHead = document.querySelector("#resultsTable thead");
    tableHead.innerHTML = ""; // Clear previous headers
    tableBody.innerHTML = ""; // Clear previous rows

    const headerRow1 = document.createElement("tr");
    const bigHeader = document.createElement("th");
    bigHeader.colSpan = 4;
    bigHeader.textContent = "Combat Spells (Splashing Only)";
    headerRow1.appendChild(bigHeader);

    const headerRow2 = document.createElement("tr");
    const headers = ["Level", "Spell Type", "XP per Cast", "Casts Needed"];
    for (const text of headers) {
        const th = document.createElement("th");
        th.textContent = text;
        headerRow2.appendChild(th);
    }
    tableBody.appendChild(headerRow1);
    tableBody.appendChild(headerRow2);

    for (let spell of spells) {
        let spellCount = Math.ceil(xpNeeded / spell.xp);
        
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${spell.level}</td>
            <td><img src="img/calculators/magic/${spell.name.toLowerCase().replace(/\s+/g, "_")}.png" alt="${spell.name}"> ${spell.name}</td>
            <td>${spell.xp}</td>
            <td>${spellCount.toLocaleString()}</td>
        `;
        tableBody.appendChild(row);
    }

    const headerRow3 = document.createElement("tr");
    const bigHeader2 = document.createElement("th");
    bigHeader2.colSpan = 4;
    bigHeader2.textContent = "Non-Combat Spells";
    headerRow3.appendChild(bigHeader2);
    const headerRow4 = document.createElement("tr");
    for (const text of headers) {
        const th = document.createElement("th");
        th.textContent = text;
        headerRow4.appendChild(th);
    }
    tableBody.appendChild(headerRow3);
    tableBody.appendChild(headerRow4);

    for (let spell of nonCombatspells) {
        let spellCount = Math.ceil(xpNeeded / spell.xp);
        
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${spell.level}</td>
            <td><img src="img/calculators/magic/${spell.name.toLowerCase().replace(/\s+/g, "_")}.png" alt="${spell.name}"> ${spell.name}</td>
            <td>${spell.xp}</td>
            <td>${spellCount.toLocaleString()}</td>
        `;
        tableBody.appendChild(row);
    }
}