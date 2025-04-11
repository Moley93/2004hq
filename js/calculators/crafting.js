let mode = 'needle_thread';

        async function fetchCraftingXP() {
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

                // Find the Crafting XP data (Type 13 corresponds to Crafting)
                const craftingData = data.find(stat => stat.type === 13);

                if (craftingData) {
                    const craftingXP = Math.floor(craftingData.value / 10); // Convert XP format (stored as XP * 10)
                    document.getElementById("currentXP").value = craftingXP; // Autofill the XP field
                } else {
                    alert("Crafting XP not found."); // Show alert if no data is found
                }
            } catch (error) {
                console.error(error); // Log errors for debugging
                alert("Error fetching data."); // Alert user of an error
            }
        }

        function setMode(selectedMode) {
            mode = selectedMode;
            calculateCrafting();
        }

        function calculateCrafting() {
            const currentXP = parseInt(document.getElementById("currentXP").value);
            const targetLevel = parseInt(document.getElementById("targetLevel").value);
            const targetXP = getXPForLevel(targetLevel);
            
            if (targetXP <= currentXP) {
                alert("Target level must be higher than current XP.");
                return;
            }
            
            const xpNeeded = targetXP - currentXP;
            const craftingXP = {
                "needle_thread": {
                    "Leather Gloves": { xp: 13.8, level: 1 },
                    "Leather Boots": { xp: 16.3, level: 7 },
                    "Leather Cowl": { xp: 18.5, level: 9 },
                    "Leather Vambraces": { xp: 22, level: 11 },
                    "Leather Body": { xp: 25, level: 14 },
                    "Leather Chaps": { xp: 27, level: 18 },
                    "Hard Leather Body": { xp: 35, level: 28 },
                    "Coif": { xp: 37, level: 38 },
                    "Studded Body": { xp: 40, level: 41 },
                    "Studded Chaps": { xp: 42, level: 44 },
                    "Green D'hide Vambraces": { xp: 62, level: 57 },
                    "Green D'hide Chaps": { xp: 124, level: 60 },
                    "Green D'hide Body": { xp: 186, level: 63 },
                    "Blue D'hide Vambraces": { xp: 70, level: 66 },
                    "Blue D'hide Chaps": { xp: 140, level: 68 },
                    "Blue D'hide Body": { xp: 210, level: 71 },
                    "Red D'hide Vambraces": { xp: 78, level: 73 },
                    "Red D'hide Chaps": { xp: 156, level: 75 },
                    "Red D'hide Body": { xp: 234, level: 77 },
                    "Black D'hide Vambraces": { xp: 86, level: 79 },
                    "Black D'hide Chaps": { xp: 172, level: 82 },
                    "Black D'hide Body": { xp: 258, level: 84 }
                },
                "jewellery": {
                    "Opal": { xp: 15, level: 1 },
                    "Gold Ring": { xp: 15, level: 5 },
                    "Gold Necklace": { xp: 20, level: 6 },
                    "Gold Amulet (u)": { xp: 30, level: 8 },
                    "Gold Amulet": { xp: 34, level: 8 },
                    "Jade": { xp: 20, level: 13 },
                    "Red Topaz": { xp: 25, level: 16 },
                    "Unstrung Symbol": { xp: 50, level: 16 },
                    "Unblessed Symbol": { xp: 54, level: 16 },
                    "Sapphire": { xp: 50, level: 20 },
                    "Sapphire Ring": { xp: 40, level: 20 },
                    "Sapphire Necklace": { xp: 55, level: 22 },
                    "Sapphire Amulet (u)": { xp: 65, level: 24 },
                    "Sapphire Amulet": { xp: 69, level: 24 },
                    "Emerald": { xp: 67.5, level: 27 },
                    "Emerald Ring": { xp: 55, level: 27 },
                    "Emerald Necklace": { xp: 60, level: 29 },
                    "Emerald Amulet (u)": { xp: 70, level: 31 },
                    "Emerald Amulet": { xp: 74, level: 31 },
                    "Ruby": { xp: 85, level: 34 },
                    "Ruby Ring": { xp: 70, level: 34 },
                    "Ruby Necklace": { xp: 75, level: 40 },
                    "Diamond": { xp: 107.5, level: 43 },
                    "Diamond Ring": { xp: 85, level: 43 },
                    "Ruby Amulet (u)": { xp: 85, level: 50 },
                    "Ruby Amulet": { xp: 89, level: 50 },
                    "Dragonstone": { xp: 137.5, level: 55 },
                    "Dragonstone Ring": { xp: 100, level: 55 },
                    "Diamond Necklace": { xp: 90, level: 56 },
                    "Diamond Amulet (u)": { xp: 100, level: 70 },
                    "Diamond Amulet": { xp: 104, level: 70 },
                    "Dragonstone Necklace": { xp: 105, level: 72 },
                    "Dragonstone Amulet (u)": { xp: 150, level: 80 },
                    "Dragonstone Amulet": { xp: 154, level: 80 }
                },
                "pottery_glass": {
                    "Unfired Pot": { xp: 6.3, level: 1 },
                    "Pot": { xp: 12.6, level: 1 },
                    "Beer Glass": { xp: 17.5, level: 1 },
                    "Unfired Pie Dish": { xp: 15, level: 7 },
                    "Pie Dish": { xp: 25, level: 7 },
                    "Unfired Bowl": { xp: 18, level: 8 },
                    "Bowl": { xp: 33, level: 8 },
                    "Vial": { xp: 35, level: 33 },
                    "Unpowered Orb": { xp: 52.5, level: 46 }
                },
                "spinning": {
                    "Ball of Wool": { xp: 2.5, level: 1 },
                    "Bow String": { xp: 15, level: 10 }
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
            for (let item in craftingXP[mode]) {
                let xpPerItem = craftingXP[mode][item].xp;
                let levelRequired = craftingXP[mode][item].level;
                let itemsNeeded = Math.ceil(xpNeeded / xpPerItem);
                
                let row = document.createElement("tr");
                row.innerHTML = `
                    <td>${levelRequired}</td>
                    <td><img src="img/calculators/crafting/${item.toLowerCase().replace(/\s+/g, "_")}.png" alt="${item}"> ${item}</td>
                    <td>${xpPerItem}</td>
                    <td>${formatNumber(itemsNeeded)}</td>
                `;
                tableBody.appendChild(row);
            }
        }