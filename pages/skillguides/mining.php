<?php
function getPageTitle() { return 'Mining'; }
function getPageMetaIcon() { return 'img/skillicons/mining.webp'; }
function getSkillContent() { return <<<HTML
<center><b>Mining Guide</b><br><br></center>
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
<center><b>Mining levels</b></center><br>
<center>
<table bgcolor="black" cellpadding="6" border="0">

<tr>
<td bgcolor="#382418"><center><b></b></center></td>
<td bgcolor="#382418"><center><b>Ore</b></center></td>
<td bgcolor="#382418"><center><b>Level required</b></center></td>
</tr>

<tr>
<td><center><canvas data-itemname="clay"></center></td>
<td><center>Clay</center></td>
<td><center>1</center></td>
</tr>

<tr>
<td><center><canvas data-itemname="copper_ore"></center></td>
<td><center>Copper Ore</center></td>
<td><center>1</center></td>
</tr>

<tr>
<td><center><canvas data-itemname="tin_ore">tin_ore</center></td>
<td><center>Tin Ore</center></td>
<td><center>1</center></td>
</tr>

<tr>
<td><center><canvas data-itemname="iron_ore"></center></td>
<td><center>Iron Ore</center></td>
<td><center>15</center></td>
</tr>

<tr>
<td><center><canvas data-itemname="silver_ore"></center></td>
<td><center>Silver</center></td>
<td><center>20</center></td>
</tr>

<tr>
<td><center><canvas data-itemname="coal"></center></td>
<td><center>Coal</center></td>
<td><center>30</center></td>
</tr>

<tr>
<td><center><canvas data-itemname="gold_ore"></center></td>
<td><center>Gold</center></td>
<td><center>40</center></td>
</tr>

<tr>
<td><center><canvas data-itemname="mithril_ore"></center></td>
<td><center>Mithril</center></td>
<td><center>55</center></td>
</tr>

<tr>
<td><center><canvas data-itemname="adamantite_ore"></center></td>
<td><center>Adamantite</center></td>
<td><center>70</center></td>
</tr>

<tr>
<td><center><canvas data-itemname="runite_ore"></center></td>
<td><center>Runite</center></td>
<td><center>85</center></td>
</tr>
</table>
</center>
HTML; }