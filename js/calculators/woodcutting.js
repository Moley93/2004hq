async function fetchWoodcuttingXP() {
    const username = document.getElementById("username").value.trim();
    if (!username) return alert("Please enter a username.");

    try {
        // Fetch data from the API
        const response = await fetch(`pages/api/LSHiscoresProxy.php?username=${encodeURIComponent(username)}`);
        
        // Check if the request was successful
        if (!response.ok) throw new Error("Failed to fetch data.");

        const data = await response.json(); // Convert response to JSON

        // Find the Woodcutting XP data (Type 9 corresponds to Woodcutting)
        const woodcuttingData = data.find(stat => stat.type === 9);

        if (woodcuttingData) {
            const woodcuttingXP = Math.floor(woodcuttingData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = woodcuttingXP; // Autofill the XP field
            document.getElementById("targetLevel").value = getLevelForXP(woodcuttingXP) + 1; // Set target level to next level
            document.getElementById("targetLevel").min = getLevelForXP(woodcuttingXP) + 1; // Set min level to current level + 1
            calculateLogs();
        } else {
            alert("Woodcutting XP not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
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
        { name: "logs", xp: 25, level: 1 },
        { name: "achey_tree_logs", xp: 25, level: 1 },
        { name: "oak_logs", xp: 37.5, level: 15 },
        { name: "willow_logs", xp: 67.5, level: 30 },
        { name: "maple_logs", xp: 100, level: 45 },
        { name: "yew_logs", xp: 175, level: 60 },
        { name: "magic_logs", xp: 250, level: 75 }
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
    for (let log of logs) {
        let logCount = Math.ceil(xpNeeded / log.xp); 

        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${log.level}</td>
            <td><canvas data-itemname="${log.name.toLowerCase().replace(/\s+/g, "_")}" data-show-label="inline"></canvas></td>
            <td>${log.xp}</td>
            <td>${logCount.toLocaleString()}</td>
        `;
        tableBody.appendChild(row);
    }
    window.safeRenderAllSprites();
}