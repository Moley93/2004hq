<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<p>
    <table class="calculators">
        <tr>
            <th colspan="2">Rune Types</th>
        </tr>
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
    <table class="calculators">
        <tr>
            <th colspan=4>Enchanted Jewelry</th>
        </tr>
        <tr>
            <th>Item name</th>
            <th>Level to enchant</th>
            <th>Effect when equipped</th>
            <th>Number of uses</th>
        </tr>
        <tr>
            <td><canvas data-itemname="ring_of_recoil"></canvas><br>Ring of Recoil</td>
            <td>7</td>
            <td>Will deal the enemy you are fighting 10% of any damage you receive</td>
            <td>Allows a total damage of 40 to be done</td>
        </tr>
        <tr>
            <td><canvas data-itemname="amulet_of_magic"></canvas><br>Amulet of Magic</td>
            <td>7</td>
            <td>While worn players Magic attack is boosted by 10</td>
            <td>Permanent.<br>
            Works whenever it is equipped</td>
        </tr>
        <!-- disabled until november 24, 2004
        <tr>
            <td><canvas data-itemname="games_necklace"></canvas><br>Games Necklace</td>
            <td>7</td>
            <td>Allows the player to teleport to the Burthorpe Games Rooms</td>
            <td>Each necklace allows 8 teleports in total</td>
        </tr>
        -->
        <tr>
            <td><canvas data-itemname="ring_of_duel_8"></canvas><br>Ring of Dueling</td>
            <td>27</td>
            <td>Allows the player to teleport to the entrance of the Duel Arena</td>
            <td>Each ring allows 8 teleports in total</td>
        </tr>
        <tr>
            <td><canvas data-itemname="amulet_of_defence"></canvas><br>Amulet of Defence</td>
            <td>27</td>
            <td>While worn the players defence will be boosted by 7</td>
            <td>Permanent.<br>
            Works whenever it is equipped</td>
        </tr>
        <tr>
            <td><canvas data-itemname="ring_of_forging"></canvas><br>Ring of Forging</td>
            <td>49</td>
            <td>While smelting Iron ore the player will have a 100% success rate</td>
            <td>Allows 140 iron ores to be smelted in total</td>
        </tr>
        <tr>
            <td><canvas data-itemname="amulet_of_strength"></canvas><br>Amulet of Strength</td>
            <td>49</td>
            <td>While worn players strength is boosted by 10</td>
            <td>Permanent.<br>
            Works whenever it is equipped</td>
        </tr>
        <tr>
            <td><br><canvas data-itemname="ring_of_life"></canvas><br>Ring of Life</td>
            <td>57</td>
            <td>If your hitpoints drop below 10% without killing you, you will be teleported to Lumbridge</td>
            <td>Allows one teleport</td>
        </tr>
        <tr>
            <td><canvas data-itemname="amulet_of_power"></canvas><br>Amulet of Power</td>
            <td>57</td>
            <td>While worn the players attack, strength and defence will be boosted by 6</td>
            <td>Permanent.<br>
            Works whenever it is equipped</td>
        </tr>
        <tr>
            <td><canvas data-itemname="ring_of_wealth"></canvas><br>Ring of Wealth</td>
            <td>68</td>
            <td>While equipped the chance of getting rare items from monsters is increased</td>
            <td>Permanent.<br>
            Works whenever it is equipped</td>
        </tr>
        <tr>
            <td><canvas data-itemname="amulet_of_glory"></canvas><br>Amulet of Glory</td>
            <td>68</td>
            <td>Boosts attack, strength, magic, ranged and defence when worn. Can also be charged in the Heroes Guild to allow teleporting and to increase the chances of getting a gem when mining.</td>
            <td>Permanent.<br>
            Works whenever it is equipped</td>
        </tr>
    </table>
</p>
HTML; }