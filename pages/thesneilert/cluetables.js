// Base URL for raw GitHub content 
const baseUrl = "https://raw.githubusercontent.com/2004Scape/Server/main/data/src/scripts/minigames/game_trail/scripts/";

// List of F2P .rs2 files
const clueFiles = [
    "easy/trail_clue_easy_reward.rs2",
    "medium/trail_clue_medium_reward.rs2",
    "hard/trail_clue_hard_reward.rs2"
];

let activeDropFiles = [...clueFiles];

// Define item categories for better organization
const itemCategories = {
    SPECIAL_ITEMS: {
        "coins": { name: "Coins", image: "https://oldschool.runescape.wiki/images/Coins_10000.png?7fa38&20200722174651" },
        "cert_salmon": { name: "Salmon (noted)", image: "https://lostcity.markets/img/items/salmon.webp" },
        "cert_trout": { name: "Trout (noted)", image: "https://lostcity.markets/img/items/trout.webp" },
        "cert_swordfish": { name: "Swordfish (noted)", image: "https://lostcity.markets/img/items/swordfish.webp" },
        "cert_lobster": { name: "Lobster (noted)", image: "https://lostcity.markets/img/items/lobster.webp" },
        "cert_shark": { name: "Salmon (noted)", image: "https://lostcity.markets/img/items/shark.webp" }
    }
};

// Flatten the categories into a single customItems object
this.customItems = Object.values(itemCategories).reduce((acc, category) => {
    return { ...acc, ...category };
}, {});

// Rare Drop Table data with specific icon mappings
const rareDropTable = {
    "~randomherb": [
        { item: "Unidentified Guam Leaf", quantity: 1, rate: "32/128", icon: "unidentified_guam_leaf.webp" },
        { item: "Unidentified Marrentill", quantity: 1, rate: "24/128", icon: "unidentified_marrentill.webp" },
        { item: "Unidentified Tarromin", quantity: 1, rate: "18/128", icon: "unidentified_tarromin.webp" },
        { item: "Unidentified Harralander", quantity: 1, rate: "14/128", icon: "unidentified_harralander.webp" },
        { item: "Unidentified Ranarr Weed", quantity: 1, rate: "11/128", icon: "unidentified_ranarr_weed.webp" },
        { item: "Unidentified Irit Leaf", quantity: 1, rate: "8/128", icon: "unidentified_irit_leaf.webp" },
        { item: "Unidentified Avantoe", quantity: 1, rate: "6/128", icon: "unidentified_avantoe.webp" },
        { item: "Unidentified Kwuarm", quantity: 1, rate: "5/128", icon: "unidentified_kwuarm.webp" },
        { item: "Unidentified Cadantine", quantity: 1, rate: "4/128", icon: "unidentified_cadantine.webp" },
        { item: "Unidentified Lantadyme", quantity: 1, rate: "3/128", icon: "unidentified_lantadyme.webp" },
        { item: "Unidentified Dwarf Weed", quantity: 1, rate: "3/128", icon: "unidentified_dwarf_weed.webp" }
    ],
    "~randomjewel": [
        { item: "Uncut Sapphire", quantity: 1, rate: "32/128", icon: "uncut_sapphire.webp" },
        { item: "Uncut Emerald", quantity: 1, rate: "16/128", icon: "uncut_emerald.webp" },
        { item: "Uncut Ruby", quantity: 1, rate: "8/128", icon: "uncut_ruby.webp" },
        { item: "Uncut Diamond", quantity: 1, rate: "2/128", icon: "uncut_diamond.webp" },
        { item: "Rune Javelin", quantity: 5, rate: "1/128", members: true, icon: "rune_javelin.webp" },
        { item: "Loop Half of Key", quantity: 1, rate: "1/128", members: true, icon: "https://oldschool.runescape.wiki/images/Loop_half_of_key.png?01ae1" },
        { item: "Tooth Half of Key", quantity: 1, rate: "1/128", members: true, icon: "https://oldschool.runescape.wiki/images/Tooth_half_of_key.png?01ae1" },
        { item: "Mega Rare Table", quantity: 1, rate: "1/128", members: true, icon: "https://oldschool.runescape.wiki/images/Mega-rare_drop_table.png?21a00" },
        { item: "Chaos Talisman", quantity: 1, rate: "3/128", members: true, icon: "chaos_talisman.webp" },
        { item: "Nature Talisman", quantity: 1, rate: "3/128", members: true, icon: "nature_talisman.webp" }
    ],
    "~ultrarare_getitem": [
        { item: "Nature Rune", quantity: 67, rate: "3/128", icon: "naturerune.webp" },
        { item: "Adamant Javelin", quantity: 20, rate: "2/128", members: true, icon: "adamant_javelin.webp" },
        { item: "Death Rune", quantity: 45, rate: "2/128", icon: "deathrune.webp" },
        { item: "Law Rune", quantity: 45, rate: "2/128", icon: "lawrune.webp" },
        { item: "Rune Arrow", quantity: 42, rate: "2/128", members: true, icon: "rune_arrow.webp" },
        { item: "Steel Arrow", quantity: 150, rate: "2/128", icon: "steel_arrow.webp" },
        { item: "Rune 2h Sword", quantity: 1, rate: "3/128", icon: "rune_2h_sword.webp" },
        { item: "Rune Battleaxe", quantity: 1, rate: "3/128", icon: "rune_battleaxe.webp" },
        { item: "Rune Square Shield", quantity: 1, rate: "2/128", icon: "rune_sq_shield.webp" },
        { item: "Dragon Med Helm", quantity: 1, rate: "1/128", members: true, icon: "dragon_med_helm.webp" },
        { item: "Rune Kiteshield", quantity: 1, rate: "1/128", icon: "rune_kiteshield.webp" },
        { item: "Coins", quantity: 3000, rate: "20/128", icon: "coins_10000.png" },
        { item: "Loop Half of Key", quantity: 1, rate: "20/128", members: true, icon: "https://oldschool.runescape.wiki/images/Loop_half_of_key.png?01ae1" },
        { item: "Tooth Half of Key", quantity: 1, rate: "20/128", members: true, icon: "https://oldschool.runescape.wiki/images/Tooth_half_of_key.png?01ae1" },
        { item: "Runite Bar", quantity: 1, rate: "5/128", members: true, icon: "runite_bar.webp" },
        { item: "Dragonstone", quantity: 1, rate: "2/128", members: true, icon: "dragonstone.webp" },
        { item: "Silver Ore", quantity: 100, rate: "2/128", icon: "silver_ore.webp" },
        { item: "Random Jewel", quantity: 1, rate: "20/128", icon: "dragonstone.webp" },
        { item: "Mega Rare Table", quantity: 1, rate: "15/128", members: true, icon: "https://oldschool.runescape.wiki/images/Mega-rare_drop_table.png?21a00" }
    ],
};

