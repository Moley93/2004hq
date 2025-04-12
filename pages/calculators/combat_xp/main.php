<?php
function getPageTitle() { return 'Combat XP'; }
function getPageMetaIcon() { return 'img/skillicons/attack.webp'; }
function getExtraHeaderContent() { return '<script type="text/javascript" src="js/calculators/combat_xp.js"></script><script src="js/calculators.js"></script>'; }
function getCalcContent() { return <<<HTML
<h2>2004Scape Combat XP Calculator</h2>
<div class="container">
    <label>Username:</label>
    <input type="text" id="username">
    <button onclick="fetchXP()">Fetch XP</button><br><br>
    
    <div style="position: relative; display: inline-block;">
        <label>NPC Search:</label>
        <input type="text" id="itemSearch" placeholder="Search NPC...">
        <div id="searchResults"></div>
    </div><br>
    <label>Hitpoints of Monster:</label>
    <input type="number" id="monsterHP" min="1" value="1"><br>
    <label>Number of Monsters:</label>
    <input type="number" id="numMonsters" min="1" value="1"><br><br>
    
    <label>Current Attack XP:</label>
    <input type="number" id="attackXP" min="0" value="0"><br>
    <label>Current Strength XP:</label>
    <input type="number" id="strengthXP" min="0" value="0"><br>
    <label>Current Defence XP:</label>
    <input type="number" id="defenceXP" min="0" value="0"><br>
    <label>Current Hitpoints XP:</label>
    <input type="number" id="hitpointsXP" min="1154" value="1154"><br>
    <label>Current Ranged XP:</label>
    <input type="number" id="rangedXP" min="0" value="0"><br>
    <label>Current Prayer XP:</label>
    <input type="number" id="prayerXP" min="0" value="0"><br><br>
    
    <label>Attack Style:</label>
    <select id="attackStyle">
        <option value="accurate">Accurate</option>
        <option value="aggressive">Aggressive</option>
        <option value="defensive">Defensive</option>
        <option value="controlled">Controlled</option>
        <option value="rapid">Accurate/Rapid</option>
        <option value="longrange">Longrange</option>
    </select><br>

    <label>Bury Every Bone?</label>
    <select id="buryBones">
        <option value="no">No</option>
        <option value="yes">Yes</option>
    </select><br><br>
    
    <button onclick="calculateXP()">Calculate</button>
    <h2>Updated XP:</h2>
    <p id="newXP" class="gold-text"></p>
</div>
HTML; }