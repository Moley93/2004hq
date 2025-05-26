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
        const response = await fetch(`pages/api/LCHiscoresProxy.php?username=${encodeURIComponent(username)}`);
        if (!response.ok) throw new Error("Failed to fetch data.");
        const data = await response.json();

        const checkSkill = data.find(stat => stat.type === statType);

        if (checkSkill) {
            const XP = Math.floor(checkSkill.value / 10);
            document.getElementById("currentXP").value = XP;
            document.getElementById("targetLevel").value = getLevelForXP(XP) + 1;
            document.getElementById("targetXP").value = getXPForLevel(getLevelForXP(XP) + 1);
            runCalc();
        } else {
            alert("Player not found or not ranked in hiscores.");
        }
    } catch (error) {
        console.error(error);
        alert("Error fetching data!");
    }
}

function renderXpTable() {
    const xpDiv = document.querySelector('.xp-table');
    if (!xpDiv) return console.error('no .xp-table container found');

    const table = document.createElement('table');
    table.classList.add('calculators');
    table.style.width = '90%';

    const totalLevels = 99;
    const columns     = 2;
    const rowsPerCol  = Math.ceil(totalLevels / columns);

    const titleRow  = document.createElement('tr');
    const titleCell = document.createElement('th');
    titleCell.setAttribute('colspan', columns * 2);
    titleCell.textContent = 'Experience Table';
    titleRow.appendChild(titleCell);
    table.appendChild(titleRow);

    const headerRow = document.createElement('tr');
    for (let c = 0; c < columns; c++) {
        const thLevel = document.createElement('th');
        thLevel.textContent = 'Level';
        const thXp    = document.createElement('th');
        thXp.textContent = 'XP Required';
        headerRow.appendChild(thLevel);
        headerRow.appendChild(thXp);
    }
    table.appendChild(headerRow);

    for (let r = 0; r < rowsPerCol; r++) {
        const tr = document.createElement('tr');
        for (let c = 0; c < columns; c++) {
            const level = c * rowsPerCol + (r + 1);
            if (level <= totalLevels) {
                const xp = getXPForLevel(level);
                const tdLevel = document.createElement('td');
                tdLevel.textContent = level;
                const tdXp = document.createElement('td');
                tdXp.textContent = xp.toLocaleString();
                tr.appendChild(tdLevel);
                tr.appendChild(tdXp);
            } else {
                tr.appendChild(document.createElement('td'));
                tr.appendChild(document.createElement('td'));
            }
            table.appendChild(tr);         
        }
        xpDiv.appendChild(table);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const xpInput    = document.getElementById("targetXP");
    const lvlInput   = document.getElementById("targetLevel");
    if (!xpInput || !lvlInput) { return; }

    xpInput.addEventListener("input", () => {
        const xp    = parseInt(xpInput.value, 10) || 0;
        lvlInput.value = getLevelForXP(xp);
    });

    lvlInput.addEventListener("input", () => {
        const lvl   = parseInt(lvlInput.value, 10) || 2;
        xpInput.value  = getXPForLevel(lvl);
    });
});