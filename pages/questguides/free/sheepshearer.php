<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
<br>
Description: Farmer Fred's sheep are getting mighty woolly, and he'll pay you to shear them.<br>
<br>
<b>Difficulty Level: <font color="Green">Easy</font></b><br>
<br>
Items/Skills Needed To Start: Shears (can be bought at a general store for 1 coin)<br>
<br>
Starting Location: The house just west of the sheep, northwest of Lumbridge<br>
<br>
Reward: 1 Quest Point, 200 Crafting XP, 60 gold coins<br>
<br>
<b>Instructions:</b><br>
<br>
Talk to Fred the Farmer, who is located north of Lumbridge in the little building by all the sheep. Tell him that you are in search of a quest. He'll respond by saying his sheep need to be sheared and will reward you if you bring back 20 balls of wool.<br>
<br>
Go south until you see a general store and buy some shears. Walk back up to the sheep pen and start shearing away.<br>
<br>
Once you've got 20 wool, go to Lumbridge Castle and head to the <span data-floors="US">2nd floor</span>, where you'll find a spinning wheel in the middle room. Use all your wool on it, and you should have 20 balls of wool.<br>
<br>
Return to Fred with your 20 balls of wool and give them to him. He'll thank you and reward you for your help. You'll receive 1 Quest Point, 60 gold coins, and around 200 Crafting XP.<br>
$questComplete
This quest guide was written on RuneHQ by Stormer. Thanks to Weezy and tj for corrections.<br>
<br>
This quest guide was entered into the database on Mon, Feb 16, 2004, at 03:26:27 PM by Chownuggs and was last updated on Fri, Apr 23, 2004, at 12:35:12 PM.<br>
HTML; }