document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.querySelector('canvas[data-skills="skillTree"]');
  if (!canvas) return;

  const ctx = canvas.getContext("2d");
  const img = new Image();
  img.src = "img/skillGrid.png";

  const skills = [
    "attack", "hitpoints", "mining",
    "strength", "agility", "smithing",
    "defence", "herblore", "fishing",
    "ranged", "thieving", "cooking",
    "prayer", "crafting", "firemaking",
    "magic", "fletching", "woodcutting",
    "runecrafting"
  ];

  const cols = 3;
  const rows = 7;
  const iconWidth = 95;
  const iconHeight = 47.29;

  let hoverIndex = -1;

  img.onload = () => {
    canvas.width = img.width;
    canvas.height = img.height;

    const draw = () => {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(img, 0, 0);

      if (hoverIndex >= 0 && hoverIndex < skills.length) {
        const row = Math.floor(hoverIndex / cols);
        const col = hoverIndex % cols;
        ctx.fillStyle = "rgba(255, 255, 0, 0.4)";
        ctx.fillRect(
          col * iconWidth,
          row * iconHeight,
          iconWidth,
          iconHeight
        );
      }
    };

    draw();

    canvas.addEventListener("mousemove", (e) => {
      const rect = canvas.getBoundingClientRect();
      const scaleX = canvas.width / rect.width;
      const scaleY = canvas.height / rect.height;
      const x = (e.clientX - rect.left) * scaleX;
      const y = (e.clientY - rect.top) * scaleY;

      const col = Math.floor(x / iconWidth);
      const row = Math.floor(y / iconHeight);
      const index = row * cols + col;

      if (col >= 0 && col < cols && row >= 0 && row < rows && index < skills.length) {
        if (hoverIndex !== index) {
          hoverIndex = index;
          draw();
        }
      } else if (hoverIndex !== -1) {
        hoverIndex = -1;
        draw();
      }
    });

    canvas.addEventListener("mouseleave", () => {
      hoverIndex = -1;
      draw();
    });

    canvas.addEventListener("click", () => {
      if (hoverIndex >= 0 && hoverIndex < skills.length) {
        const skill = skills[hoverIndex];
        const url = new URL(window.location.href);
        url.searchParams.set("calc", skill);
        window.location.href = url.toString();
      }
    });
  };
});