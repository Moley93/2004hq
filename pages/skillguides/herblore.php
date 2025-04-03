<?php
function getPageTitle() { return 'Herblore'; }
function getPageMetaIcon() { return 'img/skillicons/herblore.webp'; }
function getPageContent() { return <<<HTML
<center><b>Herblore guide</b></center>

<p>
Herblore is used to make different sorts of potions and poisons.
Before you can use herblore you will need to complete the druidic ritual quest.

<p>
<center><b>Identifying herbs</b></center>
<p>
A lot of the herbs you find in the game will be unidentified. To be able to use them
you will first need to use your herblore skill to identify them. Just click on a herb to
identify it and if you are high enough level it will then become an identified herb type.
As your herblore level gets higher you will be able to identify more and more different herbs.


<center><b>Mixing potions</b></center>
<p>
You will need a vial. These can be bought from shops such as the herblore shop in Taverley or made using glassmaking crafting. Fill the vial with water from a sink or fountain. To make potions you will need a combination of one identified herb and one other ingredient as shown in the table below. You must add your herb to your vial of water first and then the other ingredient. As you reach higher levels you will be able to make more types of potions.




<p><center><b>Potion ingredients</b></center>
<p>
<table border="0" bgcolor="black" cellpadding="4" width="490">
<tr>
<td bgcolor="#382418" width="150"><center><b>Potion type</b></center></td>
<td bgcolor="#382418" width="40"><center><b>Level</b></center></td>
<td bgcolor="#382418" width="100"><center><b>Herb needed</b></center></td>
<td bgcolor="#382418" width="200" colspan="2"><center><b>2nd ingredient</b></center></td>
</tr>
<tr>
<td><center>Attack potion</center></td>
<td><center>3</center></td>
<td><center>Guam Leaf</center></td>
<td width="50"><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/eyeofnewt.gif"></center></td>
<td width="150"><center>Eye of Newt</center></td>
</tr>
<tr>
<td><center>Antipoison potion</center></td>
<td><center>5</center></td>
<td><center>Marrentill</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/groundunicornhorn.gif"></center></td>
<td><center>Ground unicorn horn</center></td>
</tr>
<tr>
<td><center>Strength potion</center></td>
<td><center>12</center></td>
<td><center>Tarromin</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/limpwurtroot.gif"></center></td>
<td><center>Limpwurt root</center></td>
</tr>
<tr>
<td><center>Stat restore potion</center></td>
<td><center>22</center></td>
<td><center>Harralander</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/redspidereggs.gif"></center></td>
<td><center>Red spider's eggs</center></td>
</tr>
<tr>
<td><center>defence potion</center></td>
<td><center>30</center></td>
<td><center>Ranarr weed</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/whiteberries.gif"></center></td>
<td><center>White Berries</center></td>
</tr>
<tr>
<td><center>Restore prayer potion</center></td>
<td><center>38</center></td>
<td><center>Ranarr weed</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/snapegrass.gif"></center></td>
<td><center>Snape Grass</center></td>
</tr>
<tr>
<td><center>Super attack potion</center></td>
<td><center>45</center></td>
<td><center>Irit Leaf</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/eyeofnewt.gif"></center></td>
<td><center>Eye of newt</center></td>
</tr>
<tr>
<td><center>Super antipoison potion</center></td>
<td><center>48</center></td>
<td><center>Irit Leaf</center></td>
<td width="50"><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/groundunicornhorn.gif"></center></td>
<td width="150"><center>Ground unicorn horn</center></td>
</tr>
<tr>
<td><center>Fishing potion</center></td>
<td><center>50</center></td>
<td><center>Avantoe</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/snapegrass.gif"></center></td>
<td><center>Snape Grass</center></td>
</tr>
<tr>
<td><center>Super strength potion</center></td>
<td><center>55</center></td>
<td><center>Kwuarm</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/limpwurtroot.gif"></center></td>
<td><center>Limpwurt root</center></td>
</tr>
<tr>
<td><center>Weapon poison</center></td>
<td><center>60</center></td>
<td><center>Kwuarm</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/groundbluedragonscale.gif"></center></td>
<td><center>Ground bluedragon scale</center></td>
</tr>
<tr>
<td><center>Super defence potion</center></td>
<td><center>66</center></td>
<td><center>Cadantine</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/whiteberries.gif"></center></td>
<td><center>White Berries</center></td>
</tr>
<tr>
<td><center>Anti-FireBreath potion</center></td>
<td><center>69</center></td>
<td><center>Lantadyme</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/groundbluedragonscale.gif"></center></td>
<td><center>Ground bluedragon scale</center></td>
</tr>
<tr>
<td><center>Ranging potion</center></td>
<td><center>72</center></td>
<td><center>Dwarf weed</center></td>
<td><center><img src="https://web.archive.org/web/20040619211935im_/http://www.runescape.com/img/rs2/manual/herblore/wineofzam.gif"></center></td>
<td><center>Wine of Zamorak</center></td>
</tr>
</table>

<p><center><b>Ground Ingredients</b></center><br>

<p>
The unicorn and blue dragon scale need to be ground before they can be used in the potions.
To grind them use the pestle and mortar bought from the herblore shop.

<p>
<center><b>Weapon poison</b></center>
<p>

he weapon poison can only be used only on certain weapons such as arrows and daggers.  Players can be poisoned by other player's poisoned weapons or by a poisonous npc.<p>
A player will slowly take damage from the poison until it either wears off or they drink an anti-poison potion. The potion also grants a small immunity so that the drinker cannot be poisoned for a short while.
HTML; } ?>