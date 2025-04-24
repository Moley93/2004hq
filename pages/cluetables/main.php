<?php
function getExtraHeaderContent() { return '<link rel="stylesheet" href="css/droptables.css">'; }
function getPageContent() {
    global $meta_data;
    $meta_data['title'] = 'Clue Tables';
    $meta_data['og:title'] = $meta_data['title'];
    $meta_data['og:image'] = 'img/clueicon.png';

    return <<<HTML
<h2>Clue Tables</h2>
<p>Please note that the rates listed here are per casket opened, not per roll.</p>
<hr>
<div id="loader" class="loader hidden"></div>
<div id="loadingText" class="loading-text hidden">Loading clue tables...
    <br>Please hold tight, good things take time!
</div>
<table>
    <tr>
        <td>
            <table width=215 height=70 cellpadding=4>
                <tr>
                    <td class=b bgcolor=#474747>
                        <div class="stone-box">
                            <b>Select a Clue Tier</b>
                            <label><input type="radio" name="clueTier" value="easy" checked> Easy</label>
                            <label><input type="radio" name="clueTier" value="medium"> Medium</label>
                            <label><input type="radio" name="clueTier" value="hard"> Hard</label>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td>&nbsp;&nbsp;</td>
        <td>
            <table width=215 height=70 cellpadding=4>
                <tr>
                    <td class=b bgcolor=#474747>
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
<table width="100%" class="calculators" id="dropTable">
    <thead>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Rate</th>
        </tr>
    </thead>
    <tbody>
        <!-- Drop table rows will be populated here -->
    </tbody>
</table>
<script src="pages/cluetables/cluetables.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");

        if (!listenersInitialized) {

            searchInput.disabled = false;
            searchInput.addEventListener("input", loadDropTable);


            const radios = document.querySelectorAll('input[name="clueTier"]');
            radios.forEach(radio => {
                radio.addEventListener("change", loadDropTable);
            });

            listenersInitialized = true;

            loadDropTable();
        }
    });
</script>

HTML;} ?>