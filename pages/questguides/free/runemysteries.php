<?php
$meta_data['title'] = 'Quests > Rune Essentials';
$meta_data['og:title'] = $meta_data['title'];
function getQuestGuide($questName) { return <<<HTML
<h2>2004HQ - $questName</h2>

Description: Want to learn how to craft runes? Then this is the quest you need to complete.<br>
<br>
<b>Difficulty Level: <font color="Green">Easy</font></b><br>
<br>
<!-- Items/Skills Needed To Start: Pick Axe to mine Rune Essentials -->
Items/Skills Needed To Start: Pickaxe to mine Rune Essence<br>
<br>
Starting Location: <span data-floors="US">2nd floor</span> of Lumbridge Castle<br>
<br>
Reward: 1 Quest Point, free teleport to the Rune Essence Mine by speaking to either Aubury or Sedridor<br>
<br>
<b>Instructions:</b><br>
<br>
To start the quest, speak to Duke Horacio, who is located on the <span data-floors="US">2nd floor</span> of Lumbridge Castle.<br>
<br>
He'll ask you to deliver a rare air talisman to the Head Wizard, who is located in the basement of the Wizard Tower.<br>
<br>
He will give you an item that you must take to the rune shop seller in Varrock. He is located in southeast Varrock, behind the bank.<br>
<br>
The rune seller, Aubury, will give you some findings to take back to the Head Wizard. Return to him once more.<br>
<br>
Congratulations — you have completed the first RS2-introduced quest!<br>
<br>
<img src="img/questimages/runemysteries1.png" height="224" width="364"><br> 
<br>
This quest guide was written on RuneHQ by evadek. Thanks to Monkeychris, Rebelbeta, Sharker998, Archangel Malachi, Neek, Tomk4k, Therichsweede, and Poison for corrections.<br>
<br>
This quest guide was entered into the database on Mon, Dec 01, 2003, at 06:12:25 PM by MrStormy and was last updated on Wed, Mar 31, 2004, at 05:01:06 PM.<br>
HTML; }