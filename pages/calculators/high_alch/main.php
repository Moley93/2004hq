<?php
function getPageTitle() { return 'High Alch'; }
function getPageMetaIcon() { return 'img/skillicons/magic.webp'; }
function getExtraHeaderContent() { return '<script type="text/javascript" src="js/calculators/high_alch.js"></script><script src="js/calculators.js"></script>'; }
function getCalcContent() { return <<<HTML
<h2>2004Scape High Alchemy Calculator</h2>
<div class="container">
    <div style="position: relative; display: inline-block;">
        <label>Item Search:</label>
        <input type="text" id="itemSearch" placeholder="Search item...">
        <div id="searchResults"></div>
    </div><br><br>
    <label>Quantity:</label>
    <input type="number" id="quantity" min="1" max="2147483647" value="1"><br>

    <label title="Enter the value of an item">Item Value:</label>
    <input type="number" id="itemValue" min="0" max="2147483647" value="0"><br>

    <label title="Enter the high alchemy value of an item">High Alch Value:</label>
    <input type="number" id="haValue" min="0" max="2147483647" value="0"><br>

    <label title="If you're using your own runes, enter 0">Nature Rune Price:</label>
    <input type="number" id="natureRunePrice" min="0" max="2147483647" value="0"><br>
    
    <button onclick="calculateAlchProfit()">Calculate</button>
    
    <h2>Total Profit: <span id="totalProfit" class="gold-text"></span></h2>
    <p>Profit from Alch: <span id="profitFromAlch" class="green-text"></span></p>
    <p>Cost of Nature Runes: <span id="costOfNatures" class="red-text"></span></p>
    <h2>Total Magic XP: <span id="totalMagicXP" class="gold-text"></span></h2>
</div>
HTML; }