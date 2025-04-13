<?php
if ($_SERVER['REQUEST_URI'] !== strtolower($_SERVER['REQUEST_URI'])) {
    $lowercaseURL = strtolower($_SERVER['REQUEST_URI']);
    header('Location: ' . $lowercaseURL, true, 301);
    exit;
}
include 'config.php';

$p = htmlspecialchars($_GET['p'] ?? '');

switch ($p) {
    case 'questguides':
        include 'pages/questguides/main.php';
        break;

    case 'skillguides':
        include 'pages/skillguides/main.php';
        break;

    case 'droptables':
        include 'pages/droptables/main.php';
        break;

    case 'cluetables':
        include 'pages/cluetables/main.php';
        break;

    case 'clueguides':
        include 'pages/clueguides/main.php';
        break;

    case 'calculators':
        include 'pages/calculators/main.php';
        break;

    case 'streetprices':
        include 'pages/streetprices/main.php';
        break;

    case 'changelog':
        include 'pages/main/changelog.php';
        break;

    case '403':
        include 'pages/main/error/403.php';
        break;

    case '404':
        include 'pages/main/error/404.php';
        break;

    case '': // No ?p= value (homepage)
        include 'pages/main/homepage.php';
        break;

    default: // All other unknown pages
        include 'pages/main/error/404.php';
        break;
}


if (empty($stopload)) {
    $pageHTML = getPageContent();

    include 'template/header.php';
    include 'template/body.php';
    echo $pageHTML;
    include 'template/footer.php';
}
?>