// Cache for storing parsed drop tables
const dropTablesCache = {};

// Function to show the loader
function showLoader() {
    document.getElementById("loader").classList.remove("hidden");
    document.getElementById("loadingText").classList.remove("hidden");
}

// Function to hide the loader
function hideLoader() {
    document.getElementById("loader").classList.add("hidden");
    document.getElementById("loadingText").classList.add("hidden");
}

// Function to enable the search bar and dropdown
function enableUI() {
    document.getElementById("searchInput").disabled = false;
    document.getElementById("clueDropdown").disabled = false;
}


// Function to fetch and parse a single .rs2 file
async function fetchDropTable(fileName) {
    if (dropTablesCache[fileName]) {
        return dropTablesCache[fileName];
    }

    const url = `${baseUrl}/${fileName}`;
    try {
        const response = await fetch(url);
        const text = await response.text();
        const drops = parseDropTable(text);
        dropTablesCache[fileName] = drops;
        return drops;
    } catch (error) {
        console.error(`Error fetching ${fileName}:`, error);
        return [];
    }
}

function parseDropTable(text) {
    const lines = text.split("\n");

    const normalDrops = [];
    const rareDrops = [];

    let currentBlock = null; // "normal", "rare", or null
    let currentCases = 0;
    let blockBuffer = [];

    lines.forEach(line => {
        line = line.trim();

        // Check for start of a relevant block
        if (line.match(/\[proc,trail_clue_\w+_normal\]/)) {
            flushBlock(); // flush previous
            currentBlock = "normal";
            currentCases = 0;
            blockBuffer = [];
            return; // don't process this line as part of the block
        } else if (line.match(/\[proc,trail_clue_\w+_rare\]/)) {
            flushBlock();
            currentBlock = "rare";
            currentCases = 0;
            blockBuffer = [];
            return;
        }

        // Any other [proc, starts a new block, so we stop if it's not a clue block
        if (line.startsWith("[proc,")) {
            flushBlock();
            currentBlock = null;
            return;
        }

        // Capture the switch case block
        if (currentBlock) {
            blockBuffer.push(line);

            if (line.startsWith("case")) {
                currentCases++;
            }

            // Explicit end of block
            if (line === "end_proc") {
                flushBlock();
                currentBlock = null;
            }
        }
    });

    // Final flush
    flushBlock();

    function flushBlock() {
        if (!currentBlock || blockBuffer.length === 0) return;

        const targetArray = currentBlock === "normal" ? normalDrops : rareDrops;

        blockBuffer.forEach(line => {
            const match = line.match(/inv_add\([^,]+,\s*([^,]+),\s*(calc\([^)]+\)|\d+)\)/);
            if (match) {
                const item = match[1].trim();
                const rawQuantity = match[2].trim();
                const innerExpr = rawQuantity.startsWith("calc(") ? rawQuantity.slice(5, -1) : rawQuantity;
                const quantity = parseQuantity(innerExpr);
                const formattedItem = customItems[item]?.name || item;

                targetArray.push({
                    item: formattedItem,
                    quantity,
                    rate: `1/${currentCases}`
                });
            }
        });
    }

    return [...normalDrops, ...rareDrops];
}

