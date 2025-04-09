async function fetchWoodcuttingXP() {
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

        // Find the Woodcutting XP data (Type 9 corresponds to Woodcutting)
        const woodcuttingData = data.find(stat => stat.type === 9);

        if (woodcuttingData) {
            const woodcuttingXP = Math.floor(woodcuttingData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = woodcuttingXP; // Autofill the XP field
        } else {
            alert("Woodcutting XP not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
}

// Convert level to XP
function getXPForLevel(level) {
    let total = 0;
    for (let i = 1; i < level; i++) {
      total += Math.floor(i + 300 * Math.pow(2, i / 7.0));
    }
    return Math.floor(total / 4);
}

// Adds commas for thousands
function formatNumber(num) {
    return num.toLocaleString(); 
}

// Calculate how many logs needed
function calculateLogs() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);

    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }

    const xpNeeded = targetXP - currentXP;
    const logs = [
        { name: "Logs", xp: 25, level: 1 },
        { name: "Achey Tree Logs", xp: 25, level: 1 },
        { name: "Oak Logs", xp: 37.5, level: 15 },
        { name: "Willow Logs", xp: 67.5, level: 30 },
        { name: "Maple Logs", xp: 100, level: 45 },
        { name: "Yew Logs", xp: 175, level: 60 },
        { name: "Magic Logs", xp: 250, level: 75 }
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
    for (let log of logs) {
        let logCount = Math.ceil(xpNeeded / log.xp); 

        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${log.level}</td>
            <td><img src="${log.name.toLowerCase().replace(/\s+/g, "_")}.png" alt="${log.name}"> ${log.name}</td>
            <td>${log.xp}</td>
            <td>${formatNumber(logCount)}</td>
        `;
        tableBody.appendChild(row);
    }
}