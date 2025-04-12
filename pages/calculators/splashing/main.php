<?php
function getPageTitle() { return 'Splashing'; }
function getPageMetaIcon() { return 'img/skillicons/magic.webp'; }
function getExtraHeaderContent() { return '<script type="text/javascript" src="js/calculators/splashing.js"></script><script src="js/calculators.js"></script>'; }
function onBodyLoad() { return 'calculateSplashing()'; }
function getCalcContent() { return <<<HTML
<h2>2004Scape Splashing Calculator</h2>
<div class="container">
    <label>Username:</label>
    <input type="text" id="username">
    <button onclick="fetchMagicXP()">Fetch XP</button><br>
    <label>Current XP:</label>
    <input type="number" id="currentXP" min="0" max="200000000" value="0">
    
    <label>Desired Level:</label>
    <input type="number" id="targetLevel" min="2" max="99" value="99">
    
    <button onclick="calculateSplashing()">Calculate</button>

    <br>

    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar">0%</div>
    </div>

    <!-- Results Table -->
    <table id="resultsTable">
        <thead>
            <tr>
                <th>Level</th>
                <th>Spell Type</th>
                <th>XP per Cast</th>
                <th>Casts Needed</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
HTML; }