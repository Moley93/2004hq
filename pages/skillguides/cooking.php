<?php
function getPageTitle() { return 'Cooking'; }
function getPageMetaIcon(){ return 'img/skillicons/cooking.webp'; }
function getSkillContent() { return <<<HTML
<center><b>Cooking</b></center><p>

<table width="100%" cellpadding="1" cellspacing="0" style="border-color:#FFFFFF;">
	<tbody><tr> 
		<th style="width:100px;text-align:center;text-size:10px;" valign="middle">Food</th>
		<th style="width:60px;text-align:center;size:10px;" valign="middle">Cooking Level</th>
		<th style="width:60px;text-align:center;size:10px;" valign="middle">Heals</th>
		<th style="width:60px;text-align:center;size:10px;" valign="middle">Bites</th>
		<th style="width:60px;text-align:center;size:10px;" valign="middle">Exp</th>
		<th style="width:60px;text-align:center;size:10px;" valign="middle">Raw</th>
        <th style="width:60px;text-align:center;size:10px;" valign="middle">Cooked</th>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Cooked Meat</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">3</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">30</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="raw_beef"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="cooked_meat"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Shrimp</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">3</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">30</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_shrimps"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="shrimps"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Bread</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">4</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">40</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="bread_dough"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="bread"></canvas></td>
  </tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Sardine</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">4</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">40</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_sardine"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="sardine"></canvas></td>
  </tr>
  <tr> 
		<td valign="middle" style="text-align:center;">Herring</td>
		<td valign="middle" style="text-align:center;">5</td>
		<td valign="middle" style="text-align:center;">5</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">50</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_herring"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="herring"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Mackerel</td>
		<td valign="middle" style="text-align:center;">10</td>
		<td valign="middle" style="text-align:center;">6</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">60</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_mackerel"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="mackerel"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Redberry Pie</td>
		<td valign="middle" style="text-align:center;">10</td>
		<td valign="middle" style="text-align:center;">6</td>
		<td valign="middle" style="text-align:center;">2</td>
		<td valign="middle" style="text-align:center;">78</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="uncooked_redberry_pie"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="redberry_pie"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Anchovies</td>
		<td valign="middle" style="text-align:center;">15</td>
		<td valign="middle" style="text-align:center;">3</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">30</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="raw_anchovies"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="anchovies"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Trout</td>
		<td valign="middle" style="text-align:center;">15</td>
		<td valign="middle" style="text-align:center;">7</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">70</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="raw_trout"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="trout"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Cod</td>
		<td valign="middle" style="text-align:center;">18</td>
		<td valign="middle" style="text-align:center;">7</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">70</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="raw_cod"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="cod"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Pike</td>
		<td valign="middle" style="text-align:center;">20</td>
		<td valign="middle" style="text-align:center;">8</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">80</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_pike"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="pike"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Meat Pie</td>
		<td valign="middle" style="text-align:center;">20</td>
		<td valign="middle" style="text-align:center;">8</td>
		<td valign="middle" style="text-align:center;">2</td>
		<td valign="middle" style="text-align:center;">80</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="uncooked_meat_pie"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="meat_pie"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Salmon</td>
		<td valign="middle" style="text-align:center;">25</td>
		<td valign="middle" style="text-align:center;">9</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">90</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_salmon"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="salmon"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Stew</td>
		<td valign="middle" style="text-align:center;">25</td>
		<td valign="middle" style="text-align:center;">9</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">117</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="uncooked_stew"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="stew"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Chompy Bird</td>
		<td valign="middle" style="text-align:center;">30</td>
		<td valign="middle" style="text-align:center;">10</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">100</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_chompy"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="cooked_chompy"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Tuna</td>
		<td valign="middle" style="text-align:center;">30</td>
		<td valign="middle" style="text-align:center;">10</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">100</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="raw_tuna"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="tuna"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Apple Pie</td>
		<td valign="middle" style="text-align:center;">30</td>
		<td valign="middle" style="text-align:center;">10</td>
		<td valign="middle" style="text-align:center;">2</td>
		<td valign="middle" style="text-align:center;">100</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="uncooked_apple_pie"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="apple_pie"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Wine</td>
		<td valign="middle" style="text-align:center;">35</td>
		<td valign="middle" style="text-align:center;">15</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">110</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="unfermented_wine"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="jug_wine"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Pizza</td>
		<td valign="middle" style="text-align:center;">35</td>
		<td valign="middle" style="text-align:center;">10</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">143</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="uncooked_pizza"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="plain_pizza"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Lobster</td>
		<td valign="middle" style="text-align:center;">40</td>
		<td valign="middle" style="text-align:center;">12</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">120</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="raw_lobster"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="lobster"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Cake</td>
		<td valign="middle" style="text-align:center;">40</td>
		<td valign="middle" style="text-align:center;">12</td>
		<td valign="middle" style="text-align:center;">3</td>
		<td valign="middle" style="text-align:center;">180</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="uncooked_cake"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="cake"></canvas></td>
	</tr>
	<tr> 
 		<td valign="middle" style="text-align:center;">Bass</td>
		<td valign="middle" style="text-align:center;">43</td>
		<td valign="middle" style="text-align:center;">13</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">130</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="raw_bass"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="bass"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Swordfish</td>
		<td valign="middle" style="text-align:center;">45</td>
		<td valign="middle" style="text-align:center;">14</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">140</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_swordfish"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="swordfish"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Meat Pizza</td>
		<td valign="middle" style="text-align:center;">45</td>
		<td valign="middle" style="text-align:center;">14</td>
		<td valign="middle" style="text-align:center;">2</td>
		<td valign="middle" style="text-align:center;">26</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="uncooked_pizza"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="meat_pizza"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Chocolate Cake</td>
		<td valign="middle" style="text-align:center;">50</td>
		<td valign="middle" style="text-align:center;">15</td>
		<td valign="middle" style="text-align:center;">3</td>
		<td valign="middle" style="text-align:center;">30</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="cake"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="chocolate_cake"></canvas></td>
	</tr>
                <tr> 
		<td valign="middle" style="text-align:center;">Oomlie Wrap</td>
		<td valign="middle" style="text-align:center;">50</td>
		<td valign="middle" style="text-align:center;">14</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">40</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_oomlie"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="wrapped_oomlie"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Lava Eel</td>
		<td valign="middle" style="text-align:center;">53</td>
		<td valign="middle" style="text-align:center;">14</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">140</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="raw_lava_eel"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="lava_eel"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Anchovy Pizza</td>
		<td valign="middle" style="text-align:center;">55</td>
		<td valign="middle" style="text-align:center;">16</td>
		<td valign="middle" style="text-align:center;">2</td>
		<td valign="middle" style="text-align:center;">140</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="uncooked_pizza"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="anchovy_pizza"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Ugthanki Kebab</td>
		<td valign="middle" style="text-align:center;">53</td>
		<td valign="middle" style="text-align:center;">19</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">120</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="kebab_mix"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="ugthanki_kebab"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Curry</td>
		<td valign="middle" style="text-align:center;">60</td>
		<td valign="middle" style="text-align:center;">19</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">221</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="uncooked_curry"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="curry"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Pineapple Pizza</td>
		<td valign="middle" style="text-align:center;">65</td>
		<td valign="middle" style="text-align:center;">20</td>
		<td valign="middle" style="text-align:center;">2</td>
		<td valign="middle" style="text-align:center;">110</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="uncooked_pizza"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="pineapple_pizza"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Shark</td>
		<td valign="middle" style="text-align:center;">80</td>
		<td valign="middle" style="text-align:center;">20</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">210</td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="raw_shark"></canvas></td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="shark"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Sea Turtle</td>
		<td valign="middle" style="text-align:center;">82</td>
		<td valign="middle" style="text-align:center;">20</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">N/A</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_sea_turtle"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="sea_turtle"></canvas></td>
	</tr>
	<tr> 
		<td valign="middle" style="text-align:center;">Manta Ray</td>
		<td valign="middle" style="text-align:center;">91</td>
		<td valign="middle" style="text-align:center;">22</td>
		<td valign="middle" style="text-align:center;">1</td>
		<td valign="middle" style="text-align:center;">N/A</td>
        <td valign="middle" style="text-align:center;"><canvas data-itemname="raw_manta_ray"></canvas></td>
		<td valign="middle" style="text-align:center;"><canvas data-itemname="manta_ray"></canvas></td>
	</tr>
</tbody></table>

HTML; }