<?php
function getPageContent() { 
    global $meta_data;
    $meta_data['title'] = 'Drop Tables';
    $meta_data['og:title'] = $meta_data['title'];
    $meta_data['og:image'] = 'img/skeleton.webp';
    ob_start();
    echo <<<HTML
<table>
    <tr>
        <td>
            <table width=215 height=70 cellpadding=4>
                <tr>
                    <td class=b bgcolor=#474747 background=img/stoneback.gif>
                        <div class="stone-box">
                            <b>Select an NPC</b><br>
                            <select id="npcSelect">
                                <option value="">Select NPC...</option>
                            </select>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table width=215 height=70 cellpadding=4>
                <tr>
                    <td class=b bgcolor=#474747 background=img/stoneback.gif>
                        <div class="stone-box">
                            <b>Ring of Wealth</b><br>
                            <label style="color: white;">
                                <input type="checkbox" id="ringOfWealthCheckbox" style="margin-right: 5px;">
                                Equipped
                            </label>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td>
            <table width=430 height=70 cellpadding=4>
                <tr>
                    <td class=b bgcolor=#474747 background=img/stoneback.gif>
                        <div class="stone-box">
                            <b>Search for an item</b><br>
                            <input type="text" id="itemSearch"
                                placeholder="Search...">
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
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
<script src="js/droptables/droptables.js" type="text/javascript"></script>
HTML;
    return ob_get_clean();
}