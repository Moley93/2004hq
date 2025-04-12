<?php
function getPageTitle() { return 'Combat Level'; }
function getPageMetaIcon() { return 'img/skillicons/attack.webp'; }
function getExtraHeaderContent() { return '<script type="text/javascript" src="js/calculators/combat_level.js"></script><script src="js/calculators.js"></script>'; }
function getCalcContent() { return <<<HTML
<h2>2004Scape Combat Level Calculator</h2>
<div class="container">
    <label>Username:</label>
    <input type="text" id="username">
    <button onclick="fetchCombatLevels()">Fetch Levels</button><br>
    <label>Attack:</label>
    <input type="number" id="attack" min="1" max="99" value="1"><br>
    <label>Strength:</label>
    <input type="number" id="strength" min="1" max="99" value="1"><br>
    <label>Defence:</label>
    <input type="number" id="defence" min="1" max="99" value="1"><br>
    <label>Hitpoints:</label>
    <input type="number" id="hitpoints" min="10" max="99" value="10"><br>
    <label>Ranged:</label>
    <input type="number" id="ranged" min="1" max="99" value="1"><br>
    <label>Magic:</label>
    <input type="number" id="magic" min="1" max="99" value="1"><br>
    <label>Prayer:</label>
    <input type="number" id="prayer" min="1" max="99" value="1"><br>
    <button onclick="calculateCombatLevel()">Calculate</button>
    <h2>Combat Level: <span id="combatLevel" class="gold-text">3</span></h2>
    <div id="levelUpInfo" class="gold-text"></div>
</div>
HTML; }