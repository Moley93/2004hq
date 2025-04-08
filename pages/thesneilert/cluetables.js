const tableBody = document.querySelector('#rewardsTable tbody');
const difficultySelect = document.getElementById('difficulty');

function loadRewards(difficulty) {
  fetch(`get_rewards.php?difficulty=${difficulty}`)
    .then(res => res.json())
    .then(data => {
      tableBody.innerHTML = '';
      data.forEach(row => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${row.reward_name}</td>
          <td>${row.quantity_min}</td>
          <td>${row.quantity_max}</td>
          <td>${row.drop_rate}</td>
        `;
        tableBody.appendChild(tr);
      });
    });
}

difficultySelect.addEventListener('change', () => {
  loadRewards(difficultySelect.value);
});

loadRewards('easy');