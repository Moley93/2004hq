<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>$questName</h2>
<b>Description:</b> Become one with your darker side. Tap into your hidden depths of magical potential by making a potion with the help of Hetty the Rimmington witch.
<br><br>
<b>Difficulty: <font color="Green">Novice</font></b>
<br><br>
<b>Length: <font color="Green">Short</font></b><br>
<h3>Items & Skills Needed:</h3>
<ul style="list-style-type: none;">
<li><div data-progress><canvas data-itemname="burnt_meat" data-size="25" data-show-label="inline"></canvas></div><br></li>
<li><div data-progress><canvas data-itemname="eye_of_newt" data-size="25"></canvas>Eye of newt (or 300 coins to purchase)</div><br></li>
<li><div data-progress><canvas data-itemname="onion" data-size="25" data-show-label="inline"></canvas></div><br></li>
</ul>
<b>Starting Location:</b> Rimmington
<br><br>
<b>Reward:</b> 1 Quest point, 325 Magic XP
<br><br>
<hr>
<h3>Instructions:</h3>
<br>
<div data-progress>Talk to the witch Hetty, and she will tell you about getting the ingredient for the cauldron. You will need four items: an onion, burnt meat, an eye of newt, and a rat tail.</div>
<br><br>
<div data-progress>An onion can be found northwest of Rimmington. When you find the place, pick one.</div>
<br><br>
<div data-progress>Burnt meat: You will need either burnt rat meat or burnt bear meat. I would suggest rat meat. Just go east of the village and you will find some big rats. Kill one and get the meat. Return to the village. Go to the house north of Hetty's. Use the meat on the range. If you have cooked it successfully, use the cooked meat on the range again. You will get a burnt meat.</div>
<br><br>
<div data-progress>Rat tail: Just kill one of the rats in this village, and it will drop a rat tail. You must start the quest before killing the rat.</div>
<br><br>
<div data-progress>After getting the ingredients, return to Hetty's house and talk to her. She will tell you the cauldron is done and ask you to drink it. Click on the cauldron to drink it, and the quest is finished.</div>
$questComplete
This quest guide was written on RuneHQ by Henry-X. Thanks to Weezy and Corruptus for corrections.
<br><br>
This quest guide was entered into the database on Sat, Feb 07, 2004, at 12:00:31 PM by Chownuggs and was last updated on Thu, Apr 22, 2004, at 02:44:28 PM.
HTML; }