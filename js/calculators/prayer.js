function runCalc() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);

    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }

    const xpNeeded = targetXP - currentXP;
    const bones = {
        "Bones": 4.5,
        "bones burnt": 4.5,
        "Bat Bones": 4.5,
        "Wolf Bones": 4.5,
        "Big Bones": 15,
        "Babydragon Bones": 30,
        "Dragon Bones": 72
    };

    // Update progress bar
    updateProgressBar(currentXP, targetXP);

    // Clear previous results
    const tableBody = document.querySelector("#resultsTable tbody");
    tableBody.innerHTML = ""; 

    // Generate table
    for (let bone in bones) {
        let boneCount = Math.ceil(xpNeeded / bones[bone]); 

        let row = document.createElement("tr");
        row.innerHTML = `
            <td><canvas data-itemname="${bone.toLowerCase().replace(/\s+/g, "_")}" data-show-label="inline"></canvas></td>
            <td>${bones[bone]}</td>
            <td>${boneCount.toLocaleString()}</td>
        `;
        tableBody.appendChild(row);
    }
    window.safeRenderAllSprites();
}