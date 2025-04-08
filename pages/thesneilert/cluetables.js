// Updated to use JSON API from get_rewards.php
const difficulties = ['easy', 'medium', 'hard'];

function formatItemName(item) {
  return item
    .replace(/_/g, ' ')
    .replace(/\b\w/g, char => char.toUpperCase());
}

async function fetchRewards(difficulty) {
  const response = await fetch(`pages/main/thesneilert/getcluetables.php?difficulty=${difficulty}`);
  const data = await response.json();
  return data;
}

async function loadDropTable() {
  const dropdown = document.getElementById("clueDropdown");
  const difficulty = dropdown.value;
  const tableBody = document.querySelector("#dropTable tbody");
  tableBody.innerHTML = "";

  if (!difficulty) return;

  const rewards = await fetchRewards(difficulty);

  rewards.forEach(reward => {
    const row = document.createElement("tr");

    const itemCell = document.createElement("td");
    itemCell.textContent = formatItemName(reward.reward_name);

    const quantityCell = document.createElement("td");
    quantityCell.textContent = reward.quantity_min === reward.quantity_max
      ? reward.quantity_min
      : `${reward.quantity_min}-${reward.quantity_max}`;

    const rateCell = document.createElement("td");
    rateCell.textContent = reward.drop_rate;

    row.appendChild(itemCell);
    row.appendChild(quantityCell);
    row.appendChild(rateCell);

    tableBody.appendChild(row);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const dropdown = document.getElementById("clueDropdown");
  const defaultOption = document.createElement("option");
  defaultOption.value = "";
  defaultOption.textContent = "Select...";
  dropdown.appendChild(defaultOption);

  difficulties.forEach(diff => {
    const option = document.createElement("option");
    option.value = diff;
    option.textContent = diff.charAt(0).toUpperCase() + diff.slice(1);
    dropdown.appendChild(option);
  });

  dropdown.addEventListener("change", loadDropTable);
});
