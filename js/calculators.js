// Convert level to XP
function getXPForLevel(level) {
    let total = 0;
    for (let i = 1; i < level; i++) {
      total += Math.floor(i + 300 * Math.pow(2, i / 7.0));
    }
    return Math.floor(total / 4);
}

// Convert XP to level
function getLevelForXP(xp) {
    let total = 0;
    let level = 1;

    while (level < 100) {
        let nextXP = Math.floor((level + 300 * Math.pow(2, level / 7.0)) / 4);
        total += nextXP;

        if (total > xp) {
            return level;
        }
        
        level++;
    }

    return 99; // Level 99 is the max in RuneScape
}