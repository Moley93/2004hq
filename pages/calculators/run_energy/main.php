<?php
function getPageTitle() { return 'Run Energy'; }
function getPageMetaIcon() { return 'img/skillicons/agility.webp'; }
function getExtraHeaderContent() { return
    '<link rel="stylesheet" href="css/calculators.css">
    <script src="js/calculators.js"></script>';
}
function onBodyLoad() { return 'runCalc()'; }
function getCalcContent() { return <<<HTML
<h2>Run Energy Restore Calculator</h2>
<div class="container">
    <div class="input-group">
        <label>Agility Level:</label>
        <input type="number" id="agilityLevel" min="1" max="99" value="1">
        <label>Current Run (%):</label>
        <input type="number" id="currentRunEnergy" min="0" max="100" value="10">
    </div>
    <hr>
    <h3>Time to Restore 1% Energy:<br><span id="restorePerPercent" class="gold-text"></span></h3>
    <h3>Time to Restore to 100%:<br><span id="restoreTime" class="gold-text"></span></h3>
    <h3>~% Energy Restored per Minute:<span id="restoreOneMinute" class="gold-text"></span></h3>
    <br>
</div>
<script type="text/javascript" src="js/calculators/run_energy.js"></script>
HTML; }