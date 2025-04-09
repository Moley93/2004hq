async function fetchPrayerXP() {
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

        // Find the Prayer XP data (Type 6 corresponds to Prayer)
        const prayerData = data.find(stat => stat.type === 6);

        if (prayerData) {
            const prayerXP = Math.floor(prayerData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = prayerXP; // Autofill the XP field
        } else {
            alert("Prayer XP not found."); // Show alert if no data is found
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

// Calculate how many bones needed
function calculateBones() {
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
        "Burnt Bones": 4.5,
        "Bat Bones": 4.5,
        "Wolf Bones": 4.5,
        "Big Bones": 15,
        "Babydragon Bones": 30,
        "Dragon Bones": 72
    };

    // Update progress bar
    const progressPercentage = ((currentXP / targetXP) * 100).toFixed(1);
    const progressBar = document.getElementById("progressBar");
    progressBar.style.width = `${progressPercentage}%`;
    progressBar.textContent = `${progressPercentage}%`;
    const tableBody = document.querySelector("#resultsTable tbody");

    // Clear previous results
    tableBody.innerHTML = ""; 

    // Generate table
    for (let bone in bones) {
        let boneCount = Math.ceil(xpNeeded / bones[bone]); 

        let row = document.createElement("tr");
        row.innerHTML = `
            <td><img src="${bone.toLowerCase().replace(/\s+/g, "_")}.png" alt="${bone}"> ${bone}</td>
            <td>${bones[bone]}</td>
            <td>${formatNumber(boneCount)}</td>
        `;
        tableBody.appendChild(row);
    }
}