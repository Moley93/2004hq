<?php
include('config.php');

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
        case 'deploy':
            if (!empty($_GET['h'])) { 
                include('pages/main/deploy.php');
                deploy();
            } else {
                include('pages/main/404.php');
            }
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