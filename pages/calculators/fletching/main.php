<?php
function getPageTitle() { return 'Fletching'; }
function getPageMetaIcon() { return 'img/skillicons/fletching.webp'; }
function getExtraHeaderContent() { return
    '<link rel="stylesheet" href="css/calculators.css">
    <script src="js/calculators.js"></script>';
}
function onBodyLoad() { return 'calculateFletching()'; }
function getCalcContent() { return <<<HTML
<h2>2004Scape Fletching Calculator</h2>
<div class="container">
    <label>Username:</label>
    <input type="text" id="username">
    <button onclick="fetchFletchingXP()">Fetch XP</button><br>
    <label>Current XP:</label>
    <input type="number" id="currentXP" min="0" max="200000000" value="0">
    
    <label>Desired Level:</label>
    <input type="number" id="targetLevel" min="2" max="99" value="99">
    
    <button onclick="calculateFletching()">Calculate</button><br>

    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar">0%</div>
    </div>

    <button onclick="setMode('complete')">Fletching & Stringing</button>
    <button onclick="setMode('unstrung')">Unstrung</button>
    <button onclick="setMode('stringing')">Stringing</button>
    <button onclick="setMode('arrows')">Arrows/Bolts</button>

    <div id="arrowSelection" style="display: none"><br>
        <label for="arrowType">Complete/Incomplete:</label>
        <select id="arrowType" onchange="calculateFletching()">
            <option value="completeArrows">Complete</option>
            <option value="incompleteArrows">Incomplete</option>
        </select>
    </div>

    <!-- Results Table -->
    <table id="resultsTable" class="calculators">
        <thead>
            <tr>
                <th>Level</th>
                <th>Item</th>
                <th>XP per Action</th>
                <th>Amount Needed</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script type="text/javascript" src="js/calculators/fletching.js"></script>
HTML; }