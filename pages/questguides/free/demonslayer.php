<?php
function getQuestGuide($questName, $questComplete) { return <<<HTML
<h2>$questName</h2>
<br>
Description: Wizards of the dark arts have freed the ancient demon Delrith. Find out how to imprison him again before it's too late and he destroys Varrock.<br>
<br>
<b>Difficulty Level: <font color="Yellow">Medium</font></b><br>
<br>
<b>Length: <font color="Green">Short</font>/<font color="Yellow">Medium</font></b><br>
<br>
Items/Skills Needed To Start: <input type="checkbox"> 25 Bones, <input type="checkbox"> 1 Coin<br>
<br>
<b>Starting Location: The Gypsy in her tent at Varrock Square</b><br>
<br>
Reward: 3 quest points, you can keep Silverlight, which is useful for weakening any kind of demon<br>
<br>
<b>Instructions:</b><br>
<br>
<input type="checkbox"> 1. Talk to the Gypsy in her tent and pay her a coin to reveal the future to you. She'll do her thing and tell you that Delrith has been released. She also says that you're the only one who can stop him. She goes on into some history of Delrith, then tells you to see Sir Prysin in Varrock castle. Make sure you ask what the magical incantation is. You don't need to write it down if you're following this guide.<br>
<br>
<input type="checkbox"> 2. Sir Prysin is in the southwest side of the castle. Ask him about Silverlight and learn that he needs three keys to unlock the chest containing Silverlight. He'll tell you to talk to Captain Rovin on an upper floor of the castle.<br>
<br>
<input type="checkbox"> 3. Go upstairs and find the Captain and talk until he gives you his key.<br>
<br>
<input type="checkbox"> 4. Sir Prysin dropped a key down the drain also (what a klutz), so head to the most north east room and go upstairs, grab a bucket, go back down, and fill it from the sink.<br>
<br>
<input type="checkbox"> 5. Use the bucket of water with the drain, then hurry down into the sewers through the manhole, head north a short distance, and you should find the key in no time.<br>
<br>
<img src="img/questimages/demonslayer1.png" height="200" width="200"><br>
<img src="img/questimages/demonslayer2.png" height="200" width="200"><br>
<br>
<input type="checkbox"> 6. Get/collect your 25 bones and head to the Wizards' Tower. Talk to the Wizard Traiborn to get your 3rd key after some bumbling about dumb stuff.<br>
<br>
<input type="checkbox"> 7. Go back to Sir Prysin with all 3 keys and you get Silverlight from him at long last.<br>
<br>
<input type="checkbox"> 8. Head out the south gate of Varrock to the dark wizards' stone circle. Wield Silverlight and charge at Delrith full force. Fight him until he has full red bar. There'll be a cool animation of him half sucked in the vortex from where he came.<br>
<br>
<input type="checkbox"> 9. Choose "Carlem Aber Camerinthum Purchai Gabindo" to get the demon vanquished. If you choose the wrong one, you must fight Delrith again, and possibly repeat until you get the right one.<br>
<br>
<input type="checkbox"> 10. Once he's gone (Congratuations) you're done and you get the reward.
$questComplete
This quest guide was written on RuneHQ by Gnat88. Thanks to Keystone, Nitr021, Pirate Bob49, and pokemama for corrections.<br>
<br> 
This quest guide was entered into the database on Tue, Mar 02, 2004, at 09:46:46 PM by Weezy and CJH and was last updated on Sat, Feb 05, 2005, at 06:24:30 AM by nitro21.<br>
HTML; }