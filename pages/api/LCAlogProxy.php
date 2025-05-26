<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if (!isset($_GET['username']) || empty($_GET['username'])) {
    http_response_code(400);
    echo json_encode(["error" => "Missing username parameter."]);
    exit;
}

$raw = trim($_GET['username']);
$underscored = preg_replace('/\s+/', '_', $raw);
$clean = preg_replace('/[^\w-]/', '', $underscored);
$username = urlencode($clean);

$remoteUrl = "https://2004.lostcity.rs/player/adventurelog/$username";

$html = file_get_contents($remoteUrl);
if ($html === false) {
    http_response_code(500);
    exit(json_encode(['error' => 'Could not fetch page']));
}

libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML('<?xml encoding="utf-8" ?>' . $html);
$xpath = new DOMXPath($doc);

$container = $xpath->query("//h2[normalize-space(.)='Recent Events']".
    "/following-sibling::div[contains(@style,'overflow-y')][1]")->item(0);

$entries = [];
if ($container) {
    $divs = $xpath->query(".//div[@style and span]", $container);
    foreach ($divs as $div) {
        $span = $xpath->query(".//span", $div)->item(0);
        $timestamp = $span ? trim($span->textContent) : null;

        $br = $xpath->query(".//br", $div)->item(0);
        $desc = '';
        if ($br) {
            for ($node = $br->nextSibling; $node; $node = $node->nextSibling) {
                if ($node->nodeType === XML_TEXT_NODE) {
                    $desc .= $node->nodeValue;
                } elseif ($node->nodeType === XML_ELEMENT_NODE) {
                    $desc .= $node->textContent;
                }
            }
        }
        $description = trim($desc);

        if ($timestamp && $description) {
            $entries[] = [
                'timestamp'   => $timestamp,
                'description' => $description
            ];
        }
    }
}

echo json_encode($entries);