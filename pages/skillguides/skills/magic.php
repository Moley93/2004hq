<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<p>
    <h3>Rune Types</h3>
    <table>
    <tr>
        <td><canvas data-itemname="airrune"></canvas></td>
        <td>Air rune - Can be replaced by a staff of air.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="waterrune"></canvas></td>
        <td>Water rune - Can be replaced by a staff of water.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="earthrune"></canvas></td>
        <td>Earth rune - Can be replaced by a staff of earth.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="firerune"></canvas></td>
        <td>Fire rune - Can be replaced by a staff of fire.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="mindrune"></canvas></td>
        <td>Mind rune - Required for strike spells.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="bodyrune"></canvas></td>
        <td>Body rune - Required for curse spells.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="chaosrune"></canvas></td>
        <td>Chaos rune - Required for bolt spells.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="cosmicrune"></canvas></td>
        <td>Cosmic rune - Required for jewellery enchant spells.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="naturerune"></canvas></td>
        <td>Nature rune - Required for object conversion spells.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="deathrune"></canvas></td>
        <td>Death rune - Required for blast spells.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="lawrune"></canvas></td>
        <td>Law rune - Required for teleport spells.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="soulrune"></canvas></td>
        <td>Soul rune - Required for high level curse spells.</td>
    </tr>
    <tr>
        <td><canvas data-itemname="bloodrune"></canvas></td>
        <td>Blood rune - Required for high level wave spells.</td>
    </tr>
    </table>
    <br>
    <br>


    <b>Enchanted Jewellery</b><br><br>

    <table bgcolor="black" cellpadding="6" border="0">

    <tr>
    <td width="80" bgcolor="#382418"><b>Item name</b></td>
    <td width="80" bgcolor="#382418"><b>Level to enchant</b></td>
    <td width="140" bgcolor="#382418"><b>Effect when equipped</b></td>
    <td width="100" bgcolor="#382418"><b>Number of uses</b></td>
    </tr>


    <tr>
    <td>Ring of Recoil<br><canvas data-itemname="ring_of_recoil"></canvas></td>
    <td><br>Level 7<br><a href="https://web.archive.org/web/20050204061537/http://www.runescape.com/aff/runescape/members/members.html"></td>
    <td>Will deal the enemy you are fighting 10% of any damage you receive</td>
    <td>Allows a total damage of 40 to be done</td>
    </tr>


    <tr>
    <td>Amulet of Magic<br><canvas data-itemname="amulet_of_magic"></canvas></td>
    <td>Level 7</td>
    <td>While worn players Magic attack is boosted by 10</td>
    <td>Permanent.<br>
    Works whenever it is equipped</td>
    </tr>

    <!-- disabled until november 24, 2004
    <tr>
    <td>Games Necklace<br><canvas data-itemname="games_necklace"></canvas></td>
    <td>Level 7<br><a href="https://web.archive.org/web/20050204061537/http://www.runescape.com/aff/runescape/members/members.html"></td>
    <td>Allows the player to teleport to the Burthorpe Games Rooms</td>
    <td>Each necklace allows 8 teleports in total</td>
    </tr>
    -->

    <tr>
    <td>Ring of Dueling<br><canvas data-itemname="ring_of_duel_8"></canvas></td>
    <td>Level 27<br><a href="https://web.archive.org/web/20050204061537/http://www.runescape.com/aff/runescape/members/members.html"></td>
    <td>Allows the player to teleport to the entrance of the Duel Arena</td>
    <td>Each ring allows 8 teleports in total</td>
    </tr>


    <tr>
    <td>Amulet of Defence<br><canvas data-itemname="amulet_of_defence"></canvas></td>
    <td>Level 27</td>
    <td>While worn the players defence will be boosted by 7</td>
    <td>Permanent.<br>
    Works whenever it is equipped</td>
    </tr>


    <tr>
    <td>Ring of Forging<br><canvas data-itemname="ring_of_forging"></canvas></td>
    <td>Level 49<br><a href="https://web.archive.org/web/20050204061537/http://www.runescape.com/aff/runescape/members/members.html"></td>
    <td>While smelting Iron ore the player will have a 100% success rate</td>
    <td>Allows 140 iron ores to be smelted in total</td>
    </tr>


    <tr>
    <td>Amulet of Strength<br><canvas data-itemname="amulet_of_strength"></canvas></td>
    <td>Level 49</td>
    <td>While worn players strength is boosted by 10</td>
    <td>Permanent.<br>
    Works whenever it is equipped</td>
    </tr>


    <tr>
    <td>Ring of Life<br><canvas data-itemname="ring_of_life"></canvas></td>
    <td>Level 57<br><a href="https://web.archive.org/web/20050204061537/http://www.runescape.com/aff/runescape/members/members.html"></td>
    <td>If your hitpoints drop below 10% without killing you, you will be teleported to Lumbridge</td>
    <td>Allows one teleport</td>
    </tr>


    <tr>
    <td>Amulet of Power<br><canvas data-itemname="amulet_of_power"></canvas></td>
    <td>Level 57</td>
    <td>While worn the players attack, strength and defence will be boosted by 6</td>
    <td>Permanent.<br>
    Works whenever it is equipped</td>
    </tr>


    <tr>
    <td>Ring of Wealth<br><canvas data-itemname="ring_of_wealth"></canvas></td>
    <td>Level 68<br><a href="https://web.archive.org/web/20050204061537/http://www.runescape.com/aff/runescape/members/members.html"></td>
    <td>While equipped the chance of getting rare items from monsters is increased</td>
    <td>Permanent.<br>
    Works whenever it is equipped</td>
    </tr>


    <tr align="top">
    <td align="top">Amulet of Glory<br><canvas data-itemname="amulet_of_glory"></canvas></td>
    <td align="top">Level 68<br><a href="https://web.archive.org/web/20050204061537/http://www.runescape.com/aff/runescape/members/members.html"></td>
    <td>Boosts attack, strength, magic, ranged and defence when worn. Can also be charged in the Heroes Guild to allow teleporting and to increase the chances of getting a gem when mining.</td>
    <td align="top">Permanent.<br>
    Works whenever it is equipped</td>
    </tr>


    <td valign="top"></td>
    <td></td>

    </tr>
    </table>
</p>
HTML; }