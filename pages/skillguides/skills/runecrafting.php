<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<p>
    Runecrafting is used to make different sorts of Runes, for use in magic.
    Before you can use runecrafting you will need to complete the <a href="?p=questguides&quest=runemysteries" class="c">Rune Mysteries</a> quest.
    <h3>Mining rune essences</h3>

    The location of the source of Rune essence is a closely guarded secret, so you will need to find various NPCs around the game world to take you to it.
    <br>
    <table><tr><td><canvas data-itemname="blankrune"></canvas></td><td>
    Once there, you can click on the large essence stones to mine them with a pickaxe. You then need to take the essences you have mined to an elemental temple to turn these essences into magical runes.
    </td></tr></table> 
    <br>
    These temples are hidden throughout RuneScape, but you can locate them with the help of a runecrafting talisman. Some examples of talismans are shown in the table below.<br>
    <br>
    These first talismans can be found as fairly common drops from various NPCs, but the whereabouts of the higher levelled talismans will need to be discovered by those wishing to use them...

    <h3>Locating rune temples</h3>

    <table><tr><td>
    To locate each temple, take the talisman and select the locate option.
    The talisman will pull in the direction where the rune temple is located. 
    <br>
    Because runecrafting is an ancient skill that has been forgotten until recently, the elemental temples have become ruined. When you find the ruins of the temple you are looking for, use your talisman on these ruins.
    </td><td><img src="https://oldschool.runescape.wiki/images/thumb/Air_Altar_outside.png/280px-Air_Altar_outside.png?6240c"></td></tr></table>
    <table><tr><td><img src="https://oldschool.runescape.wiki/images/thumb/Water_Altar_outside.png/300px-Water_Altar_outside.png?92951"></td><td>
    This will magically teleport you to a restored version of the temple, where you will be able to convert your rune essences into rune stones. 

    When you have finished crafting your runes, click on the glowing portal to return to the ruins where you entered the temple.
    </td></tr></table>

    As you advance through the levels of runecrafting, you will become more adept at turning the raw materials of rune essence into runes.
    What this means is that as your increases you will be able to make more than one rune from each essence you bind. <br>
    At higher levels you can make up to 8 runes from a  single essence, depending on the rune you are crafting.

    The following table shows what levels are required to runecraft various runes. A similar table to the one below can be opened in the game by clicking the runecraft skill icon in the stats menu.<br>
    <br>
    <table width="100%" cellpadding="1" cellspacing="0" class="calculators">
        <tr>
            <th>Level</th>
            <th>Rune</th>
            <th>Talisman</th>
            <th>Altar Location</th>
        </tr>
        <tr>
            <td>1</td>
            <td><canvas data-itemname="airrune"></canvas><br>Air Rune</td>
            <td><canvas data-itemname="air_talisman"></canvas><br>Air talisman</td>
            <td>South of Falador</td>
        </tr>
        <tr>
            <td>2</td>
            <td><canvas data-itemname="mindrune"></canvas><br>Mind runes</td>
            <td><canvas data-itemname="mind_talisman"></canvas><br>Mind talisman</td>
            <td>Between Ice Moutain and Goblin Village</td>
        </tr>
        <tr>
            <td>5</td>
            <td><canvas data-itemname="waterrune"></canvas><br>Water rune</td>
            <td><canvas data-itemname="water_talisman"></canvas><br>Water talisman</td>
            <td>In Lumbridge Swamp</td>
        </tr>
        <tr>
            <td>9</td>
            <td><canvas data-itemname="earthrune"></canvas><br>Earth rune</td>
            <td><canvas data-itemname="earth_talisman"></canvas><br>Earth talisman</td>
            <td>North-east of Varrock</td>
        </tr>
        <tr>
            <td>14</td>
            <td><canvas data-itemname="firerune"></canvas><br>Fire rune</td>
            <td><canvas data-itemname="fire_talisman"></canvas><br>Fire talisman</td>
            <td>North-east of Al Kharik, outside the Duel Arena entrance</td>
        </tr>
        <tr>
            <td>20</td>
            <td><canvas data-itemname="bodyrune"></canvas><br>Body rune</td>
            <td><canvas data-itemname="body_talisman"></canvas><br>Body talisman</td>
            <td>Between Ice Moutain and Barbarian Village</td>
        </tr>
        <tr>
            <td>27</td>
            <td><canvas data-itemname="cosmicrune"></canvas><br>Cosmic rune</td>
            <td><canvas data-itemname="cosmic_talisman"></canvas><br>Cosmic talisman</td>
            <td>Southern part of Zanaris. Requires completing <a href="?p=questguides&quest=lostcity">Lost City</a></td>
        </tr>
        <tr>
            <td>35</td>
            <td><canvas data-itemname="chaosrune"></canvas><br>Chaos rune</td>
            <td><canvas data-itemname="chaos_talisman"></canvas><br>Chaos talisman</td>
            <td>Level 9 wilderness, south-east of the Dark Warrior's Fortress</td>
        </tr>
        <tr>
            <td>44</td>
            <td><canvas data-itemname="naturerune"></canvas><br>Nature rune</td>
            <td><canvas data-itemname="nature_talisman"></canvas><br>Nature talisman</td>
            <td>On Karamja, North of Shilo Village</td>
        </tr>
    </table>
</p>
HTML; }