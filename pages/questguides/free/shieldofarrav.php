<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>$questName</h2>
<b>Description:</b> Varrockian literature tells of a valuable shield, stolen long ago from the museum of Varrock, by a gang of professional thieves. See if you can track down this shield and return it to the museum. You will need a friend to help you complete this quest.
<br><br>
<b>Difficulty: <font color="Green">Novice</font></b>
<br><br>
<b>Length: <font color="Yellow">Medium</font></b><br>
<h3>Items & Skills Needed:</h3>
<ul style="list-style-type: none;">
<li><div data-progress><canvas data-itemname="coins_5" data-size="25"></canvas>&nbsp;&nbsp;20 coins (Phoenix Gang)</div><br></li>
<li><div data-progress><canvas data-itemname="phoenix_crossbow" data-size="25"></canvas>&nbsp;&nbsp;2 Phoenix crossbows (Black Arm Gang)</div><br></li>
<li><div data-progress>A friend who has not done the quest</div></li>
</ul>
<b>Starting Location:</b> Reldo in the palace library of Varrock
<br><br>
<b>Reward:</b> 1 Quest point, 2 certificates worth 600 coins each
<br><br>
<hr>
<h3>Instructions:</h3>
<br>
<div data-progress>Walk to the palace library and ask Reldo if he's got any quests for you. He will begin talking about the Shield of Arrav and ask you to find a book on one of the shelves. (Make your friend do this quest with you—it will prove helpful in the end.)</div>
<br><br>
<div data-progress>Find the book and read it. It talks about the gangs: Black Arm and Phoenix. Then return to Reldo — he will tell you to go to Baraek.</div>
<br><br>
<div data-progress>Baraek is in the marketplace. He will only tell you about the gang for 20 coins. (Cheap scum.) After that, he'll tell you about the gang.</div>
<br><br>
<div data-progress>Talk to the tramp in the alley by the sword shop in Varrock. Ask him what's behind the alley. He will tell you about the Black Arm gang.</div>
<br><br>
Choosing your gang:
<br><br>
<div data-progress>I chose the Black Arm gang because it was easier. Have you or your friend choose a gang — each gang has different tasks.</div>
<hr>
Blackarm Gang:
<br><br>
<div data-progress>If you chose Black Arm, then Katrine will tell you to steal some Phoenix crossbows. This is where your friend comes in.</div>
<br><br>
<div data-progress>Have your friend retrieve some crossbows from the Phoenix Gang Weapon Store and give them to you. Also, before you leave, make sure your friend grabs the other part of the shield.</div>
<br><br>
<div data-progress>Now that you have the crossbows, your friend's part is done. Talk to Katrine and tell her about the crossbows, then enter the upper area of the gang house and retrieve the shield.</div>
<br><br>
<div data-progress>Merge the two halves of the shield together to create a full shield. Go to the Varrock Museum and talk to the curator. The curator will give you two scrolls.</div>
<br><br>
<div data-progress>Trade one certificate to your friend and take your certificate to King Roald in the Varrock Palace to recieve your reward.</div>
<hr>
Phoenix Gang:
<br><br>
<div data-progress>To start the Phoenix Gang path, talk to Baerek. He will tell you about the quest. Before going to the gang, go to the Blue Moon Inn and kill Johnny the Beard (level 5).</div>
<br><br>
<div data-progress>After killing Johnny, take the scroll he drops and go to the Phoenix Gang's house to the South. It is marked by a large dungeon icon on your map, in the back alley of Varrock near Aubury.</div>
<br><br>
<div data-progress>Go down the ladder and talk to the gang leader. Tell him you know who he really is.</div>
<br><br>
<div data-progress>He will say okay and allow you to ask to join. He'll say you need to kill an agent and bring back his intelligence scroll. You already have that.</div>
<br><br>
<div data-progress>Give it to the gang leader, he'll let you inside, and give you a key to the weapon store. Go to the very end to a room with a chest near the bed. Open and search the chest to grab the shield half.</div>
<br><br>
<div data-progress>Leave the dungeon and return to Varrock. Walk East towards the altar to the Phoenix Gang storage and use your key on the door.</div>
<br><br>
<div data-progress>Climb the ladder and kill the Weaponsmaster, then take a crossbow (or two if your friend wants a crossbow to keep).</div>
<br><br>
<div data-progress>Return to your friend and trade them the Phoenix Crossbow(s) and have your friend get the other shield half from the Black Arm Gang.</div>
<br><br>
<div data-progress>Meet your friend at the Varrock Museum to trade your shield half.</div>
<br><br>
<div data-progress>Recieve your certificate from your friend and take the certificate to King Roald in the Varrock Palace to recieve your reward.</div>
$questComplete
This quest guide was written on RuneHQ by halojunkie.
<br><br>
This quest guide was entered into the database on Tue, Apr 13, 2004, at 05:38:26 PM by DRAVAN, and was last updated on Tue, May 18, 2004, at 02:48:43 PM.
HTML; }