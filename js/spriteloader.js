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

// Load both the JSON and the image before using
Promise.all([
  fetch('js/itemlist.json').then(res => res.json()),
  new Promise(resolve => spritesheet.onload = resolve)
])
  .then(([json]) => {
    itemData = json;

    // Find all canvas elements with a data-itemname attribute
    document.querySelectorAll("canvas[data-itemname]").forEach(canvas => {
      const debugname = canvas.getAttribute("data-itemname");
      renderSpriteToCanvas(debugname, canvas);
    });
  })
  .catch(err => {
    console.error("Error loading resources:", err);
  });

  function renderSpriteToCanvas(debugname, canvas) {
    let id;
    let name = "Unknown Item";
    let desc = "No description available.";
  
    // 🔹 Coins variants
    if (coinVariants.hasOwnProperty(debugname)) {
      id = coinVariants[debugname];
      name = "Coins";
      desc = `A stack of ${debugname === "coins" ? "coins" : debugname.split("_")[1]} gp.`;
    }
  
    // 🔹 Exempt overrides
    else if (exemptItems.hasOwnProperty(debugname)) {
      id = exemptItems[debugname];
      name = debugname;
    }
  
    // 🔹 Certed items
    else if (debugname.startsWith("cert_")) {
      const baseName = debugname.replace(/^cert_/, "");
      const baseItem = itemData.find(i => i.debugname === baseName);
      if (baseItem) {
        id = baseItem.id + 1;
        name = `${baseItem.name} (Noted)`;
        desc = baseItem.desc;
      } else {
        id = 2677;
      }
    }
  
    // 🔹 Standard item from JSON
    else {
      const item = itemData.find(i => i.debugname === debugname);
      if (item) {
        id = item.id;
        name = item.name;
        desc = item.desc;
      } else {
        id = 2677;
      }
    }
  
    // Sprite math
    const col = id % spritesPerRow;
    const row = Math.floor(id / spritesPerRow);
  
    // Output size
    const size = parseInt(canvas.dataset.size) || spriteSize;
  
    // Draw
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
  
    // Set tooltip
    canvas.title = `${name} — ${desc}`;
  }
  window.renderAllSprites = function() {
    document.querySelectorAll("canvas[data-itemname]").forEach(canvas => {
      const debugname = canvas.dataset.itemname;
      renderSpriteToCanvas(debugname, canvas);
    });
  };