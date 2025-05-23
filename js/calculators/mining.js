async function fetchMiningXP() {
    const username = document.getElementById("username").value.trim();
    if (!username) return alert("Please enter a username.");

    try {
        // Fetch data from the API
        const response = await fetch(`pages/api/LSHiscoresProxy.php?username=${encodeURIComponent(username)}`);
        
        // Check if the request was successful
        if (!response.ok) throw new Error("Failed to fetch data.");

        const data = await response.json(); // Convert response to JSON

        // Find the Mining XP data (Type 15 corresponds to Mining)
        const miningData = data.find(stat => stat.type === 15);

        if (miningData) {
            const miningXP = Math.floor(miningData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = miningXP; // Autofill the XP field
            document.getElementById("targetLevel").value = getLevelForXP(miningXP) + 1; // Set target level to next level
            document.getElementById("targetLevel").min = getLevelForXP(miningXP) + 1; // Set min level to current level + 1
            calculateOres();
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
    const progressText = document.getElementById("progressText");
    progressText.textContent = `${progressPercentage}% - ${xpNeeded.toLocaleString()} XP to goal`;

    // Clear previous results
    const tableBody = document.querySelector("#resultsTable tbody");
    tableBody.innerHTML = ""; 

    // Generate table
    for (let ore of ores) {
        let oreCount = Math.ceil(xpNeeded / ore.xp); 

        let row = document.createElement("tr");
        if (ore.name == "Gem Rock") {
            row.innerHTML = `
                <td>${ore.level}</td>
                <td><div class="item-label" style="color: white; display: flex; align-items: center; justify-content: center; gap: 6px;"><canvas data-itemname="uncut_red_topaz"></canvas> Gem Rock</div></td>
                <td>${ore.xp}</td>
                <td>${oreCount.toLocaleString()}</td>
            `;
        } else {
            row.innerHTML = `
                <td>${ore.level}</td>
                <td><canvas data-itemname="${ore.name.toLowerCase().replace(/\s+/g, "_")}" data-show-label="inline"></canvas></td>
                <td>${ore.xp}</td>
                <td>${oreCount.toLocaleString()}</td>
            `;
        }
        tableBody.appendChild(row);
    }
    window.safeRenderAllSprites();
}