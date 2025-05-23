async function fetchPrayerXP() {
    const username = document.getElementById("username").value.trim();
    if (!username) return alert("Please enter a username.");

    try {
        // Fetch data from the API
        const response = await fetch(`pages/api/LSHiscoresProxy.php?username=${encodeURIComponent(username)}`);
        
        // Check if the request was successful
        if (!response.ok) throw new Error("Failed to fetch data.");

        const data = await response.json(); // Convert response to JSON

        // Find the Prayer XP data (Type 6 corresponds to Prayer)
        const prayerData = data.find(stat => stat.type === 6);

        if (prayerData) {
            const prayerXP = Math.floor(prayerData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = prayerXP; // Autofill the XP field
            document.getElementById("targetLevel").value = getLevelForXP(prayerXP) + 1; // Set target level to next level
            document.getElementById("targetLevel").min = getLevelForXP(prayerXP) + 1; // Set min level to current level + 1
            calculateBones();
        } else {
            alert("Prayer XP not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
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
        "bones burnt": 4.5,
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
    const progressText = document.getElementById("progressText");
    progressText.textContent = `${progressPercentage}% - ${xpNeeded.toLocaleString()} XP to goal`;

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