async function fetchRunecraftingXP() {
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

        // Find the Runecrafting XP data (Type 21 corresponds to Runecrafting)
        const runecraftingData = data.find(stat => stat.type === 21);

        if (runecraftingData) {
            const runecraftingXP = Math.floor(runecraftingData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = runecraftingXP; // Autofill the XP field
        } else {
            alert("Runecrafting XP not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
}

// Calculate how many ess needed
function calculateRunes() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);

    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }

    const xpNeeded = targetXP - currentXP;
    const runes = [
        { name: "AirRune", xp: 5, level: 1 },
        { name: "MindRune", xp: 5.5, level: 2 },
        { name: "WaterRune", xp: 6, level: 5 },
        { name: "EarthRune", xp: 6.5, level: 9 },
        { name: "FireRune", xp: 7, level: 14 },
        { name: "BodyRune", xp: 7.5, level: 20 },
        { name: "CosmicRune", xp: 8, level: 27 },
        { name: "ChaosRune", xp: 8.5, level: 35 },
        { name: "NatureRune", xp: 9, level: 44 }
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
    for (let rune of runes) {
        let runeCount = Math.ceil(xpNeeded / rune.xp);
        
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${rune.level}</td>
            <td><canvas data-itemname="${rune.name.toLowerCase().replace(/\s+/g, "_")}" data-show-label="inline"></canvas></td>
            <td>${rune.xp}</td>
            <td>${runeCount.toLocaleString()}</td>
        `;
        tableBody.appendChild(row);
    }

    renderAllSprites();
}