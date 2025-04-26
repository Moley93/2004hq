<?php
function getPageTitle() { return 'Herblore'; }
function getPageMetaIcon() { return 'img/skillicons/herblore.webp'; }
function getExtraHeaderContent() { return
    '<link rel="stylesheet" href="css/calculators.css">
    <script src="js/calculators.js"></script>';
}
function onBodyLoad() { return 'calculateHerblore()'; }
function getCalcContent() { return <<<HTML
<h2>Herblore Calculator</h2>
<div class="container">
    <label>Username:</label>
    <input type="text" id="username">
    <button onclick="fetchHerbloreXP()">Fetch XP</button><br>
    <label>Current XP:</label>
    <input type="number" id="currentXP" min="0" max="200000000" value="0">
    
    <label>Desired Level:</label>
    <input type="number" id="targetLevel" min="2" max="99" value="99">
    
    <button onclick="calculateHerblore()">Calculate</button>
    
    <div class="progress-container">
        <div class="progress-bar" id="progressBar">0%</div>
    </div>

    <div>
        <button onclick="setMode('complete_potions')">Complete Potions</button>
        <button onclick="setMode('cleaning_herbs')">Cleaning Herbs</button>
        <button onclick="setMode('unfinished_potions')">Unfinished Potions</button>
    </div>
    
    <table id="resultsTable" class="calculators">
        <thead>
            <tr>
                <th>Level</th>
                <th>Item</th>
                <th>XP Gained</th>
                <th>Total Needed</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script type="text/javascript" src="js/calculators/herblore.js"></script>
HTML; }