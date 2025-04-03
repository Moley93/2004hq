<?php
$meta_data['title'] = 'Depploy from Github';
$meta_data['og:title'] = $meta_data['title'];
$meta_data['og:url'] = '?p=deploy';
include('template/header.php');
include('template/body.php');

function deploy() {
    $repoOwner = "thesneilert";
    $repoName = "2004scape";
    $branch = "main";
    $localPath = $_SERVER['DOCUMENT_ROOT'].'/pages/2004calc';

    $preserveFiles = ['.env', 'uploads'];

    $apiUrl = "https://api.github.com/repos/$repoOwner/$repoName/commits/$branch";

    $commitFile = "$localPath/.latest_commit";

    $options = [
        "http" => [
            "header" => "User-Agent: PHP Deployment Script\r\n"
        ]
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($apiUrl, false, $context);
    $data = json_decode($response, true);

    if (!$data || !isset($data['sha'])) {
        die("Failed to fetch latest commit.\n");
    }

    $latestCommit = $data['sha'];

    $storedCommit = file_exists($commitFile) ? trim(file_get_contents($commitFile)) : "";

    if ($latestCommit !== $storedCommit) {
        echo "New update found! Deploying...\n";

        $zipUrl = "https://github.com/$repoOwner/$repoName/archive/refs/heads/$branch.zip";
        $zipFile = "$localPath/repo.zip";
        file_put_contents($zipFile, file_get_contents($zipUrl));

        $zip = new ZipArchive;
        if ($zip->open($zipFile) === TRUE) {
            $tempPath = "$localPath/temp";
            if (!is_dir($tempPath)) mkdir($tempPath, 0755, true);

            $zip->extractTo($tempPath);
            $zip->close();
            unlink($zipFile);

            $newPath = "$tempPath/$repoName-$branch";
            foreach (scandir($newPath) as $file) {
                if ($file === "." || $file === "..") continue;

                $src = "$newPath/$file";
                $dest = "$localPath/$file";

                if (in_array($file, $preserveFiles)) continue;

                if (is_dir($dest)) {
                    deleteDirectory($dest);
                } elseif (file_exists($dest)) {
                    unlink($dest);
                }

                rename($src, $dest);
            }

            deleteDirectory($newPath);
            rmdir($tempPath);

            file_put_contents($commitFile, $latestCommit);
            echo "Deployment successful!\n";
        } else {
            echo "Failed to extract update.\n";
        }
    } else {
        echo "Already up to date.\n";
    }
}

function deleteDirectory($dir) {
    if (!is_dir($dir)) return;

    foreach (scandir($dir) as $item) {
        if ($item === '.' || $item === '..') continue;

        $path = "$dir/$item";
        if (is_dir($path)) {
            deleteDirectory($path);
        } else {
            unlink($path);
        }
    }
    rmdir($dir);
}

?>
