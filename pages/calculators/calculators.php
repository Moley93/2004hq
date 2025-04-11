<?php

class CalculatorType {
    private ?string $calcName = null; // Allow $calcName to be nullable

    private const VALID_CALCULATORS = [
        'agility',
        'cooking',
        'crafting',
        'firemaking',
        'fishing',
        'fletching',
        'herblore',
        'mining',
        'prayer',
        'runecrafting',
        'smithing',
        'thieving',
        'woodcutting',
        'combat_xp',
        'combat_level',
        'high_alch',
        'max_hit',
        'prayer_duration',
        'run_energy',
        'splashing'
    ];

    public function getCSS(): ?string { return $this->calcName ? $this->calcName . '.css' : null; }

    public function getJS(): ?string { return $this->calcName ? $this->calcName . '.js' : null; }

    public function getName(): ?string { return $this->calcName; }

    public function __construct() {
        $calc = htmlspecialchars($_GET['calc'] ?? '');
        if (in_array($calc, self::VALID_CALCULATORS, true)) {
            $this->calcName = $calc;
        }
    }
}

function getExtraHeaderContent(): string {
    $calculatorType = new CalculatorType();
    $content = '';

    $content .= '<link rel="stylesheet" href="css/calculators.css" />';

    if ($js = $calculatorType->getJS()) {
        $content .= '<script src="js/calculators/' . $js . '"></script>';
    }

    return $content;
}