function parseQuantity(expr) {
    const match = expr.match(/(\d+)\s*\+\s*random\((\d+)\)/);
    if (match) {
        const base = parseInt(match[1], 10);
        const rand = parseInt(match[2], 10);
        return `${base}–${base + rand - 1}`;
    } else if (/^\d+$/.test(expr)) {
        return expr;
    } else {
        return expr;
    }
}


function calculateRate(probability) {
    const rate = 128 / probability;
    const roundedRate = Math.round(rate);
    return `1/${roundedRate}`;
}

function formatItemName(item) {
    // Check if this is a custom item first
    if (customItems[item.toLowerCase()]) {
        return customItems[item.toLowerCase()].name;
    }

    let formattedItem = item
        .replace(/_/g, " ")
        .replace(/\b\w/g, char => char.toUpperCase());

    if (formattedItem.toLowerCase().endsWith("rune")) {
        formattedItem = formattedItem.replace(/(\w+)rune/i, "$1 Rune");
    }

    return formattedItem;
}

function formatMonsterName(monster) {
    return monster
        .replace(/_/g, " ")
        .replace(/\b\w/g, char => char.toUpperCase());
}

function formatClueName(filePath) {
    const match = filePath.match(/trail_clue_(\w+)_reward/);
    if (match) {
        const difficulty = match[1];
        return `${capitalize(difficulty)} Clue Rewards`;
    }
    return "Unknown Clue";
}

function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

// Function to convert fraction to 1/x format with rounded denominator
function convertToOneOverX(numerator, denominator) {
    const roundedDenominator = Math.round(denominator/numerator);
    return `1/${roundedDenominator}`;
}

