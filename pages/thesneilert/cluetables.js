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
        "cert_shark": { name: "Shark (noted)", image: "https://lostcity.markets/img/items/shark.webp" }
    }
};

// Flatten the categories into a single customItems object
const customItems = Object.values(itemCategories).reduce((acc, category) => {
    return { ...acc, ...category };
}, {});

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
async function fetchClueTable(fileName) {
    if (dropTablesCache[fileName]) {
        return dropTablesCache[fileName];
    }

    const url = `${baseUrl}${fileName}`;
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

async function loadDropTable() {
    const dropdown = document.getElementById("clueDropdown");
    const selectedFile = dropdown.value;
    const tableBody = document.querySelector("#dropTable tbody");

    tableBody.innerHTML = "";

    if (selectedFile) {
        const drops = await fetchClueTable(selectedFile);
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
            return a.item.localeCompare(b.item);
        });

        aggregatedDrops.forEach(drop => {
            const row = document.createElement("tr");
            const formattedItemName = formatItemName(drop.item);

            const imageCell = document.createElement("td");

            // Get the image URL based on the item
            let imageUrl;
            const lowerCaseItem = drop.item.toLowerCase();

            // Try to find the item in customItems with exact match first
            let customItem = customItems[lowerCaseItem];

            // If no exact match, try to find a partial match
            if (!customItem) {
                for (const [key, value] of Object.entries(customItems)) {
                    const lowerKey = key.toLowerCase();
                    if (lowerCaseItem.includes(lowerKey)) {
                        customItem = value;
                        break;
                    }
                }
            }

            if (customItem) {
                imageUrl = customItem.image.startsWith('http') 
                    ? customItem.image 
                    : `https://lostcity.markets/img/items/${customItem.image}`;
            } else {
                // Default case - try to construct from item name
                const imageName = `${lowerCaseItem.replace(/ /g, "_")}.webp`;
                imageUrl = `https://lostcity.markets/img/items/${imageName}`;
            }

            const imageElement = document.createElement("img");
            imageElement.src = imageUrl;
            imageElement.alt = formattedItemName;
            imageElement.width = 32;
            imageElement.height = 32;
            imageElement.onerror = function () {
                this.src = 'https://oldschool.runescape.wiki/images/Coins_10000.png';
            };
            imageCell.appendChild(imageElement);

            const itemCell = document.createElement("td");
            itemCell.textContent = formattedItemName;

            const quantityCell = document.createElement("td");
            quantityCell.textContent = drop.quantity;

            const rateCell = document.createElement("td");
            rateCell.textContent = drop.rate;

            row.appendChild(imageCell);
            row.appendChild(itemCell);
            row.appendChild(quantityCell);
            row.appendChild(rateCell);

            tableBody.appendChild(row);
        });

        // Highlight search results if there's an active search
        const searchInput = document.getElementById("searchInput").value.toLowerCase();
        if (searchInput) {
            const rows = tableBody.querySelectorAll("tr");
            rows.forEach(row => {
                const itemName = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                row.classList.toggle("highlight", itemName.includes(searchInput));
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

    activeDropFiles.forEach(file => {
        const option = document.createElement("option");
        option.value = file;
        option.textContent = formatClueName(file);
        dropdown.appendChild(option);
    });
}

// Improved search functionality
async function searchItems() {
    const searchInput = document.getElementById("searchInput").value.toLowerCase();
    const searchResults = document.getElementById("searchResults");
    searchResults.innerHTML = "";

    if (searchInput.length === 0) {
        searchResults.style.display = "none";
        return;
    }

    const results = [];

    // Search through all clue files
    for (const file of activeDropFiles) {
        const drops = await fetchClueTable(file);
        const matchingDrops = drops.filter(drop => {
            const searchableName = drop.item.toLowerCase()
                .replace(/\([^)]*\)/g, '') // Remove parentheses content
                .replace(/[^a-z0-9\s]/g, '') // Remove special characters
                .trim();
            
            const searchTerms = searchInput.split(/\s+/);
            return searchTerms.every(term => 
                searchableName.includes(term) ||
                term.includes(searchableName)
            );
        });

        if (matchingDrops.length > 0) {
            results.push(...matchingDrops.map(item => ({
                ...item,
                file: file
            })));
        }
    }

    // Display results
    if (results.length > 0) {
        searchResults.style.display = "block";
        
        // Sort items alphabetically
        results.sort((a, b) => a.item.localeCompare(b.item));

        // Display each matching item
        results.forEach(item => {
            const resultItem = document.createElement("div");
            resultItem.className = "search-result-item";
            
            // Create container for image + text
            const contentContainer = document.createElement("div");
            contentContainer.className = "search-result-content";
            
            // Create image element
            const imgElement = document.createElement("img");
            imgElement.className = "search-item-img";
            imgElement.src = getItemImage(item.item);
            imgElement.alt = item.item;
            imgElement.width = 24;
            imgElement.height = 24;
            imgElement.onerror = function() {
                this.src = 'https://oldschool.runescape.wiki/images/Coins_10000.png';
            };
            
            // Create item name display
            const nameElement = document.createElement("div");
            nameElement.className = "search-item-name";
            nameElement.textContent = formatItemName(item.item);
            
            // Append elements to container
            contentContainer.appendChild(imgElement);
            contentContainer.appendChild(nameElement);
            
            // Append container to result item
            resultItem.appendChild(contentContainer);
            
            resultItem.onclick = () => {
                document.getElementById("clueDropdown").value = item.file;
                loadDropTable();
                searchResults.style.display = "none";
                
                // Highlight the matching rows in the table
                setTimeout(() => {
                    const tableBody = document.querySelector("#dropTable tbody");
                    if (tableBody) {
                        const rows = tableBody.querySelectorAll("tr");
                        rows.forEach(row => {
                            const rowItem = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                            row.classList.toggle("highlight", rowItem.includes(searchInput));
                            if (rowItem.includes(searchInput)) {
                                row.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            }
                        });
                    }
                }, 100);
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
}

function getItemImage(itemName) {
    const lowerCaseItem = itemName.toLowerCase();
    let customItem = customItems[lowerCaseItem];
    
    if (!customItem) {
        // Try to find partial match in custom items
        for (const [key, value] of Object.entries(customItems)) {
            if (lowerCaseItem.includes(key.toLowerCase())) {
                customItem = value;
                break;
            }
        }
    }
    
    if (customItem) {
        return customItem.image.startsWith('http') 
            ? customItem.image 
            : `https://lostcity.markets/img/items/${customItem.image}`;
    }
    
    // Default image URL
    return `https://lostcity.markets/img/items/${lowerCaseItem.replace(/ /g, "_")}.webp`;
}

// Helper function to highlight matching text in search results
function highlightMatches(text, search) {
    const searchTerms = search.toLowerCase().split(/\s+/);
    let result = text;
    
    searchTerms.forEach(term => {
        if (term.length > 2) { // Only highlight terms with 3+ characters
            const regex = new RegExp(`(${term})`, 'gi');
            result = result.replace(regex, '<span class="search-highlight">$1</span>');
        }
    });
    
    return result;
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

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById("searchInput");
    const searchResults = document.getElementById("searchResults");

    // Show dropdown when clicking the search bar
    searchInput.addEventListener('click', function() {
        if (this.value.length > 0) {
            searchResults.style.display = "block";
            debouncedSearch();
        }
    });

    // Show dropdown when typing
    searchInput.addEventListener('input', function() {
        if (this.value.length >= 2) {
            searchResults.style.display = "block";
        } else {
            searchResults.style.display = "none";
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.style.display = "none";
        }
    });

    // Keep dropdown open when clicking inside
    searchResults.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // Initialize dropdown change handler
    document.getElementById("clueDropdown").addEventListener('change', loadDropTable);
});

// Initialize the debounced search
const debouncedSearch = debounce(searchItems, 300);
document.getElementById("searchInput").addEventListener('input', debouncedSearch);

// Initialize the page
window.onload = async () => {
    showLoader();
    const allFiles = [...clueFiles];
    for (const file of allFiles) {
        await fetchClueTable(file);
    }
    populateDropdown();
    enableUI();
    hideLoader();
};