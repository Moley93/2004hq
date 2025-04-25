async function fetchCookingXP() {
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

        // Find the Cooking XP data (Type 8 corresponds to Cooking)
        const cookingData = data.find(stat => stat.type === 8);

        if (cookingData) {
            const cookingXP = Math.floor(cookingData.value / 10); // Convert XP format (stored as XP * 10)
            document.getElementById("currentXP").value = cookingXP; // Autofill the XP field
        } else {
            alert("Cooking XP not found."); // Show alert if no data is found
        }
    } catch (error) {
        console.error(error); // Log errors for debugging
        alert("Error fetching data."); // Alert user of an error
    }
}

// Calculate how many items need to be cooked
function calculateFood() {
    const currentXP = parseInt(document.getElementById("currentXP").value);
    const targetLevel = parseInt(document.getElementById("targetLevel").value);
    const targetXP = getXPForLevel(targetLevel);

    if (targetXP <= currentXP) {
        alert("Target level must be higher than current XP.");
        return;
    }

    const xpNeeded = targetXP - currentXP;
    const foods = [
        { name: "Cooked Meat", xp: 30, level: 1 },
        { name: "Cooked Chicken", xp: 30, level: 1 },
        { name: "Shrimps", xp: 30, level: 1 },
        { name: "Anchovies", xp: 30, level: 1 },
        { name: "Bread", xp: 40, level: 1 },
        { name: "Sardine", xp: 40, level: 1 },
        { name: "Ugthanki meat", xp: 40, level: 1 },
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
        { name: "Lava Eel", xp: 30, level: 53 },
        { name: "Anchovy Pizza", xp: 182, level: 55 },
        { name: "Pitta Bread", xp: 40, level: 58 },
        { name: "Curry", xp: 280, level: 60 },
        { name: "Pineapple Pizza", xp: 195, level: 65 },
        { name: "Shark", xp: 210, level: 80 },
        { name: "Sea Turtle", xp: 211.3, level: 82 },
        { name: "Manta Ray", xp: 216.2, level: 91 }
    ];

    // Update progress bar
    const progressPercentage = ((currentXP / targetXP) * 100).toFixed(1);
    const progressBar = document.getElementById("progressBar");
    progressBar.style.width = `${progressPercentage}%`;
    progressBar.textContent = `${progressPercentage}%`;
    const tableBody = document.querySelector("#resultsTable tbody");

    // Clear previous results
    tableBody.innerHTML = ""; 

    // Generate table
    for (let food of foods) {
        let foodCount = Math.ceil(xpNeeded / food.xp);

        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${food.level}</td>
            <td><canvas data-itemname="${food.name.toLowerCase().replace(/\s+/g, '_')}" data-add-item-name="true"></canvas></td>
            <td>${food.xp}</td>
            <td>${formatNumber(foodCount)}</td>
        `;
        tableBody.appendChild(row);
    }
    renderAllSprites();
}