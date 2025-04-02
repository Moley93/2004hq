<?php
$meta_data['title'] = 'Skill Guides';
$meta_data['og:title'] = $meta_data['title'];
$meta_data['og:url'] = '?p=skilllist';
$meta_data['og:image'] = 'img/stats.webp';

$skilllist_free = array(
//    "Attack" => "attack",
//    "Strength" => "strength",
//    "Defence" => "defence",
//    "Ranged" => "ranged",
//    "Prayer" => "prayer",
    "Magic" => "magic",
//    "Runecrafting" => "runecrafting",
//    "Hitpoints" => "hitpoints",
    "Crafting" => "crafting",
//   "Mining" => "mining",
//    "Smithing" => "smithing",
//    "Fishing" => "fishing",
    "Cooking" => "cooking",
//    "Firemaking" => "firemaking",
//    "Woodcutting" => "woodcutting"
);
$skilllist_members = array(
    "Agility" => "agility",
    "Herblore" => "herblore",
    "Thieving" => "thieving",
    "Fletching" => "fletching",
);
ksort($skilllist_free);
ksort($skilllist_members);

if (empty($_GET['skill'])) {
    include('template/header.php');
    include('template/body.php');
    echo '<table width="350">
    <tbody><tr>
            <td width="300" height="31" align="middle" bordercolor="#FFFFFF">
                <div align="center">
                    <span class="subheader"><u><b>Free-to-play Skills</b></u></span>
                </div>
            </td>
            <td width="300" align="middle" bordercolor="#FFFFFF">
                <div align="center">
                    <span class="subheader"><u><b>Members Skills</b></u></span>
                </div>
            </td>
        </tr>';
    $l = 0;
    while (($l < count($skilllist_free)) ||($l < count($skilllist_members))) {
        if ($l & 1) { echo '<tr bordercolor="#FFFFFF" bgcolor="#333333" class="text">'; }
        else { echo '<tr bordercolor="#FFFFFF" bgcolor="#000000" class="text">'; }
        if (!is_null(array_keys($skilllist_free)[$l])) {         
            echo '<td align="center"><a href="?p=skilllist&skill=';
            echo $skilllist_free[array_keys($skilllist_free)[$l]];
            echo '">';
            echo '<img height="16px" src="img/skillicons/'.$skilllist_free[array_keys($skilllist_free)[$l]].'.webp" /> ';
            echo array_keys($skilllist_free)[$l].'</a></td>';
        } else {
            echo '<td align="center"></td>';
        }
        
        if (!is_null(array_keys($skilllist_members)[$l])) {
            echo '<td align="center"><a href="?p=skilllist&skill=';
            echo $skilllist_members[array_keys($skilllist_members)[$l]];
            echo '">';
            echo '<img height="16px" src="img/skillicons/'.$skilllist_members[array_keys($skilllist_members)[$l]].'.webp" /> ';
            echo array_keys($skilllist_members)[$l].'</a></td>';
        } else {
            echo '<td align="center"></td>';
        }
        
        echo '</tr>';
        $l++;
    }
    echo '</tbody></table>';
} else {
    $currSkill = htmlspecialchars($_GET['skill']);
    if (file_exists('pages/skillguides/'.$currSkill.'.php')) {
        $meta_data['title'] = 'Skill Guides > '.array_search($currSkill,$skilllist_free);
        $meta_data['og:title'] = $meta_data['title'];
        $meta_data['og:url'] = '?p=skilllist&skill='.$currSkill;
        $meta_data['og:image'] = 'img/stats.webp';//TODO: Customize per skill
        include('template/header.php');
        include('template/body.php');
        include 'pages/skillguides/'.$currSkill.'.php';
    } else {
        header("Location: ?p=404");
    }
}
?>