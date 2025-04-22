<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<br>
Gnome Agility Course<br>
<br>
<img src="2004hq\img\skill_guides\agility_gnome.png" width="250" height="250">

<table class="calculators">
        <tr>
            <th>Level</th>
            <th>Obstacle</th>
            <th>EXP</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Log</td>
            <td>7.5</td>
        </tr>
        <tr>
            <td>1</td>
            <td>First Net</td>
            <td>7.5</td>
        </tr>
        <tr>
            <td>1</td>
            <td>First Tree Branch</td>
            <td>5.0</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Tight Rope</td>
            <td>7.5</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Second Tree Branch</td>
            <td>5.0</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Second Net</td>
            <td>7.5</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Pipes</td>
            <td>7.5</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Completed Lap</td>
            <td>86.0</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Course Total</td>
            <td>133.5</td>
        </tr>
    </table>

    <img src="https://web.archive.org/web/20040606063634im_/http://www.runescape.com/img/rs2/manual/logbalance.jpg" width="250" height="250">
</p>
HTML; }