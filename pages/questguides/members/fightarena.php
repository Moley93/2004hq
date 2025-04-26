<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
<br>
Description: The Servil family has been broken up by the evil General Khazard. Reunite the family and ultimately defeat the General.<br>
<br>
<b>Difficulty Level: <font color="red">Hard</font></b><br>
<br>
<b>Length: <font color="Green">Short</font></b><br>
<br>
Items/Skills Needed To Start: <input type="checkbox"> 5 coins, a good weapon, and armor are a MUST. You must also be able to defeat a level 132 Bouncer and level 112 General Khazard.<br>
<br>
Starting Location: Lady Servil is southeast of the Gnome Battlefield, on the northwest edge of the arena camp<br>
<br>
Reward: 1,000 coins, 3,375 Thieving XP, 12,175 Attack XP<br>
<br>
<b>Instructions:</b><br>
<input type="checkbox"> Talk to Lady Servil and agree to help her rescue her family. Head east and go into the most northeastern house, open the chest and take armor, put it on.<br>
<br>
<input type="checkbox"> Go just south into the prison, the guard will let you in if your wearing the armor. Talk to Jeremy through the cage. He'll tell you the guard has the keys.<br>
<br>
<input type="checkbox"> Go into the southeast corner room and talk to the guard. He'll mention that Khali brew makes him sleep. Go west to the tavern and grab some. Then return and speak to him. He'll give you the keys and get drunk.<br>
<br>
<input type="checkbox"> Use the keys on Jeremy's door and you'll run out to the arena. Save Justin Servil from a level 55 Khazard ogre. The General will take you prisoner to fight again after you kill the ogre.<br>
<br>
<input type="checkbox"> Talk to Hengrad, and soon you'll be taken out to the arena to fight again. First, you'll have to defeat a level 44 Khazard Scorpion. Defeat it to fight the level 132 Bouncer. After you defeat them both, kill level 112 General Khazard. See note below for useful tips on defeating them.<br>
<br>
<input type="checkbox"> Note: The Bouncer can follow you anywhere in the arena, so use that to your advantage. There's a carcass on the west side of the scaffold; position yourself on one side of it and your opponent on the other. You can shoot at him without getting attacked. In my opinion, using Magic is much more effective than Ranging.<br>
<br>
<input type="checkbox"> If you leave before you've killed the General to get food or something, and when you return it says you can't go in because it's locked, head to Lady Servil—you're done. (This happened to me.) On the other hand, if you defeat them, talk to one of the Servils, then head to Lady Servil to claim your reward. (Congratulations)<br>
$questComplete
This quest guide was written on RuneHQ by Gnat88. Thanks to rs, blakmagic123, and Keystone for corrections.<br>
<br>
This quest guide was entered into the database on Wed, Mar 03, 2004, at 02:52:53 PM by Fudge and was last updated on Mon, Apr 19, 2004, at 11:46:13 AM.<br>
HTML; }