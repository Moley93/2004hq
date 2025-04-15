<?php
$questlist = array(
    //String questKey => array(String questName => boolean isMembers)
    "blackknightsfortress" => array("Black Knight's Fortress" => false),
    "cooksassistant" => array("Cook's Assistant" => false),
    "demonslayer" => array("Demon Slayer" => false),
    "dorics" => array("Doric's Quest" => false),
    "dragonslayer" => array("Dragon Slayer" => false),
    "ernestthechicken" => array("Ernest the Chicken" => false),
    "goblindiplomacy" => array("Goblin Diplomacy" => false),
    "impcatcher" => array("Imp Catcher" => false),
    "piratestreasure" => array("Pirate's Treasure" => false),
    "princealirescue" => array("Prince Ali Rescue" => false),
    "restlessghost" => array("The Restless Ghost" => false),
    "romeojuliet" => array("Romeo & Juliet" => false),
    "runemysteries" => array("Rune Mysteries Quest" => false),
    "sheepshearer" => array("Sheep Shearer" => false),
    "knightssword" => array("The Knight's Sword" => false),
    "shieldofarrav" => array("Shield of Arrav" => false),
    "vampireslayer" => array("Vampire Slayer" => false),
    "witchspotion" => array("Witch's Potion" => false),
    "hazeelcult" => array("Hazeel Cult" => true),
    "bigchompybirdhunting" => array("Big Chompy Bird Hunting" => true), 
    "biohazard" => array("Biohazard" => true),
    "clocktower" => array("Clock Tower" => true),
    "druidicritual" => array("Druidic Ritual" => true), 
    "dwarfcannon" => array("Dwarf Cannon" => true),
//    "elementalworkshop" => array("Elemental Workshop" => true), (not released yet)
    "familycrest" => array("Family Crest" => true),
    "fightarena" => array("Fight Arena" => true),
    "fishingcontest" => array("Fishing Contest" => true),
    "gertrudescat" => array("Gertrude's Cat" => true),
    "heros" => array("Hero's Quest" => true),
    "junglepotion" => array("Jungle Potion" => true),
    "legends" => array("Legend's Quest" => true),
    "digsite" => array("Digsite Quest" => true),
    "lostcity" => array("Lost City" => true),
    "merlinscrystal" => array("Merlin's Crystal" => true),
    "monksfriend" => array("Monk's Friend" => true),
    "murdermystery" => array("Murder Mystery" => true),
    "observatory" => array("Observatory Quest" => true),
    "plaguecity" => array("Plague City" => true),
    "scorpioncatcher" => array("Scorpion Catcher" => true),
    "seaslug" => array("Sea Slug Quest" => true),
    "sheepherder" => array("Sheep Herder" => true),
    "shilovillage" => array("Shilo Village" => true),
    "templeofikov" => array("Temple of Ikov" => true),
    "grandtree" => array("The Grand Tree" => true),
    "holygrail" => array("Holy Grail" => true),
    "touristtrap" => array("The Tourist Trap" => true),
    "undergroundpass" => array("Underground Pass" => true),
    "treegnomevillage" => array("Tree Gnome Village" => true),
    "tribaltotem" => array("Tribal Totem" => true),
    "watchtower" => array("Watch Tower" => true),
    "waterfall" => array("Waterfall Quest" => true),
    "witchshouse" => array("Witches House" => true)
);
ksort($questlist);

