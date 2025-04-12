<?php
function getPageTitle() { return 'Prayer Duration'; }
function getPageMetaIcon() { return 'img/skillicons/prayer.webp'; }
function getExtraHeaderContent() { return '<script type="text/javascript" src="js/calculators/prayer_duration.js"></script><script src="js/calculators.js"></script>'; }
function getCalcContent() { return <<<HTML
<h2>2004Scape Prayer Duration Calculator</h2>
<div class="container">
    <label>Username:</label>
    <input type="text" id="username">
    <button onclick="fetchPrayerLevel()">Fetch Level</button><br>
    <label>Prayer Level:</label>
    <input type="number" id="prayerLevel" min="1" max="99" value="1">

    <label>Prayer Bonus:</label>
    <input type="number" id="prayerBonus" min="0" max="24" value="0">
    
    <button onclick="calculatePrayerDuration()">Calculate</button>
    <br><br>

    <div id="monasteryBonus">
        <label for="monasteryAltar">Monastery Altar:</label>
        <select id="monasteryAltar" onchange="calculatePrayerDuration()">
            <option value="0">No</option>
            <option value="2">Yes (+2 to prayer)</option>
        </select>
    </div>

    <p class="gold-text">Click on the prayers you want to activate:</p>
    <div class="prayer-grid">
        <img src="img/calculators/prayer_duration/thick_skin.png" class="prayer" data-drain="5" data-name="Thick Skin" title="Thick Skin: +5% Defense">
        <img src="img/calculators/prayer_duration/burst_of_strength.png" class="prayer" data-drain="5" data-name="Burst of Strength" title="Burst of Strength: +5% Strength">
        <img src="img/calculators/prayer_duration/clarity_of_thought.png" class="prayer" data-drain="5" data-name="Clarity of Thought" title="Clarity of Thought: +5% Attack">
        <img src="img/calculators/prayer_duration/rock_skin.png" class="prayer" data-drain="10" data-name="Rock Skin" title="Rock Skin: +10% Defense">
        <img src="img/calculators/prayer_duration/superhuman_strength.png" class="prayer" data-drain="10" data-name="Superhuman Strength" title="Superhuman Strength: +10% Strength">
        <img src="img/calculators/prayer_duration/improved_reflexes.png" class="prayer" data-drain="10" data-name="Improved Reflexes" title="Improved Reflexes: +10% Attack">
        <img src="img/calculators/prayer_duration/rapid_restore.png" class="prayer" data-drain="1.6667" data-name="Rapid Restore" title="Rapid Restore: Halves restore time for stats">
        <img src="img/calculators/prayer_duration/rapid_heal.png" class="prayer" data-drain="3.3333" data-name="Rapid Heal" title="Rapid Heal: Halves HP drain rate">
        <img src="img/calculators/prayer_duration/protect_item.png" class="prayer" data-drain="3" data-name="Protect Item" title="Protect Item: Keep 1 extra item on death">
        <img src="img/calculators/prayer_duration/steel_skin.png" class="prayer" data-drain="20" data-name="Steel Skin" title="Steel Skin: +15% Defense">
        <img src="img/calculators/prayer_duration/ultimate_strength.png" class="prayer" data-drain="20" data-name="Ultimate Strength" title="Ultimate Strength: +15% Strength">
        <img src="img/calculators/prayer_duration/incredible_reflexes.png" class="prayer" data-drain="20" data-name="Incredible Reflexes" title="Incredible Reflexes: +15% Attack">
        <img src="img/calculators/prayer_duration/protect_from_magic.png" class="prayer" data-drain="20" data-name="Protect from Magic" title="Protect from Magic: 100% protection from magic attacks">
        <img src="img/calculators/prayer_duration/protect_from_missiles.png" class="prayer" data-drain="20" data-name="Protect from Missiles" title="Protect from Missiles: 100% protection from ranged attacks">
        <img src="img/calculators/prayer_duration/protect_from_melee.png" class="prayer" data-drain="20" data-name="Protect from Melee" title="Protect from Melee: 100% protection from melee attacks">
    </div>

    <p class="gold-text">Equipment</p>
    <label>Necklace:</label>
    <select id="necklace">
        <option value="0">None</option>
        <option value="1">Amulet of Power (+1)</option>
        <option value="3">Amulet of Glory (+3)</option>
        <option value="8">Holy Symbol (+8)</option>
        <option value="8">Unholy Symbol (+8)</option>
    </select><br>
    <label>Weapon:</label>
    <select id="weapon">
        <option value="0">None</option>
        <option value="1">Bronze Mace (+1)</option>
        <option value="1">Iron Mace (+1)</option>
        <option value="2">Steel Mace (+2)</option>
        <option value="2">Black Mace (+2)</option>
        <option value="3">Mithril Mace (+3)</option>
        <option value="3">Adamant Mace (+3)</option>
        <option value="4">Rune Mace (+4)</option>
        <option value="5">Dragon Mace (+5)</option>
    </select><br>
    <label>Body:</label>
    <select id="body">
        <option value="0">None</option>
        <option value="3">Priest Gown (+3)</option>
        <option value="3">Zamorak Monk Top (+3)</option>
        <option value="4">Druid's Robe Top (+4)</option>
        <option value="5">Shade Robe Top (+5)</option>
        <option value="6">Monk's Robe Top (+6)</option>
    </select><br>
    <label>Legs:</label>
    <select id="legs">
        <option value="0">None</option>
        <option value="3">Priest Gown (+3)</option>
        <option value="3">Zamorak Monk Bottom (+3)</option>
        <option value="4">Druid's Robe (+4)</option>
        <option value="4">Shade Robe (+4)</option>
        <option value="5">Monk's Robe Bottom (+5)</option>
    </select><br>
    <h2>Your prayer will last: <br><span id="prayerDuration" class="gold-text"></span></h2>
    <!-- Special message for Rapid Heal -->
    <div id="rapidHealDiv" style="display: none">
        <p>Rapid Heal HP restored: <span id="rapidHealText" class="gold-text"></span></p>
        <p>Total HP restored: <span id="totalHpRestoredText" class="gold-text"></span></p>
    </div>
</div>
HTML; }