<?php
$meta_data = array(
    'title' => 'Homepage',
    'og:title' => 'Homepage',
    'og:description' => 'A RuneHQ inspired website made for Lost City 2004.',
    'og:url' => '',
    'og:image' => 'img/sword.png'
);
if (!empty($_GET['p'])) {
    switch (htmlspecialchars($_GET['p'])) {
        case 'questlist':
            include('pages/main/questlist.php');
            break;
        case 'skilllist':
            include('pages/main/skilllist.php');
            break;
        case 'changelog':
            include('pages/main/changelog.php');
            break;
        default:
        case '404':
            include('pages/main/404.php');
            break;
    }
} else {
    include('pages/main/main.php');
}

include('template/footer.php');

?>