function loadImage(src) {
  return new Promise((res, rej) => {
    const img = new Image();
    img.onload  = () => res(img);
    img.onerror = rej;
    img.src     = src;
  });
}

const questReqs = {
  //skill: [freeReq, memsReq],
  attack:       [1, 20],
  hitpoints:    [10, 10],
  mining:       [15, 52],
  strength:     [1, 50],
  agility:      [1, 50],
  smithing:     [1, 50],
  defence:      [1, 1],
  herblore:     [1, 45],
  fishing:      [1, 53],
  ranged:       [1, 40],
  thieving:     [1, 50],
  cooking:      [1, 53],
  prayer:       [1, 42],
  crafting:     [1, 50],
  firemaking:   [1, 30],
  magic:        [1, 59],
  fletching:    [1, 10],
  woodcutting:  [1, 50],
  runecrafting: [1, 1],
};

const positions = {//top number x,y
  attack:       [101,  77],
  hitpoints:    [189,  77],
  mining:       [275,  77],
  strength:     [101, 120],
  agility:      [189, 120],
  smithing:     [275, 120],
  defence:      [101, 162],
  herblore:     [189, 162],
  fishing:      [275, 162],
  ranged:       [101, 205],
  thieving:     [189, 205],
  cooking:      [275, 205],
  prayer:       [101, 248],
  crafting:     [189, 248],
  firemaking:   [275, 248],
  magic:        [101, 290],
  fletching:    [189, 290],
  woodcutting:  [275, 290],
  runecrafting: [101, 333],
};

const bottomPositions = {//bottom number x,y
  attack:       [119,  94],
  hitpoints:    [206,  94],
  mining:       [294,  94],
  strength:     [119, 137],
  agility:      [206, 137],
  smithing:     [294, 137],
  defence:      [119, 179],
  herblore:     [206, 179],
  fishing:      [294, 179],
  ranged:       [119, 222],
  thieving:     [206, 222],
  cooking:      [294, 222],
  prayer:       [119, 265],
  crafting:     [206, 265],
  firemaking:   [294, 265],
  magic:        [119, 307],
  fletching:    [206, 307],
  woodcutting:  [294, 307],
  runecrafting: [118, 350],
};

let fontLoaded = false;
async function initRuneScapeFont() {
  if (fontLoaded) return;
  const rsFont = new FontFace(
    'RuneScape',
    'url(/assets/RuneScape-Plain-11.ttf)'
  );
  await rsFont.load();
  document.fonts.add(rsFont);
  fontLoaded = true;
}

async function drawQuestReqsPanel(canvas) {
  await initRuneScapeFont();
  const img = await loadImage('img/statspanel.png');

  const desiredWidth = parseInt(canvas.dataset.width, 10);
  if (!isNaN(desiredWidth)) {
    canvas.style.width  = desiredWidth + 'px';
    canvas.style.height = 'auto';
  }

  canvas.width  = img.width;
  canvas.height = img.height;

  const ctx = canvas.getContext('2d');
  ctx.drawImage(img, 0, 0);

  ctx.textAlign    = 'center';
  ctx.textBaseline = 'alphabetic';
  ctx.font         = '22px RuneScape';
  ctx.fillStyle    = '#FFFF00';

  const tierIndex = canvas.dataset.questreqs === 'members' ? 1 : 0;

  for (const skill of Object.keys(positions)) {
    const arr = questReqs[skill] || ['', ''];
    const val = arr[tierIndex] ?? '';
    const [x1, y1] = positions[skill];
    const [x2, y2] = bottomPositions[skill];
    ctx.fillText(val.toString(), x1, y1);
    ctx.fillText(val.toString(), x2, y2);
  }
}

window.addEventListener('DOMContentLoaded', () => {
  document
    .querySelectorAll('canvas[data-questreqs]')
    .forEach(c => {
      drawQuestReqsPanel(c).catch(err => console.error('Draw failed', c, err));
    });
});