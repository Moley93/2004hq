const spriteSize = 32;
const spritesPerRow = 64;
let itemData = [];

const spritesheet = new Image();
spritesheet.src = 'img/item_spritesheet.png';

const exemptItems = {
  "coins": 1004,
  // Add more overrides here
};

const coinVariants = {
  "coins": 1004,
  "coins_1": 995,
  "coins_2": 996,
  "coins_3": 997,
  "coins_4": 998,
  "coins_5": 999,
  "coins_25": 1000,
  "coins_100": 1001,
  "coins_500": 1002,
  "coins_1000": 1003,
};

Promise.all([
  fetch('js/itemlist.json').then(res => res.json()),
  new Promise(resolve => spritesheet.onload = resolve)
])
.then(([json]) => {
  itemData = json;
  window.spriteLoaderReady = true; // signal ready
})
.catch(err => {
  console.error("Error loading resources:", err);
});

function renderSpriteToCanvas(debugname, canvas) {
  let id;
  let name = "Unknown Item";
  let desc = "No description available.";

  if (coinVariants.hasOwnProperty(debugname)) {
    id = coinVariants[debugname];
    name = "Coins";
    desc = "Lovely money!";
  } else if (exemptItems.hasOwnProperty(debugname)) {
    id = exemptItems[debugname];
    name = debugname;
  } else if (debugname.startsWith("cert_")) {
    const baseName = debugname.replace(/^cert_/, "");
    const baseItem = itemData.find(i => i.debugname === baseName);
    if (baseItem) {
      id = baseItem.id + 1;
      name = `${baseItem.name} (Noted)`;
      desc = baseItem.desc;
    } else {
      id = 2677;
    }
  } else {
    const item = itemData.find(i => i.debugname === debugname);
    if (item) {
      id = item.id;
      name = item.name;
      desc = item.desc;
    } else {
      id = 2677;
    }
  }

  const col = id % spritesPerRow;
  const row = Math.floor(id / spritesPerRow);
  const size = parseInt(canvas.dataset.size) || 36;

  const ctx = canvas.getContext("2d");
  canvas.width = size;
  canvas.height = size;
  ctx.clearRect(0, 0, size, size);
  ctx.drawImage(
    spritesheet,
    col * spriteSize, row * spriteSize,
    spriteSize, spriteSize,
    0, 0,
    size, size
  );

  canvas.title = `${name} — ${desc}`;

  // Append item name if requested
  if ((canvas.getAttribute("data-show-label") === "true") || (canvas.getAttribute("data-show-label") === "inline")) {
    const next = canvas.nextElementSibling;
    const alreadyExists = next && next.classList.contains("item-label");
  
    if (!alreadyExists) {
      const inline = canvas.getAttribute("data-show-label") === "inline";
      const label = document.createElement("div");
      label.textContent = name;
      label.className = "item-label";
      label.style.color = "white";
    
      if (inline) {
        const wrapper = document.createElement("div");
        wrapper.style.display = "flex";
        wrapper.style.alignItems = "center";
        wrapper.style.gap = "6px";
        wrapper.style.flexDirection = "row";
        wrapper.style.justifyContent = "center";
    
        const parent = canvas.parentNode;
        // Insert the wrapper before the canvas
        parent.insertBefore(wrapper, canvas);
        // Then move the canvas and label into the wrapper
        wrapper.appendChild(canvas);
        wrapper.appendChild(label);
      } else {
        label.style.textAlign = "center";
        label.style.marginTop = "4px";
        canvas.parentNode.insertBefore(label, canvas.nextSibling);
      }
    }
  }    
}

window.renderAllSprites = function () {
  document.querySelectorAll("canvas[data-itemname]").forEach(canvas => {
    const debugname = canvas.getAttribute("data-itemname");
    renderSpriteToCanvas(debugname, canvas);
  });
};
document.addEventListener("DOMContentLoaded", async function () {
  while (!window.spriteLoaderReady) {
    await new Promise(resolve => setTimeout(resolve, 25));
  }
  if (typeof window.renderAllSprites === "function") {
    window.renderAllSprites();
  }
});