<?php

function getPageContent() {
    global $meta_data, $style;
    ob_start();
    if (empty($_GET['skill'])) {
        $meta_data['title'] = 'Skill Guides';
        $meta_data['og:title'] = $meta_data['title'];
        $meta_data['og:url'] = '?p=skillguides';
        $meta_data['og:image'] = 'img/stats.webp';
        echo '<b>Select the Skill you would like to view a guide for:</b><br><br>';
        echo '<canvas data-skills="skillTree" data-width="220" data-style="'.$style.'"></canvas>';
        echo '<script src="js/skillgrid.js"></script><br>';
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