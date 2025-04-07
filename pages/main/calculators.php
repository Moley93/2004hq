<?php
$meta_data['title'] = 'Calculators';
$meta_data['og:title'] = $meta_data['title'];
$meta_data['og:url'] = '?p=calculators';
$meta_data['og:image'] = 'img/clueicon.png';

include('pages/halogod35/calculators.php');
include('template/header.php');
include('template/body.php');

echo getPageContent();

?>