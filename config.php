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

// Site-wide Helper Functions
function getJavaScriptVersion(string $filename): string {
    if (file_exists($filename)) {
        return '<script type="text/javascript" src="' . $filename . '?v=' . filemtime($filename) . '"></script>';
    } else {
        return '<script type="text/javascript" src="' . $filename . '"></script>';
    }
}
