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
                            <b>Select a monster</b><br>
                            <select id="npcSelect">
                                <option value="">Select NPC...</option>
                            </select>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td>&nbsp;&nbsp;&nbsp;</td>
        <td>
            <table width=215 height=70 cellpadding=4>
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
.shared-table-content { display: none; margin-left: 1em; }
.shared-table-toggle { cursor: pointer;}
</style>
<script src="js/droptables/droptables.js" type="text/javascript"></script>
HTML;
    return ob_get_clean();
}