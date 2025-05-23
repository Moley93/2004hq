<?php
function getPageTitle() { return 'Agility'; }
function getPageMetaIcon() { return 'img/skillicons/agility.webp'; }
function getExtraHeaderContent() { return
    '<link rel="stylesheet" href="css/calculators.css">
    <script src="js/calculators.js"></script>';
}
function onBodyLoad() { return 'calculateLaps()'; }
function getCalcContent() { return <<<HTML
<h2>Agility Calculator</h2>
<div class="container">
    <div class="input-group">
        <label>Username</label>
        <input type="text" id="username">
        <button onclick="fetchAgilityXP()">Fetch XP</button>
    </div>
    <div class="input-group">
        <label>Current XP</label>
        <input type="number" id="currentXP" min="0" max="200000000" value="0">
        <label>Desired Level</label>
        <input type="number" id="targetLevel" min="2" max="99" value="2">
    </div>
    <div class="input-group">
        <button onclick="calculateLaps()">Calculate!</button>
    </div>
    <div style="width:90%; margin: 0 auto;">
        <div class="progress-container">
            <div class="progress-bar" id="progressBar"></div>
            <div class="progress-text" id="progressText"></div>
        </div>
    </div><hr>

    <table id="courseTable" class="calculators" width="100%">
        <thead>
            <tr>
                <th>Level</th>
                <th>Course</th>
                <th>XP per Lap</th>
                <th>Laps Needed</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <br>
    <table id="shortcutTable" class="calculators" width="100%">
        <thead>
            <tr>
                <th>Level</th>
                <th>Shortcut</th>
                <th>XP per Action</th>
                <th>Actions Needed</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script type="text/javascript" src="js/calculators/agility.js"></script>
HTML; }