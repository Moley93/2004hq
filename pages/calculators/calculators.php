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