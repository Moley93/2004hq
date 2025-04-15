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

    public function getName(): ?string { return $this->calcName; }

    public function __construct() {
        $calc = htmlspecialchars($_GET['calc'] ?? '');
        if (in_array($calc, self::VALID_CALCULATORS, true)) {
            $this->calcName = $calc;
        }
    }
}

function getPageContent(): string {
    global $meta_data, $style;
    ob_start();
    if (empty($_GET['calc'])) {
        $meta_data['title'] = 'Calculators';
        $meta_data['og:title'] = $meta_data['title'];
        $meta_data['og:image'] = 'img/stats.webp';
        return generateCalculatorLinks();
    } else {
        $currSkill = htmlspecialchars($_GET['calc']);
        $filePath = 'pages/calculators/' . $currSkill . '/main.php';

        if (file_exists($filePath)) {
            include $filePath;

            // - getPageTitle()
            // - getPageMetaIcon()
            $meta_data['title'] = 'Calculators > ' . getPageTitle();
            $meta_data['og:title'] = $meta_data['title'];
            $meta_data['og:image'] = getPageMetaIcon();

            echo getCalcContent();
        } else {
            header("Location: ?p=404");
            exit;
        }
    }
    return ob_get_clean();
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
                        Select a skill below to get to the calculator for that skill.<br>
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