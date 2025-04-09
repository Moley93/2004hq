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
    "restlessghost" => array("Restless Ghost" => false),
    "romeojuliet" => array("Romeo & Juliet" => false),
    "runemysteries" => array("Rune Mysteries" => false),
    "sheepshearer" => array("Sheep Shearer" => false),
    "knightssword" => array("The Knight's Sword" => false),
    "shieldofarrav" => array("The Shield of Arrav" => false),
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
    "gertrudescat" => array("Gertrudes Cat" => true),
    "heros" => array("Hero's Quest" => true),
    "junglepotion" => array("Jungle Potion" => true),
//    "legends" => array("Legend's Quest" => true), (not released yet)
    "lostcity" => array("Lost City" => true),
    "merlinscrystal" => array("Merlin's Crystal" => true),
    "monksfriend" => array("Monk's Friend" => true),
    "murdermystery" => array("Murder Mystery" => true),
    "observatory" => array("Observatory Quest" => true),
    "plaguecity" => array("Plague City" => true),
    "scorpioncatcher" => array("Scorpion Catcher" => true),
    "seaslug" => array("Sea Slug" => true),
    "sheepherder" => array("Sheep Herder" => true),
    "shilovillage" => array("Shilo Village Quest" => true),
    "templeofikov" => array("Temple of Ikov" => true),
    "grandtree" => array("The Grand Tree" => true),
    "holygrail" => array("The Holy Grail" => true),
    "touristtrap" => array("The Tourist Trap" => true),
    "undergroundpass" => array("The Underground Pass" => true),
    "treegnomevillage" => array("Tree Gnome Village" => true),
    "tribaltotem" => array("Tribal Totem" => true),
    "watchtower" => array("Watchtower Quest" => true),
    "waterfall" => array("Waterfall Quest" => true),
    "witchshouse" => array("Witch's House" => true)
);
ksort($questlist);

function getPageContent() {
    global $questlist, $meta_data;

    ob_start();

    if (empty($_GET['quest'])) {
        $meta_data['title'] = 'Quests';
        $meta_data['og:title'] = $meta_data['title'];
        $meta_data['og:url'] = '?p=questguides';
        $meta_data['og:image'] = 'img/questicon.webp';
        echo '<b>Select the Quest you would like to view a Guide for:</b><br><br>';
        echo renderQuestList($questlist);
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
            $meta_data['title'] = 'Quests > ' . $questName;
            $meta_data['og:title'] = $meta_data['title'];
            $meta_data['og:url'] = '?p=questguides&quest=' . $currQuest;
            $meta_data['og:image'] = 'img/questIcons/' . $currQuest . '.webp';

            $fileLocation = 'pages/questguides/' . ($questMembers ? 'members' : 'free') . '/' . $currQuest . '.php';

            if (!file_exists($fileLocation)) {
                $stopload = true;
                header("Location: ?p=404");
                exit;
            }
            include $fileLocation;
            echo getQuestGuide();

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
    }
    .quest-column {
        display: flex;
        flex-direction: column;
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

    foreach ($questlist as $quest) {
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