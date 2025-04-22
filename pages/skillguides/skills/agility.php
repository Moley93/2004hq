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
<img src="img/skill_guides/agility_gnome.png" width="250" height="250"><br>
<br>
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
    <br>
    <br>
<b><font color="Green">Barbarians' Course</font></b><br>
<br>
Located right at the top of the World, you will have to go far North from Ardougne and past Baxtorian falls to access the Barbarian Outpost where this course is at. To enter the outpost, you must have completed the Bar Crawl. To then enter the agility course you must squeeze through the Pipe which requires level 35 agility.<br>
<br>
But the crucial difference with this course is that you could get hit damage if you fail crossing the obstacle and fall in the spikes or the pond. This is usually a small amount and depends on your maximum hits so you will never get killed. However it is a good idea to bring food with you.<br>
<br>
Move through the course in the order explained below:<br>
<br>
Swing over the spikes via the rope swing (could fall into the spikes).<br>
Balance over the pond by walking across the log (could slip into the pond).<br>
Climb the net to enter this building.<br>
Edge over the spikes by walking across the ledge (could fall into the spikes).<br>
Now jump over each of these three crumbling walls.<br>
Congratulations on completing a whole lap! Heres how the xp works for this course.<br>
<br>
<img src="img/skill_guides/agility_barb.png" width="250" height="250"><br>
<br>
<table class="calculators">
        <tr>
            <th>Level</th>
            <th>Obstacle</th>
            <th>EXP</th>
        </tr>
        <tr>
            <td>35</td>
            <td>Pipe</td>
            <td>10.0</td>
        </tr>
        <tr>
            <td>35</td>
            <td>Rope Swing</td>
            <td>20</td>
        </tr>
        <tr>
            <td>35</td>
            <td>Log</td>
            <td>12.5</td>
        </tr>
        <tr>
            <td>35</td>
            <td>Net</td>
            <td>7.5</td>
        </tr>
        <tr>
            <td>35</td>
            <td>Ledge</td>
            <td>20.0</td>
        </tr>
        <tr>
            <td>35</td>
            <td>Crumbling Wall</td>
            <td>12.5</td>
        </tr>
        <tr>
            <td>35</td>
            <td>Completed Lap</td>
            <td>139.5</td>
        </tr>
        <tr>
            <td>35</td>
            <td>Course Total</td>
            <td>222</td>
        </tr>
    </table>
HTML; }