// Function to show rare drop table details
function showRareDropTableDetails(itemKey) {
    const details = rareDropTable[itemKey];
    if (!details) return;

    // Get current sort option
    const sortOption = document.getElementById("sortToggle").value;

    // Combine duplicate items and sum their rates
    const combinedDetails = details.reduce((acc, drop) => {
        const existingItem = acc.find(item => item.item === drop.item);
        if (existingItem) {
            // Parse existing and new rates
            const [existingNum, existingDenom] = existingItem.rate.split('/').map(Number);
            const [newNum, newDenom] = drop.rate.split('/').map(Number);

            // If denominators are the same, just add numerators
            if (existingDenom === newDenom) {
                existingItem.rate = convertToOneOverX(existingNum + newNum, existingDenom);
            } else {
                // Convert to same denominator (128) and add
                const totalRate = (existingNum / existingDenom) + (newNum / newDenom);
                existingItem.rate = convertToOneOverX(Math.round(totalRate * 128), 128);
            }
        } else {
            // Convert the rate for new items to 1/x format
            const [num, denom] = drop.rate.split('/').map(Number);
            acc.push({ 
                ...drop,
                rate: convertToOneOverX(num, denom)
            });
        }
        return acc;
    }, []);

    // Sort the combined details based on the current sort option
    combinedDetails.sort((a, b) => {
        if (sortOption === "name-asc") {
            return a.item.localeCompare(b.item);
        } else if (sortOption === "name-desc") {
            return b.item.localeCompare(a.item);
        } else {
            // Helper function to get the rate as a number for comparison
            const getRateValue = (rate) => {
                if (rate === "1/1" || rate.includes("infinity") || rate.includes("Infinity")) {
                    return 1; // Highest possible rate for guaranteed drops
                }
                if (rate.includes('-')) {
                    // For range rates like "1-3/128", take the higher number
                    const [range, denom] = rate.split('/');
                    const [min, max] = range.split('-').map(Number);
                    return max / Number(denom);
                } else {
                    // For single rates like "1/128"
                    const [num, denom] = rate.split('/').map(Number);
                    return num / denom;
                }
            };

            const rateA = getRateValue(a.rate);
            const rateB = getRateValue(b.rate);
            // Most Common First (asc) shows highest rates first
            // Most Rare First (desc) shows lowest rates first
            return sortOption === "asc" ? rateB - rateA : rateA - rateB;
        }
    });

    const modal = document.createElement("div");
    modal.className = "modal";
    modal.innerHTML = `
        <div class="modal-content">
            <div class="modal-header">
                <table width="500" bgcolor="black" cellpadding="4">
                    <tr>
                        <td class="e">
                            <center>
                                <b>${customItems[itemKey].name} Details</b>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-body">
                <table width="500" bgcolor="black" cellpadding="2">
                    <tr>
                        <td class="e">
                            <table width="100%" cellspacing="4" cellpadding="8" class="rare-drop-table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${combinedDetails.map(drop => {
        const imageUrl = drop.icon.startsWith('http')
            ? drop.icon
            : `https://lostcity.markets/img/items/${drop.icon}`;
        return `
                                            <tr>
                                                <td>
                                                    <img src="${imageUrl}" alt="${drop.item}" width="32" height="32" onerror="this.src='https://oldschool.runescape.wiki/images/Coins_10000.png?7fa38&20200722174651'">
                                                </td>
                                                <td>${drop.item}${drop.members ? ' <span style="color: #FFB83F">(Members)</span>' : ''}</td>
                                                <td>${drop.quantity}</td>
                                                <td>${drop.rate.includes("Infinity") ? drop.rate.replace("Infinity", "~") : drop.rate}</td>
                                            </tr>
                                        `;
    }).join('')}
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <span class="close">&times;</span>
        </div>
    `;

    // Position the modal near the top of the page with some headroom
    const modalContent = modal.querySelector('.modal-content');
    modalContent.style.position = 'fixed';
    modalContent.style.top = '50px';  // Add some headroom from the top
    modalContent.style.left = '50%';
    modalContent.style.transform = 'translateX(-50%)';  // Center horizontally

    document.body.appendChild(modal);

    const closeBtn = modal.querySelector(".close");
    closeBtn.onclick = () => {
        document.body.removeChild(modal);
    };

    window.onclick = (event) => {
        if (event.target === modal) {
            document.body.removeChild(modal);
        }
    };
}


async function loadDropTable() {
    const dropdown = document.getElementById("clueDropdown");
    const selectedFile = dropdown.value;
    const tableBody = document.querySelector("#dropTable tbody");

    tableBody.innerHTML = "";

    if (selectedFile) {
        const drops = await fetchDropTable(selectedFile);
        const aggregatedDrops = [];
        const itemMap = new Map();

        drops.forEach(drop => {
            const lowerCaseItem = drop.item.toLowerCase();
            const quantity = parseInt(drop.quantity, 10) || 1;
            const rate = drop.rate;

            if (lowerCaseItem === "coins") {
                if (!itemMap.has("coins")) {
                    itemMap.set("coins", {
                        item: "Coins",
                        quantities: [],
                        rates: []
                    });
                }
                const coinEntry = itemMap.get("coins");
                coinEntry.quantities.push(quantity);
                coinEntry.rates.push(parseInt(rate.split('/')[1], 10));
            } else if (lowerCaseItem.endsWith("rune")) {
                if (!itemMap.has(lowerCaseItem)) {
                    itemMap.set(lowerCaseItem, {
                        item: drop.item,
                        quantities: [],
                        rates: []
                    });
                    
                }
                const runeEntry = itemMap.get(lowerCaseItem);
                runeEntry.quantities.push(quantity);
                runeEntry.rates.push(parseInt(rate.split('/')[1], 10));
            } else {
                const key = `${lowerCaseItem}-${quantity}-${rate}`;
                if (!itemMap.has(key)) {
                    itemMap.set(key, {
                        item: drop.item,
                        quantity: quantity,
                        rate: rate,
                        count: 1
                    });
                } else {
                    const existingEntry = itemMap.get(key);
                    existingEntry.count += 1;
                }
            }
        });

        if (itemMap.has("coins")) {
            const coinEntry = itemMap.get("coins");
            const minQuantity = Math.min(...coinEntry.quantities);
            const maxQuantity = Math.max(...coinEntry.quantities);
            const minRate = Math.min(...coinEntry.rates);
            const maxRate = Math.max(...coinEntry.rates);

            const rateDisplay = minRate === maxRate ? `1/${minRate}` : `${minRate}-${maxRate}/128`;
            const quantityDisplay = minQuantity === maxQuantity ? `${minQuantity}` : `${minQuantity}-${maxQuantity}`;

            aggregatedDrops.push({
                item: "Coins",
                quantity: quantityDisplay,
                rate: rateDisplay
            });
        }

        itemMap.forEach((value, key) => {
            if (key !== "coins" && value.quantities) {
                const minQuantity = Math.min(...value.quantities);
                const maxQuantity = Math.max(...value.quantities);
                const minRate = Math.min(...value.rates);
                const maxRate = Math.max(...value.rates);

                const rateDisplay = minRate === maxRate ? `1/${minRate}` : `${minRate}-${maxRate}/128`;
                const quantityDisplay = minQuantity === maxQuantity ? `${minQuantity}` : `${minQuantity}-${maxQuantity}`;

                aggregatedDrops.push({
                    item: value.item,
                    quantity: quantityDisplay,
                    rate: rateDisplay
                });
            } else if (key !== "coins") {
                if (value.count > 1) {
                    aggregatedDrops.push({
                        item: value.item,
                        quantity: value.quantity,
                        rate: value.rate
                    });
                } else {
                    aggregatedDrops.push({
                        item: value.item,
                        quantity: value.quantity,
                        rate: value.rate
                    });
                }
            }
        });

        aggregatedDrops.sort((a, b) => {
            const sortOption = "name-asc";
            
            // Sort by name (A-Z)
            if (sortOption === "name-asc") {
                return a.item.localeCompare(b.item);
            }
            
            // Sort by name (Z-A)
            if (sortOption === "name-desc") {
                return b.item.localeCompare(a.item);
            }
            
            // Helper function to get the rate as a number for comparison
            const getRateValue = (rate) => {
                if (rate === "1/1" || rate.includes("infinity") || rate.includes("Infinity")) {
                    return 1; // Highest possible rate for guaranteed drops
                }
                if (rate.includes('-')) {
                    // For range rates like "1-3/128", take the higher number
                    const [range, denom] = rate.split('/');
                    const [min, max] = range.split('-').map(Number);
                    return max / Number(denom);
                } else {
                    // For single rates like "1/128"
                    const [num, denom] = rate.split('/').map(Number);
                    return num / denom;
                }
            };

            const rateA = getRateValue(a.rate);
            const rateB = getRateValue(b.rate);
            // Most Common First (asc) shows highest rates first
            // Most Rare First (desc) shows lowest rates first
            return sortOption === "asc" ? rateB - rateA : rateA - rateB;
        });

        aggregatedDrops.forEach(drop => {
            const row = document.createElement("tr");
            const formattedItemName = formatItemName(drop.item);

            const imageCell = document.createElement("td");

            // Get the image URL based on the item
            let imageUrl;
            const lowerCaseItem = drop.item.toLowerCase();

            // Helper function to get image URL from custom item
            const getImageUrl = (item) => {
                if (!item) return null;
                return item.image.startsWith('http')
                    ? item.image
                    : `https://lostcity.markets/img/items/${item.image}`;
            };

            // Try to find the item in customItems with exact match first
            let customItem = customItems[lowerCaseItem];

            // If no exact match, try to find a partial match, but be more precise
            if (!customItem) {
                for (const [key, value] of Object.entries(customItems)) {
                    const lowerKey = key.toLowerCase();
                    // Only match if the key is a complete word within the item name
                    const keyWords = lowerKey.split('_');
                    const itemWords = lowerCaseItem.split('_');
                    if (keyWords.every(word => itemWords.includes(word))) {
                        customItem = value;
                        break;
                    }
                }
            }

            // If still no match, try to match against the custom item names
            if (!customItem) {
                for (const [key, value] of Object.entries(customItems)) {
                    if (value.name.toLowerCase() === lowerCaseItem) {
                        customItem = value;
                        break;
                    }
                }
            }

            if (customItem) {
                imageUrl = getImageUrl(customItem);
                console.log(`Found custom item: ${drop.item} -> ${imageUrl}`);
            } else {
                // Default case - try to construct from item name
                const imageName = `${lowerCaseItem.replace(/ /g, "_")}.webp`;
                imageUrl = `https://lostcity.markets/img/items/${imageName}`;
                console.log(`No custom item found for: ${drop.item}, using default: ${imageUrl}`);
            }

            const imageElement = document.createElement("img");
            imageElement.src = imageUrl;
            imageElement.alt = formattedItemName;
            imageElement.width = 32;
            imageElement.height = 32;
            imageElement.onerror = function () {
                // Try multiple fallback images in sequence
                const fallbacks = [
                    getImageUrl(customItems.coins),
                    'https://oldschool.runescape.wiki/images/Coins_10000.png?7fa38&20200722174651',
                    'https://lostcity.markets/img/items/coins.webp'
                ];
                let currentFallback = 0;

                const tryNextFallback = () => {
                    if (currentFallback < fallbacks.length) {
                        this.src = fallbacks[currentFallback++];
                    }
                };

                this.onerror = tryNextFallback;
                tryNextFallback();
            };
            imageCell.appendChild(imageElement);

            const itemCell = document.createElement("td");
            itemCell.textContent = formattedItemName;

            // Add click handler for rare drop table items
            if (drop.item.toLowerCase().includes("rare drop table") ||
                drop.item.toLowerCase().includes("mega rare table") ||
                drop.item.toLowerCase().includes("random jewel") ||
                drop.item.toLowerCase().includes("random herb")) {
                itemCell.className = "clickable-item";
                itemCell.onclick = () => {
                    const itemKey = Object.keys(customItems).find(key =>
                        customItems[key].name.toLowerCase() === drop.item.toLowerCase()
                    );
                    if (itemKey) {
                        showRareDropTableDetails(itemKey);
                    }
                };
            }

            const quantityCell = document.createElement("td");
            quantityCell.textContent = drop.quantity;

            const rateCell = document.createElement("td");
            // Add function to simplify fractions
            const simplifyFraction = (numerator, denominator) => {
                if (denominator === "Infinity" || denominator === "infinity") {
                    return "1/1";
                }
                const gcd = (a, b) => b ? gcd(b, a % b) : a;
                const divisor = gcd(numerator, denominator);
                return `${numerator/divisor}/${denominator/divisor}`;
            };

            // Handle rate display with simplification
            if (drop.rate.includes('-')) {
                // For range rates, simplify each part
                const [range, denom] = drop.rate.split('/');
                const [min, max] = range.split('-').map(Number);
                const simplifiedMin = simplifyFraction(min, Number(denom));
                const simplifiedMax = simplifyFraction(max, Number(denom));
                rateCell.textContent = `${simplifiedMin}-${simplifiedMax}`;
            } else if (drop.rate.includes('infinity') || drop.rate.includes('Infinity')) {
                rateCell.textContent = "1/1";
            } else {
                // For single rates
                const [num, denom] = drop.rate.split('/').map(Number);
                rateCell.textContent = simplifyFraction(num, denom);
            }

            row.appendChild(imageCell);
            row.appendChild(itemCell);
            row.appendChild(quantityCell);
            row.appendChild(rateCell);

            tableBody.appendChild(row);
        });

        const searchInput = document.getElementById("searchInput").value.toLowerCase();
        if (searchInput) {
            const rows = tableBody.querySelectorAll("tr");
            rows.forEach(row => {
                const itemName = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                if (itemName.includes(searchInput)) {
                    row.classList.add("highlight");
                }
            });
        }
    }
}

