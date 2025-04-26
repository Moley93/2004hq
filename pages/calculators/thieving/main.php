<?php
function getPageTitle() { return 'Thieving'; }
function getPageMetaIcon() { return 'img/skillicons/thieving.webp'; }
function getExtraHeaderContent() { return
    '<link rel="stylesheet" href="css/calculators.css">
    <script src="js/calculators.js"></script>';
}
function onBodyLoad() { return 'calculateThieving()'; }
function getCalcContent() { return <<<HTML
<h2>Thieving Calculator</h2>
<div class="container">
    <label>Username:</label>
    <input type="text" id="username">
    <button onclick="fetchThievingXP()">Fetch XP</button><br>
    <label>Current XP:</label>
    <input type="number" id="currentXP" min="0" max="200000000" value="0">
    
    <label>Desired Level:</label>
    <input type="number" id="targetLevel" min="2" max="99" value="99">
    
    <button onclick="calculateThieving()">Calculate</button>

    <br>

    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar">0%</div>
    </div>

    <button onclick="setMode('npcs')">NPCs</button>
    <button onclick="setMode('stalls')">Stalls</button>
    <button onclick="setMode('chests')">Chests</button>

    <!-- Results Table -->
    <table id="resultsTable" class="calculators">
        <thead>
            <tr>
                <th>Level</th>
                <th>Source</th>
                <th>XP per Theft</th>
                <th>Actions Needed</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script type="text/javascript" src="js/calculators/thieving.js"></script>
HTML; }