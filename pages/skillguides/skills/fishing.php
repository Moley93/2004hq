<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<p>
    Fishing is a quick way of getting food to heal yourself. There are various sorts of fishing spots in the game. You will need to buy the correct fishing equipment to match the fishing spot. Fishing equipment can be bought from fishing shops. 
    <br><br>
    Typically a fishing spot will have a left click option and a right click option.<br>
    These options are net, bait, harpoon, lure and cage. <br>
    Click on the correct option and if you have the correct equipment you will attempt to catch a fish.<br>

    <table class="calculators">
        <tr>
            <th>Fish</th>
            <th>Level<br>Required</th>
            <th>XP Per<br>Catch</th>
            <th>Fishing<br>Equipment</th>
            <th>Fishing Spot</th>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_shrimps"></canvas><br>Shrimp</td>
            <td>1</td>
            <td>10</td>
            <td>
                <canvas data-itemname="net"></canvas><br>
                Small Net<br>Fishing
            </td>
            <td><u>Net</u> / Bait</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_sardine"></canvas><br>Sardine</td>
            <td>5</td>
            <td>20</td>
            <td>
                <canvas data-itemname="fishing_rod"></canvas>
                <canvas data-itemname="fishing_bait"></canvas><br>
                Bait<br>Fishing
            </td>
            <td>Net / <u>Bait</u></td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_herring"></canvas><br>Herring</td>
            <td>10</td>
            <td>30</td>
            <td>
                <canvas data-itemname="fishing_rod"></canvas>
                <canvas data-itemname="fishing_bait"></canvas><br>
                Bait<br>Fishing
            </td>
            <td>Net / <u>Bait</u></td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_anchovies"></canvas><br>Anchovies</td>
            <td>15</td>
            <td>40</td>
            <td>
                <canvas data-itemname="net"></canvas><br>
                Small Net<br>Fishing
            </td>
            <td><u>Net</u> / Bait</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_mackerel"></canvas><br>Mackerel</td>
            <td>16</td>
            <td>20</td>
            <td>
                <canvas data-itemname="net_big"></canvas><br>
                Big Net<br>Fishing
            </td>
            <td><u>Net </u> / Harpoon</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_trout"></canvas><br>Trout</td>
            <td>20</td>
            <td>50</td>
            <td>
                <canvas data-itemname="fly_fishing_rod"></canvas>
                <canvas data-itemname="feather"></canvas><br>
                Fly<br>Fishing
            </td>
            <td><u>Lure</u> / Bait</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_cod"></canvas><br>Cod</td>
            <td>23</td>
            <td>45</td>
            <td>
                <canvas data-itemname="net_big"></canvas><br>
                Big Net<br>Fishing
            </td>
            <td><u>Net</u> / Harpoon</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_pike"></canvas><br>Pike</td>
            <td>25</td>
            <td>60</td>
            <td>
                <canvas data-itemname="fishing_rod"></canvas>
                <canvas data-itemname="fishing_bait"></canvas><br>
                Bait<br>Fishing
            </td>
            <td>Lure / <u>Bait</u></td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_salmon"></canvas><br>Salmon</td>
            <td>30</td>
            <td>70</td>
            <td>
                <canvas data-itemname="fly_fishing_rod"></canvas>
                <canvas data-itemname="feather"></canvas><br>
                Fly<br>Fishing
            </td>
            <td><u>Lure</u> / Bait</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_tuna"></canvas><br>Tuna</td>
            <td>35</td>
            <td>80</td>
            <td>
                <canvas data-itemname="harpoon"></canvas><br>
                Harpoon<br>Fishing
            </td>
            <td>Cage / <u>Harpoon</u></td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_lobster"></canvas><br>Lobster</td>
            <td>40</td>
            <td>90</td>
            <td>
                <canvas data-itemname="lobster_pot"></canvas><br>
                Lobster<br>Fishing
            </td>
            <td><u>Cage</u> / Harpoon</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_bass"></canvas><br>Bass</td>
            <td>46</td>
            <td>100</td>
            <td>
                <canvas data-itemname="net_big"></canvas><br>
                Big Net<br>Fishing
            </td>
            <td><u>Net</u> / Harpoon</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_swordfish"></canvas><br>Swordfish</td>
            <td>50</td>
            <td>100</td>
            <td>
                <canvas data-itemname="harpoon"></canvas><br>
                Harpoon<br>Fishing
            </td>
            <td>Cage / <u>Harpoon</u></td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_shark"></canvas><br>Shark</td>
            <td>76</td>
            <td>110</td>
            <td>
                <canvas data-itemname="harpoon"></canvas><br>
                Harpoon<br>Fishing
            </td>
            <td>Net / <u>Harpoon</u></td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_sea_turtle"></canvas><br>Sea Turtle</td>
            <td>79</td>
            <td>57</td>
            <td colspan=2>Trawler<br>Mini-Game</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_manta_ray"></canvas><br>Manta Ray</td>
            <td>81</td>
            <td>69</td>
            <td colspan=2>Trawler<br>Mini-Game</td>
        </tr>
    </table>
</p>
HTML; }