function getPageContent(): string {
    global $meta_data;
    $meta_data['title'] = 'Calculators';
    $meta_data['og:title'] = $meta_data['title'];
    $meta_data['og:url'] = '?p=calculators';
    $meta_data['og:image'] = 'img/clueicon.png';
    $calculatorType = new CalculatorType();
    $calcName = $calculatorType->getName();
    
    if ($calcName === null) {
        return generateCalculatorLinks();
    }

    if ($calcName === 'agility') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Agility Calculator</title>
        </head>
        <body onload="calculateLaps()">
            <h1>2004Scape Agility Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchAgilityXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateLaps()">Calculate</button>
                
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>

                <table id="courseTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Course</th>
                            <th>XP per Lap</th>
                            <th>Laps Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

                <table id="shortcutTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Shortcut</th>
                            <th>XP per Action</th>
                            <th>Actions Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/agility.js"></script>
        </body>
        </html>
        HTML;
    }
    
    if ($calcName === 'combat_level') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Combat Level Calculator</title>
        </head>
        <body>
            <h1>2004Scape Combat Level Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
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
            <script src="js/calculators.js"></script>
            <script src="js/calculators/combat_level.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'combat_xp') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Combat XP Calculator</title>
        </head>
        <body>
            <h1>2004Scape Combat XP Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
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
            <script src="js/calculators.js"></script>
            <script src="js/calculators/combat_xp.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'cooking') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Cooking Calculator</title>
        </head>
        <body onload="calculateFood()">
            <h1>2004Scape Cooking Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchCookingXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateFood()">Calculate</button>
                
                <br>

                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>

                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Food</th>
                            <th>XP per Cook</th>
                            <th>Food Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/cooking.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'crafting') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Crafting Calculator</title>
        </head>
        <body onload="calculateCrafting()">
            <h1>2004Scape Crafting Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchCraftingXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateCrafting()">Calculate</button>
                
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>
        
                <div>
                    <button onclick="setMode('needle_thread')">Needle & Thread</button>
                    <button onclick="setMode('jewellery')">Jewellery</button>
                    <button onclick="setMode('pottery_glass')">Pottery/Glass</button>
                    <button onclick="setMode('spinning')">Spinning</button>
                </div>
                
                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Item</th>
                            <th>Exp per Item</th>
                            <th>Total Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/crafting.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'firemaking') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Firemaking Calculator</title>
        </head>
        <body onload="calculateLogs()">
            <h1>2004Scape Firemaking Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchFiremakingXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateLogs()">Calculate</button>
                
                <br>

                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>

                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Log Type</th>
                            <th>XP per Log</th>
                            <th>Logs Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/firemaking.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'fishing') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Fishing Calculator</title>
        </head>
        <body onload="calculateFish()">
            <h1>2004Scape Fishing Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchFishingXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateFish()">Calculate</button>

                <br>

                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>
                        
                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Fish</th>
                            <th>XP per Catch</th>
                            <th>Estimated Catches</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/fishing.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'fletching') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Fletching Calculator</title>
        </head>
        <body onload="calculateFletching()">
            <h1>2004Scape Fletching Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchFletchingXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateFletching()">Calculate</button><br>
        
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>
        
                <button onclick="setMode('complete')">Fletching & Stringing</button>
                <button onclick="setMode('unstrung')">Unstrung</button>
                <button onclick="setMode('stringing')">Stringing</button>
                <button onclick="setMode('arrows')">Arrows/Bolts</button>
        
                <div id="arrowSelection" style="display: none"><br>
                    <label for="arrowType">Complete/Incomplete:</label>
                    <select id="arrowType" onchange="calculateFletching()">
                        <option value="completeArrows">Complete</option>
                        <option value="incompleteArrows">Incomplete</option>
                    </select>
                </div>
        
                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Item</th>
                            <th>XP per Action</th>
                            <th>Amount Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/fletching.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'herblore') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Herblore Calculator</title>
        </head>
        <body onload="calculateHerblore()">
            <h1>2004Scape Herblore Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchHerbloreXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateHerblore()">Calculate</button>
                
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>

                <div>
                    <button onclick="setMode('complete_potions')">Complete Potions</button>
                    <button onclick="setMode('cleaning_herbs')">Cleaning Herbs</button>
                    <button onclick="setMode('unfinished_potions')">Unfinished Potions</button>
                </div>
                
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Item</th>
                            <th>XP Gained</th>
                            <th>Total Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/herblore.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'high_alch') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape High Alchemy Calculator</title>
        </head>
        <body>
            <h1>2004Scape High Alchemy Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <div style="position: relative; display: inline-block;">
                    <label>Item Search:</label>
                    <input type="text" id="itemSearch" placeholder="Search item...">
                    <div id="searchResults"></div>
                </div><br><br>
                <label>Quantity:</label>
                <input type="number" id="quantity" min="1" max="2147483647" value="1"><br>

                <label title="Enter the value of an item">Item Value:</label>
                <input type="number" id="itemValue" min="0" max="2147483647" value="0"><br>

                <label title="Enter the high alchemy value of an item">High Alch Value:</label>
                <input type="number" id="haValue" min="0" max="2147483647" value="0"><br>

                <label title="If you're using your own runes, enter 0">Nature Rune Price:</label>
                <input type="number" id="natureRunePrice" min="0" max="2147483647" value="0"><br>
                
                <button onclick="calculateAlchProfit()">Calculate</button>
                
                <h2>Total Profit: <span id="totalProfit" class="gold-text"></span></h2>
                <p>Profit from Alch: <span id="profitFromAlch" class="green-text"></span></p>
                <p>Cost of Nature Runes: <span id="costOfNatures" class="red-text"></span></p>
                <h2>Total Magic XP: <span id="totalMagicXP" class="gold-text"></span></h2>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/high_alch.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'max_hit') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Max Hit Calculator</title>
        </head>
        <body onload="setTimeout(() => { switchCombat('melee'); calculateMaxHit(); }, 10)">
            <h1>2004Scape Max Hit Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div>
                <button onclick="switchCombat('melee'); calculateMaxHit()">Melee</button>
                <button onclick="switchCombat('ranged'); calculateMaxHit()">Ranged</button>
                <button onclick="switchCombat('magic'); calculateMaxHit()">Magic</button>
            </div>
            <div class="container">
                <div id="meleeOptions">
                    <p>Melee Max Hit</p>
                    <label>Strength Level:</label>
                    <input type="number" id="strengthLevel" min="1" max="99" value="1">
                    <label>Strength Bonus:</label>
                    <input type="number" id="strengthBonus" min="0" max="99" value="0"><br>

                    <label>Fighting Style:</label>
                    <select id="meleeFightingStyle">
                        <option value="0">Accurate / Defensive (+0)</option>
                        <option value="1">Controlled (+1)</option>
                        <option value="3">Aggressive (+3)</option>
                    </select><br>

                    <label>Potion:</label>
                    <select id="meleePotion">
                        <option value="0,0">None</option>
                        <option value="3,0.10">Strength (3 + 10%)</option>
                        <option value="5,0.15">Super Strength (5 + 15%)</option>
                    </select><br>

                    <label>Prayer:</label>
                    <select id="meleePrayer">
                        <option value="1">None</option>
                        <option value="1.05">Burst of Strength (5%)</option>
                        <option value="1.1">Superhuman Strength (10%)</option>
                        <option value="1.15">Ultimate Strength (15%)</option>
                    </select><br>
                    
                    <p>Equipment</p>
                    <label>Weapon:</label>
                    <select id="meleeWeaponBonus">
                        <option value="0">None</option>
                        
                        <!-- Bronze -->
                        <option value="3">Bronze Dagger (+3)</option>
                        <option value="5">Bronze Mace (+5)</option>
                        <option value="5">Bronze Sword (+5)</option>
                        <option value="6">Bronze Scimitar (+6)</option>
                        <option value="7">Bronze Longsword (+7)</option>
                        <option value="8">Bronze Warhammer (+8)</option>
                        <option value="9">Bronze Battleaxe (+9)</option>
                        <option value="10">Bronze 2h Sword (+10)</option>

                        <!-- Iron -->
                        <option value="4">Iron Dagger (+4)</option>
                        <option value="7">Iron Mace (+7)</option>
                        <option value="7">Iron Sword (+7)</option>
                        <option value="9">Iron Scimitar (+9)</option>
                        <option value="10">Iron Longsword (+10)</option>
                        <option value="11">Iron Warhammer (+11)</option>
                        <option value="13">Iron Battleaxe (+13)</option>
                        <option value="14">Iron 2h Sword (+14)</option>

                        <!-- Steel -->
                        <option value="7">Steel Dagger (+7)</option>
                        <option value="11">Steel Mace (+11)</option>
                        <option value="12">Steel Sword (+12)</option>
                        <option value="14">Steel Scimitar (+14)</option>
                        <option value="16">Steel Longsword (+16)</option>
                        <option value="16">Steel Warhammer (+16)</option>
                        <option value="20">Steel Battleaxe (+20)</option>
                        <option value="22">Steel 2h Sword (+22)</option>

                        <!-- Black -->
                        <option value="7">Black Dagger (+7)</option>
                        <option value="12">Black Sword (+12)</option>
                        <option value="13">Black Mace (+13)</option>
                        <option value="14">Black Scimitar (+14)</option>
                        <option value="16">Black Longsword (+16)</option>
                        <option value="22">Black Warhammer (+22)</option>
                        <option value="24">Black Battleaxe (+24)</option>
                        <option value="26">Black 2h Sword (+26)</option>

                        <!-- Mithril -->
                        <option value="10">Mithril Dagger (+10)</option>
                        <option value="16">Mithril Mace (+16)</option>
                        <option value="17">Mithril Sword (+17)</option>
                        <option value="20">Mithril Scimitar (+20)</option>
                        <option value="22">Mithril Longsword (+22)</option>
                        <option value="27">Mithril Warhammer (+27)</option>
                        <option value="29">Mithril Battleaxe (+29)</option>
                        <option value="31">Mithril 2h Sword (+31)</option>

                        <!-- Adamant -->
                        <option value="14">Adamant Dagger (+14)</option>
                        <option value="23">Adamant Mace (+23)</option>
                        <option value="24">Adamant Sword (+24)</option>
                        <option value="28">Adamant Scimitar (+28)</option>
                        <option value="31">Adamant Longsword (+31)</option>
                        <option value="39">Adamant Warhammer (+39)</option>
                        <option value="41">Adamant Battleaxe (+41)</option>
                        <option value="44">Adamant 2h Sword (+44)</option>

                        <!-- Rune -->
                        <option value="24">Rune Dagger (+24)</option>
                        <option value="36">Rune Mace (+36)</option>
                        <option value="39">Rune Sword (+39)</option>
                        <option value="44">Rune Scimitar (+44)</option>
                        <option value="49">Rune Longsword (+49)</option>
                        <option value="62">Rune Warhammer (+62)</option>
                        <option value="64">Rune Battleaxe (+64)</option>
                        <option value="70">Rune 2h Sword (+70)</option>

                        <!-- Dragon -->
                        <option value="40">Dragon Dagger (+40)</option>
                        <option value="55">Dragon Mace (+55)</option>
                        <option value="60">Dragon Spear (+60)</option>
                        <option value="71">Dragon Longsword (+71)</option>
                        <option value="85">Dragon Battleaxe (+85)</option>

                        <!-- Misc -->
                        <option value="10">Blurite Sword (+10)</option>
                        <option value="10">Silverlight (+12)</option>
                        <option value="25">Excalibur (+25)</option>
                        <option value="-10">Flowers (-10)</option>
                    </select><br>

                    <label>Amulet:</label>
                    <select id="amuletBonus">
                        <option value="0">None</option>
                        <option value="6">Amulet of Power (+6)</option>
                        <option value="6">Amulet of Glory (+6)</option>
                        <option value="10">Amulet of Strength (+10)</option>
                    </select><br>
                    
                    <label>Gloves:</label>
                    <select id="glovesBonus">
                        <option value="0">None</option>
                        <option value="2">Cooking Gauntlets (+2)</option>
                        <option value="2">Goldsmith Gauntlets (+2)</option>
                        <option value="2">Klank's Gauntlets (+2)</option>
                        <option value="2">Steel Gauntlets (+2)</option>
                    </select><br>
                    <button onclick="calculateMaxHit()">Calculate</button>
                </div>
                <div id="rangedOptions" class="hidden">
                    <p>Ranged Max Hit</p>
                    <label>Ranged Level:</label>
                    <input type="number" id="rangedLevel" min="1" max="99" value="1">
                    <label>Ranged Strength Bonus:</label>
                    <input type="number" id="rangedBonus" min="0" max="99" value="0"><br>
                    <label>Fighting Style:</label>
                    <select id="rangedFightingStyle">
                        <option value="3">Accurate (+3)</option>
                        <option value="1">Rapid/Longrange (+0)</option>
                    </select><br>
                    <label>Potion:</label>
                    <select id="rangedPotion">
                        <option value="0,0">None</option>
                        <option value="4,0.10">Ranged Potion (4 + 10%)</option>
                    </select><br>
                    <p>Equipment</p>
                    <label>Weapon:</label>
                    <select id="rangedWeaponBonus">
                        <option value="0" id="bowAndArrow">Bow & Arrow</option>
                        <option value="0" id="crossbowAndBolt">Crossbow & Bolt</option>
                        <option value="3">Bronze Knife</option>
                        <option value="4">Iron Knife</option>
                        <option value="7">Steel Knife</option>
                        <option value="8">Black Knife</option>
                        <option value="10">Mithril Knife</option>
                        <option value="14">Adamant Knife</option>
                        <option value="24">Rune Knife</option>
                        <option value="1">Bronze Dart</option>
                        <option value="2">Iron Dart</option>
                        <option value="3">Steel Dart</option>
                        <option value="9">Mithril Dart</option>
                        <option value="17">Adamant Dart</option>
                        <option value="26">Rune Dart</option>
                        <option value="5">Bronze Thrownaxe</option>
                        <option value="7">Iron Thrownaxe</option>
                        <option value="11">Steel Thrownaxe</option>
                        <option value="16">Mithril Thrownaxe</option>
                        <option value="23">Adamant Thrownaxe</option>
                        <option value="26">Rune Thrownaxe</option>
                        <option value="6">Bronze Javelin</option>
                        <option value="10">Iron Javelin</option>
                        <option value="12">Steel Javelin</option>
                        <option value="18">Mithril Javelin</option>
                        <option value="28">Adamant Javelin</option>
                        <option value="42">Rune Javelin</option>
                    </select><br>

                    <div id="arrowOptions">
                        <label>Arrows:</label>
                        <select id="arrowBonus">
                            <option value="7">Bronze Arrows</option>
                            <option value="10">Iron Arrows</option>
                            <option value="16">Steel Arrows</option>
                            <option value="22">Ogre Arrows</option>
                            <option value="22">Mithril Arrows</option>
                            <option value="31">Adamant Arrows</option>
                            <option value="49">Rune Arrows</option>
                        </select><br>
                    </div>

                    <div id="boltOptions" class="hidden">
                        <label>Bolts:</label>
                        <select id="boltBonus">
                            <option value="10">Bolt</option>
                            <option value="19">Pearl Bolt</option>
                            <option value="28">Opal Bolt</option>
                            <option value="46">Barbed Bolt</option>
                        </select><br>
                    </div>
                    <button onclick="calculateMaxHit()">Calculate</button><br>
                </div>
                <div id="magicOptions" class="hidden">
                    <p>Magic Max Hit</p>
                    <label>Spell:</label>
                    <select id="spell">
                        <option value="2">Wind Strike</option>
                        <option value="4">Water Strike</option>
                        <option value="6">Earth Strike</option>
                        <option value="8">Fire Strike</option>
                        <option value="9">Wind Bolt</option>
                        <option value="10">Water Bolt</option>
                        <option value="11">Earth Bolt</option>
                        <option value="12">Fire Bolt</option>
                        <option value="8">Crumble Undead</option>
                        <option value="13">Wind Blast</option>
                        <option value="14">Water Blast</option>
                        <option value="25">Iban Blast</option>
                        <option value="15">Earth Blast</option>
                        <option value="16">Fire Blast</option>
                        <option value="20">God Spells</option>
                        <option value="17">Wind Wave</option>
                        <option value="18">Water Wave</option>
                        <option value="19">Earth Wave</option>
                        <option value="20">Fire Wave</option>
                    </select><br>
                    <label>Chaos Gauntlets:</label>
                    <select id="chaosGauntlets">
                        <option value="0">No</option>
                        <option value="3">Yes (+3 to Bolt Spells)</option>
                    </select><br>
                    <button onclick="calculateMaxHit()">Calculate</button><br>
                </div>
                <h2>Your Max Hit: <span id="maxHit" class="gold-text"></span></h2>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/max_hit.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'mining') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Mining Calculator</title>
        </head>
        <body onload="calculateOres()">
            <h1>2004Scape Mining Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchMiningXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="60">
                
                <button onclick="calculateOres()">Calculate</button>
                
                <br>
        
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>
        
                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Ore Type</th>
                            <th>XP per Ore</th>
                            <th>Ores Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/mining.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'prayer') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Prayer Calculator</title>
        </head>
        <body onload="calculateBones()">
            <h1>2004Scape Prayer Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchPrayerXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="43">
                
                <button onclick="calculateBones()">Calculate</button>
                
                <br>

                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>

                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Bone Type</th>
                            <th>XP per Bone</th>
                            <th>Bones Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/prayer.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'prayer_duration') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Prayer Duration Calculator</title>
        </head>
        <body>
            <h1>2004Scape Prayer Duration Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
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
                    <img src="thick_skin.png" class="prayer" data-drain="5" data-name="Thick Skin" title="Thick Skin: +5% Defense">
                    <img src="burst_of_strength.png" class="prayer" data-drain="5" data-name="Burst of Strength" title="Burst of Strength: +5% Strength">
                    <img src="clarity_of_thought.png" class="prayer" data-drain="5" data-name="Clarity of Thought" title="Clarity of Thought: +5% Attack">
                    <img src="rock_skin.png" class="prayer" data-drain="10" data-name="Rock Skin" title="Rock Skin: +10% Defense">
                    <img src="superhuman_strength.png" class="prayer" data-drain="10" data-name="Superhuman Strength" title="Superhuman Strength: +10% Strength">
                    <img src="improved_reflexes.png" class="prayer" data-drain="10" data-name="Improved Reflexes" title="Improved Reflexes: +10% Attack">
                    <img src="rapid_restore.png" class="prayer" data-drain="1.6667" data-name="Rapid Restore" title="Rapid Restore: Halves restore time for stats">
                    <img src="rapid_heal.png" class="prayer" data-drain="3.3333" data-name="Rapid Heal" title="Rapid Heal: Halves HP drain rate">
                    <img src="protect_item.png" class="prayer" data-drain="3" data-name="Protect Item" title="Protect Item: Keep 1 extra item on death">
                    <img src="steel_skin.png" class="prayer" data-drain="20" data-name="Steel Skin" title="Steel Skin: +15% Defense">
                    <img src="ultimate_strength.png" class="prayer" data-drain="20" data-name="Ultimate Strength" title="Ultimate Strength: +15% Strength">
                    <img src="incredible_reflexes.png" class="prayer" data-drain="20" data-name="Incredible Reflexes" title="Incredible Reflexes: +15% Attack">
                    <img src="protect_from_magic.png" class="prayer" data-drain="20" data-name="Protect from Magic" title="Protect from Magic: 100% protection from magic attacks">
                    <img src="protect_from_missiles.png" class="prayer" data-drain="20" data-name="Protect from Missiles" title="Protect from Missiles: 100% protection from ranged attacks">
                    <img src="protect_from_melee.png" class="prayer" data-drain="20" data-name="Protect from Melee" title="Protect from Melee: 100% protection from melee attacks">
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
            <script src="js/calculators.js"></script>
            <script src="js/calculators/prayer_duration.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'run_energy') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Run Energy Restore Calculator</title>
        </head>
        <body onload="calculateRestoreTime()">
            <h1>2004Scape Run Energy Restore Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Current Run Energy (%):</label>
                <input type="number" id="currentRunEnergy" min="0" max="100" value="0"><br>
                <label>Agility Level:</label>
                <input type="number" id="agilityLevel" min="1" max="99" value="1"><br>
                <button onclick="calculateRestoreTime()">Calculate</button>
                <h3>Time to Restore 1% Energy: <br><span id="restorePerPercent" class="gold-text"></span></h3>
                <h3>Time to Restore to 100%: <br><span id="restoreTime" class="gold-text"></span></h3>
                <h3>~% Energy Restored per Minute: <span id="restoreOneMinute" class="gold-text"></span></h3>
                <br>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/run_energy.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'runecrafting') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Runecrafting Calculator</title>
        </head>
        <body onload="calculateRunes()">
            <h1>2004Scape Runecrafting Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchRunecraftingXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateRunes()">Calculate</button>
                
                <br>
        
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>
        
                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Rune Type</th>
                            <th>XP per Ess</th>
                            <th>Ess Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/runecrafting.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'smithing') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Smithing Calculator</title>
        </head>
        <body onload="calculateSmithing()">
            <h1>2004Scape Smithing Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchSmithingXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateSmithing()">Calculate</button>
                
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>
        
                <div>
                    <button onclick="setMode('smelting_bars')">Smelting & Smithing</button>
                    <button onclick="setMode('bars')">Smithing</button>
                    <button onclick="setMode('smelting')">Smelting</button>
                </div>
                
                <div id="metalSelection"><br>
                    <label for="metalType">Select Metal:</label>
                    <select id="metalType" onchange="calculateSmithing()">
                        <option value="bronze">Bronze</option>
                        <option value="iron">Iron</option>
                        <option value="steel">Steel</option>
                        <option value="mithril">Mithril</option>
                        <option value="adamant">Adamant</option>
                        <option value="rune">Rune</option>
                    </select>
                </div>
                
                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Item</th>
                            <th>XP per Smelt</th>
                            <th>Total Bars</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/smithing.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'splashing') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Splashing Calculator</title>
        </head>
        <body onload="calculateSplashing()">
            <h1>2004Scape Splashing Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchMagicXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateSplashing()">Calculate</button>
        
                <br>
        
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>
        
                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Spell Type</th>
                            <th>XP per Cast</th>
                            <th>Casts Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/splashing.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'thieving') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Thieving Calculator</title>
        </head>
        <body onload="calculateThieving()">
            <h1>2004Scape Thieving Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchThievingXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateThieving()">Calculate</button>
        
                <br>
        
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>
        
                <button onclick="setMode('npcs')">NPCs</button>
                <button onclick="setMode('stalls')">Stalls</button>
                <button onclick="setMode('chests')">Chests</button>
        
                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Source</th>
                            <th>XP per Theft</th>
                            <th>Actions Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/thieving.js"></script>
        </body>
        </html>
        HTML;
    }

    if ($calcName === 'woodcutting') {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>2004Scape Woodcutting Calculator</title>
        </head>
        <body onload="calculateLogs()">
            <h1>2004Scape Woodcutting Calculator</h1>
            <a href="?p=calculators">[Back to Calculators]</a><br><br>
            <div class="container">
                <label>Username:</label>
                <input type="text" id="username">
                <button onclick="fetchWoodcuttingXP()">Fetch XP</button><br>
                <label>Current XP:</label>
                <input type="number" id="currentXP" min="0" max="200000000" value="0">
                
                <label>Desired Level:</label>
                <input type="number" id="targetLevel" min="2" max="99" value="99">
                
                <button onclick="calculateLogs()">Calculate</button>
                
                <br>
        
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar">0%</div>
                </div>
        
                <!-- Results Table -->
                <table id="resultsTable">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Log Type</th>
                            <th>XP per Log</th>
                            <th>Logs Needed</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <script src="js/calculators.js"></script>
            <script src="js/calculators/woodcutting.js"></script>
        </body>
        </html>
        HTML;
    }

    return ucwords(str_replace('_', ' ', $calcName)) . ' Calculator';
}

