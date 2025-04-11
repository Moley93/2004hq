<?php

function getPageContent() {
    global $meta_data;
    $meta_data['title'] = 'Clue Tables';
    $meta_data['og:title'] = $meta_data['title'];
    $meta_data['og:url'] = '?p=cluetables';
    $meta_data['og:image'] = 'img/clueicon.png';

    return <<<HTML
<div id="sheet-table">Loading...</div>

<script type="module">
import { loadItemList, fetchSheetData, renderTable } from './js/sheetsTable.js';

await loadItemList();

const sheetId = '1kF10Oh29B3_pFw8Cq7cBRe119eGXcX8QJR22_Cf1qEE';
const gid = '663521073';

fetchSheetData(sheetId, gid).then(data => {
  renderTable('sheet-table', data, 10);
  renderAllSprites();
});
</script>
HTML; }