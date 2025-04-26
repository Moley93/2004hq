<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
<br>
Description: The Duke of Lumbridge will have a birthday but the cook has forgotten to buy the ingredients for the cake.<br>
<br>
<b>Difficulty Level: <font color="Green">Easy</font></b><br>
<br>
<b>Length: <font color="Green">Short</font></b><br>
<br>
Items/Skills Needed To Start: <input type="checkbox"> Egg, <input type="checkbox"> Bucket of milk, and <input type="checkbox"> Pot of flour<br>
<br>
Starting Location: Lumbridge Castle<br>
<br>
Reward: 1 Quest Point, 300 Cooking XP, Permission to use the Cook's range<br>
<br>
<b>Instructions:</b><br>
<br>
<input type="checkbox"> 1. Talk to the Cook in the Lumbridge Castle. He will ask you to help him get the ingredients for the cake, as he forgot to buy them. Tell him that you will help.<br>
<br>
<input type="checkbox"> 2. Getting the ingredients.<br>
<br>
Flour: Get a pot in the Lumbridge Castle. Then head northwest. You should find a windmill. There is a grain field west of the windmill. Pick one grain and go into the windmill. Go up to the top floor and use your grain on the hopper. Operate the hopper and go back down. Use your pot to collect the flour.<br>
<br>
Egg: You can find some eggs in a farm located northeast of Lumbridge. After you find the farm, there should be some chickens there. You can find some eggs near the chickens.<br>
<br>
Milk: There should be a house near the chickens in the farm. Enter the house and get a bucket. Exit the farm and go to the east of this farm. You will find some cows there. Use the Bucket on a dairy cow to get a Bucket of milk.<br>
<br>
<input type="checkbox"> 3. After you get all the ingredients, return to the cook and he will reward you.<br>
$questComplete
This quest guide was written on RuneHQ by henry-x. Thanks to DNKevin and Weezy for corrections.<br>
<br>
This quest guide was entered into the database on Sat, Feb 21, 2004, at 04:19:36 PM by Weezy and CJH and was last updated on Mon, Aug 02, 2004, at 07:38:58 AM.<br>
HTML; }