function populateDropdown() {
    const dropdown = document.getElementById("clueDropdown");
    dropdown.innerHTML = "";

    const defaultOption = document.createElement("option");
    defaultOption.value = "";
    defaultOption.textContent = "Select...";
    dropdown.appendChild(defaultOption);

    // Create array of options with their formatted names
    const options = activeDropFiles.map(file => ({
        value: file,
        text: formatClueName(file)
    }));

    // Add the sorted options to the dropdown
    options.forEach(option => {
        const optionElement = document.createElement("option");
        optionElement.value = option.value;
        optionElement.textContent = option.text;
        dropdown.appendChild(optionElement);
    });
}

// Add debounce function
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

async function searchItems() {
const searchInput = document.getElementById("searchInput").value.toLowerCase().trim();
const searchResults = document.getElementById("searchResults");
searchResults.innerHTML = "";

if (searchInput.length < 2) {
searchResults.style.display = "none";
return;
}

try {
const results = [];
const normalizedSearchInput = searchInput.replace(/[\s_]+/g, "").toLowerCase();

// Search through ALL files (both F2P and P2P) regardless of current view
const allFiles = [...f2pDropFiles, ...p2pDropFiles];

// Remove the limit to search through all files
for (const file of allFiles) {
    const drops = await fetchDropTable(file);
    const uniqueMatchingItems = new Set();
    
    drops.forEach(drop => {
        const normalizedItemName = drop.item.replace(/[\s_]+/g, "").toLowerCase();
        if (normalizedItemName.includes(normalizedSearchInput)) {
            uniqueMatchingItems.add(drop.item);
        }
    });

    if (uniqueMatchingItems.size > 0) {
        const isP2P = p2pDropFiles.includes(file);
        results.push({
            monster: formatMonsterName(file.replace(".rs2", "")),
            file: file,
            matchCount: uniqueMatchingItems.size,
            isP2P: isP2P
        });
    }
}

// Sort results by number of matches
results.sort((a, b) => b.matchCount - a.matchCount);

if (results.length > 0) {
    searchResults.style.display = "block";
    results.forEach(result => {
        const resultItem = document.createElement("div");
        resultItem.className = "search-result-item";
        
        // Highlight P2P results differently
        const membershipClass = result.isP2P ? "p2p-result" : "f2p-result";
        resultItem.innerHTML = `
            <div class="monster-name ${membershipClass}">${result.monster}</div>
            <div class="monster-info">${result.matchCount} matches <span class="${membershipClass}">(${result.isP2P ? 'P2P' : 'F2P'})</span></div>
        `;
        
        resultItem.onclick = () => {
            // Update the membership toggle to match the selected monster
            document.getElementById("membershipToggle").value = result.isP2P ? "p2p" : "f2p";
            // Trigger the membership change
            toggleMembership();
            // Select the monster in the dropdown
            document.getElementById("monsterDropdown").value = result.file;
            // Load its drop table
            loadDropTable();
            // Clear the search results
            searchResults.style.display = "none";
        };
        searchResults.appendChild(resultItem);
    });
} else {
    searchResults.style.display = "block";
    const noResults = document.createElement("div");
    noResults.className = "search-result-item";
    noResults.textContent = "No results found.";
    searchResults.appendChild(noResults);
}
} catch (error) {
console.error("Error during search:", error);
searchResults.style.display = "block";
const errorMessage = document.createElement("div");
errorMessage.className = "search-result-item";
errorMessage.textContent = "An error occurred while searching.";
searchResults.appendChild(errorMessage);
}
}

