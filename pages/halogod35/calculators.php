<?php
class calculatorType {
    private String $calcName;
    public function getCSS() {
        if ($this->calcName != null) {
            return ($this->calcName).'.css';
        }
        return null;
    }
    public function getJS() {
        if ($this->calcName != null) {
            return ($this->calcName).'.js';
        }
        return null;
    }
    public function __construct() {
        switch (htmlspecialchars($_GET['calc'])) {
            case 'agility':
            case 'cooking';
            case 'crafting';
            case 'firemaking';
            case 'fishing';
            case 'fletching';
            case 'herblore';
            case 'mining';
            case 'prayer';
            case 'runecrafting';
            case 'smithing';
            case 'thieving';
            case 'woodcutting';
            case 'combatxp';
            case 'combatlevel';
            case 'highalch';
            case 'maxhit';
            case 'prayerduration';
            case 'runenergy';
            case 'splashing';
                $this->calcName = htmlspecialchars($_GET['calc']);
                break;
            default:
                $this->calcName = null;
        }
    }
}
function getExtraHeaderContent() {
    $r = '';
    $calculatorType = new calculatorType();
    if (!($calculatorType->getCSS() == null)) {
        $r = $r.'<link rel="stylesheet" href="css/halogod35/'.$calculatorType->getCSS().'" />';
    }
    if (!($calculatorType->getJS() == null)) {
        $r = $r.'<link rel="stylesheet" href="css/halogod35/'.$calculatorType->getJS().'" />';
    }
    return $r;
}
function getPageContent() { return <<<HTML

HTML; } ?>