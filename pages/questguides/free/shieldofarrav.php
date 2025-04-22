<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
<br>
Description: Long ago, the Shield of Arrav was a great artifact. It was broken in two, and the king has placed a 600 gold reward for its return.<br>
<br>
<b>Difficulty Level: <font color="Green">Easy</font>/<font color="Yellow">Medium</font></b><br>
<br>
Items/Skills Needed To Start: <input type="checkbox"> 20-40 coins, <input type="checkbox"> a friend who has not done the quest<br>
<br>
Location: Reldo in the palace library of Varrock.<br>
<br>
Reward: 2 Certificates worth 600 gold coins (reward can only be granted once. nothing big), 1 quest point.<br>
<br>
<input type="checkbox"> 1. Walk to the palace library and ask Reldo if he's got any quests for you. He will begin talking about the Shield of Arrav and ask you to find a book on one of the shelves. (Make your friend do this quest with you—it will prove helpful in the end.)<br>
<br>
<input type="checkbox"> 2. Find the book and read it. It talks about the gangs: Black Arm and Phoenix. Then return to Reldo—he will tell you to go to Baraek.<br>
<br>
<input type="checkbox"> 3. Baraek is in the marketplace. He will only tell you about the gang for 20 coins. (Cheap scum.) After that, he'll tell you about the gang.<br>
<br>
<input type="checkbox"> 4. Talk to the tramp in the alley by the sword shop in Varrock. Ask him what's behind the alley. He will tell you about the Black Arm gang.<br>
<br>
Choosing your gang:<br>
<br>
Blackarm Gang:<br>
<br>
<input type="checkbox"> 5. I chose the Black Arm gang because it was easier. Have you or your friend choose a gang—each gang has different tasks.<br>
<br>
<input type="checkbox"> 6. If you chose Black Arm, then Katrine will tell you to steal some Phoenix crossbows. This is where your friend comes in.<br>
<br>
<input type="checkbox"> 7. Have your friend go to the Blue Moon Inn and kill Johnny the Beard (level 2). Retrieve the scroll and have him go to the Phoenix Gang. Talk to the gang leader, who is located in a small house marked by a dungeon icon on your map.<br>
<br>
<input type="checkbox"> 8. The Phoenix Gang leader will give you a key to the gang's weapon store (located right beside the entrance). Have your friend retrieve some crossbows from the armory and give them to you. Also, before you leave, make sure your friend grabs the other part of the shield for you.<br>
<br>
<input type="checkbox"> 9. Now that you have the crossbows, your friend's part is done. Talk to Katrine and tell her about the crossbows, then enter the upper area of the gang house and retrieve the shield.<br>
<br>
<input type="checkbox"> 10. Talk to the king, and he will tell you to go to the museum to show the curator. The curator will give you two scrolls.<br>
<br>
<input type="checkbox"> 11. Take the scrolls to the king and claim your reward.<br>
<br>
Phoenix Gang:<br>
<br>
<input type="checkbox"> 5. To start the Phoenix Gang path, talk to Baerek. He will tell you about the quest. Before going to the gang, go to the Blue Moon Inn and kill Johnny the Beard (level 2).<br>
<br>
<input type="checkbox"> 6. After killing Johnny, take the scroll he drops and go to the Phoenix Gang's house. It is marked by a large dungeon icon on your map, in the back of Varrock near Aubury.<br>
<br>
<input type="checkbox"> 7. Go down the ladder and talk to the gang leader. He will talk at length about the VTM Corporation. Tell him you know who they really are.<br>
<br>
<input type="checkbox"> 8. He will say okay and allow you to ask to join. He'll say you need to kill an agent and bring back his intelligence scroll. You already have that.<br>
<br>
<input type="checkbox"> 9. Give it to the gang leader, and he'll let you inside. Get the shield, and have your friend get the other part from the Black Arm Gang.<br>
<br>
<input type="checkbox"> Note: Give your friend one of the reward scrolls for his part in this.<br>
<br>
Congrats! You're 600 gold richer and have gained a quest point.<br>
$questComplete
This quest guide was written on RuneHQ by halojunkie.<br>
<br>
This quest guide was entered into the database on Tue, Apr 13, 2004, at 05:38:26 PM by DRAVAN, and was last updated on Tue, May 18, 2004, at 02:48:43 PM.<br> 
HTML; }