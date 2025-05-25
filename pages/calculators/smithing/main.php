<?php
function getPageTitle() { return 'Smithing'; }
function getPageMetaIcon() { return 'img/skillicons/smithing.webp'; }
function getExtraHeaderContent() { return
    '<link rel="stylesheet" href="css/calculators.css">
    <script src="js/calculators.js"></script>';
}
function onBodyLoad() { return 'runCalc()'; }
function getCalcContent() { return <<<HTML
<h2>Smithing Calculator</h2>
<div class="container">
    <div class="input-group">
        <label>Username</label>
        <input type="text" id="username">
        <button onclick="fetchXP(14)">Fetch XP</button>
    </div>
    <div class="input-group">
        <label>Current XP</label>
        <input type="number" id="currentXP" min="0" max="200000000" value="0">
        <label>Desired Level</label>
        <input type="number" id="targetLevel" min="2" max="99" value="2">
    </div>
    <div class="input-group justify-center">
        <button onclick="runCalc()">Calculate!</button>
    </div>
    <div style="width:90%; margin: 0 auto;">
        <div class="progress-container">
            <div class="progress-bar" id="progressBar"></div>
            <div class="progress-text" id="progressText"></div>
        </div>
    </div><hr>

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