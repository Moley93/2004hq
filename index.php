<?php
if ($_SERVER['REQUEST_URI'] !== strtolower($_SERVER['REQUEST_URI'])) {
    $lowercaseURL = strtolower($_SERVER['REQUEST_URI']);
    header('Location: ' . $lowercaseURL, true, 301);
    exit;
}
include 'config.php';

$p = htmlspecialchars($_GET['p'] ?? '');

switch ($p) {
    case 'skillguides':
    case 'droptables':
    case 'cluetables':
    case 'clueguides':
    case 'calculators':
    case 'streetprices':
    case 'questguides':
    case 'itemdb':
    case 'playerinfo':
        include 'pages/'.$p.'/main.php';
        break;

    case 'droptables2':
        include 'pages/droptables/main2.php';
        break;

    case '404':
    case '403':
        include 'pages/main/error/'.$p.'.php';
        break;

    case 'changelog':
        include 'pages/main/changelog.php';
        break;

    case '': // No ?p= value (homepage)
        include 'pages/main/homepage.php';
        break;

    /*case 'updatecluetables':
        include 'pages/api/updatecluetables.php';
        break;*/

    default: // All other unknown pages
        header('Location: ?p=404') ;
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