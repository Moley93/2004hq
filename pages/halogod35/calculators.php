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

    if ($css = $calculatorType->getCSS()) {
        $content .= '<link rel="stylesheet" href="css/halogod35/' . $css . '" />';
    }

    if ($js = $calculatorType->getJS()) {
        $content .= '<script src="js/halogod35/' . $js . '"></script>';
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
    if ($calculatorType->getName() === null) {
        return generateCalculatorLinks();
    }

    return 'Calc page for ' . $calculatorType->getName();
}

function generateCalculatorLinks(): string {
    $skillCalculators = [
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
        'woodcutting'
    ];

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

    $skillRows = $generateLinks($skillCalculators);
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
            Select the skill below to get to the calculator for that skill.<br />
                <canvas data-skills="skillTree"></canvas>
                <script src="js/skillGrid.js"></script>
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