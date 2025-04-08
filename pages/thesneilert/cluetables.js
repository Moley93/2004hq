// Updated to fetch clue data from get_rewards.php JSON endpoint instead of .rs2 files
window.renderSpriteToCanvas = renderSpriteToCanvas;
const clueFiles = ["easy", "medium", "hard"];
let activeDropFiles = [...clueFiles];

const customItems = {};
const dropTablesCache = {};

async function fetchClueTable(difficulty) {
    if (dropTablesCache[difficulty]) return dropTablesCache[difficulty];

    try {
        const response = await fetch(`get_rewards.php?difficulty=${difficulty}`);
        const data = await response.json();
        dropTablesCache[difficulty] = data;
        return data;
    } catch (error) {
        console.error(`Error fetching ${difficulty} clue data:`, error);
        return [];
    }
}

function formatItemName(item) {
    return item.replace(/_/g, " ").replace(/\b\w/g, c => c.toUpperCase());
}

function getItemImage(itemName) {
    const lower = itemName.toLowerCase();
    return `https://lostcity.markets/img/items/${lower.replace(/ /g, "_")}.webp`;
}

async function loadDropTable() {
    const dropdown = document.getElementById("clueDropdown");
    const difficulty = dropdown.value;
    const tableBody = document.querySelector("#dropTable tbody");

    tableBody.innerHTML = "";
    if (!difficulty) return;

    const rewards = await fetchClueTable(difficulty);
    const searchTerm = document.getElementById("searchInput").value.toLowerCase();

    rewards.forEach(drop => {
        const itemName = drop.reward_name.toLowerCase();
        if (searchTerm && !itemName.includes(searchTerm)) return;

        const row = document.createElement("tr");

        const imageCell = document.createElement("td");
        const canvasElement = document.createElement("canvas");
        canvasElement.setAttribute("data-itemname", drop.reward_name.toLowerCase());
        canvasElement.width = 32;
        canvasElement.height = 32;
        imageCell.appendChild(canvasElement);

        const itemCell = document.createElement("td");
        itemCell.textContent = formatItemName(drop.reward_name);

        const quantityCell = document.createElement("td");
        quantityCell.textContent = drop.quantity_min === drop.quantity_max
            ? drop.quantity_min
            : `${drop.quantity_min}-${drop.quantity_max}`;

        const rateCell = document.createElement("td");
        rateCell.textContent = drop.drop_rate;

        row.appendChild(imageCell);
        row.appendChild(itemCell);
        row.appendChild(quantityCell);
        row.appendChild(rateCell);

        tableBody.appendChild(row);
    });

    window.renderAllSprites();
}

document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById("clueDropdown");
    dropdown.innerHTML = ""; // Clear any pre-existing options
    const dropdown = document.getElementById("clueDropdown");
    const defaultOption = document.createElement("option");
    defaultOption.value = "";
    defaultOption.textContent = "Select...";
    dropdown.appendChild(defaultOption);

    activeDropFiles.forEach(diff => {
        const option = document.createElement("option");
        option.value = diff;
        option.textContent = `${diff.charAt(0).toUpperCase()}${diff.slice(1)}`;
        dropdown.appendChild(option);
    });

        // Enable the dropdown after populating
    dropdown.disabled = false;

    dropdown.addEventListener("change", loadDropTable);

    const searchInput = document.getElementById("searchInput");
    if (searchInput) {
        searchInput.addEventListener("input", () => {
            loadDropTable();
        });
    }
});