function generateCalculatorLinks(): string {
    global $style;
    $miscCalculators = [
        'combat_xp',
        'combat_level',
        'high_alch',
        'max_hit',
        'prayer_duration',
        'run_energy',
        'splashing'
    ];

    $generateLinks = function (array $calculators) {
        $rows = '';
        foreach ($calculators as $calc) {
            $linkText = ucwords(str_replace('_', ' ', $calc)); // Capitalizes the words and replaces underscores with spaces
            $rows .= '<tr><td><a href="?p=calculators&calc=' . $calc . '">' . $linkText . ' Calculator</a></td></tr>';
        }
        return $rows;
    };

    $miscRows = $generateLinks($miscCalculators);

    return <<<HTML

<table width="100%" cellpadding="8" cellspacing="8" class="calculators">
<thead>
            <tr>
                <th>Skill Calculators</th>
            </tr>
        </thead>
    <tbody>
        <tr>
            <td>
                Select a skill below to get to the calculator for that skill.<br />
                <canvas data-skills="skillTree" data-width="220" data-style="$style"></canvas>
                <script src="js/skillgrid.js"></script>
            </td>
        </tr>
    </tbody>
    <thead>
            <tr>
                <th>Misc Calculators</th>
            </tr>
        </thead>
    <tbody>$miscRows</tbody>
</table>
HTML;
}