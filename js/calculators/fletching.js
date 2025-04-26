let mode = 'complete';
        
async function fetchFletchingXP() {
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

        // Find the Fletching XP data (Type 10 corresponds to Fletching)
        const fletchingData = data.find(stat => stat.type === 10);

        if (fletchingData) {
            const fletchingXP = Math.floor(fletchingData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = fletchingXP; // Autofill the XP field
        } else {
            alert("Fletching XP not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
}

function setMode(newMode) {
    mode = newMode;
    document.getElementById("arrowSelection").style.display = (mode === 'arrows') ? 'block' : 'none';
    calculateFletching();
}

function calculateFletching() {
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
        "Bronze Arrow 5": [39.5, 1],
        "Opal Bolt": [31, 11],
        "Iron Arrow 5": [57.5, 15],
        "Steel Arrow 5": [95, 30],
        "Pearl Bolt": [64, 41],
        "Mithril Arrow 5": [132.5, 45],
        "Barbed Bolt": [95, 51],
        "Adamant Arrow 5": [170, 60],
        "Rune Arrow 5": [207.5, 75]
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
    
    // Update progress bar
    const progressPercentage = ((currentXP / targetXP) * 100).toFixed(1);
    const progressBar = document.getElementById("progressBar");
    progressBar.style.width = `${progressPercentage}%`;
    progressBar.textContent = `${progressPercentage}%`;
    const tableBody = document.querySelector("#resultsTable tbody");

    // Clear previous results
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
    renderAllSprites();
}