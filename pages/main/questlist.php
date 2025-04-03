<?php
$meta_data['title'] = 'Quests';
$meta_data['og:title'] = $meta_data['title'];
$meta_data['og:url'] = '?p=questlist';
$meta_data['og:image'] = 'img/questicon.webp';

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
//    "elementalworkshop" => array("Elemental Workshop" => true),
    "familycrest" => array("Family Crest" => true),
    "fightarena" => array("Fight Arena" => true),
    "fishingcontest" => array("Fishing Contest" => true),
    "gertrudescat" => array("Gertrudes Cat" => true),
    "heros" => array("Hero's Quest" => true),
    "junglepotion" => array("Jungle Potion" => true),
    "legends" => array("Legend's Quest" => true),
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
    "undergroundpass" => array("The Underground Pass" => true),
    "treegnomevillage" => array("Tree Gnome Village" => true),
    "tribaltotem" => array("Tribal Totem" => true),
    "watchtower" => array("Watchtower Quest" => true),
    "waterfall" => array("Waterfall Quest" => true),
    "witchshouse" => array("Witch's House" => true)
);
ksort($questlist);

if (empty($_GET['quest'])) {
    include('template/header.php');
    include('template/body.php');
    echo '<table width="350">
    <tbody><tr>
            <td width="300" height="31" align="middle" bordercolor="#FFFFFF">
                <div align="center">
                    <span class="subheader"><u><b>Free Quests</b></u></span>
                </div>
            </td>
            <td width="300" align="middle" bordercolor="#FFFFFF">
                <div align="center">
                    <span class="subheader"><u><b>Members Quests</b></u></span>
                </div>
            </td>
        </tr>';
    $freeQuests = [];
    $memberQuests = [];
    foreach ($questlist as $key => $quest) {
        foreach ($quest as $name => $isMembers) {
            if ($isMembers) { $memberQuests[] = ['key' => $key, 'name' => $name]; }
            else { $freeQuests[] = ['key' => $key, 'name' => $name]; }
        }
    }
    $maxLength = max(count($freeQuests), count($memberQuests));

    for ($i = 0; $i < $maxLength; $i++) {
        if ($i & 1) { echo '<tr bordercolor="#FFFFFF" bgcolor="#333333" class="text">'; }
        else { echo '<tr bordercolor="#FFFFFF" bgcolor="#000000" class="text">'; }
        if (isset($freeQuests[$i])) {
            echo '<td align="center"><a href="?p=questlist&quest=';
            echo $freeQuests[$i]['key'];
            echo '">'.$freeQuests[$i]['name'].'</a></td>';
        } else { echo '<td align="center"></td>'; }
        if (isset($memberQuests[$i])) {
            echo '<td align="center"><a href="?p=questlist&quest=';
            echo $memberQuests[$i]['key'];
            echo '">'.$memberQuests[$i]['name'].'</a></td>';
        } else { echo '<td align="center"></td>'; }
        echo '</tr>';
    }
    echo '</tbody></table>';
    
} else {// _GET['quest'] is set
    $currQuest = htmlspecialchars($_GET['quest']);
    foreach ($questlist as $key => $quest) {
        if ($key === $currQuest) {
            foreach ($quest as $name => $isMembers) {
                $questName = $name;
                $questMembers = $isMembers;
                $found = true;
                break 2; // Exit both loops once found
            }
        }
    }

    if ($found) {
        $meta_data['title'] = 'Quests > '.$questName;
        $meta_data['og:title'] = $meta_data['title'];
        $meta_data['og:url'] = '?p=questlist&quest='.$currQuest;
        $meta_data['og:image'] = 'img/questIcons/'.$currQuest.'.webp';
        $fileLocation = 'pages/questguides/'.($questMembers ? 'members' : 'free').'/'.$currQuest.'.php';
        if (!file_exists($fileLocation)) {
            header("Location: ?p=404");
        } else {
            include $fileLocation;
            include('template/header.php');
            include('template/body.php');
            echo getPageContent();
        }
        
    }
    else {
        header("Location: ?p=404");
    }
}
?>