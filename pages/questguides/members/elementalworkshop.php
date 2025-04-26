<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>$questName</h2>
<br>
Description: Hundreds of years ago, a mineral was found that had the ability to change the properties of magic.<br>
<br>
The magicians, fearing the effect this may have on their profession, sealed this workshop forever — or so they had hoped. See if you can rediscover the lost knowledge of elemental ore.<br>
<br>
<b>Difficulty Level: <font color="Yellow">Medium</font></b><br>
<br>
<b>Length: <font color="Green">Short</font></b><br>
<br>
Requirements: 20 Mining, 20 Smithing, 20 Crafting<br>
<br>
Items Needed: <input type="checkbox"> A sharp object like a knife or sword, <input type="checkbox"> Pickaxe, <input type="checkbox"> Leather, <input type="checkbox"> Thread, <input type="checkbox"> Needle, <input type="checkbox"> 4 Coal, <input type="checkbox"> a Hammer<br>
<br>
Reward: 1 Quest Point, Elemental Shield (+6 Magic Defence bonus), 5,000 Crafting XP, 5,000 Smithing XP<br>
<br>
Start Point: Go to Seers' Village.<br>
<br>
<input type="checkbox"> To Start: Search the bookcase on the east wall in the house southwest of the bank in Seers' Village.<br>
<br>
<b>Instructions:</b><br>
<br>
<input type="checkbox"> Go to the house southwest of the bank in Seers' Village.<br>
<br>
<img src="img\questimages\elemental1.png" height="200" width="200"><br>
<br>
<input type="checkbox"> Search the bookcase on the east wall.<br>
<br>
<img src="img\questimages\elemental2.png" height="200" width="350"><br>
<br>
<input type="checkbox"> After you read the Battered Book, use your knife on the book and you will get a Battered Key. Do not drop the Battered Book — you will need it later to make the Elemental Shield.<br>
<br>
<input type="checkbox"> Go to the building north, which has an anvil in it, and use the key on the Odd Looking Wall. Then go down the stairs.<br>
<br>
<img src="img\questimages\elemental4.png" height="200" width="200"><br>
<br>
<input type="checkbox"> A map of the places for some of the next steps:<br>
<br>
<img src="img\questimages\elemental5.png" height="400" width="400"><br>
<br>
<input type="checkbox"> When you're in, go down the west path and try to mine a rock. You will be attacked by a level 35 Earth Elemental. Kill the Earth Elemental, and it will drop an Elemental Ore — pick it up.<br>
<br>
<img src="img\questimages\elemental6.png" height="200" width="200"><br>
<br>
<input type="checkbox"> Now go to the north passage from where you came in. Turn the valves so they are like this: First, you need to turn the right valve, then the left valve, to make the waterwheel move. Then pull the lever. (The right valve is the first, and the second is the left valve.)<br>
<br>
<img src="img\questimages\elemental7.png" height="200" width="350"><br>
<br>
<input type="checkbox"> After that, go to the east passage and fix the bellows. This is where the leather, thread, and needle come in.<br>
<br>
<img src="img\questimages\elemental8.png" height="200" width="400"><br>
<br>
<img src="img\questimages\elemental13.png" height="200" width="300"><br>
<br>
<input type="checkbox"> After that, search all the crates for a Stone Bowl (you only need to search each crate once). The location is different for each player. When you find it, go down the south passage.<br>
<br>
<img src="img\questimages\elemental9.png" height="200" width="350"><br>
<br>
<input type="checkbox"> Use the bowl on the lava, and you will get a Stone Bowl filled with lava. Then use the bowl with lava in it on the furnace.<br>
<br>
<img src="img\questimages\elemental10.gif" height="300" width="200"><br>
<br>
<input type="checkbox"> Go back to the bellows and pull the switch.<br>
<br>
<input type="checkbox"> Go back to the furnace and use your Elemental Ore and 4 Coal on the furnace.<br>
<br>
<img src="img\questimages\elemental11.png" height="200" width="300"><br>
<br>
<input type="checkbox"> Then go back to the center and use your Elemental Metal on the workbench. You will need to have the Battered Book in your inventory to make the shield, or it will tell you that you need instructions.<br>
<br>
<input type="checkbox"> When you've made the Elemental Shield, you've completed the quest.<br>
Note: You can make more Elemental Shields after you've finished the quest.<br>
$questComplete
This quest guide was written by pj. Thanks to IglooGuy, Hagge, Angelinblack, Shinraz, villike, Nitr021, wackyax16, jdude720, my_mulisha, Xjezusx1, beaverboy40, jakesterwars, cafetero, and Im4eversmart for corrections.<br>
<br>
This quest guide was entered into the RuneHQ.com database on Wed, Jun 02, 2004, at 06:22:07 PM by Cav103 and CJH and was last updated on Mon, Oct 02, 2006, at 02:40:17 PM by Im4eversmart.<br>
HTML; }