<?php
function getPageTitle() { return 'Herblore'; }
function getPageMetaIcon() { return 'img/skillicons/herblore.webp'; }
function getSkillContent() { return <<<HTML
<b>Herblore Guide</b>
<p>
Herblore is used to make different sorts of potions and poisons.
Before you can use herblore you will need to complete the druidic ritual quest.
</p>

<b>Identifying Herbs</b>
<p>
A lot of the herbs you find in the game will be unidentified. To be able to use them
you will first need to use your herblore skill to identify them. Just click on a herb to
identify it and if you are high enough level it will then become an identified herb type.
As your herblore level gets higher you will be able to identify more and more different herbs.
</p>

<b>Mixing Potions</b>
<p>
You will need a vial. These can be bought from shops such as the herblore shop in Taverley or made using glassmaking crafting. Fill the vial with water from a sink or fountain. To make potions you will need a combination of one identified herb and one other ingredient as shown in the table below. You must add your herb to your vial of water first and then the other ingredient. As you reach higher levels you will be able to make more types of potions.
</p>

<b>Potion Recipies</b>
<table width="98%" cellpadding="1" cellspacing="0" class="calculators">
<thead>
    <th style="background-color:#382418;" width="10%"><b>Level</b></th>
    <th style="background-color:#382418;" width="30%" colspan="2"><b>Herb</b></th>
    <th style="background-color:#382418;" width="30%" colspan="2"><b>Secondary</b></th>
    <th style="background-color:#382418;" width="30%" colspan="2"><b>Potion</b></th>
</thead>
<tr>
    <td>3</td>
    <td><canvas data-itemname="guam_leaf"></canvas></td>
    <td>Guam Leaf</td>
    <td><canvas data-itemname="eye_of_newt"></canvas></td>
    <td>Eye of Newt</td>
    <td><canvas data-itemname="3dose1attack"></canvas></td>
    <td>Attack potion</td>
</tr>
<tr>
    <td>5</td>
    <td><canvas data-itemname="marentill"></canvas></td>
    <td>Marrentill</td>
    <td><canvas data-itemname="unicorn_horn_dust"></canvas></td>
    <td>Ground unicorn horn</td>
    <td><canvas data-itemname="3doseantipoison"></canvas></td>
    <td>Antipoison potion</td>
</tr>
<tr>
    <td>12</td>
    <td><canvas data-itemname="tarromin"></canvas></td>
    <td>Tarromin</td>
    <td><canvas data-itemname="limpwurt_root"></canvas></td>
    <td>Limpwurt root</td>
    <td><canvas data-itemname="3dose1strength"></canvas></td>    
    <td>Strength potion</td>
</tr>
<tr>
    <td>22</td>
    <td><canvas data-itemname="harralander"></canvas></td>
    <td>Harralander</td>
    <td><canvas data-itemname="red_spiders_eggs"></canvas></td>
    <td>Red spider's eggs</td>
    <td><canvas data-itemname="3dose1restore"></canvas></td>
    <td>Stat restore potion</td>
</tr>
<tr>
    <td>30</td>
    <td><canvas data-itemname="ranarr_weed"></canvas></td>
    <td>Ranarr weed</td>
    <td><canvas data-itemname="white_berries"></canvas></td>
    <td>White Berries</td>
    <td><canvas data-itemname="4dose1defense"></canvas></td>
    <td>Defence potion</td>
</tr>
<tr>
    <td>38</td>
    <td><canvas data-itemname="ranarr_weed"></canvas></td>
    <td>Ranarr weed</td>
    <td><canvas data-itemname="snape_grass"></canvas></td>
    <td>Snape Grass</td>
    <td><canvas data-itemname="3doseprayerrestore"></canvas></td>
    <td>Restore prayer potion</td>
</tr>
<tr>
    <td>45</td>
    <td><canvas data-itemname="irit_leaf"></canvas></td>
    <td>Irit Leaf</td>
    <td><canvas data-itemname="eye_of_newt"></canvas></td>
    <td>Eye of newt</td>
    <td><canvas data-itemname="3dose2attack"></canvas></td>    
    <td>Super attack potion</td>
</tr>
<tr>
    <td>48</td>
    <td><canvas data-itemname="irit_leaf"></canvas></td>
    <td>Irit Leaf</td>
    <td><canvas data-itemname="unicorn_horn_dust"></canvas></td>
    <td>Ground unicorn horn</td>
    <td><canvas data-itemname="3dose2antipoison"></canvas></td>
    <td>Super antipoison potion</td>
</tr>
<tr>
    <td>50</td>
    <td><canvas data-itemname="avantoe"></canvas></td>
    <td>Avantoe</td>
    <td><canvas data-itemname="snape_grass"></canvas></td>
    <td>Snape Grass</td>
    <td><canvas data-itemname="3dosefisherspotion"></canvas></td>
    <td>Fishing potion</td>
</tr>
<tr>
    <td>55</td>
    <td><canvas data-itemname="kwuarm"></canvas></td>
    <td>Kwuarm</td>
    <td><canvas data-itemname="limpwurt_root"></canvas></td>
    <td>Limpwurt root</td>
    <td><canvas data-itemname="3dose2strength"></canvas></td>
    <td>Super strength potion</td>
</tr>
<tr>
    <td>60</td>
    <td><canvas data-itemname="kwuarm"></canvas></td>
    <td>Kwuarm</td>
    <td><canvas data-itemname="dragon_scale_dust"></canvas></td>
    <td>Ground dragon scale</td>
    <td><canvas data-itemname="weapon_poison"></canvas></td>
    <td>Weapon poison</td>
</tr>
<tr>
    <td>66</td>
    <td><canvas data-itemname="cadantine"></canvas></td>
    <td>Cadantine</td>
    <td><canvas data-itemname="white_berries"></canvas></td>
    <td>White Berries</td>
    <td><canvas data-itemname="3dose2defense"></canvas></td>
    <td>Super defence potion</td>
</tr>
<tr>
    <td>69</td>
    <td><canvas data-itemname="lantadyme"></canvas></td>
    <td>Lantadyme</td>
    <td><canvas data-itemname="dragon_scale_dust"></canvas></td>
    <td>Ground dragon scale</td>
    <td><canvas data-itemname="3dose1antidragon"></canvas></td>    
    <td>Anti-FireBreath potion</td>
</tr>
<tr>
    <td>72</td>
    <td><canvas data-itemname="dwarf_weed"></canvas></td>
    <td>Dwarf weed</td>
    <td><canvas data-itemname="wine_of_zamorak"></canvas></td>
    <td>Wine of Zamorak</td>
    <td><canvas data-itemname="3doserangerspotion"></canvas></td>    
    <td>Ranging potion</td>
</tr>
</table>

<p><b>Ground Ingredients</b><br>

<p>
The unicorn and dragon scale need to be ground before they can be used in the potions.
To grind them use the pestle and mortar bought from the herblore shop.
<table width="98%" cellpadding="1" cellspacing="0" class="calculators">
<thead>
    <th style="background-color:#382418;" width="33%" colspan="2"><b>Start</b></th>
    <th style="background-color:#382418;" width="33%" colspan="2"><b>Use with</b></th>
    <th style="background-color:#382418;" width="33%" colspan="2"><b>Result</b></th>
</thead>
<tr>
    <td><canvas data-itemname="unicorn_horn"></canvas></td>
    <td>Unicorn Horn</td>
    <td><canvas data-itemname="pestle_and_mortar"></canvas></td>
    <td>Pestle & Mortar</td>
    <td><canvas data-itemname="unicorn_horn_dust"></canvas></td>
    <td>Ground dragon scale</td>
</tr>
<tr>
    <td><canvas data-itemname="blue_dragon_scale"></canvas></td>
    <td>Blue Dragon Scale</td>
    <td><canvas data-itemname="pestle_and_mortar"></canvas></td>
    <td>Pestle & Mortar</td>
    <td><canvas data-itemname="dragon_scale_dust"></canvas></td>
    <td>Ground dragon scale</td>
</tr>
</table>
<p>
<b>Weapon poison</b>
<p>

The weapon poison can only be used only on certain weapons such as arrows and daggers.  Players can be poisoned by other player's poisoned weapons or by a poisonous npc.<p>
A player will slowly take damage from the poison until it either wears off or they drink an anti-poison potion. The potion also grants a small immunity so that the drinker cannot be poisoned for a short while.
HTML; }