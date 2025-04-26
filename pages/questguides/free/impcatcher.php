<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
<br>
Description: Wizard Mizgog has lost his beads because Wizard Grayzag summoned many imps and stole them. Can you help Wizard Mizgog?<br>
<br>
<b>Difficulty Level: <font color="Green">Easy</font></b><br>
<br>
<b>Length: <font color="Green">Short</font>/<font color="Yellow">Medium</font></b><br>
<br>
Items/Skills Needed To Start: None<br>
<br>
Starting Location: <span data-floors="US">3rd floor</span> of the Wizard's Tower south of Draynor Village<br>
<br>
Reward: 375 Magic XP, 1 Quest Point, and an Amulet of Accuracy (+4 weapon accuracy).<br>
<br>
<input type="checkbox"> Talk to Wizard Mizgog. He will tell you that he has lost his beads — red, white, black, and yellow. He will also tell you that Wizard Grayzag's imp stole the beads. Tell him that you will return them.<br>
<br>
<input type="checkbox"> You can find some imps near the room where you are. Kill them to get the beads. Be patient — imps don't usually drop them. If you don't want to kill imps, don't worry — you can also buy the beads from other players. That will save you a lot of time.<br>
<br>
<input type="checkbox"> After you have collected all the beads, return to Wizard Mizgog. He will reward you.<br>
$questComplete
This quest guide was written on RuneHQ by henry-x.<br>
<br>
This quest guide was entered into the database on Tue, Mar 02, 2004, at 10:25:33 PM by Weezy and was last updated on Wed, Mar 31, 2004, at 05:13:34 PM.
<br>
HTML; }