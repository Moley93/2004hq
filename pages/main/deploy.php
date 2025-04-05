<?php
$meta_data['title'] = 'Depploy from Github';
$meta_data['og:title'] = $meta_data['title'];
$meta_data['og:url'] = '?p=deploy';
include('template/header.php');
include('template/body.php');
function deploy() {
    $repoOwner = "thesneilert";
    $repoName = "2004scape";
    $branch = "2004hq";
    $localPath = $_SERVER['DOCUMENT_ROOT'].'/pages/2004calc';


    // Files you want to fetch (relative to the repo root)
    $filesToDownload = [
        "index.html",
        "style.css",
        "javascript.js"
    ];

    // Directory to save them into (relative to this script)
    $localPath = __DIR__.'/'.$repoOwner;

    foreach ($filesToDownload as $file) {
        $rawUrl = "https://raw.githubusercontent.com/$repoOwner/$repoName/$branch/$file";
        $savePath = "$localPath/$file";

        // Make sure the folder exists
        $folder = dirname($savePath);
        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        $content = fetchFromGitHub($rawUrl);
        if ($content === false) {
            echo "❌ Failed to download $file\n";
        } else {
            file_put_contents($savePath, $content);
            echo "✅ Downloaded $file\n";
        }
    }
}
function fetchFromGitHub($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "PHP File Downloader");
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    return $error ? false : $response;
}

?>