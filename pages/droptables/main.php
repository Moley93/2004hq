<?php
function getPageContent() { 
    global $meta_data;
    $meta_data['title'] = 'Drop Tables';
    $meta_data['og:title'] = $meta_data['title'];
    $meta_data['og:image'] = 'img/skeleton.webp';
    ob_start();
    echo <<<HTML
    <table width="100%" height=100 cellpadding=4>
        <tr>
            <td class=b bgcolor=#474747 background=img/stoneback.gif>
                <div class="stone-box">
                    <b>Select an NPC</b><br>
                    <select id="npcSelect">
                        <option value="">Select NPC...</option>
                    </select>
                </div>
            </td>
            <td class=b bgcolor=#474747 background=img/stoneback.gif>
                <div class="stone-box">
                    <canvas data-itemname="ring_of_wealth" data-show-label="inline"></canvas> Equipped
                    <label style="color: white;">
                        <input type="checkbox" id="ringOfWealthCheckbox" style="margin-right: 5px;"><br>
                    </label>
                </div>
            </td>
        </tr>
    </table>
    <table width="100%" height=70 cellpadding=4>
        <tr>
            <td class=b bgcolor=#474747 background=img/stoneback.gif>
                <div class="stone-box">
                    <b>Search for an item</b><br>
                    <input type="text" id="itemSearch" disabled
                        placeholder="Search coming soon...">
                </div>
            </td>
        </tr>
    </table>
<hr>
<div id="dropTableContainer"></div>

<style>
.shared-table-toggle { 
  cursor: pointer;
  color: #0066cc;
  text-decoration: underline;
}
.shared-table-toggle:hover {
  color: #004499;
}
</style>
HTML.getJavaScriptVersion('js/droptables/droptables.js');
    return ob_get_clean();
}