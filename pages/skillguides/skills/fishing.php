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
            <th>Level</th>
            <th>Fishing Spot Type</th>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_shrimps"></canvas><br>Shrimp</td>
            <td>1</td>
            <td>Net Fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_sardine"></canvas><br>Sardine</td>
            <td>5</td>
            <td>Sea bait fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_anchovies"></canvas><br>Anchovies</td>
            <td>15</td>
            <td>Net Fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_mackerel"></canvas><br>Mackerel</td>
            <td>16</td>
            <td>Big net fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_trout"></canvas><br>Trout</td>
            <td>20</td>
            <td>Fly Fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_cod"></canvas><br>Cod</td>
            <td>23</td>
            <td>Big net fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_salmon"></canvas><br>Salmon</td>
            <td>30</td>
            <td>Fly Fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_tuna"></canvas><br>Tuna</td>
            <td>35</td>
            <td>Harpoon fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_lobster"></canvas><br>Lobster</td>
            <td>40</td>
            <td>Lobster fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_bass"></canvas><br>Bass</td>
            <td>46</td>
            <td>Big net fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_swordfish"></canvas><br>Bass</td>
            <td>50</td>
            <td>Harpoon fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_shark"></canvas><br>Shark</td>
            <td>76</td>
            <td>Harpoon fishing</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_sea_turtle"></canvas><br>Sea Turtle</td>
            <td>79</td>
            <td>Trawler Mini Game</td>
        </tr>
        <tr>
            <td><canvas data-itemname="raw_manta_ray"></canvas><br>Manta Ray</td>
            <td>81</td>
            <td>Trawler Mini Game</td>
        </tr>
    </table>
</p>
HTML; }