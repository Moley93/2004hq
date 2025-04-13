<?php
function getPageTitle() { return 'Crafting'; }
function getPageMetaIcon() { return 'img/skillicons/crafting.webp'; }
function getSkillContent() { return <<<HTML
<h2>Crafting</h2>

<table class="calculators">
    <tr>
        <th>Crafting Level</th>
        <th>Ingredients</th>
        <th>Tools</th>
        <th>Product</th>
    </tr>
    <tr>
        <td>1</td>
        <td><canvas data-itemname="uncut_opal"></canvas><br><br>Uncut Opal</td>
        <td><canvas data-itemname="chisel"></canvas><br>Chisel</td>
        <td><canvas data-itemname="opal"></canvas><br>Opal</td>
    </tr>
    <tr>
        <td>1</td>
        <td><canvas data-itemname="wool"></canvas><br>Wool</td>
        <td>
            <img src="https://oldschool.runescape.wiki/images/thumb/Spinning_wheel_%28Seers%27_Village%29.png/151px-Spinning_wheel_%28Seers%27_Village%29.png" width=32px /><br>
            Spinning Wheel
        </td>
        <td><canvas data-itemname="ball_of_wool"></canvas><br>Ball of Wool</td>
    </tr>
    <tr>
        <td>1</td>
        <td><canvas data-itemname="leather"></canvas><br>Leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="leather_gloves"></canvas><br>Leather gloves</td>
    </tr>
    <tr>
        <td>1</td>
        <td>
            <canvas data-itemname="soft_clay"></canvas><br>Soft clay
        </td>
        <td>
            <img src="https://oldschool.runescape.wiki/images/archive/20170727073604%21Potter%27s_Wheel.png" width=32px /><br>
            Potter's wheel
        </td>
        <td><canvas data-itemname="unfired_pot"></canvas><br>Unfired pot</td>
    </tr>
    <tr>
        <td>1</td>
        <td><canvas data-itemname="unfired_pot"></canvas><br>Unfired pot</td>
        <td>
            <img src="https://oldschool.runescape.wiki/images/archive/20210830111523%21Pottery_Oven.png" width=32px /><br>
            Pottery Oven
        </td>
        <td><canvas data-itemname="pot_empty"></canvas><br>Pot</td>
    </tr>
    <tr>
        <td>1</td>
        <td><canvas data-itemname="molten_glass"></canvas><br>Molten glass</td>
        <td><canvas data-itemname="glassblowing_pipe"></canvas><br>Glassblowing pipe</td>
        <td><canvas data-itemname="beer_glass"></canvas><br>Beer glass</td>
    </tr>
    <tr>
        <td>5</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas><br>
            Gold bar
        </td>
        <td>
            <canvas data-itemname="ring_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Ring mould & Furnace
        </td>
        <td><canvas data-itemname="gold_ring"></canvas><br>Gold ring</td>
    </tr>
    <tr>
        <td>6</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas><br>
            Gold bar
        </td>
        <td>
            <canvas data-itemname="necklace_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Necklace mould, Furnace
        </td>
        <td><canvas data-itemname="gold_necklace"></canvas><br>Gold necklace</td>
    </tr>
    <tr>
        <td>7</td>
        <td>
            <canvas data-itemname="soft_clay"></canvas><br>Soft clay
        </td>
        <td>
            <img src="https://oldschool.runescape.wiki/images/archive/20170727073604%21Potter%27s_Wheel.png" width=32px /><br>
            Potter's wheel
        </td>
        <td><canvas data-itemname="unfired_piedish"></canvas><br>Unfired pie dish</td>
    </tr>
    <tr>
        <td>7</td>
        <td><canvas data-itemname="unfired_piedish"></canvas><br>Unfired pie dish</td>
        <td>
            <img src="https://oldschool.runescape.wiki/images/archive/20210830111523%21Pottery_Oven.png" width=32px /><br>
            Pottery Oven
        </td>
        <td><canvas data-itemname="piedish"></canvas><br>Pie dish</td>
    </tr>
    <tr>
        <td>7</td>
        <td><canvas data-itemname="leather"></canvas><br>Leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="leather_boots"></canvas><br>Leather boots</td>
    </tr>
    <tr>
        <td>8</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="ball_of_wool"></canvas><br>
            Gold bar, Ball of Wool
        </td>
        <td>
            <canvas data-itemname="amulet_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Amulet mould, Furnace
        </td>
        <td><canvas data-itemname="gold_amulet"></canvas><br>Gold amulet</td>
    </tr>
    <tr>
        <td>8</td>
        <td>
            <canvas data-itemname="soft_clay"></canvas><br>Soft clay
        </td>
        <td>
            <img src="https://oldschool.runescape.wiki/images/archive/20170727073604%21Potter%27s_Wheel.png" width=32px /><br>
            Potter's wheel
        </td>
        <td><canvas data-itemname="unfired_bowl"></canvas><br>Unfired bowl</td>
    </tr>
    <tr>
        <td>8</td>
        <td><canvas data-itemname="unfired_bowl"></canvas><br>Unfired bowl</td>
        <td>
            <img src="https://oldschool.runescape.wiki/images/archive/20210830111523%21Pottery_Oven.png" width=32px /><br>
            Pottery Oven
        </td>
        <td><canvas data-itemname="bowl_empty"></canvas><br>Bowl</td>
    </tr>
    <tr>
        <td>9</td>
        <td><canvas data-itemname="leather"></canvas><br>Leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="leather_cowl"></canvas><br>Leather cowl</td>
    </tr>
    <tr>
        <td>10</td>
        <td><canvas data-itemname="flax"></canvas><br>Flax</td>
        <td>
            <img src="https://oldschool.runescape.wiki/images/thumb/Spinning_wheel_%28Seers%27_Village%29.png/151px-Spinning_wheel_%28Seers%27_Village%29.png" width=32px /><br>
            Spinning Wheel
        </td>
        <td><canvas data-itemname="bow_string"></canvas><br>Bow string</td>
    </tr>
    <tr>
        <td>11</td>
        <td><canvas data-itemname="leather"></canvas><br>Leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="leather_vambraces"></canvas><br>Leather vambraces</td>
    </tr>
    <tr>
        <td>13</td>
        <td><canvas data-itemname="uncut_jade"></canvas><br>Uncut jade</td>
        <td><canvas data-itemname="chisel"></canvas><br>Chisel</td>
        <td><canvas data-itemname="jade"></canvas><br>Jade</td>
    </tr>
    <tr>
        <td>14</td>
        <td><canvas data-itemname="leather"></canvas><br>Leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="leather_body"></canvas><br>Leather body</td>
    </tr>
    <!-- <tr>
        <td>15</td>
        <td><canvas data-itemname="chisel"></canvas><br>Chisel</td>
        <td><canvas data-itemname="snailshell1"></canvas><br>Snail Shell</td>
    </tr> -->
    <tr>
        <td>16</td>
        <td>
            <canvas data-itemname="silver_bar"></canvas>
            <canvas data-itemname="ball_of_wool"></canvas><br>
            Silver Bar, Ball of Wool
        </td>
        <td>
            <canvas data-itemname="holy_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Holy mould, Furnace
        </td>
        <td><canvas data-itemname="unblessed_symbol"></canvas><br>Holy symbol</td>
    </tr>
    <tr>
        <td>16</td>
        <td><canvas data-itemname="uncut_red_topaz"></canvas><br>Uncut red topaz</td>
        <td><canvas data-itemname="chisel"></canvas><br>Chisel</td>
        <td><canvas data-itemname="red_topaz"></canvas><br>Red topaz</td>
    </tr>
    <tr>
        <td>17</td>
        <td>
            <canvas data-itemname="silver_bar"></canvas>
            <canvas data-itemname="ball_of_wool"></canvas><br>
            Silver Bar, Ball of Wool
        </td>
        <td>
            <canvas data-itemname="unholy_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Unholy mould, Furnace
        </td>
        <td><canvas data-itemname="unpowered_symbol"></canvas><br>Unholy symbol</td>
    </tr>
    <tr>
        <td>18</td>
        <td><canvas data-itemname="leather"></canvas><br>Leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="leather_chaps"></canvas><br>Leather chaps</td>
    </tr>
    <tr>
        <td>20</td>
        <td><canvas data-itemname="uncut_sapphire"></canvas><br>Uncut sapphire</td>
        <td><canvas data-itemname="chisel"></canvas><br>Chisel</td>
        <td><canvas data-itemname="sapphire"></canvas><br>Sapphire</td>
    </tr>
    <tr>
        <td>20</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="sapphire"></canvas><br>
            Gold bar, Sapphire
        </td>
        <td>
            <canvas data-itemname="ring_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Ring mould, Furnace
        </td>
        <td><canvas data-itemname="sapphire_ring"></canvas><br>Sapphire ring</td>
    </tr>
    <tr>
        <td>22</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="sapphire"></canvas><br>
            Gold bar, Sapphire
        </td>
        <td>
            <canvas data-itemname="necklace_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Necklace mould, Furnace
        </td>
        <td><canvas data-itemname="sapphire_necklace"></canvas><br>Sapphire necklace</td>
    </tr>
    <tr>
        <td>24</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="sapphire"></canvas>
            <canvas data-itemname="ball_of_wool"></canvas><br>
            Gold bar, Sapphire, Ball of Wool
        </td>
        <td>
            <canvas data-itemname="amulet_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Amulet mould, Furnace
        </td>
        <td><canvas data-itemname="sapphire_amulet"></canvas><br>Sapphire amulet</td>
    </tr>
    <tr>
        <td>27</td>
        <td><canvas data-itemname="uncut_emerald"></canvas><br>Uncut emerald</td>
        <td><canvas data-itemname="chisel"></canvas><br>Chisel</td>
        <td><canvas data-itemname="emerald"></canvas><br>Emerald</td>
    </tr>
    <tr>
        <td>27</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="emerald"></canvas><br>
            Gold bar, Emerald
        </td>
        <td>
            <canvas data-itemname="ring_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Ring mould, Furnace
        </td>
        <td><canvas data-itemname="emerald_ring"></canvas><br>Emerald ring</td>
    </tr>
    <tr>
        <td>28</td>
        <td><canvas data-itemname="hardleather"></canvas><br>Head leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="hardleather_body"></canvas><br>Hard leather body</td>
    </tr>
    <tr>
        <td>29</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="emerald"></canvas><br>
            Gold bar, Emerald
        </td>
        <td>
            <canvas data-itemname="necklace_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Necklace mould, Furnace
        </td>
        <td><canvas data-itemname="emerald_necklace"></canvas><br>Emerald necklace</td>
    </tr>
    <tr>
        <td>31</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="emerald"></canvas>
            <canvas data-itemname="ball_of_wool"></canvas><br>
            Gold bar, Emerald, Ball of Wool
        </td>
        <td>
            <canvas data-itemname="amulet_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Amulet mould, Furnace
        </td>
        <td><canvas data-itemname="emerald_amulet"></canvas><br>Emerald amulet</td>
    </tr>
    <tr>
        <td>33</td>
        <td><canvas data-itemname="molten_glass"></canvas><br>Molten glass</td>
        <td><canvas data-itemname="glassblowing_pipe"></canvas><br>Glassblowing pipe</td>
        <td><canvas data-itemname="vial_empty"></canvas><br>Vial</td>
    </tr>
    <tr>
        <td>34</td>
        <td><canvas data-itemname="uncut_ruby"></canvas><br>Uncut ruby</td>
        <td><canvas data-itemname="chisel"></canvas><br>Chisel</td>
        <td><canvas data-itemname="ruby"></canvas><br>Ruby</td>
    </tr>
    <tr>
        <td>34</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="ruby"></canvas><br>
            Gold bar, Ruby
        </td>
        <td>
            <canvas data-itemname="ring_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Ring mould, Furnace
        </td>
        <td><canvas data-itemname="ruby_ring"></canvas><br>Ruby ring</td>
    </tr>
    <tr>
        <td>38</td>
        <td><canvas data-itemname="leather"></canvas><br>Leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="coif"></canvas><br>Leather Coif</td>
    </tr>
    <tr>
        <td>40</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="ruby"></canvas><br>
            Gold bar, Ruby
        </td>
        <td>
            <canvas data-itemname="necklace_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Necklace mould, Furnace
        </td>
        <td><canvas data-itemname="ruby_necklace"></canvas><br>Ruby Necklace</td>
    </tr>
    <tr>
        <td>41</td>
        <td>
            <canvas data-itemname="leather_body"></canvas>
            <canvas data-itemname="steel_studs"></canvas><br>
            Leather body, Steel studs
        </td>
        <td>-</td>
        <td><canvas data-itemname="studded_body"></canvas><br>Studded Body</td>
    </tr>
    <tr>
        <td>43</td>
        <td><canvas data-itemname="uncut_diamond"></canvas><br>Uncut Diamond</td>
        <td><canvas data-itemname="chisel"></canvas><br>Chisel</td>
        <td><canvas data-itemname="diamond"></canvas><br>Diamond</td>
    </tr>
    <tr>
        <td>43</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="diamond"></canvas><br>
            Gold bar, Diamond
        </td>
        <td>
            <canvas data-itemname="ring_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Ring mould, Furnace
        </td>
        <td><canvas data-itemname="diamond_ring"></canvas><br>Diamond ring</td>
    </tr>
    <tr>
        <td>44</td>
        <td>
            <canvas data-itemname="leather_chaps"></canvas>
            <canvas data-itemname="steel_studs"></canvas><br>
            Leather chaps, Steel studs
        </td>
        <td>-</td>
        <td><canvas data-itemname="studded_chaps"></canvas><br>Studded chaps</td>
    </tr>
    <tr>
        <td>46</td>
        <td><canvas data-itemname="molten_glass"></canvas><br>Molten glass</td>
        <td><canvas data-itemname="glassblowing_pipe"></canvas><br>Glassblowing pipe</td>
        <td><canvas data-itemname="stafforb"></canvas><br>Staff orb</td>
    </tr>
    <tr>
        <td>50</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="ruby"></canvas>
            <canvas data-itemname="ball_of_wool"></canvas><br>
            Gold bar, Ruby, Ball of Wool
        </td>
        <td>
            <canvas data-itemname="amulet_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Amulet mould, Furnace
        </td>
        <td><canvas data-itemname="ruby_amulet"></canvas><br>Ruby amulet</td>
    </tr>
    <tr>
        <td>54</td>
        <td>
            <canvas data-itemname="water_orb"></canvas>
            <canvas data-itemname="battlestaff"></canvas><br>
            Water orb, Battlestaff
        </td>
        <td>-</td>
        <td><canvas data-itemname="water_battlestaff"></canvas><br>Water battlestaff</td>
    </tr>
    <tr>
        <td>55</td>
        <td><canvas data-itemname="uncut_dragonstone"></canvas><br>Uncut dragonstone</td>
        <td><canvas data-itemname="chisel"></canvas><br>Chisel</td>
        <td><canvas data-itemname="dragonstone"></canvas><br>Dragonstone</td>
    </tr>
    <tr>
        <td>55</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="dragonstone"></canvas><br>
            Gold bar, Dragonstone
        </td>
        <td>
            <canvas data-itemname="ring_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Ring mould, Furnace
        </td>
        <td><canvas data-itemname="dragonstone_ring"></canvas><br>Dragonstone ring</td>
    </tr>
    <tr>
        <td>56</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="diamond"></canvas><br>
            Gold bar, Diamond
        </td>
        <td>
            <canvas data-itemname="necklace_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Necklace mould, Furnace
        </td>
        <td><canvas data-itemname="diamond_necklace"></canvas><br>Diamond necklace</td>
    </tr>
    <tr>
        <td>57</td>
        <td><canvas data-itemname="dragon_leather"></canvas><br>Green dragon leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="dragonhide_vamb"></canvas><br>Green Dragonhide vambraces</td>
    </tr>
    <tr>
        <td>58</td>
        <td>
            <canvas data-itemname="earth_orb"></canvas>
            <canvas data-itemname="battlestaff"></canvas><br>
            Earth orb, Battlestaff
        </td>
        <td>-</td>
        <td><canvas data-itemname="earth_battlestaff"></canvas><br>Earth battlestaff</td>
    </tr>
    <tr>
        <td>60</td>
        <td>
            <canvas data-itemname="dragon_leather"></canvas>
            <canvas data-itemname="dragon_leather"></canvas><br>
            Green dragon leather (x2)
        </td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="dragonhide_chaps"></canvas><br>Green Dragonhide chaps</td>
    </tr>
    <tr>
        <td>62</td>
        <td>
            <canvas data-itemname="fire_orb"></canvas>
            <canvas data-itemname="battlestaff"></canvas><br>
            Fire orb, Battlestaff
        </td>
        <td>-</td>
        <td><canvas data-itemname="fire_battlestaff"></canvas><br>Fire battlestaff</td>
    </tr>
    <tr>
        <td>63</td>
        <td>
            <canvas data-itemname="dragon_leather"></canvas>
            <canvas data-itemname="dragon_leather"></canvas>
            <canvas data-itemname="dragon_leather"></canvas><br>
            Green dragon leather (x3)</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="dragonhide_body"></canvas><br>Green Dragonhide body</td>
    </tr>
    <tr>
        <td>66</td>
        <td>
            <canvas data-itemname="air_orb"></canvas>
            <canvas data-itemname="battlestaff"></canvas><br>
            Air orb, Battlestaff
        </td>
        <td>-</td>
        <td><canvas data-itemname="air_battlestaff"></canvas><br>Air battlestaff</td>
    </tr>
    <tr>
        <td>66</td>
        <td><canvas data-itemname="dragon_leather_blue"></canvas><br>Blue dragon leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="blue_dragonhide_vambraces"></canvas><br>Blue Dragonhide vambraces</td>
    </tr>
    <tr>
        <td>68</td>
        <td>
            <canvas data-itemname="dragon_leather_blue"></canvas>
            <canvas data-itemname="dragon_leather_blue"></canvas><br>
            Blue dragon leather (x2)
        </td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="blue_dragonhide_chaps"></canvas><br>Blue Dragonhide chaps</td>
    </tr>
    <tr>
        <td>70</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="diamond"></canvas>
            <canvas data-itemname="ball_of_wool"></canvas><br>
            Gold bar, Diamond, Ball of Wool
        </td>
        <td>
            <canvas data-itemname="amulet_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Amulet mould, Furnace
        </td>
        <td><canvas data-itemname="diamond_amulet"></canvas><br>Diamond amulet</td>
    </tr>
    <tr>
        <td>71</td>
        <td>
            <canvas data-itemname="dragon_leather_blue"></canvas>
            <canvas data-itemname="dragon_leather_blue"></canvas>
            <canvas data-itemname="dragon_leather_blue"></canvas><br>
            Blue dragon leather (x3)
        </td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="blue_dragonhide_body"></canvas><br>Blue Dragonhide body</td>
    </tr>
    <tr>
        <td>72</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="dragonstone"></canvas><br>
            Gold bar, Dragonstone
        </td>
        <td>
            <canvas data-itemname="necklace_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Necklace mould, Furnace
        </td>
        <td><canvas data-itemname="dragonstone_necklace"></canvas><br>Dragonstone necklace</td>
    </tr>
    <tr>
        <td>73</td>
        <td><canvas data-itemname="dragon_leather_red"></canvas><br>Red dragon leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="red_dragonhide_vambraces"></canvas><br>Red Dragonhide vambraces</td>
    </tr>
    <tr>
        <td>75</td>
        <td>
            <canvas data-itemname="dragon_leather_red"></canvas>
            <canvas data-itemname="dragon_leather_red"></canvas><br>
            Red dragon leather (x2)
        </td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="red_dragonhide_chaps"></canvas><br>Red Dragonhide chaps</td>
    </tr>
    <tr>
        <td>77</td>
        <td>
            <canvas data-itemname="dragon_leather_red"></canvas>
            <canvas data-itemname="dragon_leather_red"></canvas>
            <canvas data-itemname="dragon_leather_red"></canvas><br>
            Red dragon leather (x3)
        </td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="red_dragonhide_body"></canvas><br>Red Dragonhide body</td>
    </tr>
    <tr>
        <td>79</td>
        <td><canvas data-itemname="dragon_leather_black"></canvas><br>Black dragon leather</td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="black_dragonhide_vambraces"></canvas><br>Black Dragonhide vambraces</td>
    </tr>
    <tr>
        <td>80</td>
        <td>
            <canvas data-itemname="gold_bar"></canvas>
            <canvas data-itemname="dragonstone"></canvas>
            <canvas data-itemname="ball_of_wool"></canvas><br>
            Gold bar, Dragonstone, Ball of Wool
        </td>
        <td>
            <canvas data-itemname="amulet_mould"></canvas>
            <img src="https://oldschool.runescape.wiki/images/thumb/Furnace.png/200px-Furnace.png" width=32px /><br>
            Amulet mould, Furnace
        </td>
        <td><canvas data-itemname="dragonstone_amulet"></canvas><br>Dragonstone amulet</td>
    </tr>
    <tr>
        <td>82</td>
        <td>
            <canvas data-itemname="dragon_leather_black"></canvas>
            <canvas data-itemname="dragon_leather_black"></canvas><br>
            Black dragon leather (x2)
        </td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="black_dragonhide_chaps"></canvas><br>Black Dragonhide chaps</td>
    </tr>
    <tr>
        <td>84</td>
        <td>
            <canvas data-itemname="dragon_leather_black"></canvas>
            <canvas data-itemname="dragon_leather_black"></canvas>
            <canvas data-itemname="dragon_leather_black"></canvas><br>
            Black dragon leather (x3)
        </td>
        <td>
            <canvas data-itemname="needle"></canvas>
            <canvas data-itemname="thread"></canvas><br>
            Needle & Thread
        </td>
        <td><canvas data-itemname="black_dragonhide_body"></canvas><br>Black Dragonhide body</td>
    </tr>
</table>
HTML; }