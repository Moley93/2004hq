let statsBg;

async function loadAssets() {
  const loadImages = [
    'img/statspanel.png',
  ];

  const imagePromises = loadImages.map(src => {
    return new Promise((resolve, reject) => {
      const img = new Image();
      img.onload = () => resolve(img);
      img.onerror = reject;
      img.src = src;
    });
  });

  [
    statsBg,
  ] = await Promise.all(imagePromises);
}

function computeCombat(att, str, def, hp, rng, mag, pray) {
    let base = (def + hp + Math.floor(pray / 2)) * 0.25;
    let melee = (att + str) * 0.325;
    let range = Math.floor(rng * 1.5) * 0.325;
    let mage = Math.floor(mag * 1.5) * 0.325;
    return Math.floor(base + Math.max(melee, range, mage));
}

const questReqs = {
  //skill:    [freeReq, memsReq],
  'attack':       [1, 20],
  'hitpoints':    [10, 10],
  'mining':       [15, 52],
  'strength':     [1, 50],
  'agility':      [1, 50],
  'smithing':     [1, 50],
  'defence':      [1, 1],
  'herblore':     [1, 45],
  'fishing':      [1, 53],
  'ranged':       [1, 40],
  'thieving':     [1, 50],
  'cooking':      [1, 53],
  'prayer':       [1, 42],
  'crafting':     [1, 50],
  'firemaking':   [1, 30],
  'magic':        [1, 59],
  'fletching':    [1, 10],
  'woodcutting':  [1, 50],
  'runecrafting': [1, 1],
};

const skillList = {
  //X,Y positions in the grid (for stats it's only top number)
  'overall':      [183, 301],
  'attack':       [77,  64],
  'defence':      [77,  126],
  'strength':     [77,  96],
  'hitpoints':    [140, 64],
  'ranged':       [77,  158],
  'prayer':       [77,  188],
  'magic':        [77,  219],
  'cooking':      [203, 158],
  'woodcutting':  [203, 219],
  'fletching':    [140, 219],
  'fishing':      [204, 126],
  'firemaking':   [203, 188],
  'crafting':     [140, 188],
  'smithing':     [204, 96],
  'mining':       [204, 64],
  'herblore':     [140, 126],
  'agility':      [140, 96],
  'thieving':     [140, 158],
  'runecrafting': [77,  251],
  'quest_points': [78,  294],
  'combat':       [196, 286],
};


async function drawStatsPanel(canvas) {
  // Wait for statsBg to be loaded
  if (!statsBg) {
    console.error('statsBg not loaded yet');
    return;
  }

  // Set canvas to full size of the stats panel
  canvas.width = statsBg.width;
  canvas.height = statsBg.height;
  canvas.style.width = statsBg.width + 'px';
  canvas.style.height = statsBg.height + 'px';
  
  const ctx = canvas.getContext('2d');
  ctx.imageSmoothingEnabled = false;

  // Draw the background image at full scale
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(statsBg, 0, 0, statsBg.width, statsBg.height);

  const tierIndex = canvas.dataset.questreqs === 'members' ? 1 : 0;

  const combatLevel = computeCombat(
    questReqs['attack'][tierIndex],
    questReqs['strength'][tierIndex],
    questReqs['defence'][tierIndex],
    questReqs['hitpoints'][tierIndex],
    questReqs['ranged'][tierIndex],
    questReqs['magic'][tierIndex],
    questReqs['prayer'][tierIndex]
  );

  // Loop through questReqs and draw skill requirements at original coordinates
  for (const [skillName, requirements] of Object.entries(questReqs)) {
    const skillLevel = requirements[tierIndex];
    
    // Get the position from skillList (these are original coordinates)
    if (skillList[skillName]) {
      const [x, y] = skillList[skillName];
      
      // Draw the skill level at the specified position
      if (isNaN(skillLevel) || skillLevel == 0) {
        drawP11(ctx, skillLevel.toString(), x, y - 10, '#FFFF00');
      } else {
        drawP11(ctx, skillLevel.toString(), x + 13, y + 3, '#FFFF00', true);
        drawP11(ctx, skillLevel.toString(), x, y - 10, '#FFFF00', true);
      }
    }
  }

  // Draw combat level
  if (skillList['combat']) {
    const [combatX, combatY] = skillList['combat'];
    drawP11(ctx, combatLevel.toString(), combatX, combatY, '#FFFF00');
  }

  // Draw quest points
  if (skillList['quest_points']) {
    const [qpX, qpY] = skillList['quest_points'];
    drawP11(ctx, '0', qpX + 13, qpY + 3, '#FFFF00', true);
  }
}

(async () => {
  await Promise.all([loadFonts(), loadAssets()]);
  document
    .querySelectorAll('canvas[data-questreqs]')
    .forEach(c => {
      drawStatsPanel(c).catch(err => console.error('Draw failed', c, err));
    });
})();