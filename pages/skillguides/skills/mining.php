<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<p>
    The mining skill is used to get ores and metals from rocks. The ores can then either be sold or made into different objects using the smithing and crafting skills. To mine, the only object you will need is a pickaxe. These can be bought at the pickaxe shop in the Dwarf Mines. Rocks can be found at the various mining sites in the RuneScape world.
    <br><br>
    If you right click on a rock, you will get the option to prospect it. When you prospect a rock, you will be told what sort of ores you are able to mine from it. 
    <br><br>
    To mine a rock simply click the "Mine" option on the rock, the first on in the list. If there is an ore in that rock there is a chance you will extract it, provided your mining is high enough to mine that particular ore
    <br><br>
    Ore is quite hard to get out of rocks - it might take quite a few attempts before you meet with success. As your mining level gets higher it will become slowly easier. Once someone has mined a rock there will be no ore available to get from it for a short while; wait a bit and you will be able to mine ore from it again.
    <hr>
    <h3>Mining Ores</h3>
    <table class="calculators">
        <tr>
            <th>Ore</th>
            <th>Level required</th>
        </tr>
        <tr>
            <td><canvas data-itemname="blankrune" data-show-label="true"></canvas></td>
            <td>1</td>
        </tr>
        <tr>
            <td><canvas data-itemname="clay" data-show-label="true"></canvas></td>
            <td>1</td>
        </tr>
        <tr>
            <td><canvas data-itemname="copper_ore" data-show-label="true"></canvas></td>
            <td>1</td>
        </tr>
        <tr>
            <td><canvas data-itemname="tin_ore" data-show-label="true"></canvas></td>
            <td>1</td>
        </tr>
        <tr>
            <td><canvas data-itemname="blurite_ore" data-show-label="true"></canvas></td>
            <td>10</td>
        </tr>
        <tr>
            <td><canvas data-itemname="iron_ore" data-show-label="true"></canvas></td>
            <td>15</td>
        </tr>
        <tr>
            <td><canvas data-itemname="silver_ore" data-show-label="true"></canvas></td>
            <td>20</td>
        </tr>
        <tr>
            <td><canvas data-itemname="coal" data-show-label="true"></canvas></td>
            <td>30</td>
        </tr>
        <tr>
            <td><canvas data-itemname="gold_ore" data-show-label="true"></canvas></td>
            <td>40</td>
        </tr>
        <tr>
            <td><img src="img/skillguides/shilo_gems.gif" height="28"><br>Gem rocks</td>
            <td>40</td>
        </tr>
        <tr>
            <td><canvas data-itemname="mithril_ore" data-show-label="true"></canvas></td>
            <td>55</td>
        </tr>
        <tr>
            <td><canvas data-itemname="adamantite_ore" data-show-label="true"></canvas></td>
            <td>70</td>
        </tr>
        <tr>
            <td><canvas data-itemname="runite_ore" data-show-label="true"></canvas></td>
            <td>85</td>
        </tr>
    </table>
    <hr>
    <h3>Pickaxes</h3>
    <table class="calculators">
        <tr>
            <th>Pickaxe</th>
            <th>Level required</th>
            <th>Price to Buy</th>
        </tr>
        <tr>
            <td><canvas data-itemname="bronze_pickaxe" data-show-label="true"></canvas></td>
            <td>1</td>
            <td>1 gp*</td>
        </tr>
        <tr>
            <td><canvas data-itemname="iron_pickaxe" data-show-label="true"></canvas></td>
            <td>1</td>
            <td>137 gp</td>
        </tr>
        <tr>
            <td><canvas data-itemname="steel_pickaxe" data-show-label="true"></canvas></td>
            <td>6</td>
            <td>500 gp</td>
        </tr>
        <tr>
            <td><canvas data-itemname="mithril_pickaxe" data-show-label="true"></canvas></td>
            <td>21</td>
            <td>1,300 gp</td>
        </tr>
        <tr>
            <td><canvas data-itemname="adamant_pickaxe" data-show-label="true"></canvas></td>
            <td>31</td>
            <td>3,200 gp</td>
        </tr>
        <tr>
            <td><canvas data-itemname="rune_pickaxe" data-show-label="true"></canvas></td>
            <td>41</td>
            <td>32,000 gp</td>
        </tr>
    </table>
    *Bronze pickaxes spawn in a few locations across RuneScape: Barbarian Village - house with spinning wheel and Lumbridge Castle gatehouse (<span data-floors="US">3rd floor</span>)
</p>
HTML; }