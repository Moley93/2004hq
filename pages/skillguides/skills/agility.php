<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<br>
<b><font color="Green">Gnomes' Course</font></b><br>
<br>
Located in the Gnomes' Stronghold North West of Ardougne, this is where you will have to start to train initially. You will see Gnome trainers around the course encouraging you to go faster and also ready to help you out with any questions.<br>
<br>
Move through the course in the order explained below:<br>
<br>
Slowly walk across the log to start the course.<br>
Climb the net to end up in the tree.<br>
Climb the tree branch to the next level of the tree.<br>
Balance across the tight rope to get to the other side.<br>
Climb down this tree branch to get back to the ground.<br>
Climb over this net, almost at the end now.<br>
Crawl through these pipes to end up on the other side.<br>
Congratulations on completing a whole lap! Heres how the xp works for this course.<br>
<br>
<img src="img/skill_guides/agility_gnome.png" width="250" height="250">

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
</p>
HTML; }