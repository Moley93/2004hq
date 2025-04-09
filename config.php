<?php


// Default Meta Data Array
$meta_data = array(
    'title' => 'Homepage',
    'og:title' => 'Homepage',
    'og:description' => 'A RuneHQ inspired website made for Lost City 2004.',
    'og:url' => '?',
    'og:image' => 'img/sword.png'
);

$stopload = false;
$style = $_COOKIE['style'] ?? 'default';
$debugMode = false;

if ($debugMode) { error_reporting(0); }
else { error_reporting(E_ALL); }
