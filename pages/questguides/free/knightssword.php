<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
<br>
Description: Sir Vyvin's squire has just lost Vyvin's one-of-a-kind sword. The squire wants you to find a way to get another one.<br>
<br>
<b>Difficulty Level: <font color="Yellow">Medium</font></b><br>
<br>
Items/Skills Needed To Start: <input type="checkbox"> Pickaxe, <input type="checkbox"> level 10 Mining, <input type="checkbox"> redberry pie (level 10 Cooking to make), <input type="checkbox"> 2 iron bars (level 15 Smithing to make yourself), and some running past Ice Giants and Warriors if you're a lower level.<br>
<br>
Starting Location: The courtyard of the White Knight's Castle<br>
<br>
Reward: 1 Quest Point, 12,725 Smithing XP<br>
<br>
<b>Instructions:</b><br>
<br>
<input type="checkbox"> Talk to the squire about his mishap. He'll direct you to Reldo at the Varrock Castle Library. Reldo will give you the location of the last Incamdo Dwarf in RuneScape. (If you accidentally say you need a quest, you will start the Shield of Arrav quest. Until you find the book on one of the bookshelves, you won't be able to ask about the quest you actually want to work on.)<br>
<br>
<input type="checkbox"> Head southwest of Port Sarim to the cliff below which Thurgo lives. Give him your pie, and he'll get talkative. He needs a picture, so head back to the castle. Speak to the squire in the courtyard, then go up to the east side of the <span data-floors="US">3rd floor</span>. Search the cupboard in his bedroom while Sir Vyvin is not in the room.<br>
<br>
<input type="checkbox"> Go back to Thurgo. Bring the iron bars, armor, etc., if you want to save yourself a trip later. Talk to Thurgo and he'll say you need blurite ore. Go into the cave above his house. Head deep into the cave until you reach the ice room. Run past the Ice Warriors and Ice Giants to the back wall, mine some blurite quickly, and get out of there.<br>
<br>
<input type="checkbox"> Take the 2 iron bars and the blurite to Thurgo, and he'll make the sword. Take it back to the squire for your reward. I had trouble parting with my sword because it looked so cool... lol.<br>
$questComplete
This quest guide was written on RuneHQ by Gnat88. Thanks to Urger, noob hunters, Weezy, IglooGuy, and stormer for corrections.<br>
<br>
This quest guide was entered into the database on Sat, Feb 28, 2004, at 06:03:08 PM by Monkeychris and was last updated on Tue, Apr 20, 2004, at 11:17:05 PM.<br>
HTML; } ?>