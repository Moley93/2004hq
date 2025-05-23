function runCalc() {
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
    updateProgressBar(currentXP, targetXP);

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