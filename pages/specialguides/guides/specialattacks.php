<?php
function getSpecialGuide($currSpecialGuide) { return <<<HTML
<h2>$currSpecialGuide</h2>
Some weapons in RuneScape have special attacks available for them. There are many types of special attacks, from temporary boosts in stats, to strikes dealing extra damage.
<br><br>
<img src="img/special_guides/specialattacks/special_attack_bar.gif">
<br><br>
They are activated by the player by clicking on the special attack bar under the Combat Options interface. Special attacks have an energy bar that is drained when you use the attack; this is drained of varying amounts according to which weapon is used. The special energy bar regenerates at rate of 10% every 30 seconds, requiring 5 minutes to regenerate from empty to full.
<br><br>
<table class="calculators">
    <tr>
        <th>Item with Special Attack</th>
        <th>Special Attack Energy</th>
        <th>Picture</th>
    </tr>
    <tr>
        <td><canvas data-itemname="dragon_battleaxe" data-show-label="true"></canvas></td>
        <td>100%</td>
        <td><img src="img/special_guides/specialattacks/dragonbattleaxe.gif"></td>
    </tr>
    <tr>
        <th>Effect</th>
        <td colspan="3">+20% strength, -10% attack, -10% defense, -10% magic, -10% ranged</td>
    </tr>
    <tr>
        <td><canvas data-itemname="dragon_dagger" data-show-label="true"></canvas></td>
        <td>25%</td>
        <td><img src="img/special_guides/specialattacks/dragondagger.gif"></td>
    </tr>
    <tr>
        <th>Effect</th>
        <td colspan="2">2 Quick Strikes, Increased Accuracy and Damage</td>
    </tr>
    <tr>
        <td><canvas data-itemname="dragon_longsword" data-show-label="true"></canvas></td>
        <td>25%</td>
        <td><img src="img/special_guides/specialattacks/dragonlongsword.gif"></td>
    </tr>
    <tr>
        <th>Effect</th>
        <td colspan="2">Increased Accuracy and Damage</td>
    </tr>
    <tr>
        <td><canvas data-itemname="dragon_mace" data-show-label="true"></canvas></td>
        <td>25%</td>
        <td><img src="img/special_guides/specialattacks/dragonmace.gif"></td>
    </tr>
    <tr>
        <th>Effect</th>
        <td colspan="2">High Power and Reduced Accuracy</td>
    </tr>
    <tr>
        <td><canvas data-itemname="dragon_spear" data-show-label="true"></canvas></td>
        <td>25%</td>
        <td><img src="img/special_guides/specialattacks/dragonspear.gif"></td>
    </tr>
    <tr>
        <th>Effect</th>
        <td colspan="2">Stuns opponent for 4 seconds and also pushes them back a square</td>
    </tr>
    <tr>
        <td><canvas data-itemname="excalibur" data-show-label="true"></canvas></td>
        <td>100%</td>
        <td><img src="img/special_guides/specialattacks/excalibur.gif"></td>
    </tr>
    <tr>
        <th>Effect</th>
        <td colspan="2">+10% Defense</td>
    </tr>
    <tr>
        <td><canvas data-itemname="magic_shortbow" data-show-label="true"></canvas></td>
        <td>35%</td>
        <td><img src="img/special_guides/specialattacks/magicshortbow.gif"></td>
    </tr>
    <tr>
        <th>Effect</th>
        <td colspan="2">2 Rapid Shots, Reduced Accuracy</td>
    </tr>
    <tr>
        <td><canvas data-itemname="magic_longbow" data-show-label="true"></canvas></td>
        <td>35%</td>
        <td><img src="img/special_guides/specialattacks/magiclongbow.gif"></td>
    </tr>
    <tr>
        <th>Effect</th>
        <td colspan="2">Highly increases accuracy, but it isnt a guaranteed hit</td>
    </tr>
</table>
HTML; }