<?php

function getPageContent() {
    global $meta_data;
    $meta_data['title'] = 'Street Prices';
    $meta_data['og:title'] = $meta_data['title'];
    $meta_data['og:url'] = '?p=streetprices';
    $meta_data['og:image'] = 'img/rune_kite.png';

    return <<<HTML
    Street Prices per <a href="https://docs.google.com/spreadsheets/d/1kF10Oh29B3_pFw8Cq7cBRe119eGXcX8QJR22_Cf1qEE/?gid=0" target="_blank">Dead Botting's google spreadsheet</a>:
    <p style="font-style:italic;">This spreadsheet is designed as a reference for what prices to expect for items in the 2004scape Market.
      None of this data should be considered 100% correct, and will be forever changing.</p>
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