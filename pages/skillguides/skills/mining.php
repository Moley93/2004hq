<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<p>
    The mining skill is used to get ores and metals from rocks. The ores can then either be sold or made into different objects using the smithing and crafting skills. To mine, the only object you will need is a pickaxe. These can be bought at the pickaxe shop in the Dwarf Mines. Rocks can be found at the various mining sites in the RuneScape world.<br>
    <br>
    If you right click on a rock, you will get the option to prospect it. When you prospect a rock, you will be told what sort of ores you are able to mine from it. 
    <br>
    To mine a rock simply click the "Mine" option on the rock, the first on in the list. If there is an ore in that rock there is a chance you will extract it, provided your mining is high enough to mine that particular ore. <br>
    Ore is quite hard to get out of rocks - it might take quite a few attempts before you meet with success. <br>
    As your mining level gets higher it will become slowly easier. Once someone has mined a rock there will be no ore available to get from it for a short while; wait a bit and you will be able to mine ore from it again. <br>
    <br>
    <br>
    <h3>Mining Ores</h3>
    <table class="calculators">
        <tr>
            <th>Level required</td>
            <th>Ore</td>
        </tr>
        <tr>
            <td>1</td>
            <td><canvas data-itemname="clay"></canvas><br>Clay</td>
        </tr>
        <tr>
            <td>1</td>
            <td><canvas data-itemname="copper_ore"></canvas><br>Copper Ore</td>
        </tr>
        <tr>
            <td>1</td>
            <td><canvas data-itemname="tin_ore"></canvas><br>Tin Ore</td>
        </tr>
        <tr>
            <td>15</td>
            <td><canvas data-itemname="iron_ore"></canvas><br>Iron Ore</td>
        </tr>
        <tr>
            <td>20</td>
            <td><canvas data-itemname="silver_ore"></canvas><br>Silver</td>
        </tr>
        <tr>
            <td>30</td>
            <td><canvas data-itemname="coal"></canvas><br>Coal</td>
        </tr>
        <tr>
            <td>40</td>
            <td><canvas data-itemname="gold_ore"></canvas><br>Gold Ore</td>
        </tr>
        <tr>
            <td>55</td>
            <td><canvas data-itemname="mithril_ore"></canvas><br>Mithril Ore</td>
        </tr>
        <tr>
            <td>70</td>
            <td><canvas data-itemname="adamantite_ore"></canvas><br>Adamantite Ore</td>
        </tr>
        <tr>
            <td>85</td>
            <td><canvas data-itemname="runite_ore"></canvas><br>Runite Ore</td>
        </tr>
    </table>
    <h3>Pickaxes</h3>
    <table class="calculators">
        <tr>
            <th>Level required</td>
            <th>Pickaxe</td>
        </tr>
        <tr>
            <td>1</td>
            <td><canvas data-itemname="bronze_pickaxe"></canvas><br>Bronze Pickaxe</td>
        </tr>
        <tr>
            <td>1</td>
            <td><canvas data-itemname="iron_pickaxe"></canvas><br>Iron Pickaxe</td>
        </tr>
        <tr>
            <td>6</td>
            <td><canvas data-itemname="steel_pickaxe"></canvas><br>Steel Pickaxe</td>
        </tr>
        <!--<tr>
            <td>11</td>
            <td><canvas data-itemname="black_pickaxe"></canvas><br>Black Pickaxe</td>
        </tr>-->
        <tr>
            <td>21</td>
            <td><canvas data-itemname="mithril_pickaxe"></canvas><br>Mithril Pickaxe</td>
        </tr>
        <tr>
            <td>31</td>
            <td><canvas data-itemname="adamant_pickaxe"></canvas><br>Adamant Pickaxe</td>
        </tr>
        <tr>
            <td>41</td>
            <td><canvas data-itemname="rune_pickaxe"></canvas><br>Rune Pickaxe</td>
        </tr>
    </table>
</p>
HTML; }