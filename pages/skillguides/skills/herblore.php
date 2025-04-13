<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<p>
    Herblore is used to make different sorts of potions and poisons.<br>
    <br>
    Before you can use herblore you will need to complete the <a href="?p=questguides&quest=druidicritual">Druidic Ritual</a> quest.<br>
    <br>
    <h3>Identifying Herbs</h3>
    A lot of the herbs you find in the game will be unidentified.<br>
    <br>
    To be able to use them you will first need to use your herblore skill to identify them.<br>
    <br>
    Just click on a herb to identify it and if you are high enough level it will then become an identified herb type.<br>
    <br>
    As your herblore level gets higher you will be able to identify more and more different herbs.<br>
    <br><br>
    <h3>Mixing Potions</h3>
    You will need a vial. These can be bought from shops such as the herblore shop in Taverley or made using glassmaking crafting.<br>
    <br>
    Fill the vial with water from a sink or fountain.<br>
    <br>
    To make potions you will need a combination of one identified herb and one other ingredient as shown in the table below.<br>
    <br>
    You must add your herb to your vial of water first and then the other ingredient.<br>
    <br>
    As you reach higher levels you will be able to make more types of potions.<br>
    <br>
    <h3>Potion Recipies</h3>
    <table width="98%" cellpadding="1" cellspacing="0" class="calculators">
        <tr>
            <th>Level</th>
            <th>Herb</th>
            <th>Secondary</th>
            <th>Potion</th>
        </tr>
        <tr>
            <td>3</td>
            <td><canvas data-itemname="guam_leaf"></canvas><br>Guam Leaf</td>
            <td><canvas data-itemname="eye_of_newt"></canvas><br>Eye of Newt</td>
            <td><canvas data-itemname="3dose1attack"></canvas><br>Attack potion</td>
        </tr>
        <tr>
            <td>5</td>
            <td><canvas data-itemname="marentill"></canvas><br>Marrentill</td>
            <td><canvas data-itemname="unicorn_horn_dust"></canvas><br>Ground unicorn horn</td>
            <td><canvas data-itemname="3doseantipoison"></canvas><br>Antipoison potion</td>
        </tr>
        <tr>
            <td>12</td>
            <td><canvas data-itemname="tarromin"></canvas><br>Tarromin</td>
            <td><canvas data-itemname="limpwurt_root"></canvas><br>Limpwurt root</td>
            <td><canvas data-itemname="3dose1strength"></canvas><br>Strength potion</td>    
        </tr>
        <tr>
            <td>22</td>
            <td><canvas data-itemname="harralander"></canvas><br>Harralander</td>
            <td><canvas data-itemname="red_spiders_eggs"></canvas><br>Red spider's eggs</td>
            <td><canvas data-itemname="3dose1restore"></canvas><br>Stat restore potion</td>
        </tr>
        <tr>
            <td>30</td>
            <td><canvas data-itemname="ranarr_weed"></canvas><br>Ranarr weed</td>
            <td><canvas data-itemname="white_berries"></canvas><br>White Berries</td>
            <td><canvas data-itemname="4dose1defense"></canvas><br>Defence potion</td>
        </tr>
        <tr>
            <td>38</td>
            <td><canvas data-itemname="ranarr_weed"></canvas><br>Ranarr weed</td>
            <td><canvas data-itemname="snape_grass"></canvas><br>Snape Grass</td>
            <td><canvas data-itemname="3doseprayerrestore"></canvas><br>Restore prayer potion</td>
        </tr>
        <tr>
            <td>45</td>
            <td><canvas data-itemname="irit_leaf"></canvas><br>Irit Leaf</td>
            <td><canvas data-itemname="eye_of_newt"></canvas><br>Eye of newt</td>
            <td><canvas data-itemname="3dose2attack"></canvas><br>Super attack potion</td>
        </tr>
        <tr>
            <td>48</td>
            <td><canvas data-itemname="irit_leaf"></canvas><br>Irit Leaf</td>
            <td><canvas data-itemname="unicorn_horn_dust"></canvas><br>Ground unicorn horn</td>
            <td><canvas data-itemname="3dose2antipoison"></canvas><br>Super antipoison potion</td>
        </tr>
        <tr>
            <td>50</td>
            <td><canvas data-itemname="avantoe"></canvas><br>Avantoe</td>
            <td><canvas data-itemname="snape_grass"></canvas><br>Snape Grass</td>
            <td><canvas data-itemname="3dosefisherspotion"></canvas><br>Fishing potion</td>
        </tr>
        <tr>
            <td>55</td>
            <td><canvas data-itemname="kwuarm"></canvas><br>Kwuarm</td>
            <td><canvas data-itemname="limpwurt_root"></canvas><br>Limpwurt root</td>
            <td><canvas data-itemname="3dose2strength"></canvas><br>Super strength potion</td>
        </tr>
        <tr>
            <td>60</td>
            <td><canvas data-itemname="kwuarm"></canvas><br>Kwuarm</td>
            <td><canvas data-itemname="dragon_scale_dust"></canvas><br>Ground dragon scale</td>
            <td><canvas data-itemname="weapon_poison"></canvas><br>Weapon poison</td>
        </tr>
        <tr>
            <td>66</td>
            <td><canvas data-itemname="cadantine"></canvas><br>Cadantine</td>
            <td><canvas data-itemname="white_berries"></canvas><br>White Berries</td>
            <td><canvas data-itemname="3dose2defense"></canvas><br>Super defence potion</td>
        </tr>
        <tr>
            <td>69</td>
            <td><canvas data-itemname="lantadyme"></canvas><br>Lantadyme</td>
            <td><canvas data-itemname="dragon_scale_dust"></canvas><br>Ground dragon scale</td>
            <td><canvas data-itemname="3dose1antidragon"></canvas><br>Anti-FireBreath potion</td>
        </tr>
        <tr>
            <td>72</td>
            <td><canvas data-itemname="dwarf_weed"></canvas><br>Dwarf weed</td>
            <td><canvas data-itemname="wine_of_zamorak"></canvas><br>Wine of Zamorak</td>
            <td><canvas data-itemname="3doserangerspotion"></canvas><br>Ranging potion</td>
        </tr>
    </table>
    <br><br>
    <h3>Ground Ingredients</h3>
    The unicorn and dragon scale need to be ground before they can be used in the potions.<br>
    <br>
    To grind them use the pestle and mortar bought from the herblore shop.<br>
    <br><br>
    <table width="98%" cellpadding="1" cellspacing="0" class="calculators">
        <tr>
            <th>Start</th>
            <th>Use with</th>
            <th>Result</th>
        </tr>
        <tr>
            <td><canvas data-itemname="unicorn_horn"></canvas><br>Unicorn Horn</td>
            <td><canvas data-itemname="pestle_and_mortar"></canvas><br>Pestle & Mortar</td>
            <td><canvas data-itemname="unicorn_horn_dust"></canvas><br>Unicorn horn dust</td>
        </tr>
        <tr>
            <td><canvas data-itemname="blue_dragon_scale"></canvas><br>Blue Dragon Scale</td>
            <td><canvas data-itemname="pestle_and_mortar"></canvas><br>Pestle & Mortar</td>
            <td><canvas data-itemname="dragon_scale_dust"></canvas><br>Ground dragon scale</td>
        </tr>
    </table>
    <br>
    <h3>Weapon poison</h3>
    The weapon poison can only be used only on certain weapons such as arrows and daggers.<br>
    <br>
    Players can be poisoned by other player's poisoned weapons or by a poisonous npc.<br>
    <br>
    A player will slowly take damage from the poison until it either wears off or they drink an anti-poison potion.<br>
    <br>
    The potion also grants a small immunity so that the drinker cannot be poisoned for a short while.
</p>
HTML; }