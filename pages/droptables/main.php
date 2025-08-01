<?php
function getExtraHeaderContent() { return getCSSVersion('css/droptables.css'); }
function getPageContent() {
    global $meta_data;
    $meta_data['title'] = 'Drop Tables';
    $meta_data['og:title'] = $meta_data['title'];
    $meta_data['og:image'] = 'img/skeleton.webp';
    


    ob_start();
    echo <<<HTML
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td valign="bottom">
                <center>
                    <table width="250" cellpadding="4">
                        <tr>
                            <td class="e">
                                <center>
                                    <b>Drop Tables</b>
                                </center>
                            </td>
                        </tr>
                    </table>
                    <!-- Loading Spinner -->
                    <br>
                    <div id="loader" class="loader hidden"></div>
                    <div id="loadingText" class="loading-text hidden">Loading drop tables...
                        <br>Please hold tight, good things take time!
                    </div>
                    <!-- Membership and Rarity Toggles Side by Side -->
                    <table>
                        <tr>
                            <td>
                                <table width=215 height=70 cellpadding=4>
                                    <tr>
                                        <td class=b bgcolor=#474747 background=img/stoneback.gif>
                                            <div class="stone-box">
                                                <b>Sort by</b><br>
                                                <select id="sortToggle"
                                                    onchange="toggleSort()">
                                                    <option value="asc">Most Common First</option>
                                                    <option value="desc">Most Rare First</option>
                                                    <option value="name-asc">Name (A-Z)</option>
                                                    <option value="name-desc">Name (Z-A)</option>
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
                                                <b>Membership</b><br>
                                                <select id="membershipToggle"
                                                    onchange="toggleMembership()">
                                                    <option value="all">All</option>
                                                    <option value="f2p">Free-to-Play</option>
                                                    <option value="p2p">Members</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <!-- Search Bar and Dropdown in Stone Boxes -->
                    <table>
                        <tr>
                            <td>
                                <table width=215 height=70 cellpadding=4>
                                    <tr>
                                        <td class=b bgcolor=#474747 background=img/stoneback.gif>
                                            <div class="stone-box">
                                                <b>Search for an item</b><br>
                                                <input type="text" id="searchInput"
                                                    placeholder="Search..." oninput="searchItems()"
                                                    autocomplete="off" disabled>
                                                <div id="searchResults" class="search-results"></div>
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
                                                <b>Select a monster</b><br>
                                                <select id="monsterDropdown"
                                                    onchange="loadDropTable()" disabled>
                                                    <option value="">Select...</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <!-- Drop Table -->
                    <table width="100%" cellpadding="2">
                        <tr>
                            <td class="e">
                                <table width="100%" cellspacing="4" cellpadding="8" id="dropTable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Drop table rows will be populated here -->
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br>
                </center>
            </td>
        </tr>
    </table>
    <!-- Footer with edge images -->
    <div style="text-align:center; font-family:Arial,Helvetica,sans-serif; font-size:11px;">
        <br>
        <a href="#" class="toggle-green" onclick="showHowToUse(); return false;">How to
            Use</a>
        <span style="margin: 0 5px;">|</span>
        <label class="switch">
            <input type="checkbox" id="saveSettingsToggle" checked>
            <span class="slider round"></span>
        </label>
        <span class="toggle-label">Save Settings</span>
        <br>
        <br>
    </div>
    <script src="pages/droptables/droptables.js" type="text/javascript"></script>
HTML;
    return ob_get_clean();
}