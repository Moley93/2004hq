let mode = 'complete_potions';

async function fetchHerbloreXP() {
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

        // Find the Herblore XP data (Type 16 corresponds to Herblore)
        const herbloreData = data.find(stat => stat.type === 16);

        if (herbloreData) {
            const herbloreXP = Math.floor(herbloreData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = herbloreXP; // Autofill the XP field
        } else {
            alert("Herblore XP not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
}

function setMode(selectedMode) {
    mode = selectedMode;
    calculateHerblore();
}

function calculateHerblore() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);
    
    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }
    
    const xpNeeded = targetXP - currentXP;
    const herbloreData = {
        "complete_potions": {
            "3dose1attack": [3, 27.5],
            "3doseantipoison": [5, 41.3],
            "3dose1strength": [12, 55],
            "3dose1restore": [22, 68.8],
            "3dose1defense": [30, 82.5],
            "3doseprayerrestore": [38, 95],
            "3dose2attack": [45, 108.8],
            "3dose2antipoison": [48, 115.1],
            "3dosefisherspotion": [50, 122.5],
            "3dose2strength": [55, 136.3],
            "Weapon Poison": [60, 148.8],
            "3dose2defense": [66, 162.5], 
            "3dose1antidragon": [69, 170.6],
            "3doserangerspotion": [72, 176.3],
            "3dosepotionofzamorak": [78, 190]
        },
        "cleaning_herbs": {
            "Guam Leaf": [3, 2.5],
            "marentill": [5, 3.8],
            "Tarromin": [11, 5],
            "Harralander": [20, 6.3],
            "Ranarr Weed": [25, 7.5],
            "Irit Leaf": [40, 8.8],
            "Avantoe": [48, 10],
            "Kwuarm": [54, 11.3],
            "Cadantine": [65, 12.5],
            "Lantadyme": [67, 13.1],
            "Dwarf Weed": [70, 13.8],
            "Torstol": [75, 15]
        },
        "unfinished_potions": {
            "3dose1attack": [3, 25],
            "3doseantipoison": [5, 37.5],
            "3dose1strength": [12, 50],
            "3dose1restore": [22, 62.5],
            "3dose1defense": [30, 75],
            "3doseprayerrestore": [38, 87.5],
            "3dose2attack": [45, 100],
            "3dose2antipoison": [48, 106.3],
            "3dosefisherspotion": [50, 112.5],
            "3dose2strength": [55, 125],
            "Weapon Poison": [60, 137.5],
            "3dose2defense": [66, 150], 
            "3dose1antidragon": [69, 157.5],
            "3doserangerspotion": [72, 162.5],
            "3dosepotionofzamorak": [78, 175]
        }
    };

    // Update progress bar
    const progressPercentage = ((currentXP / targetXP) * 100).toFixed(1);
    const progressBar = document.getElementById("progressBar");
    progressBar.style.width = `${progressPercentage}%`;
    progressBar.textContent = `${progressPercentage}%`;
    const tableBody = document.querySelector("#resultsTable tbody");

    // Clear previous results
    tableBody.innerHTML = "";
    
    // Generate table based on option selected
    for (let item in herbloreData[mode]) {
        let [level, xpGained] = herbloreData[mode][item];
        let itemsNeeded = Math.ceil(xpNeeded / xpGained);
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${level}</td>
            <td><canvas data-itemname="${item.toLowerCase().replace(/\s+/g, "_")}" data-add-item-name="true" data-inline="true"></canvas></td>
            <td>${xpGained}</td>
            <td>${itemsNeeded.toLocaleString()}</td>
        `;
        tableBody.appendChild(row);
    }
    renderAllSprites();
}