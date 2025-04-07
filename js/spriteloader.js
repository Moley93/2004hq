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
  
    // 🔹 Special case for coins variants
    if (coinVariants.hasOwnProperty(debugname)) {
      id = coinVariants[debugname];
    }
    // 🔹 Exempt overrides
    else if (exemptItems.hasOwnProperty(debugname)) {
      id = exemptItems[debugname];
    }
    // 🔹 cert_ logic
    else if (debugname.startsWith("cert_")) {
      const baseName = debugname.replace(/^cert_/, "");
      const baseItem = itemData.find(i => i.debugname === baseName);
      id = baseItem ? baseItem.id + 1 : 2677;
    }
    // 🔹 Default JSON lookup
    else {
      const item = itemData.find(i => i.debugname === debugname);
      id = item ? item.id : 2677; // fallback to missing sprite
    }
  
    const col = id % spritesPerRow;
    const row = Math.floor(id / spritesPerRow);
    const ctx = canvas.getContext("2d");
  
    canvas.width = spriteSize;
    canvas.height = spriteSize;
    ctx.clearRect(0, 0, spriteSize, spriteSize);
    ctx.drawImage(
      spritesheet,
      col * spriteSize, row * spriteSize,
      spriteSize, spriteSize,
      0, 0,
      spriteSize, spriteSize
    );
  }
  window.renderAllSprites = function() {
    document.querySelectorAll("canvas[data-itemname]").forEach(canvas => {
      const debugname = canvas.dataset.itemname;
      renderSpriteToCanvas(debugname, canvas);
    });
  };