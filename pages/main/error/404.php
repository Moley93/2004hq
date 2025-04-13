<?php
$meta_data['title'] = '404';
$meta_data['og:title'] = $meta_data['title'];
$meta_data['og:url'] = '?p=404';
$meta_data['og:image'] = 'img/Confusion_beast.webp';
function getPageContent() {
    return <<<HTML
<div class="rsplain12" style="font-size:36px;">Nothing interesting happens.</div><br>
<br>
<br>
That page was not found or hasn't been created yet!<br> 
HTML; }