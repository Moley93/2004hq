<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
Description: Veronica is very worried. Her fiancé went into the big spooky manor house to ask for directions. An hour later and he's still not out yet.<br>
<br>
<b>Difficulty Level: <font color="Green">Easy</font></b><br></b>
<br>
Items/Skills Needed To Start: None<br>
<br>
Starting Location: Draynor Manor<br>
<br>
Reward: 300 Coins and 4 Quest Points<br>
<br>
<b>Instructions:</b><br>
<br>
<input type="checkbox"> Talk to Veronica outside the Mansion in Draynor. She will tell you about Ernest. He has gone into the house for an hour and hasn't come out yet. Tell her that you will help her to find Ernest.<br>
<br>
<input type="checkbox"> Go inside the house and to the top floor where you'll find Professor Oddenstein. Talk to him and ask about Ernest. He will explain that he accidentally changed Ernest into a chicken and that his machine is broken. To fix it, you must retrieve three items: an oil can, rubber tubing, and a pressure gauge.<br>
<br>
<input type="checkbox"> Oil Can: Go to the basement, which is a mini maze.<br>
<img src="img/questimages/ernest1.png"><br>
Use the following lever sequence:<br>
<input type="checkbox"> Pull levers B then A down. Enter door 1.<br>
<input type="checkbox"> Pull lever D down. Enter doors 2, then 3.<br>
<input type="checkbox"> Pull levers B, then A up. Enter doors 3, 4, and 5.<br>
<input type="checkbox"> Pull levers E, then F down. Enter doors 6 and 7.<br>
<input type="checkbox"> Pull lever C down. Enter doors 7 and 6.<br>
<input type="checkbox"> Pull lever E up. Enter doors 6, 8, and 3.<br>
<input type="checkbox"> Go through door 9 and grab the oil can.<br>
<br>
<input type="checkbox"> Rubber Tube: Go to the <span data-floors="US">1st floor</span> east room and grab the spade. Head outside, then north, west, and south to find a pile of compost. Use the spade on the compost to get a key. Return inside and unlock the door with the skeleton inside (it won't attack). Grab the rubber tube.<br>
<br>
<input type="checkbox"> Pressure Gauge: On the <span data-floors="US">2nd floor</span>, go to the southeast room and pick up fish food. Go down to the west room and grab poison. Use poison on fish food. Then go southwest outside to the fountain, use the poisoned fish food on it, and search the fountain to get the pressure gauge.<br>
<br>
<input type="checkbox"> Return to Professor Oddenstein with all three items. He will fix the machine and turn Ernest back into a human. Ernest will thank and reward you.<br>
$questComplete
This quest guide was written on RuneHQ by Henry-X. Thanks to Weezy for corrections.<br>
<br>
This quest guide was entered into the database on Thu, Feb 19, 2004, at 02:33:04 PM by Weezy and was last updated on Wed, Mar 31, 2004, at 05:09:01 PM.<br>
<br>
HTML; }