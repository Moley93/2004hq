<?php
$meta_data['title'] = 'Drop Tables';
$meta_data['og:title'] = $meta_data['title'];
$meta_data['og:url'] = '?p=droptables';
$meta_data['og:image'] = 'img/skeleton.webp';

include('pages/thesneilert/droptables.php');
include('template/header.php');
include('template/body.php');

echo getPageContent();
echo '<script src="pages/thesneilert/droptables.js" type="text/javascript"></script>';

?>