function onBodyLoad() { switchCombat("melee"); calculateMaxHit(); }

function switchCombat(type) {
    ["melee", "ranged", "magic"].forEach(c => {
        document.getElementById(c + "Options").classList.toggle("hidden", c !== type);
    });
    calculateFromEquipment();
}

function calculateMaxHit() {
    let maxHit = 0;
    if (!document.getElementById("meleeOptions").classList.contains("hidden")) {
        const strengthLevel = parseInt(document.getElementById("strengthLevel").value) || 1;
        const meleeFightingStyle = parseInt(document.getElementById("meleeFightingStyle").value) || 0;
        const meleePrayer = parseFloat(document.getElementById("meleePrayer").value) || 1;
        const weaponBonus = parseInt(document.getElementById("meleeWeaponBonus").value) || 0;
        const amuletBonus = parseInt(document.getElementById("amuletBonus").value) || 0;
        const glovesBonus = parseInt(document.getElementById("glovesBonus").value) || 0;

        const potionValues = document.getElementById("meleePotion").value.split(',');
        const potionFlatBonus = parseInt(potionValues[0]);
        const potionPercentageBonus = parseFloat(potionValues[1]);

        // Step 1: Apply potion boost (Add flat bonus first, then apply percentage, rounding down)
        let boostedStrength = strengthLevel + potionFlatBonus;
        let potionBonus = Math.floor(strengthLevel * potionPercentageBonus); // Correct rounding step
        boostedStrength = strengthLevel + potionBonus + potionFlatBonus; // Apply rounded potion boost

        // Step 2: Apply prayer bonus, rounding down
        let effectiveStrength = Math.floor(boostedStrength * meleePrayer);

        // Step 3: Add attack style bonus
        effectiveStrength += meleeFightingStyle;

        // Step 4: Add +8
        effectiveStrength += 8;

        // Step 5: Round down again to ensure proper calculation
        effectiveStrength = Math.floor(effectiveStrength);

        // Step 6: Compute total strength bonus from gear
        const totalStrengthBonus = parseInt(document.getElementById("strengthBonus").value) || 0;

        // Step 7: Compute max hit using the formula
        maxHit = Math.floor(((effectiveStrength * (totalStrengthBonus + 64)) + 320) / 640);
    
    } else if (!document.getElementById("rangedOptions").classList.contains("hidden")) {
        const rangedLevel = parseInt(document.getElementById("rangedLevel").value);
        const rangedFightingStyle = parseInt(document.getElementById("rangedFightingStyle").value);
        const weaponSelect = document.getElementById("rangedWeaponBonus");
        const selectedOption = weaponSelect.options[weaponSelect.selectedIndex];

        let bonus = 0;
        if (selectedOption.id === "bowAndArrow") {
            bonus = parseInt(document.getElementById("arrowBonus").value);
        } else if (selectedOption.id === "crossbowAndBolt") {
            bonus = parseInt(document.getElementById("boltBonus").value);
        } else {
            bonus = parseInt(weaponSelect.value);
        }

        const potionValues = document.getElementById("rangedPotion").value.split(',');
        const potionFlatBonus = parseInt(potionValues[0]);
        const potionPercentageBonus = parseFloat(potionValues[1]);

        // Step 1: Apply potion boost (Add flat bonus first, then apply percentage, rounding down)
        let boostedRanged = rangedLevel + potionFlatBonus;
        let potionBonus = Math.floor(rangedLevel * potionPercentageBonus);
        boostedRanged = rangedLevel + potionBonus + potionFlatBonus;

        // Step 2: Add attack style bonus
        let effectiveRanged = boostedRanged;
        effectiveRanged += rangedFightingStyle;

        // Step 3: Add +8
        effectiveRanged += 8;

        // Step 4: Round down again to ensure proper calculation
        effectiveRanged = Math.floor(effectiveRanged);

        // Step 5: Compute total strength bonus from gear
        const totalRangedBonus = parseInt(document.getElementById("rangedBonus").value) || 0;

        // Step 6: Compute max hit using the formula
        maxHit = Math.floor(((effectiveRanged * (totalRangedBonus + 64)) + 320) / 640);
        
    } else {
        const spell = parseInt(document.getElementById("spell").value);
        const gauntletBonus = parseFloat(document.getElementById("chaosGauntlets").value);

        // Only apply Chaos Gauntlet bonus for bolt spells (Wind Bolt, Water Bolt, Earth Bolt, Fire Bolt)
        if ([9, 10, 11, 12].includes(spell)) {
            maxHit = Math.floor(spell + gauntletBonus);
        } else {
            maxHit = Math.floor(spell);
        }
    }
    document.getElementById("maxHit").textContent = maxHit;
}

function calculateFromEquipment() {
    if (!document.getElementById("meleeOptions").classList.contains("hidden")) {
        const meleeWeaponBonus = parseInt(document.getElementById("meleeWeaponBonus").value);
        const amuletBonus = parseInt(document.getElementById("amuletBonus").value);
        const glovesBonus = parseInt(document.getElementById("glovesBonus").value);

        const totalStrengthBonus = meleeWeaponBonus + amuletBonus + glovesBonus;
        document.getElementById("strengthBonus").value = totalStrengthBonus;
    } else {
        const weaponSelect = document.getElementById("rangedWeaponBonus");
        const selectedOption = weaponSelect.options[weaponSelect.selectedIndex];

        let totalRangedBonus = 0;
        if (selectedOption.id === "bowAndArrow") {
            totalRangedBonus = parseInt(document.getElementById("arrowBonus").value);
        } else if (selectedOption.id === "crossbowAndBolt") {
            totalRangedBonus = parseInt(document.getElementById("boltBonus").value);
        } else {
            totalRangedBonus = parseInt(document.getElementById("rangedWeaponBonus").value);
        }
        document.getElementById("rangedBonus").value = totalRangedBonus;
    }
    calculateMaxHit();
}

// Function to toggle visibility of arrow and bolt options
function toggleOptions() {
    const selectedOption = document.getElementById("rangedWeaponBonus").selectedOptions[0];

    // Show arrow options if Bow & Arrow is selected
    if (selectedOption.id === "bowAndArrow") {
        document.getElementById("arrowOptions").classList.remove("hidden");
        document.getElementById("boltOptions").classList.add("hidden");
    }
    // Show bolt options if Crossbow & Bolt is selected
    else if (selectedOption.id === "crossbowAndBolt") {
        document.getElementById("arrowOptions").classList.add("hidden");
        document.getElementById("boltOptions").classList.remove("hidden");
    }
    // Hide arrow and bolt options if anything else is selected
    else {
        document.getElementById("arrowOptions").classList.add("hidden");
        document.getElementById("boltOptions").classList.add("hidden");
    }
    calculateFromEquipment();
}

["strengthLevel", "strengthBonus", "meleeFightingStyle", "meleePotion", "meleePrayer", "rangedLevel", "rangedWeaponBonus", "arrowBonus", "boltBonus", "rangedPotion", "spell", "chaosGauntlets"].forEach(id => {
    document.getElementById(id).addEventListener("change", calculateMaxHit);
});

// Update Strength Bonus from equipment selection
["meleeWeaponBonus", "amuletBonus", "glovesBonus", "rangedBonus", "arrowBonus", "boltBonus"].forEach(id => {
    document.getElementById(id).addEventListener("change", calculateFromEquipment);
});

// Event listener to detect changes in the "rangedWeaponBonus" dropdown
document.getElementById("rangedWeaponBonus").addEventListener("change", toggleOptions);