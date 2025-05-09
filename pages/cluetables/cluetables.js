const clueTiers = ["easy", "medium", "hard"];
let activeDropFiles = [...clueTiers];
const customItems = {};
const dropTablesCache = {};
let listenersInitialized = false;

async function fetchClueTable(difficulty) {
    if (dropTablesCache[difficulty]) return dropTablesCache[difficulty];

    try {
        const response = await fetch(`pages/api/getcluetables.php?difficulty=${difficulty}`);
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

async function loadDropTable() {
    const selectedRadio = document.querySelector('input[name="clueTier"]:checked');
    if (!selectedRadio) return;

    const difficulty = selectedRadio.value;
    const tableBody = document.querySelector("#dropTable tbody");
    tableBody.innerHTML = "";

    const rewards = await fetchClueTable(difficulty);
    const searchTerm = document.getElementById("searchInput").value.toLowerCase();

    rewards.forEach(drop => {
        const itemName = drop.reward_name.toLowerCase();
        if (searchTerm && !itemName.includes(searchTerm)) return;

        const row = document.createElement("tr");
        const imageCell = document.createElement("td");
        const wrapper = document.createElement("div");
        wrapper.style.display = "flex";
        wrapper.style.flexDirection = "column";
        wrapper.style.alignItems = "center";
        wrapper.style.justifyContent = "center";

        const canvasElement = document.createElement("canvas");
        canvasElement.setAttribute("data-itemname", itemName);
        canvasElement.setAttribute("data-show-label", "true");
        canvasElement.width = 36;
        canvasElement.height = 36;

        wrapper.appendChild(canvasElement);
        imageCell.appendChild(wrapper);

        const quantityCell = document.createElement("td");
        quantityCell.textContent = drop.quantity_min === drop.quantity_max
            ? drop.quantity_min
            : `${drop.quantity_min}-${drop.quantity_max}`;

        const rateCell = document.createElement("td");
        rateCell.textContent = drop.drop_rate;

        row.appendChild(imageCell);
        row.appendChild(quantityCell);
        row.appendChild(rateCell);
        if (drop.is_rare === 1) { row.style.border = "2px solid rgb(130, 93, 0)";}
        tableBody.appendChild(row);
    });

    document.querySelectorAll("canvas[data-itemname]").forEach(canvas => {
        const debugname = canvas.getAttribute("data-itemname");
        renderSpriteToCanvas(debugname, canvas);
    });
}

async function waitForSpriteLoaderAndLoad() {
    while (!window.spriteLoaderReady) {
        await new Promise(resolve => setTimeout(resolve, 50));
    }
    loadDropTable();
}

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");

    if (!listenersInitialized) {
        searchInput.disabled = false;
        searchInput.addEventListener("input", loadDropTable);

        const radios = document.querySelectorAll('input[name="clueTier"]');
        radios.forEach(radio => {
            radio.addEventListener("change", loadDropTable);
        });

        listenersInitialized = true;

        waitForSpriteLoaderAndLoad();
    }
});
