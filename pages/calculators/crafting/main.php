<?php
function getPageTitle() { return 'Crafting'; }
function getPageMetaIcon() { return 'img/skillicons/crafting.webp'; }
function getExtraHeaderContent() { return
    '<link rel="stylesheet" href="css/calculators.css">
    <script src="js/calculators.js"></script>';
}
function onBodyLoad() { return 'calculateCrafting()'; }
function getCalcContent() { return <<<HTML
<h2>2004Scape Crafting Calculator</h2>
<div class="container">
    <label>Username:</label>
    <input type="text" id="username">
    <button onclick="fetchCraftingXP()">Fetch XP</button><br>
    <label>Current XP:</label>
    <input type="number" id="currentXP" min="0" max="200000000" value="0">
    
    <label>Desired Level:</label>
    <input type="number" id="targetLevel" min="2" max="99" value="99">
    
    <button onclick="calculateCrafting()">Calculate</button>
    
    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar">0%</div>
    </div>

    <div>
        <button onclick="setMode('needle_thread')">Needle & Thread</button>
        <button onclick="setMode('jewellery')">Jewellery</button>
        <button onclick="setMode('pottery_glass')">Pottery/Glass</button>
        <button onclick="setMode('spinning')">Spinning</button>
    </div>
    
    <!-- Results Table -->
    <table id="resultsTable" class="calculators">
        <thead>
            <tr>
                <th>Level</th>
                <th>Item</th>
                <th>Exp per Item</th>
                <th>Total Needed</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script type="text/javascript" src="js/calculators/crafting.js"></script>
HTML; }