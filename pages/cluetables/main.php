<?php
function getExtraHeaderContent() { return '<link rel="stylesheet" href="css/droptables.css">'; }
function getPageContent() {
    global $meta_data;
    $meta_data['title'] = 'Clue Tables';
    $meta_data['og:title'] = $meta_data['title'];
    $meta_data['og:image'] = 'img/clueicon.png';

    return <<<HTML
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td valign="bottom">
                <center>
                    <table width="250" cellpadding="4">
                        <tr>
                            <td class="e">
                                <center>
                                    <b>Clue Tables</b>
                                </center>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div id="loader" class="loader hidden"></div>
                    <div id="loadingText" class="loading-text hidden">Loading clue tables...
                        <br>Please hold tight, good things take time!
                    </div>
                    <br>
                    <table>
                        <tr>
                            <td>
                                <table width=215 height=70 cellpadding=4>
                                    <tr>
                                    <td class=b bgcolor=#474747 background=img/stoneback.gif>
                                            <div class="stone-box">
                                                <b>Select a Clue Tier</b><br>
                                                <select id="clueDropdown" disabled>
                                                    <option value="">Select...</option>
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
                                                <input type="text" id="searchInput" placeholder="Search..." autocomplete="off" disabled>
                                                <div id="searchResults" class="search-results"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br>
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

    <script src="pages/cluetables/cluetables.js"></script>
    <script>
    // Enable column sorting
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll("#dropTable th").forEach((header, colIndex) => {
            let ascending = true;
            header.style.cursor = "pointer";
            header.addEventListener("click", () => {
                const tbody = document.querySelector("#dropTable tbody");
                const rows = Array.from(tbody.querySelectorAll("tr"));

                rows.sort((a, b) => {
                    const cellA = a.children[colIndex].textContent.trim();
                    const cellB = b.children[colIndex].textContent.trim();

                    const valA = isNaN(cellA) ? cellA.toLowerCase() : parseFloat(cellA);
                    const valB = isNaN(cellB) ? cellB.toLowerCase() : parseFloat(cellB);

                    return ascending ? (valA > valB ? 1 : -1) : (valA < valB ? 1 : -1);
                });

                tbody.innerHTML = "";
                rows.forEach(row => tbody.appendChild(row));
                ascending = !ascending;
            });
        });
    });
    </script>
HTML;
} ?>