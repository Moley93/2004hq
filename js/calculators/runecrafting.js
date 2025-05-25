function runCalc() {
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

    updateProgressBar(currentXP, targetXP);

    // Clear previous results
    const tableBody = document.querySelector("#resultsTable tbody");
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

    window.safeRenderAllSprites();
}