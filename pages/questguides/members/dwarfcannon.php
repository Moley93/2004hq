<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
<br>
Description: Run errands for the dwarf commander to repair his base and build his defenses.<br>
<br>
<b>Difficulty Level: <font color="Yellow">Medium</font></b><br>
<br>
<b>Length: <font color="Green">Short</font>/<font color="Yellow">Medium</font></b><br>
<br>
Items/Skills Needed To Start: <input type="checkbox"> Some teleports are recommended, <input type="checkbox"> and level 20 Agility is required to cross the log bridge<br>
<br>
Starting Location: Talk to the dwarf commander across the log bridge from Seers' Village<br>
<br>
Reward: One quest point, Crafting XP, the ability to buy a multicannon for 750k, or different pieces for 200k each<br>
<br>
<h3>Instructions:</h3
<br>
<input type="checkbox"> Get 6 railings from the commander after agreeing to help him fix the fence to keep out those pesky goblins.<br>
<br>
<input type="checkbox"> Walk along the fence, searching each section. (These are not the same locations as in RS1.) After quite a while of searching — and praying you didn't miss one — go back and talk to the commander.<br>
<br>
<input type="checkbox"> He'll reveal that his watchtower, just south of the base, has stopped communications. Go and investigate. Grab the dwarf remains in the tower (poor little guy), and walk back to the commander with the bad news...<br>
<br>
<input type="checkbox"> After informing the commander, he'll say that the dwarf who was killed had a son, Gilob. Now it's time to track down the dwarf kid and his captors.<br>
<br>
<input type="checkbox"> Head southeast around the Fishing Guild to a cave — it's right by the windmill to Ardougne. Enter and go to the corner room opposite the entrance. Search in the crates (it's one of the different-colored ones, I'm pretty sure). The child will jump out, talk for a brief moment, and run back to the commander. Head there also.<br>
<br>
<input type="checkbox"> Upon your return, you learn that the base cannon needs fixing. Take the toolkit and go into the shed. Inspect each part until you finally fix all of them. You WILL fail MULTIPLE times.<br>
<br>
<input type="checkbox"> Talk to the commander once again. He sends you to South Ice Mountain, to the dwarf base there, to get vital information about the cannons. These guys are real organized, aren't they? A Falador teleport is really handy right here. In one of the buildings is a dwarf — the only one that has a name. He'll give you the ammo mould and instructions that he forgot to send before.<br>
<br>
<input type="checkbox"> Teleport to Camelot, or nearby if you have the runes. For you pures out there… you're just outta luck today. Once you get there by your chosen mode of transportation, talk once more to the commander, and at long last, you receive your reward.<br>
$questComplete
This quest guide was written on RuneHQ by Gnat88. Thanks to DNKevin and Neo 9001 for corrections.<br>
<br>
This quest guide was entered into the database on Tue, Mar 02, 2004, at 10:05:02 PM by Weezy and was last updated on Thu, Apr 15, 2004, at 11:24:33 AM.
HTML; }