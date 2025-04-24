<?php

function getPageContent() {
    global $meta_data;
    $meta_data['title'] = 'Street Prices';
    $meta_data['og:title'] = $meta_data['title'];
    $meta_data['og:image'] = 'img/rune_kite.png';

    return <<<HTML
    <h2>Street Prices</h2>
    <p style="font-style:italic;">This guide is designed as a reference for what prices to expect for items in the 2004scape Market.
      None of this data should be considered 100% correct, and will be forever changing.</p>
    <div id="sheet-table">Loading...</div>

    <script type="module">
      import { loadItemList, fetchSheetData, renderTable } from './js/sheets_table.js';

      await loadItemList();

      const sheetId = '1Jarjegu1fxyg5hURF7Nu_Nj8wAoUyS44HHzdwilKvtg';
      const gid = '2130125074';

      fetchSheetData(sheetId, gid).then(data => {
        renderTable('sheet-table', data, 10);
        renderAllSprites();
      });
    </script>
HTML; }