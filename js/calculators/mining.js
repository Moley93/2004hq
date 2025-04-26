async function fetchMiningXP() {
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

        // Find the Mining XP data (Type 15 corresponds to Mining)
        const miningData = data.find(stat => stat.type === 15);

        if (miningData) {
            const miningXP = Math.floor(miningData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = miningXP; // Autofill the XP field
        } else {
            alert("Mining XP not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
}

// Calculate how many ores needed
function calculateOres() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);

    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }

    const xpNeeded = targetXP - currentXP;
    const ores = [
        { name: "Clay", xp: 5, level: 1 },
        { name: "blankrune", xp: 5, level: 1 },
        { name: "Copper Ore", xp: 17.5, level: 1 },
        { name: "Tin Ore", xp: 17.5, level: 1 },
        { name: "Blurite Ore", xp: 17.5, level: 10 },
        { name: "Iron Ore", xp: 35, level: 15 },
        { name: "Silver Ore", xp: 40, level: 20 },
        { name: "Coal", xp: 50, level: 30 },
        { name: "Gold Ore", xp: 65, level: 40 },
        { name: "Gem Rock", xp: 65, level: 40 },
        { name: "Mithril Ore", xp: 80, level: 55 },
        { name: "Adamantite Ore", xp: 95, level: 70 },
        { name: "Runite Ore", xp: 125, level: 85 }
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
    for (let ore of ores) {
        let oreCount = Math.ceil(xpNeeded / ore.xp); 

        let row = document.createElement("tr");
        if (ore.name == "Gem Rock") {
            row.innerHTML = `
                <td>${ore.level}</td>
                <td><canvas data-itemname="uncut_red_topaz"></canvas><div class="item-label" style="color: white; text-align: center; margin-top: 4px;">Gem Rock</div></td>
                <td>${ore.xp}</td>
                <td>${oreCount.toLocaleString()}</td>
            `;
        } else {
            row.innerHTML = `
                <td>${ore.level}</td>
                <td><canvas data-itemname="${ore.name.toLowerCase().replace(/\s+/g, "_")}" data-add-item-name="true" data-inline="true"></canvas></td>
                <td>${ore.xp}</td>
                <td>${oreCount.toLocaleString()}</td>
            `;
        }
        tableBody.appendChild(row);
    }
    renderAllSprites();
}