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
                        <b>How Clue Drops Work</b>
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
                                    <span style="color: #90c040; font-size: 1.1em; font-weight: bold;">1. Choose a Clue Tier</span><br>
                                    <span style="color: #cccccc;">
                                        Select the clue tier (Easy, Medium or Hard) to view its reward table.</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: left;">
                                    <span style="color: #90c040; font-size: 1.1em; font-weight: bold;">2. Search for Rewards</span><br>
                                    <span style="color: #cccccc;">
                                        Search for specific items to see which clue tiers can reward them. Matching items will be highlighted.</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: left;">
                                    <span style="color: #90c040; font-size: 1.1em; font-weight: bold;">3. How Drop Rate is Calculated</span><br>
                                    <span style="color: #cccccc;">
                                        Rates are calculated per casket opened, not per individual reward roll.
                                    </span>
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
    modalContent.style.position = 'absolute';
    modalContent.style.top = '50%';
    modalContent.style.left = '50%';
    modalContent.style.transform = 'translate(-50%, -50%)';  // Center within parent
    

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

// Updated cluetables.js to prevent duplicate event listeners using flags
window.renderSpriteToCanvas = renderSpriteToCanvas;
const clueTiers = ["easy", "medium", "hard"];
let activeDropFiles = [...clueTiers];

const customItems = {};
const dropTablesCache = {};
let listenersInitialized = false; // Prevent double attachment

async function fetchClueTable(difficulty) {
    if (dropTablesCache[difficulty]) return dropTablesCache[difficulty];

    try {
        const response = await fetch(`pages/thesneilert/getcluetables.php?difficulty=${difficulty}`);
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
    const searchInput = document.getElementById("searchInput");

    // Only attach listeners once
    if (!listenersInitialized) {
        dropdown.innerHTML = "";
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

        dropdown.disabled = false;
        searchInput.disabled = false;

        dropdown.addEventListener("change", loadDropTable);
        searchInput.addEventListener("input", loadDropTable);

        listenersInitialized = true;
    }
});