<?php
function getPageTitle() { return 'Woodcutting'; }
function getPageMetaIcon() { return 'img/skillicons/woodcutting.webp'; }
function onBodyLoad() { return 'runCalc()'; }
function getCalcContent() { return <<<HTML
<h2>Woodcutting Calculator</h2>
<div class="container">
    <div class="input-group">
        <label>Username</label>
        <input type="text" id="username">
        <button onclick="fetchXP(9)">Fetch XP</button>
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
    <div class="progress-bar-root" id="progress-bar-root"></div>
    <hr>
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
HTML.getJavaScriptVersion('js/calculators/woodcutting.js'); }