<?php
include 'config.php';
if (!empty($_GET['p'])) {
    switch (htmlspecialchars($_GET['p'])) {
        case 'questguides':
            include 'pages/main/questguides.php';
            break;
        case 'skillguides':
            include 'pages/main/skillguides.php';
            break;
        case 'changelog':
            include 'pages/main/changelog.php';
            break;
        case 'droptables':
            include 'pages/main/droptables.php';
            break;
        case 'cluetables':
            include 'pages/main/cluetables.php';
            break;
        case 'clueguides':
            include 'pages/main/clueguides.php';
            break;
        case 'calculators':
            include 'pages/main/calculators.php';
            break;
        case 'updatetables':
            include 'pages/thesneilert/updatecluetables.php';
            break;
        default:
        case '404':
            include 'pages/main/404.php';
            break;
    }
} else {
    include 'pages/main/homepage.php';
}
if (!$stopload) {
    $pageHTML = getPageContent();
    include 'template/header.php';
    include 'template/body.php';
    echo $pageHTML;
    include 'template/footer.php';
}
?>
