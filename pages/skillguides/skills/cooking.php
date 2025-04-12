<?php
function getPageTitle() { return 'Cooking'; }
function getPageMetaIcon(){ return 'img/skillicons/cooking.webp'; }
function getSkillContent() { return <<<HTML
<b>Cooking Guide</b>

<table width="100%" cellpadding="1" cellspacing="0" class="calculators">
	<tbody><tr> 
		<th>Food</th>
		<th>Cooking Level</th>
		<th>Heals</th>
		<th>Bites</th>
		<th>Exp</th>
		<th>Raw</th>
        <th>Cooked</th>
	</tr>
	<tr> 
		<td>Cooked Meat</td>
		<td>1</td>
		<td>3</td>
		<td>1</td>
		<td>30</td>
		<td><canvas data-itemname="raw_beef"></canvas></td>
        <td><canvas data-itemname="cooked_meat"></canvas></td>
	</tr>
	<tr> 
		<td>Shrimp</td>
		<td>1</td>
		<td>3</td>
		<td>1</td>
		<td>30</td>
        <td><canvas data-itemname="raw_shrimps"></canvas></td>
		<td><canvas data-itemname="shrimps"></canvas></td>
	</tr>
	<tr> 
		<td>Bread</td>
		<td>1</td>
		<td>4</td>
		<td>1</td>
		<td>40</td>
        <td><canvas data-itemname="bread_dough"></canvas></td>
		<td><canvas data-itemname="bread"></canvas></td>
  </tr>
	<tr> 
		<td>Sardine</td>
		<td>1</td>
		<td>4</td>
		<td>1</td>
		<td>40</td>
        <td><canvas data-itemname="raw_sardine"></canvas></td>
		<td><canvas data-itemname="sardine"></canvas></td>
  </tr>
  <tr> 
		<td>Herring</td>
		<td>5</td>
		<td>5</td>
		<td>1</td>
		<td>50</td>
        <td><canvas data-itemname="raw_herring"></canvas></td>
		<td><canvas data-itemname="herring"></canvas></td>
	</tr>
	<tr> 
		<td>Mackerel</td>
		<td>10</td>
		<td>6</td>
		<td>1</td>
		<td>60</td>
        <td><canvas data-itemname="raw_mackerel"></canvas></td>
		<td><canvas data-itemname="mackerel"></canvas></td>
	</tr>
	<tr> 
		<td>Redberry Pie</td>
		<td>10</td>
		<td>6</td>
		<td>2</td>
		<td>78</td>
        <td><canvas data-itemname="uncooked_redberry_pie"></canvas></td>
		<td><canvas data-itemname="redberry_pie"></canvas></td>
	</tr>
	<tr> 
		<td>Anchovies</td>
		<td>15</td>
		<td>3</td>
		<td>1</td>
		<td>30</td>
		<td><canvas data-itemname="raw_anchovies"></canvas></td>
        <td><canvas data-itemname="anchovies"></canvas></td>
	</tr>
	<tr> 
		<td>Trout</td>
		<td>15</td>
		<td>7</td>
		<td>1</td>
		<td>70</td>
		<td><canvas data-itemname="raw_trout"></canvas></td>
        <td><canvas data-itemname="trout"></canvas></td>
	</tr>
	<tr> 
		<td>Cod</td>
		<td>18</td>
		<td>7</td>
		<td>1</td>
		<td>70</td>
		<td><canvas data-itemname="raw_cod"></canvas></td>
        <td><canvas data-itemname="cod"></canvas></td>
	</tr>
	<tr> 
		<td>Pike</td>
		<td>20</td>
		<td>8</td>
		<td>1</td>
		<td>80</td>
        <td><canvas data-itemname="raw_pike"></canvas></td>
		<td><canvas data-itemname="pike"></canvas></td>
	</tr>
	<tr> 
		<td>Meat Pie</td>
		<td>20</td>
		<td>8</td>
		<td>2</td>
		<td>80</td>
        <td><canvas data-itemname="uncooked_meat_pie"></canvas></td>
		<td><canvas data-itemname="meat_pie"></canvas></td>
	</tr>
	<tr> 
		<td>Salmon</td>
		<td>25</td>
		<td>9</td>
		<td>1</td>
		<td>90</td>
        <td><canvas data-itemname="raw_salmon"></canvas></td>
		<td><canvas data-itemname="salmon"></canvas></td>
	</tr>
	<tr> 
		<td>Stew</td>
		<td>25</td>
		<td>9</td>
		<td>1</td>
		<td>117</td>
		<td><canvas data-itemname="uncooked_stew"></canvas></td>
        <td><canvas data-itemname="stew"></canvas></td>
	</tr>
	<tr> 
		<td>Chompy Bird</td>
		<td>30</td>
		<td>10</td>
		<td>1</td>
		<td>100</td>
        <td><canvas data-itemname="raw_chompy"></canvas></td>
		<td><canvas data-itemname="cooked_chompy"></canvas></td>
	</tr>
	<tr> 
		<td>Tuna</td>
		<td>30</td>
		<td>10</td>
		<td>1</td>
		<td>100</td>
		<td><canvas data-itemname="raw_tuna"></canvas></td>
        <td><canvas data-itemname="tuna"></canvas></td>
	</tr>
	<tr> 
		<td>Apple Pie</td>
		<td>30</td>
		<td>10</td>
		<td>2</td>
		<td>100</td>
		<td><canvas data-itemname="uncooked_apple_pie"></canvas></td>
        <td><canvas data-itemname="apple_pie"></canvas></td>
	</tr>
	<tr> 
		<td>Wine</td>
		<td>35</td>
		<td>15</td>
		<td>1</td>
		<td>110</td>
		<td><canvas data-itemname="unfermented_wine"></canvas></td>
        <td><canvas data-itemname="jug_wine"></canvas></td>
	</tr>
	<tr> 
		<td>Pizza</td>
		<td>35</td>
		<td>10</td>
		<td>1</td>
		<td>143</td>
		<td><canvas data-itemname="uncooked_pizza"></canvas></td>
        <td><canvas data-itemname="plain_pizza"></canvas></td>
	</tr>
	<tr> 
		<td>Lobster</td>
		<td>40</td>
		<td>12</td>
		<td>1</td>
		<td>120</td>
		<td><canvas data-itemname="raw_lobster"></canvas></td>
        <td><canvas data-itemname="lobster"></canvas></td>
	</tr>
	<tr> 
		<td>Cake</td>
		<td>40</td>
		<td>12</td>
		<td>3</td>
		<td>180</td>
        <td><canvas data-itemname="uncooked_cake"></canvas></td>
		<td><canvas data-itemname="cake"></canvas></td>
	</tr>
	<tr> 
 		<td>Bass</td>
		<td>43</td>
		<td>13</td>
		<td>1</td>
		<td>130</td>
		<td><canvas data-itemname="raw_bass"></canvas></td>
        <td><canvas data-itemname="bass"></canvas></td>
	</tr>
	<tr> 
		<td>Swordfish</td>
		<td>45</td>
		<td>14</td>
		<td>1</td>
		<td>140</td>
        <td><canvas data-itemname="raw_swordfish"></canvas></td>
		<td><canvas data-itemname="swordfish"></canvas></td>
	</tr>
	<tr> 
		<td>Meat Pizza</td>
		<td>45</td>
		<td>14</td>
		<td>2</td>
		<td>26</td>
		<td><canvas data-itemname="uncooked_pizza"></canvas></td>
        <td><canvas data-itemname="meat_pizza"></canvas></td>
	</tr>
	<tr> 
		<td>Chocolate Cake</td>
		<td>50</td>
		<td>15</td>
		<td>3</td>
		<td>30</td>
		<td><canvas data-itemname="cake"></canvas></td>
        <td><canvas data-itemname="chocolate_cake"></canvas></td>
	</tr>
                <tr> 
		<td>Oomlie Wrap</td>
		<td>50</td>
		<td>14</td>
		<td>1</td>
		<td>40</td>
        <td><canvas data-itemname="raw_oomlie"></canvas></td>
		<td><canvas data-itemname="wrapped_oomlie"></canvas></td>
	</tr>
	<tr> 
		<td>Lava Eel</td>
		<td>53</td>
		<td>14</td>
		<td>1</td>
		<td>140</td>
		<td><canvas data-itemname="raw_lava_eel"></canvas></td>
        <td><canvas data-itemname="lava_eel"></canvas></td>
	</tr>
	<tr> 
		<td>Anchovy Pizza</td>
		<td>55</td>
		<td>16</td>
		<td>2</td>
		<td>140</td>
		<td><canvas data-itemname="uncooked_pizza"></canvas></td>
        <td><canvas data-itemname="anchovy_pizza"></canvas></td>
	</tr>
	<tr> 
		<td>Ugthanki Kebab</td>
		<td>53</td>
		<td>19</td>
		<td>1</td>
		<td>120</td>
        <td><canvas data-itemname="kebab_mix"></canvas></td>
		<td><canvas data-itemname="ugthanki_kebab"></canvas></td>
	</tr>
	<tr> 
		<td>Curry</td>
		<td>60</td>
		<td>19</td>
		<td>1</td>
		<td>221</td>
		<td><canvas data-itemname="uncooked_curry"></canvas></td>
        <td><canvas data-itemname="curry"></canvas></td>
	</tr>
	<tr> 
		<td>Pineapple Pizza</td>
		<td>65</td>
		<td>20</td>
		<td>2</td>
		<td>110</td>
		<td><canvas data-itemname="uncooked_pizza"></canvas></td>
        <td><canvas data-itemname="pineapple_pizza"></canvas></td>
	</tr>
	<tr> 
		<td>Shark</td>
		<td>80</td>
		<td>20</td>
		<td>1</td>
		<td>210</td>
		<td><canvas data-itemname="raw_shark"></canvas></td>
        <td><canvas data-itemname="shark"></canvas></td>
	</tr>
	<tr> 
		<td>Sea Turtle</td>
		<td>82</td>
		<td>20</td>
		<td>1</td>
		<td>N/A</td>
        <td><canvas data-itemname="raw_sea_turtle"></canvas></td>
		<td><canvas data-itemname="sea_turtle"></canvas></td>
	</tr>
	<tr> 
		<td>Manta Ray</td>
		<td>91</td>
		<td>22</td>
		<td>1</td>
		<td>N/A</td>
        <td><canvas data-itemname="raw_manta_ray"></canvas></td>
		<td><canvas data-itemname="manta_ray"></canvas></td>
	</tr>
</tbody></table>

HTML; }