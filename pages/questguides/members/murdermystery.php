<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>2004HQ - $questName</h2>
<br>
Description: Lord Sinclair was found murdered in his mansion. Several guards are working on the case, but they're confused about the crime. You must help them find the culprit who murdered Lord Sinclair.<br>
<br>
<b>Difficulty Level: <font color="Green">Easy</font></b><br>
<br>
Items/Skills Needed To Start: A Pot<br>
<br>
Starting Location: Lord Sinclair's Mansion. Talk to the guard to start.<br>
<br>
Reward: 3 Quest Points, 2,000 coins, 1,406 Crafting XP<br>
<br>
<b>Instructions:</b><br>
<br>
<img src="img\questimages\mystery1.jpg" height="150" width="150"><br>
<br>
1. Talk to the guard near the gate of Sinclair Mansion, north of Seers' Village, and tell him you'll help them find the culprit.<br>
<br>
<img src="img\questimages\mystery2.jpg" height="200" width="300"><br>
<br>
2. Go to the room with all the evidence, including the Criminal's Dagger, and pick up the Pungent Pot. While you're there, you can also investigate the smashed window for the Criminal's Thread and pick up the Criminal's Dagger, though you won't need them just yet.<br>
<br>
3. Go outside and investigate the gate near the Sinclair guard dog. It should say that the fierce dog barks at you.<br>
<br>
4. Talk to one of the gossips and find out everything they know. They should mention the Sinclairs buying poison.<br>
<br>
<img src="img\questimages\mystery3.jpg" height="150" width="150"><br>
<br>
5. Go south, just slightly east of the Seers' Village bank, and talk to the Poison Salesman. Ask him about the sale that he made with the entire Sinclair family. Show the Poison Salesman the Pungent Pot, and he'll recognize the smell as his Multi-Purpose Poison.<br>
<br>
6. Talk to each of the children the Poison Salesman said he sold poison to—Bob, Frank, David, Elizabeth, Carol, and Anna—and ask what they did with the poison.<br>
<br>
7. Investigate each of the areas they said they cleaned. One of them will not show any signs of poison use. This is where the quest gets interesting—there are six possible outcomes.<br>
<br>
<img src="img\questimages\mystery5.jpg" height="200" width="300"><br>
<br>
8. The person who didn't use their poison is the culprit, but you'll need more evidence. Go to the room with the evidence and pick up the dagger. Then, investigate the window to find a thread. This thread is the same color as the trousers of your culprit.<br>
<br>
<img src="img\questimages\mystery4.jpg" height="200" width="300"><br>
<br>
9. Now search for the barrel belonging to the suspect whose pants match the color of the thread. Some of them are upstairs, but two of them are downstairs. You should find an item that belongs to that person in their barrel, which you'll use to collect their fingerprints.<br>
<br>
10. Go to the room just west of the cook's room, where you should see two sacks. Search them to find flypaper—you'll need two sheets.<br>
<br>
<img src="img\questimages\mystery6.jpg" height="200" width="300"><br>
<br>
11. Fill your pot with flour from the Barrel of Flour in the cook's room (or from another source if preferred). Pour the flour on the Criminal's Dagger, then use the dagger on the flypaper. You'll obtain an unidentified fingerprint.<br>
<br>
12. Get more flour from the pot and use it on the item you found in the culprit's barrel. Once you've applied the flour, use the item on the flypaper. Then, compare the culprit's fingerprints with the unidentified ones—they should match.<br>
<br>
13. Talk to the guard and tell him you have evidence identifying the culprit. He'll ask you about each item and collect the evidence from you. He'll say the culprit will be placed under house arrest until the trial, and thank you for your help.<br>
$questComplete
This quest guide was written by supercoolyo. Thanks to Dravan, Dracon, and Matty98 for corrections.<br>
<br>
This quest guide was entered into the database on Sun, May 09, 2004, at 11:26:19 AM by Cav103 and was last updated on Thu, May 27, 2004, at 07:47:44 AM.<br>
HTML; }