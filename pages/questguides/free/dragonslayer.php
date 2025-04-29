<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>$questName</h2>
<b>Description:</b> Prove yourself a true hero. Kill the mighty dragon Elvarg of Crandor Island and earn the right to buy and wear the powerful rune plate mail body.
<br><br>
<b>Difficulty: <font color="Red">Experienced</font></b>
<br><br>
<b>Length: <font color="Red">Long</font></b><br>
<h3>Items & Skills Needed:</h3>
<ul style="list-style-type: none;">
<li><div data-progress><canvas data-itemname="bowl_unfired" data-size="25" data-show-label="inline"></canvas></div><br></li>
<li><div data-progress><canvas data-itemname="wizards_mind_bomb" data-size="25" data-show-label="inline"></canvas></div><br></li>
<li><div data-progress><canvas data-itemname="lobster_pot" data-size="25" data-show-label="inline"></canvas></div><br></li>
<li><div data-progress><canvas data-itemname="silk" data-size="25" data-show-label="inline"></canvas></div><br></li>
<li><div data-progress><canvas data-itemname="hammer" data-size="25" data-show-label="inline"></canvas></div><br></li>
<li><div data-progress><canvas data-itemname="antidragonbreathshield" data-size="25" data-show-label="inline"></canvas></div><br></li>
<li><div data-progress><canvas data-itemname="nails" data-size="25"></canvas>12 nails or <canvas data-itemname="steel_bar" data-size="25"></canvas>6 steel bars</div><br></li>
<li><div data-progress><canvas data-itemname="woodplank" data-size="25"></canvas>3 planks</div><br></li>
<li><div data-progress><canvas data-itemname="coins_1000" data-size="25"></canvas>2,000 coins (or an extra 10,000 coins if you can't Telekinetic Grab)</div><br></li>
<li><div data-progress>Any items you think you need to defeat Elvarg (the green dragon)</div><br></li>
</ul>
<br>
<b>Starting Location:</b> Champion's Guild
<br><br>
<b>Reward:</b> 2 quest points, 20,000 Strength XP, 20,000 Defence XP. Completing the quest allows you to buy Rune platebody (84,500 gp) and Green Dragonhide Body (10,400 gp) from Oziach.
<br><br>
<hr>
<h3>Instructions:</h3>
<br>
<div data-progress>Talk to the Champion's Guild master. Ask him about the Rune platebody, and he'll tell you about Oziach. His house is near Edgeville.</div>
<br><br>
<div data-progress>Talk to Oziach. Ask him about Rune platebody, the Dragonfire Shield, and the map pieces. He should give you a key to Melzar's Maze.</div>
<br><br>
<div data-progress>Go to the Oracle (located above the Dwarven Mines) with your Silk, Mind Bomb, Unfired bowl, and Lobster pot. She'll tell you about a door in the mines. Go down into the mine and find the door on the eastern side. Inside, your items will disappear, and you'll find a chest containing a map piece.</div>
<br><br>
<div data-progress>Grab some food if needed. Head to Melzar's Maze (south of the Crafting Guild) and use your key on the door. Kill giant rats until one drops a red key. Use it on the northwest door, then go up the ladder.</div>
<br><br>
<div data-progress>Kill ghosts until one drops an orange key. Use it on the second door from the north. Many people mess this up—make sure it's the right one.</div>
<br><br>
<div data-progress>Kill skeletons until you get a yellow key. Use it on the most southwestern door. Go down the ladders until you reach zombies.</div>
<br><br>
<div data-progress>Kill zombies until one drops a blue key. Use it on the northwest door. Kill Melzar the Mad until he drops a magenta key. Use it to proceed.</div>
<br><br>
<div data-progress>Kill the Lesser Demon to get the final (green) key—thanks to graystar for this info! Use it on the door, then check the chest to get another map piece.</div>
<br><br>
<div data-progress>Stop by a bank. Choose one of the following: A) A bow and arrows, B) Runes to cast Telekinetic Grab, or C) 10,000 gp. If you brought the 10k, you don't need runes. If you're planning to kill Wormbrain, you'll need to telegrab the map piece.</div>
<br><br>
<div data-progress>Mages/Archers: Go to the Port Sarim jail and attack Wormbrain. When he dies, use Telekinetic Grab on the map piece. Use all map pieces on each other to form the full map.</div>
<br><br>
<div data-progress>If you can't telegrab: Talk to Wormbrain in the Port Sarim jail. Ask about the map piece. He'll eventually offer to sell it for 10k. Pay him, and you'll receive the map piece. Combine all pieces to form the full map.</div>
<br><br>
<div data-progress>Go to Lumbridge Castle and talk to the Duke. Ask about a shield to protect against dragons. He'll give you the Dragonfire Shield. It's advised to drop it, get another, and pick up the first one—just in case you die later.</div>
<br><br>
<div data-progress>Withdraw 2,000 coins, a hammer, 3 planks, 12 nails, and your map. Go to Port Sarim, then head to the dock east of the food store. Talk to the captain. After some dialogue, he'll offer to sell you the ship. Buy it, board the ship, and go below deck. Use your planks on the hole near you to repair it. Talk to the swabbie to disembark.</div>
<br><br>
<div data-progress>Go to Draynor and talk to Ned. He'll offer to sail you to Crandor. Give him the map, and he'll tell you to meet him at the ship. Now's the time to prepare: bring potions, food, armor, weapons (magic or ranged), and most importantly—your Dragonfire Shield.</div>
<br><br>
<div data-progress>Head to your ship (The Lady Lumbridge), go below deck, and talk to Ned. Off to Crandor!</div>
<br><br>
<div data-progress>After arriving, the ship will be damaged. Disembark and climb the hill. Follow the path past King Scorpions. Evade them and walk north to another upward path. Go up, dodge the Lesser Demon, then enter the cave.</div>
<br><br>
<div data-progress>Inside, dodge the skeletons and walk deeper into the cave. Go through the door. This is a good time to drink any stat-boosting potions. If you forgot your Dragonfire Shield, now's the time to leave and retrieve it.</div>
<br><br>
<div data-progress>Time to face Elvarg (Level 86). She hits hard for her level—when I fought her, she maxed a 10. Eat food as needed and stay focused. Don't let her finish you off.</div>
<br><br>
<div data-progress>After defeating Elvarg, you'll be teleported outside. If a skeleton attacks you, don't panic. Head south toward the Lesser Demons and look for a “secret” wall with an “Open” command. Your character will memorize this location for future access. From here, either teleport to Lumbridge or sell items at the general store to afford a trip off Karamja.</div>
<br><br>
Here is a picture of the wall:<br>
<img src="img/questimages/dragonslayer1.png" height="400" width="400">
<br><br>
<div data-progress>Congratulations—you've completed Dragon Slayer! Go buy that Rune platebody, you legend.</div>
$questComplete
This quest guide was written on RuneHQ by Catherine and Ghou Lies. Thanks to Weezy, firespyrit, evomasta, stormer, DRAVAN, Axelman, and Ghou Lies for corrections.
<br><br>
This quest guide was entered into the database on Fri, Feb 06, 2004, at 09:11:17 PM by Chownuggs and was last updated on Tue, Jul 06, 2004, at 08:25:23 AM.
HTML; }