// Add click event handlers for search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById("searchInput");
    const searchResults = document.getElementById("searchResults");

    // Show dropdown when clicking the search input
    searchInput.addEventListener('click', function() {
        if (this.value.length >= 2) {
            searchResults.style.display = "block";
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const isClickInside = searchInput.contains(event.target) || searchResults.contains(event.target);
        if (!isClickInside) {
            searchResults.style.display = "none";
        }
    });

    // Prevent clicks inside the dropdown from closing it
    searchResults.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});

// Debounce the search function
const debouncedSearch = debounce(searchItems, 300);

// Update the search input event listener
document.getElementById("searchInput").oninput = debouncedSearch;

// Add this new function after the toggleMembership function
function toggleSort() {
    const dropdown = document.getElementById("monsterDropdown");
    // Save the sort preference to local storage only if save settings is enabled
    if (document.getElementById("saveSettingsToggle").checked) {
        const sortToggle = document.getElementById("sortToggle");
        localStorage.setItem('sortPreference', sortToggle.value);
    }
    
    if (dropdown.value) {
        loadDropTable();
    }
}

// Add this new function before window.onload
function showHowToUse() {
    const modal = document.createElement("div");
    modal.className = "modal";
    modal.innerHTML = `
        <div class="modal-content">
            <div class="modal-header">
                <table width="500" bgcolor="black" cellpadding="4">
                    <tr>
                        <td class="e">
                            <center>
                                <b>How to Use Drop Tables</b>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-body">
                <table width="500" bgcolor="black" cellpadding="2">
                    <tr>
                        <td class="e">
                            <table width="100%" cellspacing="4" cellpadding="8" class="rare-drop-table">
                                <tbody>
                                    <tr>
                                        <td colspan="3" style="text-align: left;">
                                            <span style="color: #90c040; font-size: 1.1em; font-weight: bold;">1. Select a Monster</span><br>
                                            <span style="color: #cccccc;">Choose a monster from the dropdown menu to view its drop table.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: left;">
                                            <span style="color: #90c040; font-size: 1.1em; font-weight: bold;">2. Search for Items</span><br>
                                            <span style="color: #cccccc;">Click on a monster in the search results to view its drop table. Items matching your search will be highlighted in green.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: left;">
                                            <span style="color: #90c040; font-size: 1.1em; font-weight: bold;">3. Toggle Membership</span><br>
                                            <span style="color: #cccccc;">Switch between Free-to-Play and Members monsters using the dropdown.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: left;">
                                            <span style="color: #90c040; font-size: 1.1em; font-weight: bold;">4. Sort by Rarity</span><br>
                                            <span style="color: #cccccc;">Choose to view drops from most common to most rare, or vice versa.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: left;">
                                            <span style="color: #90c040; font-size: 1.1em; font-weight: bold;">5. Interactive Items</span><br>
                                            <span style="color: #cccccc;">Click on items like <span style="color: #90c040;">Rare Drop Table</span>, <span style="color: #90c040;">Random Jewel</span>, or <span style="color: #90c040;">Random Herb</span> to see their detailed drop tables.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: left;">
                                            <span style="color: #90c040; font-size: 1.1em; font-weight: bold;">6. Understanding Rates</span><br>
                                            <span style="color: #cccccc;">Drop rates are shown as fractions (e.g., <span style="color: #90c040;">"1/128"</span>). Higher numbers mean rarer drops.</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <span class="close">&times;</span>
        </div>
    `;

    // Position the modal near the top of the page with some headroom
    const modalContent = modal.querySelector('.modal-content');
    modalContent.style.position = 'fixed';
    modalContent.style.top = '50px';  // Add some headroom from the top
    modalContent.style.left = '50%';
    modalContent.style.transform = 'translateX(-50%)';  // Center horizontally

    document.body.appendChild(modal);

    const closeBtn = modal.querySelector(".close");
    closeBtn.onclick = () => {
        document.body.removeChild(modal);
    };

    window.onclick = (event) => {
        if (event.target === modal) {
            document.body.removeChild(modal);
        }
    };
}


// Add event listener for the save settings toggle
document.getElementById("saveSettingsToggle").addEventListener("change", function() {
    // Save the toggle state itself
    localStorage.setItem('saveSettingsEnabled', this.checked);
    
    if (!this.checked) {
        // Clear saved preferences when toggle is turned off
        localStorage.removeItem('membershipPreference');
        localStorage.removeItem('sortPreference');
    }
});

window.onload = async () => {
    showLoader();
    const allFiles = [...clueFiles];
    for (const file of allFiles) {
        await fetchDropTable(file);
    }
    populateDropdown();
    enableUI();

    hideLoader();
};