function getXPForLevel(level) {
    let total = 0;
    for (let i = 1; i < level; i++) {
      total += Math.floor(i + 300 * Math.pow(2, i / 7.0));
    }
    return Math.floor(total / 4);
}

function getLevelForXP(xp) {
    let total = 0;
    let level = 1;
    while (level < 100) {
        let nextXP = Math.floor((level + 300 * Math.pow(2, level / 7.0)) / 4);
        total += nextXP;
        if (total > xp) { return level; }
        level++;
    }
    return 99;
}

function updateProgressBar(currentXP, targetXP) {
    const xpNeeded = targetXP - currentXP;
    const progressPercentage = ((currentXP / targetXP) * 100).toFixed(1);
    const progressBar = document.getElementById("progressBar");
    progressBar.style.width = `${progressPercentage}%`;
    const progressText = document.getElementById("progressText");
    progressText.textContent = `${progressPercentage}% - ${xpNeeded.toLocaleString()} XP to goal`;
}

async function fetchXP(statType) {
    const username = document.getElementById("username").value.trim();
    if (!username) return alert("Please enter a username.");
    try {
        // Fetch data from the API
        const response = await fetch(`pages/api/LCHiscoresProxy.php?username=${encodeURIComponent(username)}`);
        if (!response.ok) throw new Error("Failed to fetch data.");
        const data = await response.json();

        // Find the Woodcutting XP data (Type 9 corresponds to Woodcutting)
        const checkSkill = data.find(stat => stat.type === statType);

        if (checkSkill) {
            const XP = Math.floor(checkSkill.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = XP; // Autofill the XP field
            const nextLevel = getLevelForXP(XP) + 1;
            document.getElementById("targetLevel").value = nextLevel; // Set target level to next level
            document.getElementById("targetLevel").min = nextLevel; // Set min level to next level
            runCalc();
        } else {
            alert("Player not found or not ranked."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data!"); // Alert user of an error
    }
}