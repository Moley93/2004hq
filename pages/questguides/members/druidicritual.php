<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
<p>
Description: Help the druids cleanse their former altar of the evil from the dark wizards. If you are successful, you will be rewarded with the knowledge of Herblore.<br>
<br>
<b>Difficulty Level: <font color="Green">Easy</font></b><br>
<br>
<b>Length: <font color="Green">Short</font></b><br>
<br>
Items/Skills Needed To Start: <input type="checkbox"> Recommended you collect the four meats before you start. These are rat, bear, chicken, and beef<br>
<br>
Starting Location: Stone circle north of Taverley<br>
<br>
Reward: 4 Quest Points, 250 Herblore xp, access to the Herblore skill<br>
<br>
Instructions:<br>
<br>
<input type="checkbox"> Talk to Kaqemeex, and he'll tell you what he needs to purify their cursed altar south of Varrock. He says to speak to Sanfew.<br>
<br>
<input type="checkbox"> Find Sanfew on the <span data-floors="US">2nd floor</span> of the Herblore shop. He says you need the four meats to be dipped into the Cauldron of Thunder to complete a ritual. Hopefully, you already have these meats and can go there right away.<br>
<br>
<input type="checkbox"> Head south and a little west to Taverley Dungeon. It's in a clump of dead trees. You won't need armor, but a good weapon to finish off some suits of armor (level 19) quickly will help.<br>
<br>
<input type="checkbox"> Go in and head north a little until you come to the prison door and try to open it. One of the suits will attack you. Defeat it and try to open the gate again. Assuming both are dead, you should be able to go in now.<br>
<br>
<input type="checkbox"> Use all the meats with the cauldron (they should turn blue), and head back to Sanfew at the Herblore shop. He'll be grateful and tell you to visit Kaqemeex for your Herblore skills training.<br>
<br>
<input type="checkbox"> Kaqemeex will give you your reward and then explain some things about Herblore. He also refers you to the Scribe section of the website for more info.<br>
$questComplete
This quest guide was written on RuneHQ by Gnat88. Thanks to Weezy for corrections.<br>
<br>
This quest guide was entered into the database on Tue, Mar 02, 2004, at 10:06:05 PM by Wiz-Master and was last updated on Wed, Mar 31, 2004, at 04:58:22 PM.
</p>
HTML; }