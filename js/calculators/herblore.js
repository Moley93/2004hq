let mode = 'complete_potions';

        async function fetchHerbloreXP() {
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

                // Find the Herblore XP data (Type 16 corresponds to Herblore)
                const herbloreData = data.find(stat => stat.type === 16);

                if (herbloreData) {
                    const herbloreXP = Math.floor(herbloreData.value / 10); // Convert XP format (stored as XP * 10)
                    document.getElementById("currentXP").value = herbloreXP; // Autofill the XP field
                } else {
                    alert("Herblore XP not found."); // Show alert if no data is found
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

        function setMode(selectedMode) {
            mode = selectedMode;
            calculateHerblore();
        }

        function calculateHerblore() {
            const currentXP = parseInt(document.getElementById("currentXP").value);
            const targetLevel = parseInt(document.getElementById("targetLevel").value);
            const targetXP = getXPForLevel(targetLevel);
            
            if (targetXP <= currentXP) {
                alert("Target level must be higher than current XP.");
                return;
            }
            
            const xpNeeded = targetXP - currentXP;
            const herbloreData = {
                "complete_potions": {
                    "Attack Potion": [3, 27.5], "Antipoison": [5, 41.3], "Strength Potion": [12, 55],
                    "Restore Potion": [22, 68.8], "Defence Potion": [30, 82.5], "Prayer Potion": [38, 95],
                    "Super Attack": [45, 108.8], "Superantipoison": [48, 115.1], "Fishing Potion": [50, 122.5],
                    "Super Strength": [55, 136.3], "Weapon Poison": [60, 148.8], "Super Defence": [66, 162.5], 
                    "Antifire Potion": [69, 170.6], "Ranging Potion": [72, 176.3], "Zamorak Brew": [78, 190]
                },
                "cleaning_herbs": {
                    "Guam Leaf": [3, 2.5], "Marrentill": [5, 3.8], "Tarromin": [11, 5], "Harralander": [20, 6.3],
                    "Ranarr Weed": [25, 7.5], "Irit Leaf": [40, 8.8], "Avantoe": [48, 10], "Kwuarm": [54, 11.3],
                    "Cadantine": [65, 12.5], "Lantadyme": [67, 13.1], "Dwarf Weed": [70, 13.8], "Torstol": [75, 15]
                },
                "unfinished_potions": {
                    "Attack Potion": [3, 25], "Antipoison": [5, 37.5], "Strength Potion": [12, 50],
                    "Restore Potion": [22, 62.5], "Defence Potion": [30, 75], "Prayer Potion": [38, 87.5],
                    "Super Attack": [45, 100], "Superantipoison": [48, 106.3], "Fishing Potion": [50, 112.5],
                    "Super Strength": [55, 125], "Weapon Poison": [60, 137.5], "Super Defence": [66, 150], 
                    "Antifire Potion": [69, 157.5], "Ranging Potion": [72, 162.5], "Zamorak Brew": [78, 175]
                }
            };

            // Update progress bar
            const progressPercentage = ((currentXP / targetXP) * 100).toFixed(1);
            const progressBar = document.getElementById("progressBar");
            progressBar.style.width = `${progressPercentage}%`;
            progressBar.textContent = `${progressPercentage}%`;
            const tableBody = document.querySelector("#resultsTable tbody");

            // Clear previous results
            tableBody.innerHTML = "";
            
            // Generate table based on option selected
            for (let item in herbloreData[mode]) {
                let [level, xpGained] = herbloreData[mode][item];
                let itemsNeeded = Math.ceil(xpNeeded / xpGained);
                let row = document.createElement("tr");
                row.innerHTML = `
                    <td>${level}</td>
                    <td><img src="${item.toLowerCase().replace(/\s+/g, "_")}.png" alt="${item}"> ${item}</td>
                    <td>${xpGained}</td>
                    <td>${formatNumber(itemsNeeded)}</td>
                `;
                tableBody.appendChild(row);
            }
        }