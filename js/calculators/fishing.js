function runCalc() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);
                
    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }
    
    const xpNeeded = targetXP - currentXP;
    const fishes = [
        { name: "Shrimp", xp: 10, level: 1 },
        { name: "Sardine", xp: 20, level: 5 },
        { name: "Herring", xp: 30, level: 10 },
        { name: "Anchovies", xp: 40, level: 15 },
        { name: "Mackerel", xp: 20, level: 16 },
        { name: "Trout", xp: 50, level: 20 },
        { name: "Cod", xp: 45, level: 23 },
        { name: "Pike", xp: 60, level: 25 },
        { name: "Salmon", xp: 70, level: 30 },
        { name: "Tuna", xp: 80, level: 35 },
        { name: "Lobster", xp: 90, level: 40 },
        { name: "Bass", xp: 100, level: 46 },
        { name: "Swordfish", xp: 100, level: 50 },
        { name: "Lava Eel", xp: 60, level: 53 },
        { name: "Shark", xp: 110, level: 76},
        { name: "SeaTurtle", xp: 57, level: 79 },
        { name: "MantaRay", xp: 69, level: 81 }
    ];
    
    // Update progress bar
    updateProgressBar(currentXP, targetXP);

    // Clear previous results
    const tableBody = document.querySelector("#resultsTable tbody");
    tableBody.innerHTML = "";

    // Generate table
    for (let fish of fishes) {
        let estimatedCatches = Math.ceil(xpNeeded / fish.xp);
        
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${fish.level}</td>
            <td><canvas data-itemname="raw_${fish.name.toLowerCase().replace(/\s+/g, "_")}" data-show-label="inline"></canvas></td>
            <td>${fish.xp}</td>
            <td>${estimatedCatches.toLocaleString()}</td>
        `;
        tableBody.appendChild(row);
    }
    window.safeRenderAllSprites();
}