<?php
$meta_data['title'] = 'Clue Tables';
$meta_data['og:title'] = $meta_data['title'];
$meta_data['og:url'] = '?p=cluetables';
$meta_data['og:image'] = 'img/clueicon.png';

include('pages/thesneilert/cluetables.php');
include('template/header.php');
include('template/body.php');

echo getPageContent();
echo '<script src="pages/thesneilert/cluetables.js" type="text/javascript"></script>';

?>