<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>$questName</h2>
<br>
Description: Count Draynor is terrorizing the small village of Draynor. The townsfolk want you to kill this vampire.<br>
<br>
<b>Difficulty Level: <font color="Yellow">Medium</font></b><br>
<br>
<b>Length: <font color="Green">Short</font></b><br>
<br>
Items/Skills Needed To Start: <input type="checkbox"> A hammer, <input type="checkbox"> decent armor and weapon, <input type="checkbox"> a few gp to buy some beers.<br>
<br>
Starting Location: Draynor Village<br>
<br>
Reward: 3 quest points, some attack and defense xp<br>
<br>
<b>Instructions:</b><br>
<br>
<input type="checkbox"> Find Morgan in Draynor. It's not that hard; it's just a small village. He'll tell you about the vampire and ask you to kill it. He'll also tell you to go find his friend Dr. Harlow at the Jolly Boar Inn.<br>
<br>
<input type="checkbox"> First, go upstairs and search the wall cupboard for a clove of garlic. Then go northeast of Varrock to the inn.<br>
<br>
<input type="checkbox"> Talk to him and get him the beer he asks for. He'll tell you how to beat it and give you a stake.<br>
<br>
<input type="checkbox"> Get everything you need and go to Draynor Manor. Head to the stairs that go down. Open the coffin and the Count should jump out and start attacking you.<br>
<br>
<input type="checkbox"> Attack him until he has a full red bar, and the stake should automatically stab him. If not, make sure you have a hammer and the stake with you. If it still doesn't work, try using garlic on him or manually stabbing him with the stake.<br>
<br>
<input type="checkbox"> Once he's dead, you have finished the quest. (Congratulations!)<br>
$questComplete
This quest guide was written on RuneHQ by Gnat88. Thanks to Weezy and stormer for corrections.<br>
<br>
This quest guide was entered into the database on Sat, Feb 28, 2004, at 06:37:37 PM by Monkeychris and was last updated on Sun, Apr 11, 2004, at 02:25:25 PM.<br>
HTML; }