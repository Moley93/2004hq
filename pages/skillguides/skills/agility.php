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
<b><font color="Orange">Barbarians' Course</font></b><br>
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
    <br>
    <br>
<b><font color="Red">Wilderness Course</font></b><br>
<br>
Located deep in the members' area of the wilderness (level 52 and up) you will require level 52 agility to cross the initial ridge to gain access to this area. However sometimes you will still fail and fall into the pit of White Wolves. PKers do often come by to attack, so taking this risk is up to you - but the xp reward per lap is much great (look at the table below).<br>
<br>
You are also at risk here from failing obstacles and if you fall into the spike pit, you will have to climb the ladder out of the dungeon of skeletons. Either way, don't forget to bring food with you and any armour and weapons you might wish to defend yourself with.<br>
<br>
Move through the course in the order explained below:<br>
<br>
Crawl through the pipe to get to the other side.<br>
Swing over using the Rope Swing (could fall into spikes).<br>
Traverse the lava by slowly walking over the stepping stones (could fall into the lava).<br>
Balance over this pit by walking across the log (could fall into spikes).<br>
Now walk past some skeletons and climb up the rocks to finish.<br>
Congratulations on completing a whole lap! Heres how the xp works for this course.<br>
<br>
<img src="img/skill_guides/agility_wild.png" width="250" height="250"><br>
<br>
<table class="calculators">
        <tr>
            <th>Level</th>
            <th>Obstacle</th>
            <th>EXP</th>
        </tr>
        <tr>
            <td>52</td>
            <td>Ridge</td>
            <td>15.0</td>
        </tr>
        <tr>
            <td>52</td>
            <td>Pipe</td>
            <td>12.5</td>
        </tr>
        <tr>
            <td>52</td>
            <td>Rope Swing</td>
            <td>20.0</td>
        </tr>
        <tr>
            <td>52</td>
            <td>Stepping Stones</td>
            <td>20.0</td>
        </tr>
        <tr>
            <td>52</td>
            <td>Log</td>
            <td>20.0</td>
        </tr>
        <tr>
            <td>52</td>
            <td>Rocks</td>
            <td>0</td>
        </tr>
        <tr>
            <td>52</td>
            <td>Completed Lap</td>
            <td>571.5</td>
        </tr>
        <tr>
            <td>52</td>
            <td>Course Total</td>
            <td>659</td>
        </tr>
    </table>
    <br>
    <br>
    <b><font color="Yellow">Other Obstacles</font></b><br>
    <table class="calculators">
        <tr>
            <th>Level</th>
            <th>Obstacle</th>
            <th>EXP</th>
            <th>Info</th>
        </tr>
        <tr>
            <td>5</td>
            <td>Crumbling Wall</td>
            <td>15.0</td>
            <td>This shortcut allows you to cross over from Taverly to Falador (but not back). This is located just behind West Falador bank.</td>
        </tr>
        <tr>
            <td>15</td>
            <td>Monkey Bars</td>
            <td>20</td>
            <td>This obstacle allows you to access an area of the wilderness area of Edgeville dungeon where you can fight with Earth Warriors.</td>
        </tr>        
        <tr>
            <td>20</td>
            <td>Log</td>
            <td>8.5</td>
            <td>This shortcut allows you to cross over from the Coal Trucks eastwards towards Seers' Village. Very useful.</td>
        </tr>
    </table>
HTML; }