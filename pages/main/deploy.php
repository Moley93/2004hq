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

    // Files you want to fetch (relative to the repo root)
    $filesToDownload = [
        "index.html",
        "style.css",
        "javascript.js"
    ];


    foreach ($filesToDownload as $file) {
        $rawUrl = "https://raw.githubusercontent.com/$repoOwner/$repoName/$branch/$file";
        $savePath = "$repoOwner/$file";
    
        // Fetch remote content
        $remoteContent = fetchFromGitHub($rawUrl);
        if ($remoteContent === false) {
            echo "❌ Failed to download $file <br />";
            continue;
        }
    
        // Check for changes
        $localContent = file_exists($savePath) ? file_get_contents($savePath) : null;
    
        if ($localContent !== $remoteContent) {
            // Ensure folder exists
            $folder = dirname($savePath);
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }
    
            // Write the new file
            file_put_contents($savePath, $remoteContent);
            echo "🔄 Updated: $file <br />";
        } else {
            echo "✅ No changes: $file <br />";
        }
    }
}
    
function fetchFromGitHub($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "PHP File Sync Script");
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    return $error ? false : $response;
}

?>