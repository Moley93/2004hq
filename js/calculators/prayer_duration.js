async function fetchPrayerLevel() {
    const username = document.getElementById("username").value.trim();
    if (!username) return alert("Please enter a username.");

    try {
        // Fetch data from the API
        const response = await fetch(`pages/api/LCHiscoresProxy.php?username=${encodeURIComponent(username)}`);
        
        // Check if the request was successful
        if (!response.ok) throw new Error("Failed to fetch data.");

        const data = await response.json(); // Convert response to JSON

        // Find the Prayer Level data (Type 6 corresponds to Prayer)
        const prayerData = data.find(stat => stat.type === 6);

        if (prayerData) {
            const prayerXP = Math.floor(prayerData.level);
            document.getElementById("prayerLevel").value = prayerXP; // Autofill the Level field
        } else {
            alert("Prayer Level not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
}

let selectedPrayers = [];

document.querySelectorAll(".prayer").forEach(img => {
    img.addEventListener("click", function() {
        const prayerName = this.dataset.name;
        const drainValue = parseFloat(this.dataset.drain);
        if (selectedPrayers.some(prayer => prayer.name === prayerName)) {
            // Remove if already selected
            selectedPrayers = selectedPrayers.filter(prayer => prayer.name !== prayerName);
            this.classList.remove("active");
        } else {
            // Add if not selected
            selectedPrayers.push({ name: prayerName, drain: drainValue });
            this.classList.add("active");
        }
        calculatePrayerDuration();
    });
});

function calculatePrayerDuration() {
    const prayerBonus = parseInt(document.getElementById("prayerBonus").value);
    const basePrayerLevel = parseInt(document.getElementById("prayerLevel").value);
    const monasteryBonus = parseInt(document.getElementById("monasteryAltar").value);
    const effectivePrayerLevel = basePrayerLevel + monasteryBonus;
    const totalDrainRate = selectedPrayers.reduce((sum, p) => sum + p.drain, 0);
    
    // If Rapid Heal is selected, calculate HP restored
    const rapidHealSelected = selectedPrayers.some(prayer => prayer.name === "Rapid Heal");
    const rapidDiv = document.getElementById("rapidHealDiv");
    const rapidHealText = document.getElementById("rapidHealText");
    const totalHpRestoredText = document.getElementById("totalHpRestoredText");

    if (rapidHealSelected) {
        // Show container
        rapidDiv.style.display = 'block';
    } else {
        // Hide the message if Rapid Heal is deselected
        rapidDiv.style.display = 'none';
        rapidHealText.textContent = '';
        totalHpRestoredText.textContent = '';
    }

    // Exit early if no prayers are selected
    if (totalDrainRate === 0) {
        document.getElementById("prayerDuration").textContent = "";
        return;
    }

    // Convert drain rate per minute to per second
    const drainRatePerSecond = totalDrainRate / 60;
    
    // Calculate base duration (seconds total)
    let baseDuration = effectivePrayerLevel / drainRatePerSecond;
    
    // Apply prayer bonus effect (each +1 increases duration by 3.333%)
    let modifiedDuration = baseDuration * (1 + (prayerBonus * 0.0333));

    // Convert seconds into minutes and seconds format
    const minutes = Math.floor(modifiedDuration / 60);
    const seconds = Math.round(modifiedDuration % 60);

    document.getElementById("prayerDuration").textContent = minutes > 0 
        ? `${minutes} minute and ${seconds} seconds`
        : `${seconds} seconds`;

    if (rapidHealSelected) {
        // Calculate and display total HP restored
        const hpRestored = (modifiedDuration / 30); // 1 HP for every 30 seconds
        rapidHealText.textContent = `${hpRestored.toFixed(0)}`;
        totalHpRestoredText.textContent = `${(hpRestored * 2).toFixed(0)}`;
    }
}

function calculateFromEquipment() {
    const necklace = parseInt(document.getElementById("necklace").value);
    const weapon = parseInt(document.getElementById("weapon").value);
    const body = parseInt(document.getElementById("body").value);
    const legs = parseInt(document.getElementById("legs").value);

    const totalPrayerBonus = necklace + weapon + body + legs;
    document.getElementById("prayerBonus").value = totalPrayerBonus;
    calculatePrayerDuration();
}

["necklace", "weapon", "body", "legs"].forEach(id => {
    document.getElementById(id).addEventListener("change", calculateFromEquipment);
});