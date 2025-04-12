<?php
function getPageTitle() { return 'Prayer'; }
function getPageMetaIcon() { return 'img/skillicons/prayer.webp'; }
function getExtraHeaderContent() { return '<script type="text/javascript" src="js/calculators/prayer.js"></script><script src="js/calculators.js"></script>'; }
function onBodyLoad() { return 'calculateBones()'; }
function getCalcContent() { return <<<HTML
<h2>2004Scape Prayer Calculator</h2>
<div class="container">
    <label>Username:</label>
    <input type="text" id="username">
    <button onclick="fetchPrayerXP()">Fetch XP</button><br>
    <label>Current XP:</label>
    <input type="number" id="currentXP" min="0" max="200000000" value="0">
    
    <label>Desired Level:</label>
    <input type="number" id="targetLevel" min="2" max="99" value="43">
    
    <button onclick="calculateBones()">Calculate</button>
    
    <br>

    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar">0%</div>
    </div>

    <!-- Results Table -->
    <table id="resultsTable">
        <thead>
            <tr>
                <th>Bone Type</th>
                <th>XP per Bone</th>
                <th>Bones Needed</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
HTML; }