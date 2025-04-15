<?php

/* Default Meta Data */
$meta_data = array(
    'title' => 'Homepage',
    'og:title' => 'Homepage',
    'og:description' => 'A RuneHQ inspired website made for Lost City 2004.',
    'og:image' => 'img/sword.png'
);
$stopload = false;

/* Site Options */
$siteOptStyle = $_COOKIE['style'] ?? 'default';
$siteOptRegion = $_COOKIE['usuk'] ?? 'US';
$siteOptGameRevision = $_COOKIE['revision'] ?? '225';

/* Only enable Debug mode locally for PHP Error output */
$debugMode = false;

if ($debugMode) { error_reporting(0); }
else { error_reporting(E_ALL); }
