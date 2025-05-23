async function fetchAgilityXP() {
    const username = document.getElementById("username").value.trim();
    if (!username) return alert("Please enter a username.");

    try {
        // Fetch data from the API
        const response = await fetch(`pages/api/LSHiscoresProxy.php?username=${encodeURIComponent(username)}`);
        
        if (!response.ok) throw new Error("Failed to fetch data.");

        const data = await response.json(); // Convert response to JSON

        // Find the Agility XP data (Type 17 corresponds to Agility)
        const agilityData = data.find(stat => stat.type === 17);

        if (agilityData) {
            const agilityXP = Math.floor(agilityData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = agilityXP; // Autofill the XP field
            document.getElementById("targetLevel").value = getLevelForXP(agilityXP) + 1; // Set target level to next level
            document.getElementById("targetLevel").min = getLevelForXP(agilityXP) + 1; // Set min level to current level + 1
            calculateLaps();
        } else {
            alert("Agility XP not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
}

// Calculate how many laps needed
function calculateLaps() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);

    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }

    const xpNeeded = targetXP - currentXP;
    const courses = [
        { name: "Gnome Stronghold", xp: 86.5, level: 1 },
        { name: "Barbarian Outpost", xp: 139.5, level: 35 },
        { name: "Wilderness", xp: 601.4, level: 52 }
    ];
    const shortcuts = [
        { name: "A wooden log (Karamja)", xp: 4, level: 1 },
        { name: "Crumbling wall (Falador)", xp: 0.5, level: 5 },
        { name: "Climbing rocks (Yanille)", xp: 25, level: 5 },
        { name: "Ropeswing (Brimhaven)", xp: 3, level: 10 },
        { name: "Monkeybars (Edgeville Dungeon)", xp: 20, level: 15 },
        { name: "Log balance (Coal Trucks)", xp: 8.5, level: 20 },
        { name: "Stepping stones (Karamja)", xp: 3, level: 30 }
    ];

    // Update progress bar
    const progressPercentage = ((currentXP / targetXP) * 100).toFixed(1);
    const progressBar = document.getElementById("progressBar");
    progressBar.style.width = `${progressPercentage}%`;
    const progressText = document.getElementById("progressText");
    progressText.textContent = `${progressPercentage}% - ${xpNeeded.toLocaleString()} XP to goal`;

    // Get both table bodies
    const courseTableBody = document.querySelector("#courseTable tbody");
    const shortcutTableBody = document.querySelector("#shortcutTable tbody");

    // Clear previous results
    courseTableBody.innerHTML = ""; 
    shortcutTableBody.innerHTML = "";

    // Generate course table
    for (let course of courses) {
        let lapCount = Math.ceil(xpNeeded / course.xp);
        
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${course.level}</td>
            <td><img src="img/calculators/agility/${course.name.toLowerCase().replace(/\s+/g, "_")}.png" height=32px alt="${course.name}"><br>${course.name}</td>
            <td>${course.xp}</td>
            <td>${lapCount.toLocaleString()}</td>
        `;
        courseTableBody.appendChild(row);
    }

    // Generate shortcut table
    for (let shortcut of shortcuts) {
        let lapCount = Math.ceil(xpNeeded / shortcut.xp);
        
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${shortcut.level}</td>
            <td><img src="img/calculators/agility/${shortcut.name.toLowerCase().replace(/\s+/g, "_")}.png" height=32px alt="${shortcut.name}"><br>${shortcut.name}</td>
            <td>${shortcut.xp}</td>
            <td>${lapCount.toLocaleString()}</td>
        `;
        shortcutTableBody.appendChild(row);
    }
}