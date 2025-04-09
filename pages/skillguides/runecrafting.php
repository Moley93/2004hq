<?php
function getPageTitle() { return 'Runecrafting'; }
function getPageMetaIcon() { return 'img/skillicons/runecrafting.webp'; }
function getSkillContent() { return <<<HTML
<b>Runecrafting</b><p>

<p>
Runecrafting is used to make different sorts of Runes, for use in magic.
Before you can use runecrafting you will need to complete the <a href="pages/questguides/free/runemysteries.php" class="c">Rune Mysteries</a> quest.

<p>
<b>Mining rune essences</b>
<p>
The location of the source of Rune essence is a closely guarded secret, so you will need to find various NPCs around the game world to take you to it.
<br>
<table><tr><td><canvas data-itemname="blankrune"></canvas></td><td>
Once there, you can click on the large essence stones to mine them with a pickaxe. You then need to take the essences you have mined to an elemental temple to turn these essences into magical runes.
</td></tr></table> 
<br>
These temples are hidden throughout RuneScape, but you can locate them with the help of a runecrafting talisman. Some examples of talismans are shown below:
<p>
<table cellpadding="4">
<tr><td><canvas data-itemname="air_talisman"></canvas></td>
<td>Air talisman - Will help you locate the Air Temple.</td></tr>
<tr><td><canvas data-itemname="water_talisman"></canvas></td>
<td>Water talisman - Will help you locate the Water Temple.</td></tr>
<tr><td><canvas data-itemname="earth_talisman"></canvas></td>
<td>Earth talisman - Will help you locate the Earth Temple.</td></tr>
<tr><td><canvas data-itemname="fire_talisman"></canvas></td>
<td>Fire talisman - Will help you locate the Fire Temple.</td></tr>
<tr><td><canvas data-itemname="body_talisman"></canvas></td>
<td>Body talisman - Will help you locate the Body Temple.</td></tr>
<tr><td><canvas data-itemname="mind_talisman"></canvas></td>
<td>Mind talisman - Will help you locate the Mind Temple.</td></tr>
<tr><td><canvas data-itemname="cosmic_talisman"></canvas></td>
<td>Cosmic talisman - Will help you locate the Cosmic Temple.</td></tr>
<tr><td><canvas data-itemname="chaos_talisman"></canvas></td>
<td>Chaos talisman - Will help you locate the Chaos Temple.</td></tr>
<tr><td><canvas data-itemname="nature_talisman"></canvas></td>
<td>Nature talisman - Will help you locate the Nature Temple.</td></tr>
</table>
<p>
These first talismans can be found as fairly common drops from various NPCs, but the whereabouts of the higher levelled talismans will need to be discovered by those wishing to use them...
<p>
<b>Locating rune temples</b>
<p>
<table><tr><td>
To locate each temple, take the talisman and select the locate option.
The talisman will pull in the direction where the rune temple is located. 
<br>
Because runecrafting is an ancient skill that has been forgotten until recently, the elemental temples have become ruined. When you find the ruins of the temple you are looking for, use your talisman on these ruins.
</td><td><img src="https://oldschool.runescape.wiki/images/thumb/Air_Altar_outside.png/280px-Air_Altar_outside.png?6240c"></td></tr></table>
<table><tr><td><img src="https://oldschool.runescape.wiki/images/thumb/Water_Altar_outside.png/300px-Water_Altar_outside.png?92951"></td><td>
This will magically teleport you to a restored version of the temple, where you will be able to convert your rune essences into rune stones. 
<p>
When you have finished crafting your runes, click on the glowing portal to return to the ruins where you entered the temple.
</td></tr></table>
<p>
As you advance through the levels of runecrafting, you will become more adept at turning the raw materials of rune essence into runes.<p>
What this means is that as your increases you will be able to make more than one rune from each essence you bind. <br>
At higher levels you can make up to 8 runes from a  single essence, depending on the rune you are crafting.
<p>
The following table shows what levels are required to runecraft various runes. A similar table to the one below can be opened in the game by clicking the runecraft skill icon in the stats menu.<p>


<table width="100%" cellpadding="1" cellspacing="0" class="calculators">
<tr>
<th>Rune</td>
<th>Level</td>
<th>Rune</td>
<th>Level</td>
</tr>

<tr>
<td>Air rune<br><canvas data-itemname="airrune"></canvas></td>
<td>1</td>
<td>Mind runes<br><canvas data-itemname="mindrune"></canvas></td>
<td>2</td>
</tr>

<tr>
<td>Water rune<br><canvas data-itemname="waterrune"></canvas></td>
<td>5</td>
<td>Earth rune<br><canvas data-itemname="earthrune"></canvas></td>
<td>9</td>
</tr>

<tr>
<td>Fire rune<br><canvas data-itemname="firerune"></canvas></td>
<td>14</td>
<td>Body runes<br><canvas data-itemname="bodyrune"></canvas></td>
<td>20</td>
</tr>

<tr>
<td>Cosmic runes<br><canvas data-itemname="cosmicrune"></canvas></td>
<td>27</td>
<td>Chaos runes<br><canvas data-itemname="chaosrune"></canvas></td>
<td>35</td>
</tr>

<tr>
<td>Nature runes<br><canvas data-itemname="naturerune"></canvas></td>
<td>44</td>
</tr>

</table>

HTML; }