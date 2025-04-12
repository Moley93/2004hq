<?php
include 'config.php';
if (!empty($_GET['p'])) {
    switch (htmlspecialchars($_GET['p'])) {
        case 'questguides':
            include 'pages/questguides/questguides.php';
            break;
        case 'skillguides':
            include 'pages/skillguides/skillguides.php';
            break;
        case 'droptables':
            include 'pages/thesneilert/droptables.php';
            break;
        case 'cluetables':
            include 'pages/thesneilert/cluetables.php';
            break;
        case 'clueguides':
            include 'pages/clueguides/clueguides.php';
            break;
        case 'calculators':
            include 'pages/calculators/calculators.php';
            break;
        //case 'updatetables':
        //    include 'pages/api/updatecluetables.php';
        //    break;
        case 'streetprices':
            include 'pages/streetprices/streetprices.php';
            break;
        case 'changelog':
            include 'pages/main/changelog.php';
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
