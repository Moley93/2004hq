async function fetchMagicXP() {
    const username = document.getElementById("username").value.trim();
    if (!username) return alert("Please enter a username.");

    const apiUrl = `https://2004.lostcity.rs/api/hiscores/player/${encodeURIComponent(username)}`;
    const corsProxy = "https://api.allorigins.win/raw?url=";

    try {
        // Fetch data from the API through the CORS proxy
        const response = await fetch(corsProxy + apiUrl);
        
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
function calculateSplashing() {
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
        { name: "Water Strike", xp: 7.5, level: 5 },
        { name: "Earth Strike", xp: 9.5, level: 9 },
        { name: "Fire Strike", xp: 11.5, level: 13 },
        { name: "Wind Bolt", xp: 13.5, level: 17 },
        { name: "Water Bolt", xp: 16.5, level: 23 },
        { name: "Earth Bolt", xp: 19.5, level: 29 },
        { name: "Fire Bolt", xp: 22.5, level: 35 },
        { name: "Wind Blast", xp: 25.5, level: 41 },
        { name: "Water Blast", xp: 28.5, level: 47 },
        { name: "Earth Blast", xp: 31.5, level: 53 },
        { name: "Fire Blast", xp: 34.5, level: 59 },
        { name: "Wind Wave", xp: 36, level: 62 },
        { name: "Water Wave", xp: 37.5, level: 65 },
        { name: "Earth Wave", xp: 40, level: 70 },
        { name: "Fire Wave", xp: 42.5, level: 75 }
    ];
    
    // Update progress bar
    const progressPercentage = ((currentXP / targetXP) * 100).toFixed(1);
    const progressBar = document.getElementById("progressBar");
    progressBar.style.width = `${progressPercentage}%`;
    progressBar.textContent = `${progressPercentage}%`;
    const tableBody = document.querySelector("#resultsTable tbody");

    // Clear previous results
    tableBody.innerHTML = "";
    
    // Generate table
    for (let spell of spells) {
        let spellCount = Math.ceil(xpNeeded / spell.xp);
        
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${spell.level}</td>
            <td><img src="img/calculators/splashing/${spell.name.toLowerCase().replace(/\s+/g, "_")}.png" alt="${spell.name}"> ${spell.name}</td>
            <td>${spell.xp}</td>
            <td>${formatNumber(spellCount)}</td>
        `;
        tableBody.appendChild(row);
    }
}