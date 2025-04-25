let mode = 'npcs';
        
        async function fetchThievingXP() {
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

                // Find the Thieving XP data (Type 18 corresponds to Thieving)
                const thievingData = data.find(stat => stat.type === 18);

                if (thievingData) {
                    const thievingXP = Math.floor(thievingData.value / 10); // Convert XP format (stored as XP * 10)
                    document.getElementById("currentXP").value = thievingXP; // Autofill the XP field
                } else {
                    alert("Thieving XP not found."); // Show alert if no data is found
                }
            } catch (error) {
                console.error(error); // Log errors for debugging
                alert("Error fetching data."); // Alert user of an error
            }
        }
        
        function setMode(newMode) {
            mode = newMode;
            calculateThieving();
        }
        
        function calculateThieving() {
            const currentXP = parseInt(document.getElementById("currentXP").value);
            const targetLevel = parseInt(document.getElementById("targetLevel").value);
            const targetXP = getXPForLevel(targetLevel);

            if (targetXP <= currentXP) {
                alert("Target level must be higher than current XP.");
                return;
            }
            
            const xpNeeded = targetXP - currentXP;
            const npcs = {
                "Man/Woman": { xp: 8, level: 1 },
                "Farmer": { xp: 14.5, level: 10 },
                "Warrior/Al Kharid warrior": { xp: 26, level: 25 },
                "Digsite Workman": { xp: 10.4, level: 10 },
                "Rogue": { xp: 36.5, level: 32 },
                "Guard": { xp: 46.8, level: 40 },
                "Knight of Ardougne": { xp: 84.3, level: 55 },
                "Yanille Watchman": { xp: 137.5, level: 65 },
                "Paladin": { xp: 151.8, level: 70 },
                "Gnome": { xp: 198.3, level: 75 },
                "Hero": { xp: 273.3, level: 80 }
            };
            
            const stalls = {
                "Bakery Stall": { xp: 16, level: 5 },
                "Tea Stall": { xp: 16, level: 5 },
                "Silk Stall": { xp: 24, level: 20 },
                "Fur Stall": { xp: 36, level: 35 },
                "Silver Stall": { xp: 54, level: 50 },
                "Spice Stall": { xp: 81, level: 65 },
                "Gem Stall": { xp: 16, level: 75 }
            };
            
            const chests = {
                "10 Coin Chest": { xp: 7.8, level: 1 },
                "Nature Rune Chest": { xp: 25, level: 28 },
                "50 Coin Chest": { xp: 125, level: 43 },
                "Steel Arrowtips Chest": { xp: 150, level: 47 },
                "Blood Rune Chest": { xp: 250, level: 59 },
                "Ardougne Castle Chest": { xp: 500, level: 72 }
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
            const dataSet = mode === 'chests' ? chests : mode === 'stalls' ? stalls : npcs;
            for (let source in dataSet) {
                let { xp, level } = dataSet[source];
                let count = Math.ceil(xpNeeded / xp);
                let row = document.createElement("tr");
                row.innerHTML = `
                    <td>${level}</td>
                    <td><img src="img/calculators/thieving/${source.toLowerCase().replace(/\s+/g, '_').replace('/', '_')}.png" height=32px alt="${source}"><br>${source}</td>
                    <td>${xp}</td>
                    <td>${formatNumber(count)}</td>
                `;
                tableBody.appendChild(row);
            }
        }