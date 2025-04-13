<?php
header('Content-Type: application/xml; charset=utf-8');

$baseUrl = 'https://2004hq.com/';

$urls = [
    '', // homepage
    'questguides/',
    'skillguides/',
    'droptables/',
    'cluetables/',
    'clueguides/',
    'calculators/',
    'streetprices/',
    'changelog/',
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $url): ?>
<url>
    <loc><?= htmlspecialchars($baseUrl . $url) ?></loc>
</url>
<?php endforeach; ?>
</urlset>