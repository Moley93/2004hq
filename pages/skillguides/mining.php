<?php
function getPageTitle() { return 'Mining'; }
function getPageMetaIcon() { return 'img/skillicons/mining.webp'; }
function getSkillContent() { return <<<HTML
<b>Mining Guide</b><br><br>
<br>
<br>
The mining skill is used to get ores and metals from rocks. The ores can then either be sold or made into different objects using the smithing and crafting skills. To mine, the only object you will need is a pickaxe. These can be bought at the pickaxe shop in the Dwarf Mines. Rocks can be found at the various mining sites in the RuneScape world.<br>
<br>
If you right click on a rock, you will get the option to prospect it. When you prospect a rock, you will be told what sort of ores you are able to mine from it. 
<br>
To mine a rock simply click the "Mine" option on the rock, the first on in the list. If there is an ore in that rock there is a chance you will extract it, provided your mining is high enough to mine that particular ore. <br>
Ore is quite hard to get out of rocks - it might take quite a few attempts before you meet with success. <br>
As your mining level gets higher it will become slowly easier. Once someone has mined a rock there will be no ore available to get from it for a short while; wait a bit and you will be able to mine ore from it again. <br>
<br>
<br>
<p>
<b>Mining levels</b><br>

<table width="100%" cellpadding="1" cellspacing="0" class="calculators">
<tr>
<th colspan="2">Ore</td>
<th>Level required</td>
</tr>

<tr>
<td><canvas data-itemname="clay"></td>
<td>Clay</td>
<td>1</td>
</tr>

<tr>
<td><canvas data-itemname="copper_ore"></td>
<td>Copper Ore</td>
<td>1</td>
</tr>

<tr>
<td><canvas data-itemname="tin_ore">tin_ore</td>
<td>Tin Ore</td>
<td>1</td>
</tr>

<tr>
<td><canvas data-itemname="iron_ore"></td>
<td>Iron Ore</td>
<td>15</td>
</tr>

<tr>
<td><canvas data-itemname="silver_ore"></td>
<td>Silver</td>
<td>20</td>
</tr>

<tr>
<td><canvas data-itemname="coal"></td>
<td>Coal</td>
<td>30</td>
</tr>

<tr>
<td><canvas data-itemname="gold_ore"></td>
<td>Gold</td>
<td>40</td>
</tr>

<tr>
<td><canvas data-itemname="mithril_ore"></td>
<td>Mithril</td>
<td>55</td>
</tr>

<tr>
<td><canvas data-itemname="adamantite_ore"></td>
<td>Adamantite</td>
<td>70</td>
</tr>

<tr>
<td><canvas data-itemname="runite_ore"></td>
<td>Runite</td>
<td>85</td>
</tr>
</table>

HTML; }