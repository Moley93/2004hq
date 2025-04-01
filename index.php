<?php

include('template/header.html');
include('template/body.html');

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
            include('pages/main/main.php');
            break;
    }
} else {
    include('pages/main/main.php');
}

include('template/footer.html');

?>