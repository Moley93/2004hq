<?php
function getPageTitle() { return 'Drop Tables'; }
function getPageMetaIcon() { return 'img/skillicons/agility.webp'; }
function getPageContent() { return <<<HTML
<div style="LEFT: 0px; TOP: 0px; WIDTH: 600px; POSITION: relative;">
    <table width="600" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td valign="bottom">
                <center>
                    <br>
                    <br>
                    <table width="250" bgcolor="black" cellpadding="4">
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
                                <table width=215 height=70 bgcolor=black cellpadding=4>
                                    <tr>
                                        <td class=b bgcolor=#474747>
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
                                <table width=215 height=70 bgcolor=black cellpadding=4>
                                    <tr>
                                        <td class=b bgcolor=#474747>
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
                                <table width=215 height=70 bgcolor=black cellpadding=4>
                                    <tr>
                                        <td class=b bgcolor=#474747>
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
                                <table width=215 height=70 bgcolor=black cellpadding=4>
                                    <tr>
                                        <td class=b bgcolor=#474747>
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
                    <table width="500" bgcolor="black" cellpadding="2">
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
        <a href="#" class="whitelink" onclick="showHowToUse(); return false;">How to
            Use</a>
        <span style="margin: 0 5px;">|</span>
        <label class="switch">
            <input type="checkbox" id="saveSettingsToggle" checked>
            <span class="slider round"></span>
        </label>
        <span class="toggle-label">Save Settings</span>
        <span style="margin: 0 5px;">|</span>
        <a href="https://x.com/thesneilert" class="whitelink">Made by Eilert</a>
        <br>
        <br>
    </div>
</div>
HTML; } ?>