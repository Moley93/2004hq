<?php
$meta_data['title'] = 'Quest Guides';
$meta_data['og:title'] = $meta_data['title'];
$meta_data['og:url'] = '?p=questlist';
$meta_data['og:image'] = 'img/questicon.webp';

$questlist_free = array(
    "Black Knight's Fortress" => "blackknightsfortress",
    "Cook's Assistant" => "cooksassistant",
    "Demon Slayer" => "demonslayer",
    "Doric's Quest" => "dorics",
    "Dragon Slayer" => "dragonslayer",
    "Ernest the Chicken" => "ernestthechicken",
    "Goblin Diplomacy" => "goblindiplomacy",
    "Imp Catcher" => "impcatcher",
    "Pirate's Treasure" => "piratestreasure",
    "Prince Ali Rescue" => "princealirescue",
    "Restless Ghost" => "restlessghost",
    "Romeo & Juliet" => "romeojuliet",
    "Rune Mysteries" => "runemysteries",
    "Sheep Shearer" => "sheepshearer",
    "The Knight's Sword" => "knightssword",
    "The Shield of Arrav" => "shieldofarrav",
    "Vampire Slayer" => "vampireslayer",
    "Witch's Potion" => "witchspotion"
);
$questlist_members = array(
    "Hazeel Cult" => "hazeelcult",
    "Big Chompy Bird Hunting" => "bigchompybirdhunting",
    "Biohazard" => "biohazard",
    "Clock Tower" => "clocktower",
    "Druidic Ritual" => "druidicritual",
    "Dwarf Cannon" => "dwarfcannon",
//    "Elemental Workshop" => "elementalworkshop",
    "Family Crest" => "familycrest",
    "Fight Arena" => "fightarena",
    "Fishing Contest" => "fishingcontest",
    "Gertrudes Cat" => "gertrudescat",
    "Hero's Quest" => "heros",
    "Jungle Potion" => "junglepotion",
    "Legend's Quest" => "legends",
    "Lost City" => "lostcity",
    "Merlin's Crystal" => "merlinscrystal",
    "Monk's Friend" => "monksfriend",
    "Murder Mystery" => "murdermystery",
    "Observatory Quest" => "observatory",
    "Plague City" => "plaguecity",
    "Scorpion Catcher" => "scorpioncatcher",
    "Sea Slug" => "seaslug",
    "Sheep Herder" => "sheepherder",
    "Shilo Village Quest" => "shilovillage",
    "Temple of Ikov" => "templeofikov",
    "The Grand Tree" => "grandtree",
    "The Holy Grail" => "holygrail",
    "The Underground Pass" => "undergroundpass",
    "Tree Gnome Village" => "treegnomevillage",
    "Tribal Totem" => "tribaltotem",
    "Watchtower Quest" => "watchtower",
    "Waterfall Quest" => "waterfall",
    "Witch's House" => "witchshouse"
);
ksort($questlist_free);
ksort($questlist_members);

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
    $l = 0;
    while (($l < count($questlist_free)) ||($l < count($questlist_members))) {
        if ($l & 1) { echo '<tr bordercolor="#FFFFFF" bgcolor="#333333" class="text">'; }
        else { echo '<tr bordercolor="#FFFFFF" bgcolor="#000000" class="text">'; }
        
        if (!is_null(array_keys($questlist_free)[$l])) {
            echo '<td align="center"><a href="?p=questlist&quest=';
            echo $questlist_free[array_keys($questlist_free)[$l]];
            echo '">'.array_keys($questlist_free)[$l].'</a></td>';
        } else {
            echo '<td align="center"></td>';
        }
        
        if (!is_null(array_keys($questlist_members)[$l])) {
            echo '<td align="center"><a href="?p=questlist&quest=';
            echo $questlist_members[array_keys($questlist_members)[$l]];
            echo '">'.array_keys($questlist_members)[$l].'</a></td>';
        } else {
            echo '<td align="center"></td>';
        }
        
        echo '</tr>';
        $l++;
    }
    echo '</tbody></table>';
} else {
    $currQuest = htmlspecialchars($_GET['quest']);
    if (file_exists('pages/questguides/free/'.$currQuest.'.php')) {
        $meta_data['title'] = 'Quest Guides > '.array_search($currQuest,$questlist_free);
        $meta_data['og:title'] = $meta_data['title'];
        $meta_data['og:url'] = '?p=questlist&quest='.$currQuest;
        $meta_data['og:image'] = 'img/questicon.webp';//TODO: Customize per skill
        include('template/header.php');
        include('template/body.php');
        include 'pages/questguides/free/'.$currQuest.'.php';
    } else if (file_exists('pages/questguides/members/'.$currQuest.'.php')) {
        $meta_data['title'] = 'Quest Guides > '.array_search($currQuest,$questlist_members);
        $meta_data['og:title'] = $meta_data['title'];
        $meta_data['og:url'] = '?p=questlist&quest='.$currQuest;
        $meta_data['og:image'] = 'img/questicon.webp';//TODO: Customize per skill
        include('template/header.php');
        include('template/body.php');
        include 'pages/questguides/members/'.$currQuest.'.php';
    } else {
        header("Location: ?p=404");
    }
}
?>