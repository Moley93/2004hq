let mode = 'complete';
function setMode(newMode) {
    mode = newMode;
    document.getElementById("arrowSelection").style.display = (mode === 'arrows') ? 'block' : 'none';
    runCalc();
}

function runCalc() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);

    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }
    
    const xpNeeded = targetXP - currentXP;
    const items = {
        "Shortbow": [5, 5, 10, 1],
        "Longbow": [10, 10, 20, 5],
        "Oak Shortbow": [16.5, 16.5, 33, 20],
        "Oak Longbow": [25, 25, 50, 25],
        "Willow Shortbow": [33.3, 33.2, 66.5, 35],
        "Willow Longbow": [41.5, 41.5, 83, 40],
        "Maple Shortbow": [50, 50, 100, 50],
        "Maple Longbow": [58.3, 58.2, 116.5, 55],
        "Yew Shortbow": [67.5, 67.5, 134, 65],
        "Yew Longbow": [75, 75, 150, 70],
        "Magic Shortbow": [83.3, 83.2, 166.5, 80],
        "Magic Longbow": [91.5, 91.5, 182, 85]
    };
    
    const arrows = {
        "Arrow Shaft": [5, 1],
        "Headless Arrow": [20, 1],
        "Bronze Arrow": [39.5, 1],
        "Opal Bolt": [31, 11],
        "Iron Arrow": [57.5, 15],
        "Steel Arrow": [95, 30],
        "Pearl Bolt": [64, 41],
        "Mithril Arrow": [132.5, 45],
        "Barbed Bolt": [95, 51],
        "Adamant Arrow": [170, 60],
        "Rune Arrow": [207.5, 75]
    };

    const incomplete = {
        "Headless Arrow": [15, 1],
        "Bronze Arrowheads": [13, 1],
        "Opal Bolttips": [15, 11],
        "Iron Arrowheads": [25, 15],
        "Steel Arrowheads": [50, 30],
        "Pearl Bolttips": [32, 41],
        "Mithril Arrowheads": [75, 45],
        "Adamant Arrowheads": [100, 60],
        "Rune Arrowheads": [125, 75]
    }
    
    updateProgressBar(currentXP, targetXP);

    // Clear previous results
    const tableBody = document.querySelector("#resultsTable tbody");
    tableBody.innerHTML = "";
    
    // Generate table based on option selected
    if (mode === 'arrows') {
        const arrowType = document.getElementById("arrowType").value;
        const arrowData = arrowType === "completeArrows" ? arrows : incomplete;

        for (let arrow in arrowData) {
            let [xpPerAction, levelReq] = arrowData[arrow];
            let count = Math.ceil(xpNeeded / xpPerAction);
            
            let row = document.createElement("tr");
            row.innerHTML = `
                <td>${levelReq}</td>
                <td><canvas data-itemname="${arrow.toLowerCase().replace(/\s+/g, "_")}" data-show-label="inline"></canvas></td>
                <td>${xpPerAction}</td>
                <td>${count.toLocaleString()}</td>
            `;
            tableBody.appendChild(row);
        }
    } else {
        for (let item in items) {
            let [xpPerAction, xpStringing, xpFull, levelReq] = items[item];
            let xpToUse;
            let itemName = item;

            if (mode === 'unstrung') {
                xpToUse = xpPerAction;
                itemName = "unstrung "+itemName;
            } else if (mode === 'stringing') {
                xpToUse = xpStringing;
                itemName = "unstrung "+itemName;
            } else {
                xpToUse = xpFull;
            }

            let count = Math.ceil(xpNeeded / xpToUse);
            
            let row = document.createElement("tr");
            row.innerHTML = `
                <td>${levelReq}</td>
                <td><canvas data-itemname="${itemName.toLowerCase().replace(/\s+/g, "_")}" data-show-label="inline"></canvas></td>
                <td>${xpToUse}</td>
                <td>${count.toLocaleString()}</td>
            `;
            tableBody.appendChild(row);
        }
    }
    window.safeRenderAllSprites();
}