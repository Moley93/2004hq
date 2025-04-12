<?php
function getPageTitle() { return 'Fishing'; }
function getPageMetaIcon() { return 'img/skillicons/fishing.webp'; }
function getSkillContent() { return <<<HTML
<b>Fishing</b>

<p>
Fishing is a quick way of getting food to heal yourself. There are various sorts of fishing spots in the game. You will need to buy the correct fishing equipment to match the fishing spot. Fishing equipment can be bought from fishing shops. 
</p>
Typically a fishing spot will have a left click option and a right click option.<br>
These options are net, bait, harpoon, lure and cage. <br>
Click on the correct option and if you have the correct equipment you will attempt to catch a fish.

<table width="100%" cellpadding="1" cellspacing="0" class="calculators">
<tr>
<th width="60%" colspan="2"><b>Fish</b></th>
<th width="20%"><b>Level</b></th>
<th width="20%"><b>Type</b></th>
</tr>

<tr>
<td>Shrimp</td>
<td><canvas data-itemname="raw_shrimps"></canvas></td>
<td>1</td>
<td>Net Fishing</td>
</tr>

<tr>
<td>Sardine</td>
<td><canvas data-itemname="raw_sardine"></canvas></td>
<td>5</td>
<td>Sea bait fishing</td>
</tr>

<tr>
<td>Anchovies</td>
<td><canvas data-itemname="raw_anchovies"></canvas></td>
<td>15</td>
<td>Net Fishing</td>
</tr>

<tr>
<td>Mackerel</td>
<td><canvas data-itemname="raw_mackerel"></canvas></td>
<td>16</td>
<td>Big net fishing</td>
</tr>

<tr>
<td>Trout</td>
<td><canvas data-itemname="raw_trout"></canvas></td>
<td>20</td>
<td>Fly Fishing</td>
</tr>

<tr>
<td>Cod</td>
<td><canvas data-itemname="raw_cod"></canvas></td>
<td>23</td>
<td>Big net fishing</td>
</tr>

<tr>
<td>Salmon</td>
<td><canvas data-itemname="raw_salmon"></canvas></td>
<td>30</td>
<td>Fly Fishing</td>
</tr>

<tr>
<td>Tuna</td>
<td><canvas data-itemname="raw_tuna"></canvas></td>
<td>35</td>
<td>Harpoon fishing</td>
</tr>

<tr>
<td>Lobster</td>
<td><canvas data-itemname="raw_lobster"></canvas></td>
<td>40</td>
<td>Lobster fishing</td>
</tr>

<tr>
<td>Bass</td>
<td><canvas data-itemname="raw_bass"></canvas></td>
<td>46</td>
<td>Big net fishing</td>
</tr>

<tr>
<td>Shark</td>
<td><canvas data-itemname="raw_shark"></canvas></td>
<td>76</td>
<td>Harpoon fishing</td>
</tr>

<tr>
<td>Sea Turtle</td>
<td><canvas data-itemname="raw_sea_turtle"></canvas></td>
<td>79</td>
<td>Trawler Mini Game</td>
</tr>

<tr>
<td>Manta Ray</td>
<td><canvas data-itemname="raw_manta_ray"></canvas></td>
<td>81</td>
<td>Trawler Mini Game</td>
</tr>

</table>
HTML; }