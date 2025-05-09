<?php
function getPageTitle() { return 'Smithing'; }
function getPageMetaIcon() { return 'img/skillicons/smithing.webp'; }
function getExtraHeaderContent() { return
    '<link rel="stylesheet" href="css/calculators.css">
    <script src="js/calculators.js"></script>';
}
function onBodyLoad() { return 'calculateSmithing()'; }
function getCalcContent() { return <<<HTML
<h2>Smithing Calculator</h2>
<div class="container">
    <label>Username:</label>
    <input type="text" id="username">
    <button onclick="fetchSmithingXP()">Fetch XP</button><br>
    <label>Current XP:</label>
    <input type="number" id="currentXP" min="0" max="200000000" value="0">
    
    <label>Desired Level:</label>
    <input type="number" id="targetLevel" min="2" max="99" value="99">
    
    <button onclick="calculateSmithing()">Calculate</button>
    
    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar">0%</div>
    </div>

    <div>
        <button onclick="setMode('smelting_bars')">Smelting & Smithing</button>
        <button onclick="setMode('bars')">Smithing</button>
        <button onclick="setMode('smelting')">Smelting</button>
    </div>
    
    <div id="metalSelection"><br>
        <label for="metalType">Select Metal:</label>
        <select id="metalType" onchange="calculateSmithing()">
            <option value="bronze">Bronze</option>
            <option value="iron">Iron</option>
            <option value="steel">Steel</option>
            <option value="mithril">Mithril</option>
            <option value="adamant">Adamant</option>
            <option value="rune">Rune</option>
        </select>
    </div>
    
    <!-- Results Table -->
    <table id="resultsTable" class="calculators">
        <thead>
            <tr>
                <th>Level</th>
                <th>Item</th>
                <th>XP per Smelt</th>
                <th>Total Bars</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script type="text/javascript" src="js/calculators/smithing.js"></script>
HTML; }