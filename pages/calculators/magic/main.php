<?php
function getPageTitle() { return 'Magic'; }
function getPageMetaIcon() { return 'img/skillicons/magic.webp'; }
function getExtraHeaderContent() { return
    '<link rel="stylesheet" href="css/calculators.css">
    <script src="js/calculators.js"></script>';
}
function onBodyLoad() { return 'runCalc()'; }
function getCalcContent() { return <<<HTML
<h2>Magic Calculator</h2>
<div class="container">
    <div class="input-group">
        <label>Username</label>
        <input type="text" id="username">
        <button onclick="fetchXP(7)">Fetch XP</button>
    </div>
    <div class="input-group">
        <label>Current XP</label>
        <input type="number" id="currentXP" min="0" max="200000000" value="0">
    </div>
    <div class="input-group">
        <label>Goal Level</label>
        <input type="number" id="targetLevel" min="2" max="99" value="2">
        <label>Goal XP</label>
        <input type="number" id="targetXP" min="0" max="200000000" value="83">
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
    <button onclick="setMode('combat')">Combat Spells</button>
    <button onclick="setMode('noncombat')">Non-Combat Spells</button>
    <br><br>
    <!-- Results Table -->
    <table id="resultsTable" class="calculators" width="100%">
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
<script type="text/javascript" src="js/calculators/magic.js"></script>
HTML; }