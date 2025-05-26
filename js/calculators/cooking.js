function runCalc() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetXP = parseInt(document.getElementById("targetXP").value);
    const xpNeeded = targetXP - currentXP;

    const foods = [
        { name: "Cooked Meat", xp: 30, level: 1 },
        { name: "Cooked Chicken", xp: 30, level: 1 },
        { name: "Shrimp", xp: 30, level: 1 },
        { name: "Anchovies", xp: 30, level: 1 },
        { name: "Bread", xp: 40, level: 1 },
        { name: "Sardine", xp: 40, level: 1 },
        { name: "cooked_ugthanki_meat", xp: 40, level: 1 },
        { name: "Herring", xp: 50, level: 5 },
        { name: "Mackerel", xp: 60, level: 10 },
        { name: "Redberry Pie", xp: 78, level: 10 },
        { name: "Trout", xp: 70, level: 15 },
        { name: "Cod", xp: 75, level: 18 },
        { name: "Pike", xp: 80, level: 20 },
        { name: "Meat Pie", xp: 110, level: 20 },
        { name: "Salmon", xp: 90, level: 25 },
        { name: "Stew", xp: 117, level: 25 },
        { name: "Cooked Chompy", xp: 100, level: 30 },
        { name: "Tuna", xp: 100, level: 30 },
        { name: "Apple Pie", xp: 130, level: 30 },
        { name: "Plain Pizza", xp: 143, level: 35 },
        { name: "Jug Wine", xp: 200, level: 35 },
        { name: "Lobster", xp: 120, level: 40 },
        { name: "Cake", xp: 180, level: 40 },
        { name: "Bass", xp: 130, level: 43 },
        { name: "Swordfish", xp: 140, level: 45 },
        { name: "Meat Pizza", xp: 169, level: 45 },
        { name: "Chocolate Cake", xp: 210, level: 50 },
        { name: "Lava Eel", xp: 140, level: 53 },
        { name: "Anchovie Pizza", xp: 182, level: 55 },
        { name: "Pitta Bread", xp: 40, level: 58 },
        { name: "Curry", xp: 280, level: 60 },
        { name: "Pineapple Pizza", xp: 195, level: 65 },
        { name: "Shark", xp: 210, level: 80 },
        { name: "SeaTurtle", xp: 211.3, level: 82 },
        { name: "MantaRay", xp: 216.2, level: 91 }
    ];

    updateProgressBar(currentXP, targetXP);

    const tableBody = document.querySelector("#resultsTable tbody");
    tableBody.innerHTML = ""; 

    for (let food of foods) {
        let foodCount = Math.ceil(xpNeeded / food.xp);

        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${food.level}</td>
            <td><canvas data-itemname="${food.name.toLowerCase().replace(/\s+/g, '_')}" data-show-label="inline"></canvas></td>
            <td>${food.xp}</td>
            <td>${foodCount.toLocaleString()}</td>
        `;
        tableBody.appendChild(row);
    }
    window.safeRenderAllSprites();
}