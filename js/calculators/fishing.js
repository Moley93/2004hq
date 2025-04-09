async function fetchFishingXP() {
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

        // Find the Fishing XP data (Type 11 corresponds to Fishing)
        const fishingData = data.find(stat => stat.type === 11);

        if (fishingData) {
            const fishingXP = Math.floor(fishingData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = fishingXP; // Autofill the XP field
        } else {
            alert("Fishing XP not found."); // Show alert if no data is found
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

// Calculate how many fish needed
function calculateFish() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);
                
    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }
    
    const xpNeeded = targetXP - currentXP;
    const fishes = [
        { name: "Shrimps", xp: 10, level: 1 },
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
        { name: "Sea Turtle", xp: 57, level: 79 },
        { name: "Manta Ray", xp: 69, level: 81 }
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
    for (let fish of fishes) {
        let estimatedCatches = Math.ceil(xpNeeded / fish.xp);
        
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${fish.level}</td>
            <td><img src="raw_${fish.name.toLowerCase().replace(/\s+/g, "_")}.png" alt="${fish.name}"> ${fish.name}</td>
            <td>${fish.xp}</td>
            <td>${formatNumber(estimatedCatches)}</td>
        `;
        tableBody.appendChild(row);
    }
}