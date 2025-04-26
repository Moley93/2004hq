<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
<br>
Description: Doric the dwarf is happy to let you use his anvils, but first he would like you to run an errand for him.<br>
<br>
<b>Difficulty Level: <font color="Green">Easy</font></b><br>
<br>
<b>Length: <font color="Green">Short</font></b><br>
<br>
Items/Skills Needed To Start: <input type="checkbox"> Any pickaxe, <input type="checkbox"> 15 Mining<br>
<br>
Starting Location: Doric's Anvil (north of Falador)<br>
<br>
Reward: 1 Quest Point, 1,300 Mining XP, 180 gold coins, permission to use Doric's anvils<br>
<br>
<b>Instructions:</b><br>
<br>
<input type="checkbox"> 1. First, talk to Doric, who is located northwest of Falador. He'll tell you that to use his anvils, he needs 6 Clay, 4 Copper ore, and 2 Iron ore.<br>
<br>
<input type="checkbox"> 2. If you already have a pickaxe, skip this step. If you don't, walk over to Barbarian Village. In one of the buildings, you'll find a Bronze pickaxe on a table. Pick it up.<br>
<br>
<input type="checkbox"> 3. With your pickaxe in hand, head to the northern entrance of the Dwarven Mines, which is located northeast of Falador.<br>
<br>
<input type="checkbox"> 4. Once there, go down the trapdoor and head south until you see some iron and copper rocks. Mine 2 Iron ore and 4 Copper ore from them. Then go a little farther south to find some clay rocks, and mine 6 Clay.<br>
<br>
<input type="checkbox"> 5. Now that you have 6 Clay, 4 Copper ore, and 2 Iron ore in your inventory, return to Doric and give him the ores. He'll appreciate it very much and reward you with 1 Quest Point, 180 coins, and 1,300 Mining XP.<br>
<br>
<input type="checkbox"> 6. Congratulations! You've just completed Doric's Quest and can now use his anvils.<br>
$questComplete
This quest guide was written on RuneHQ by Stormer and Ghou Lies. Thanks to Nitr021, Weezy, and Pirate Bob49 for corrections.<br>
<br>
This quest guide was entered into the database on Mon, Feb 16, 2004, at 03:38:33 PM by Chownuggs and CJH and was last updated on Sat, Feb 05, 2005, at 06:26:44 AM by nitro21.<br>
HTML; }