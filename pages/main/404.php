<?php
$meta_data['title'] = '404';
$meta_data['og:title'] = $meta_data['title'];
$meta_data['og:url'] = '?p=error';
$meta_data['og:image'] = 'img/Confusion_beast.webp';
function getPageContent() {
    return <<<HTML
<div class="rsplain12" style="font-size:24px;">Nothing interesting happens.</div><br />
<br />
<br />
(That page was not found!)<br /> 
HTML; }