window.addEventListener("pageshow", () => {
  const canvas = document.querySelector('canvas[data-skills="skillTree"]');
  if (!canvas) return;

  const style = canvas.dataset.style || "default";

  if (style === "oldschool") {
    renderOldSchoolTable(canvas);
    return;
  }

  // --- Default mode (same as before) ---
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
  const naturalWidth = 285;
  const naturalHeight = 331;
  const iconWidth = naturalWidth / cols;
  const iconHeight = naturalHeight / rows;

  const tooltip = document.createElement("div");
  tooltip.style.position = "absolute";
  tooltip.style.background = "rgba(0, 0, 0, 0.75)";
  tooltip.style.color = "#fff";
  tooltip.style.padding = "4px 8px";
  tooltip.style.borderRadius = "6px";
  tooltip.style.fontSize = "12px";
  tooltip.style.pointerEvents = "none";
  tooltip.style.transition = "opacity 0.2s";
  tooltip.style.opacity = "0";
  document.body.appendChild(tooltip);

  let hoverIndex = -1;
  let animFrame;

  img.onload = () => {
    const targetWidth = parseInt(canvas.dataset.width || naturalWidth);
    const scale = targetWidth / naturalWidth;

    canvas.width = targetWidth;
    canvas.height = naturalHeight * scale;
    canvas.style.width = targetWidth + "px";
    canvas.style.height = (naturalHeight * scale) + "px";

    const draw = () => {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

      if (hoverIndex >= 0 && hoverIndex < skills.length) {
        const row = Math.floor(hoverIndex / cols);
        const col = hoverIndex % cols;
        ctx.fillStyle = "rgba(255, 255, 0, 0.3)";
        ctx.fillRect(
          col * iconWidth * scale,
          row * iconHeight * scale,
          iconWidth * scale,
          iconHeight * scale
        );
      }

      animFrame = requestAnimationFrame(draw);
    };

    draw();

    canvas.addEventListener("mousemove", (e) => {
      const rect = canvas.getBoundingClientRect();
      const scaleX = canvas.width / rect.width;
      const scaleY = canvas.height / rect.height;
      const x = (e.clientX - rect.left) * scaleX;
      const y = (e.clientY - rect.top) * scaleY;

      const col = Math.floor(x / (iconWidth * scale));
      const row = Math.floor(y / (iconHeight * scale));
      const index = row * cols + col;

      if (col >= 0 && col < cols && row >= 0 && row < rows && index < skills.length) {
        hoverIndex = index;
        const skill = skills[index];
        tooltip.textContent = skill.charAt(0).toUpperCase() + skill.slice(1);
        tooltip.style.left = e.pageX + 10 + "px";
        tooltip.style.top = e.pageY + 10 + "px";
        tooltip.style.opacity = "1";
      } else {
        hoverIndex = -1;
        tooltip.style.opacity = "0";
      }
    });

    canvas.addEventListener("mouseleave", () => {
      hoverIndex = -1;
      tooltip.style.opacity = "0";
    });

    canvas.addEventListener("click", () => {
      if (hoverIndex >= 0 && hoverIndex < skills.length) {
        const skill = skills[hoverIndex];
        const url = new URL(window.location.href);
        const page = url.searchParams.get("p");

        if (page === "skillguides") {
          url.searchParams.set("skill", skill);
        } else if (page === "calculators") {
          url.searchParams.set("calc", skill);
        } else {
          url.searchParams.set("skill", skill);
        }

        window.location.href = url.toString();
      }
    });
  };

  window.addEventListener("beforeunload", () => {
    cancelAnimationFrame(animFrame);
  });
});

function renderOldSchoolTable(canvas) {
  const freeSkills = [
    "attack", "strength", "defence", "hitpoints", "ranged", "prayer", "magic",
    "cooking", "firemaking", "woodcutting", "fishing", "mining", "smithing", "crafting"
  ];

  const memberSkills = [
    "agility", "herblore", "thieving", "fletching", "runecrafting"
  ];

  const table = document.createElement("table");
  table.className = "calculators";
  table.style.width = "100%";
  table.style.cellPadding = "1";
  table.style.cellSpacing = "0";

  // Header row
  const header = document.createElement("tr");
  const thFree = document.createElement("th");
  const thMember = document.createElement("th");

  thFree.textContent = "Free-to-play Skills";
  thMember.textContent = "Members Skills";

  header.appendChild(thFree);
  header.appendChild(thMember);
  table.appendChild(header);

  // Skill rows
  const maxLength = Math.max(freeSkills.length, memberSkills.length);
  for (let i = 0; i < maxLength; i++) {
    const row = document.createElement("tr");
    const left = document.createElement("td");
    const right = document.createElement("td");

    if (freeSkills[i]) {
      left.innerHTML = skillWithIcon(freeSkills[i]);
    }

    if (memberSkills[i]) {
      right.innerHTML = skillWithIcon(memberSkills[i]);
    }

    row.appendChild(left);
    row.appendChild(right);
    table.appendChild(row);
  }

  // Replace canvas with the generated table
  canvas.replaceWith(table);
}

function skillWithIcon(skill) {
  const url = new URL(window.location.href);
  const page = url.searchParams.get("p");

  if (page === "skillguides") {
    url.searchParams.set("skill", skill);
  } else if (page === "calculators") {
    url.searchParams.set("calc", skill);
  } else {
    url.searchParams.set("skill", skill);
  }

  const label = skill.charAt(0).toUpperCase() + skill.slice(1);
  const iconSrc = `img/skillicons/${skill}.webp`;

  return `
    <a href="${url.toString()}" style="text-decoration: none; display: flex; align-items: center; gap: 6px;">
      <img src="${iconSrc}" alt="${label}" width="20" height="20">
      ${label}
    </a>
  `;
}
