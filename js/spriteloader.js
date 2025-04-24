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

  document.querySelectorAll("canvas[data-itemname]").forEach(canvas => {
    const debugname = canvas.getAttribute("data-itemname");
    renderSpriteToCanvas(debugname, canvas);
  });

  window.spriteLoaderReady = true;
})
.catch(err => {
  console.error("Error loading resources:", err);
});

function renderSpriteToCanvas(debugname, canvas) {
  let id = 2677;
  let name = "Unknown Item";
  let desc = "No description available.";

  const item = itemData.find(i => i.debugname === debugname);
  if (item) {
    id = item.id;
    name = item.name;
    desc = item.desc;
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

  // ✅ Debug everything about the label
  console.log("Rendering:", name, "→", canvas);
  console.log("data-add-item-name:", canvas.getAttribute("data-add-item-name"));

  if (canvas.getAttribute("data-add-item-name") === "true") {
    const label = document.createElement("div");
    label.className = "item-label";
    label.textContent = name;
    label.style.fontSize = "12px";
    label.style.color = "white";
    label.style.textAlign = "center";
    label.style.marginTop = "4px";

    canvas.parentNode.insertBefore(label, canvas.nextSibling);

    console.log("✅ Label appended:", label);
  } else {
    console.warn("⛔ Skipped label: attribute not found or false");
  }
}

