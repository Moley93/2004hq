function runCalc() {
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

    updateProgressBar(currentXP, targetXP);

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