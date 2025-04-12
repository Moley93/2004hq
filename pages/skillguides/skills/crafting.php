<?php
function getPageTitle() { return 'Crafting'; }
function getPageMetaIcon() { return 'img/skillicons/crafting.webp'; }
function getSkillContent() { return <<<HTML
<center><b>Crafting</b></center><p>

<table bgcolor="black" cellpadding="3" border="0">
<tr>
<td width="90" bgcolor="#382418"><center><b>Item</b></center></td>
<td width="90" bgcolor="#382418"><center><b>Level</b></center></td>
<td width="90" bgcolor="#382418"><center><b>Item</b></center></td>
<td width="90" bgcolor="#382418"><center><b>Level</b></center></td>
</tr>
<tr>
<td><center>Cut Opal<br><canvas data-itemname="opal"></canvas></center></td>
<td><center>Level 1<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
<td><center>Leather gloves<br><canvas data-itemname="leather_gloves"></canvas></center></td>
<td><center>Level 1</center></td>
</tr>

<tr>
<td><center>Pot<br><canvas data-itemname="pot_empty"></canvas></center></td>
<td><center>Level 1</center></td>
<td><center>Beer glass<br><canvas data-itemname="beer_glass"></canvas></center></td>
<td><center>Level 1<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td><center>Gold ring<br><canvas data-itemname="gold_ring"></canvas></center></td>
<td><center>Level 5</center></td>
<td valign="top"><center>Gold necklace<br><canvas data-itemname="gold_necklace"></canvas></center></td>
<td><center>Level 6</center></td>
</tr>

<tr>
<td><center>Pie dish<br><canvas data-itemname="piedish"></canvas></center></td>
<td><center>Level 7</center></td>
<td><center>Leather boots<br><canvas data-itemname="leather_boots"></canvas></center></td>
<td><center>Level 7</center></td>
</tr>

<tr>
<td valign="top"><center>Gold amulet<br><canvas data-itemname="gold_amulet"></canvas></center></td>
<td><center>Level 8</center></td>
<td><center>Bowl<br><canvas data-itemname="bowl_empty"></canvas></center></td>
<td><center>Level 8</center></td>
</tr>

<tr>
<td><center>Leather cowl<br><canvas data-itemname="leather_cowl"></canvas></center></td>
<td><center>Level 9</center></td>
<td><center>Bow strings<br><canvas data-itemname="bow_string"></canvas></center></td>
<td><center>Level 10<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td><center>Leather vambraces<br><canvas data-itemname="leather_vambraces"></canvas></center></td>
<td><center>Level 11</center></td>
<td><center>Cut jade<br><canvas data-itemname="jade"></canvas></center></td>
<td><center>Level 13<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td><center>Leather armour<br><canvas data-itemname="leather_body"></canvas></center></td>
<td><center>Level 14</center></td>
<td><center>Snail Shell<br><canvas data-itemname="snailshell1"></canvas></center></td>
<td><center>Level 15<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td><center>Holy symbol<br><canvas data-itemname="unblessed_symbol"></canvas></center></td>
<td><center>Level 16</center></td>
<td><center>Cut red topaz<br><canvas data-itemname="red_topaz"></canvas></center></td>
<td><center>Level 16<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td><center>Unholy symbol<br><canvas data-itemname="unpowered_symbol"></canvas></center></td>
<td><center>Level 17<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
<td><center>Leather chaps<br><canvas data-itemname="leather_chaps"></canvas></center></td>
<td><center>Level 18</center></td>
</tr>

<tr>
<td valign="top"><center>Cut sapphire<br><canvas data-itemname="sapphire"></canvas></center></td>
<td><center>Level 20</center></td>
<td><center>Sapphire ring<br><canvas data-itemname="sapphire_ring"></canvas></center></td>
<td><center>Level 20</center></td>
</tr>

<tr>
<td><center>Sapphire necklace<br><canvas data-itemname="sapphire_necklace"></canvas></center></td>
<td><center>Level 22</center></td>
<td><center>Sapphire amulet<br><canvas data-itemname="sapphire_amulet"></canvas></center></td>
<td><center>Level 24</center></td>
</tr>

<tr>
<td><center>Cut emerald<br><canvas data-itemname="emerald"></canvas></center></td>
<td><center>Level 27</center></td>
<td valign="top"><center>Emerald ring<br><canvas data-itemname="emerald_ring"></canvas></center></td>
<td><center>Level 27</center></td>
</tr>

<tr>
<td valign="top"><center>Hard leather body<br><canvas data-itemname="hardleather_body"></canvas></center></td>
<td><center>Level 28</center></td>
<td valign="top"><center>Emerald necklace<br><canvas data-itemname="emerald_necklace"></canvas></center></td>
<td><center>Level 29</center></td>
</tr>

<tr>
<td valign="top"><center>Emerald amulet<br><canvas data-itemname="emerald_amulet"></canvas></center></td>
<td><center>Level 31</center></td>
<td valign="top"><center>Vials<br><canvas data-itemname="vial_empty"></canvas></center></td>
<td><center>Level 33<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
</tr>

<tr>
<td valign="top"><center>Cut ruby<br><canvas data-itemname="ruby"></canvas></center></td>
<td><center>Level 34</center></td>
<td valign="top"><center>Ruby ring<br><canvas data-itemname="ruby_ring"></canvas></center></td>
<td><center>Level 34</center></td>
</tr>

<tr>
<td valign="top"><center>Leather Coif<br><canvas data-itemname="coif"></canvas></center></td>
<td><center>Level 38<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
<td valign="top"><center>Ruby Necklace<br><canvas data-itemname="ruby_necklace"></canvas></center></td>
<td><center>Level 40</center></td>
</tr>

<tr>
<td valign="top"><center>Studded Body<br><canvas data-itemname="studded_body"></canvas></center></td>
<td><center>Level 41<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
<td valign="top"><center>Cut Diamond<br><canvas data-itemname="diamond"></canvas></center></td>
<td><center>Level 43</center></td>
</tr>

<tr>
<td valign="top"><center>Diamond ring<br><canvas data-itemname="diamond_ring"></canvas></center></td>
<td><center>Level 43</center></td>
<td valign="top"><center>Studded chaps<br><canvas data-itemname="studded_chaps"></canvas></center></td>
<td><center>Level 44<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
</tr>

<tr>
<td valign="top"><center>Staff orb<br><canvas data-itemname="stafforb"></canvas></center></td>
<td><center>Level 46<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
<td valign="top"><center>Ruby amulet<br><canvas data-itemname="ruby_amulet"></canvas></center></td>
<td><center>Level 50</center></td>
</tr>

<tr>
<td valign="top"><center>Water battlestaff<br><canvas data-itemname="water_battlestaff"></canvas></center></td>
<td><center>Level 54<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
<td valign="top"><center>Cut dragonstone<br><canvas data-itemname="dragonstone"></canvas></center></td>
<td><center>Level 55<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
</tr>

<tr>
<td valign="top"><center>Dragonstone ring<br><canvas data-itemname="dragonstone_ring"></canvas></center></td>
<td><center>Level 55<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
<td valign="top"><center>Diamond necklace<br><canvas data-itemname="diamond_necklace"></canvas></center></td>
<td><center>Level 56</center></td>
</tr>

<tr>
<td valign="top"><center>Green Dragonhide vambraces<br><canvas data-itemname="dragonhide_vamb"></canvas></center></td>
<td><center>Level 57<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
<td valign="top"><center>Earth battlestaff<br><canvas data-itemname="earth_battlestaff"></canvas></center></td>
<td><center>Level 58<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
</tr>

<tr>
<td valign="top"><center>Green Dragonhide chaps<br><canvas data-itemname="dragonhide_chaps"></canvas></center></td>
<td><center>Level 60<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
<td valign="top"><center>Fire battlestaff<br><canvas data-itemname="fire_battlestaff"></canvas></center></td>
<td><center>Level 62<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></center></td>
</tr>

<tr>
<td valign="top"><center>Green Dragonhide body<br><canvas data-itemname="dragonhide_body"></canvas></center></td>
<td><center>Level 63<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
<td valign="top"><center>Air battlestaff<br><canvas data-itemname="air_battlestaff"></canvas></center></td>
<td><center>Level 66<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td valign="top"><center>Blue Dragonhide vambraces<br><canvas data-itemname="blue_dragonhide_vambraces"></canvas></center></td>
<td><center>Level 66<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
<td valign="top"><center>Blue Dragonhide chaps<br><canvas data-itemname="blue_dragonhide_chaps"></canvas></center></td>
<td><center>Level 68<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td valign="top"><center>Diamond amulet<br><canvas data-itemname="diamond_amulet"></canvas></center></td>
<td><center>Level 70</center></td>
<td valign="top"><center>Blue Dragonhide body<br><canvas data-itemname="blue_dragonhide_body"></canvas></center></td>
<td><center>Level 71<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td valign="top"><center>Dragonstone necklace<br><canvas data-itemname="dragonstone_necklace"></canvas></center></td>
<td><center>Level 72<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
<td valign="top"><center>Red Dragonhide vambraces<br><canvas data-itemname="red_dragonhide_vambraces"></canvas></center></td>
<td><center>Level 73<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td valign="top"><center>Red Dragonhide chaps<br><canvas data-itemname="red_dragonhide_chaps"></canvas></center></td>
<td><center>Level 75<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
<td valign="top"><center>Red Dragonhide body<br><canvas data-itemname="red_dragonhide_body"></canvas></center></td>
<td><center>Level 77<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td valign="top"><center>Black Dragonhide vambraces<br><canvas data-itemname="black_dragonhide_vambraces"></canvas></center></td>
<td><center>Level 79<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
<td valign="top"><center>Dragonstone amulet<br><canvas data-itemname="dragonstone_amulet"></canvas></center></td>
<td><center>Level 80<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

<tr>
<td valign="top"><center>Black Dragonhide chaps<br><canvas data-itemname="black_dragonhide_chaps"></canvas></center></td>
<td><center>Level 82<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
<td valign="top"><center>Black Dragonhide body<br><canvas data-itemname="black_dragonhide_body"></canvas></center></td>
<td><center>Level 84<br><a href="https://web.archive.org/web/20050204054353/http://www.runescape.com/aff/runescape/members/members.html"></a></center></td>
</tr>

</table>
</center>
<br>
HTML; }