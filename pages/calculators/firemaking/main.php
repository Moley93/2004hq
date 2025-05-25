<?php
function getPageTitle() { return 'Firemaking'; }
function getPageMetaIcon() { return 'img/skillicons/firemaking.webp'; }

function getExtraHeaderContent() { return
    '<link rel="stylesheet" href="css/calculators.css">
    <script src="js/calculators.js"></script>';
}
function onBodyLoad() { return 'runCalc()'; }
function getCalcContent() { return <<<HTML
<h2>Firemaking Calculator</h2>
<div class="container">
    <div class="input-group">
        <label>Username</label>
        <input type="text" id="username">
        <button onclick="fetchXP(12)">Fetch XP</button>
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

    <!-- Results Table -->
    <table id="resultsTable" class="calculators">
        <thead>
            <tr>
                <th>Level</th>
                <th>Log Type</th>
                <th>XP per Log</th>
                <th>Logs Needed</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script type="text/javascript" src="js/calculators/firemaking.js"></script>
HTML; }