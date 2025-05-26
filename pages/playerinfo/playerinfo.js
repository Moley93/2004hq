async function lookupPlayer() {
    const infoDiv  = document.getElementById("playerInfo");
    const username = document.getElementById("username").value.trim();
    infoDiv.innerHTML = "";

    try {
        const hiscoresData = await lookupHiscores(username);
        if (hiscoresData.length === 0) throw new Error("No hiscores data found for this player.");
        
        const header = document.createElement("h3");
        header.textContent = `Hiscores for ${username}:`;
        infoDiv.appendChild(header);

        const grid = document.createElement("div");
        grid.classList.add("player-grid");

        for (const key in hiscoresData) {
            const stat = hiscoresData[key];
            const name = getStatInfo(stat.type, "name");
            const icon = getStatInfo(stat.type, "icon");

            const lvlNum = stat.level ?? 0;
            const rawXP  = Math.floor(stat.value / 10);
            const rank   = stat.rank?.toLocaleString() ?? "-";

            const card = document.createElement("div");
            card.classList.add("skill-card");

            const imgEl = document.createElement("img");
            imgEl.src = icon;
            imgEl.alt = `${name} icon`;
            card.appendChild(imgEl);

            const titleEl = document.createElement("h4");
            titleEl.textContent = name;
            card.appendChild(titleEl);

            const lvlEl = document.createElement("p");
            lvlEl.textContent = `Level: ${lvlNum.toLocaleString()}`;
            card.appendChild(lvlEl);

            const xpEl = document.createElement("p");
            xpEl.textContent = `XP: ${rawXP.toLocaleString()}`;
            card.appendChild(xpEl);

            const rankEl = document.createElement("p");
            rankEl.textContent = `Rank: ${rank}`;
            card.appendChild(rankEl);

            const bar = document.createElement("div");
            if (name == "Overall") {
                bar.classList.add("empty-progress-bar");
            } else {
                const xpThis  = getXPForLevel(lvlNum);
                const xpNext  = getXPForLevel(lvlNum + 1);
                const intoLv  = rawXP - xpThis;
                const needLv  = xpNext - xpThis;
                const percentToNext = lvlNum >= 99 ? 100
                    : Math.max(0, Math.min(100, Math.floor(intoLv / needLv * 100)));
                bar.classList.add("progress-bar");
                bar.style.background = `linear-gradient(to right, #4caf50 ${percentToNext}%, #333333 ${percentToNext}% )`;
                if (lvlNum < 99) {
                    bar.innerHTML = `${percentToNext}% - ${xpNext.toLocaleString()} XP<br>to level ${lvlNum + 1}`;
                } else {
                    bar.style.background = "rgb(76, 135, 175)";
                    bar.innerHTML = `${percentToNext}% - max level achieved!`;
                }
            }
            card.appendChild(bar);

            grid.appendChild(card);
        }
        infoDiv.appendChild(grid);
    } catch (err) {
        const header = document.createElement("h3");
        header.textContent = `${username} not found or not ranked in hiscores.`;
        infoDiv.appendChild(header);
        console.error(err);
    }
    infoDiv.appendChild(hr());
    try {
        throw new Error("This is a test error to check error handling.");
        const alogData = await lookupAlog(username);
        const header = document.createElement("h3");
        header.textContent = `Adventure Log for ${username}:`;
        infoDiv.appendChild(header);
    } catch (err) {
        const header = document.createElement("h3");
        header.textContent = 'Aventure Log data is coming soon!';
        //header.textContent = `${username} alog data was not found.`;
        infoDiv.appendChild(header);
        console.error(err);
    }
}

async function lookupAlog(username) {
    try {

    } catch (error) {
        console.error(error);
        throw new Error("Error fetching Adventure Log data!");
    }
}

async function lookupHiscores(username) {
    try {
        const response = await fetch(`pages/api/LCHiscoresProxy.php?username=${encodeURIComponent(username)}`);
        if (!response.ok) throw new Error("Player not found or not ranked in hiscores.");
        return await response.json();
    } catch (error) {
        console.error(error);
        throw new Error("Error fetching Hiscores data!");
    }
}

// HELPER FUNCTIONS
function th(text) {
    const el = document.createElement("th");
    el.textContent = text;
    return el;
}
function td(text) {
    const el = document.createElement("td");
    el.textContent = text;
    return el;
}
function hr() {
    const el = document.createElement("hr");
    return el;
}
function getStatInfo(statID, type) {
  const stats = {
    0: ["Overall",     "img/skillicons/stats.webp"],
    1: ["Attack",      "img/skillicons/attack.webp"],
    2: ["Defence",     "img/skillicons/defence.webp"],
    3: ["Strength",    "img/skillicons/strength.webp"],
    4: ["Hitpoints",   "img/skillicons/hitpoints.webp"],
    5: ["Ranged",      "img/skillicons/ranged.webp"],
    6: ["Prayer",      "img/skillicons/prayer.webp"],
    7: ["Magic",       "img/skillicons/magic.webp"],
    8: ["Cooking",     "img/skillicons/cooking.webp"],
    9: ["Woodcutting", "img/skillicons/woodcutting.webp"],
   10: ["Fletching",   "img/skillicons/fletching.webp"],
   11: ["Fishing",     "img/skillicons/fishing.webp"],
   12: ["Firemaking",  "img/skillicons/firemaking.webp"],
   13: ["Crafting",    "img/skillicons/crafting.webp"],
   14: ["Smithing",    "img/skillicons/smithing.webp"],
   15: ["Mining",      "img/skillicons/mining.webp"],
   16: ["Herblore",    "img/skillicons/herblore.webp"],
   17: ["Agility",     "img/skillicons/agility.webp"],
   18: ["Thieving",    "img/skillicons/thieving.webp"],
   21: ["Runecrafting","img/skillicons/runecrafting.webp"],
  };
  const entry = stats[statID];
  if (!entry) return type === "icon" ? "" : "Unknown";
  return type === "icon" ? entry[1] : entry[0];
}

const input = document.getElementById("username");
input.addEventListener("input", () => {
    input.value = input.value.replace(/[^A-Za-z0-9_ ]/g, "");
});