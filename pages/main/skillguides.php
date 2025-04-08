<?php
global $skill_list_free, $skill_list_members;
/*
$skill_list_free = array(
    "Ranged" => "ranged",
    "Prayer" => "prayer",
    "Magic" => "magic",
    "Runecrafting" => "runecrafting",
    "Crafting" => "crafting",
    "Mining" => "mining",
    "Smithing" => "smithing",
    "Fishing" => "fishing",
    "Cooking" => "cooking"
);
$skill_list_members = array(
    "Agility" => "agility",
    "Herblore" => "herblore",
    "Thieving" => "thieving",
    "Fletching" => "fletching"
);
ksort($skill_list_free);
ksort($skill_list_members);*/

function getPageContent() {
    //global $meta_data, $skill_list_free, $skill_list_members;

    ob_start();

    if (empty($_GET['skill'])) {
        $meta_data['title'] = 'Skill Guides';
        $meta_data['og:title'] = $meta_data['title'];
        $meta_data['og:url'] = '?p=skilllist';
        $meta_data['og:image'] = 'img/stats.webp';

        /*echo '<table width="350">
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

        $freeKeys = array_keys($skill_list_free);
        $memberKeys = array_keys($skill_list_members);
        $max = max(count($freeKeys), count($memberKeys));

        for ($i = 0; $i < $max; $i++) {
            $bg = ($i & 1) ? '#333333' : '#000000';
            echo '<tr bordercolor="#FFFFFF" bgcolor="' . $bg . '" class="text">';

            if (isset($freeKeys[$i])) {
                $key = $freeKeys[$i];
                $value = $skill_list_free[$key];
                echo '<td align="center"><a href="?p=skillguides&skill=' . $value . '">';
                echo '<img height="16px" src="img/skillicons/' . $value . '.webp" /> ' . $key . '</a></td>';
            } else {
                echo '<td align="center"></td>';
            }

            if (isset($memberKeys[$i])) {
                $key = $memberKeys[$i];
                $value = $skill_list_members[$key];
                echo '<td align="center"><a href="?p=skillguides&skill=' . $value . '">';
                echo '<img height="16px" src="img/skillicons/' . $value . '.webp" /> ' . $key . '</a></td>';
            } else {
                echo '<td align="center"></td>';
            }

            echo '</tr>';
        }

        echo '</tbody></table>';*/
        echo 'Select a skill below to get to the guide for that skill.<br><br>
        <canvas data-skills="skillTree" data-width="220"></canvas>
        <script src="js/skillgrid.js"></script><br>';

    } else {
        $currSkill = htmlspecialchars($_GET['skill']);
        $filePath = 'pages/skillguides/' . $currSkill . '.php';

        if (file_exists($filePath)) {
            include $filePath;

            // Assumes the skill guide defines these helper functions:
            // - getPageTitle()
            // - getPageMetaIcon()
            $meta_data['title'] = 'Skill Guides > ' . getPageTitle();
            $meta_data['og:title'] = $meta_data['title'];
            $meta_data['og:url'] = '?p=skillguides&skill=' . $currSkill;
            $meta_data['og:image'] = getPageMetaIcon();

            echo getSkillContent();
        } else {
            header("Location: ?p=404");
            exit;
        }
    }

    return ob_get_clean();
}