function getPageContent() {
    global $questlist, $meta_data, $siteOptStyle;
    ob_start();
    if (empty($_GET['quest'])) {
        $meta_data['title'] = 'Quest Guides';
        $meta_data['og:title'] = $meta_data['title'];
        $meta_data['og:image'] = 'img/questicon.webp';
        echo '<h3>Select the Quest you would like to view a Guide for:</h3>';
        if ($siteOptStyle === 'oldschool') {
            echo renderQuestListOldschool($questlist);
        } else {
            echo renderQuestList($questlist);
        }
    } else {
        $currQuest = htmlspecialchars($_GET['quest']);
        $found = false;

        foreach ($questlist as $key => $quest) {
            if ($key === $currQuest) {
                foreach ($quest as $name => $isMembers) {
                    $questName = $name;
                    $questMembers = $isMembers;
                    $found = true;
                    break 2;
                }
            }
        }

        if ($found) {
            $meta_data['title'] = 'Quest Guides > ' . $questName;
            $meta_data['og:title'] = $meta_data['title'];
            $meta_data['og:image'] = 'img/questIcons/' . $currQuest . '.webp';

            $fileLocation = 'pages/questguides/' . ($questMembers ? 'members' : 'free') . '/' . $currQuest . '.php';

            if (!file_exists($fileLocation)) {
                $stopload = true;
                header("Location: ?p=404");
                exit;
            }
            $questComplete = '
                <h2>Congratulations, Quest Complete!</h2><br>
                <img src="img/questimages/quest_complete/'.$currQuest.'.png" alt="Quest Complete!" width="80%">
                <hr>';
            include $fileLocation;
            echo getQuestGuide($questName, $questComplete);

        } else {
            $stopload = true;
            header("Location: ?p=404");
            exit;
        }
    }

    return ob_get_clean();
}

function renderQuestList(array $questlist): string {
    $html = <<<HTML
    <style>

    .quest-container {
        background-color: #3B322B;
        background-repeat: repeat;
        font-family: 'RSPlain12', monospace;
        font-size: 12px;
        padding: 10px;
        display: flex;
        gap: 40px;
        width: fit-content;
        margin: auto;
    }
    .quest-column {
        display: flex;
        flex-direction: column;
        text-align: left;
    }
    .quest-header {
        color: #FF981F;
        margin-bottom: 5px;
        font-weight: bold;
        text-shadow: 2px 2px #000;
    }
    .quest-entry a:hover {
        color:rgb(255, 0, 0);
        margin: 2px 0;
        text-shadow: 2px 2px #000;
        text-decoration: none;
    }
    .quest-entry a {
        color: #00FF80;
        margin: 2px 0;
        text-shadow: 2px 2px #000;
        text-decoration: none;
    }
    </style>
    <div class="quest-container">
        <div class="quest-column">
            <div class="quest-header">FREE QUESTS:</div>
HTML;

     // Free Quests
     foreach ($questlist as $questKey => $quest) {
        $questName = array_key_first($quest);
        $isMembers = $quest[$questName];
        if (!$isMembers) {
            $url = "?p=questguides&quest=" . urlencode($questKey);
            $html .= '<div class="quest-entry"><a href="' . $url . '">' . htmlspecialchars($questName) . '</a></div>';
        }
    }

    $html .= <<<HTML
    </div>
    <div class="quest-column">
        <div class="quest-header">MEMBERS QUESTS:</div>
HTML;

    // Members Quests
    foreach ($questlist as $questKey => $quest) {
        $questName = array_key_first($quest);
        $isMembers = $quest[$questName];
        if ($isMembers) {
            $url = "?p=questguides&quest=" . urlencode($questKey);
            $html .= '<div class="quest-entry"><a href="' . $url . '">' . htmlspecialchars($questName) . '</a></div>';
        }
    }

    $html .= '</div></div>';
    return $html;
}
function renderQuestListOldschool(array $questlist): string {
    // Separate the quests
    $freeQuests = [];
    $membersQuests = [];

    foreach ($questlist as $questKey => $quest) {
        $questName = array_key_first($quest);
        $isMembers = $quest[$questName];
        $url = "?p=questguides&quest=" . urlencode($questKey);

        if ($isMembers) {
            $membersQuests[] = '<a href="' . $url . '">' . htmlspecialchars($questName) . '</a>';
        } else {
            $freeQuests[] = '<a href="' . $url . '">' . htmlspecialchars($questName) . '</a>';
        }
    }

    // Determine the max rows needed
    $maxRows = max(count($freeQuests), count($membersQuests));

    $html = '<table class="calculators">';
    $html .= '<thead><tr><th>Free Quests</th><th>Members Quests</th></tr></thead><tbody>';

    // Render rows
    for ($i = 0; $i < $maxRows; $i++) {
        $free = $freeQuests[$i] ?? '';
        $members = $membersQuests[$i] ?? '';
        $html .= '<tr><td>' . $free . '</td><td>' . $members . '</td></tr>';
    }

    $html .= '</tbody></table>';
    return $html;
}