<?php
function getSpecialGuide($currSpecialGuide) { return <<<HTML
<h2>Best in Slot Gear</h2>
<b>Quick Links</b>
<br>
<a href="#defence-crush">Crush Defence</a> | <a href="#defence-stab">Stab Defence</a> | <a href="#defence-slash">Slash Defence</a><br>
<a href="#defence-ranged">Ranged Defence</a> | <a href="#defence-magic">Magic Defence</a><br>
<a href="#offense-crush">Crush Offense</a> | <a href="#offense-stabslash">Stab/Slash Offense</a><br>
<a href="#offense-ranged">Ranged Offense</a> | <a href="#offense-magic">Magic Offense</a><br>
<hr>
<h3 id="defence-crush">Crush Defence</h3>
<table>
    <td>
        <img src="img/special_guides/bis/defensecrush.png" width="200px"/>
    </td>
    <td>
    <table class="subtable">
        <tbody><tr><th>Attack bonus</th><th>Defence bonus</th></tr><tr><td>Stab: 60</td><td>Stab: 227</td></tr><tr><td>Slash: 71</td><td>Slash: 243</td></tr><tr><td>Crush: 0</td><td>Crush: 238</td></tr><tr><td>Magic: -55</td><td>Magic: 1</td></tr><tr><td>Range: -3</td><td>Range: 205</td></tr><tr><th colspan="2">Other bonuses</th></tr><tr><td>Strength: 73</td><td>Prayer: 0</td></tr></tbody>
    </table>
</td>
</table>
<table class="calculators">
    <tr>
        <th>Slot</th>
        <th>Item</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>Head</td>
        <td><canvas data-itemname="dragon_med_helm" data-show-label="inline"></canvas></td>
        <td>+32 Crush Resistance</td>
    </tr>
    <tr>
        <td>Cape</td>
        <td><canvas data-itemname="cape_of_legends" data-show-label="inline"></canvas></td>
        <td>+7 Crush Resistance</td>
    </tr>
    <tr>
        <td>Neck</td>
        <td><canvas data-itemname="gnome_amulet" data-show-label="inline"></canvas></td>
        <td>+13 Crush Resistance</td>
    </tr>
    <tr>
        <td>Weapon</td>
        <td><canvas data-itemname="dragon_longsword" data-show-label="inline"></canvas></td>
        <td>+2 Crush Resistance</td>
    </tr>
    <tr>
        <td>Chest</td>
        <td><canvas data-itemname="rune_chainbody" data-show-label="inline"></canvas></td>
        <td>+78 Crush Resistance</td>
    </tr>
    <tr>
        <td>Shield</td>
        <td><canvas data-itemname="dragon_sq_shield" data-show-label="inline"></canvas></td>
        <td>+48 Crush Resistance</td>
    </tr>
    <tr>
        <td>Legs</td>
        <td><canvas data-itemname="rune_platelegs" data-show-label="inline"></canvas></td>
        <td>+47 Crush Resistance</td>
    </tr>
    <tr>
        <td>Gloves</td>
        <td><canvas data-itemname="steel_gauntlets"></canvas><canvas data-itemname="gauntlets_of_chaos"></canvas><canvas data-itemname="gauntlets_of_cooking"></canvas><canvas data-itemname="gauntlets_of_goldsmithing"></canvas><br>Any Family Crest Gauntlets</td>
        <td>+7 Crush Resistance</td>
    </tr>
    <tr>
        <td>Boots</td>
        <td><canvas data-itemname="boots_ranger" data-show-label="inline"></canvas></td>
        <td>+4 Crush Resistance</td>
    </tr>
</table>
<hr>
<h3 id="defence-stab">Stab Defence</h3>
<table>
    <td>
        <img src="img/special_guides/bis/defensestab.png" width="200px"/>
    </td>
    <td>
        <table class="subtable">
            <tbody><tr><th>Attack bonus</th><th>Defence bonus</th></tr><tr><td>Stab: 42</td><td>Stab: 246</td></tr><tr><td>Slash: 0</td><td>Slash: 248</td></tr><tr><td>Crush: 62</td><td>Crush: 230</td></tr><tr><td>Magic: -70</td><td>Magic: -2</td></tr><tr><td>Range: -18</td><td>Range: 220</td></tr><tr><th colspan="2">Other bonuses</th></tr><tr><td>Strength: 57</td><td>Prayer: 5</td></tr></tbody>
        </table>
    </td>
</table>
<table class="calculators">
    <tr>
        <th>Slot</th>
        <th>Item</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>Head</td>
        <td><canvas data-itemname="dragon_med_helm" data-show-label="inline"></canvas></td>
        <td>+33 Stab Resistance</td>
    </tr>
    <tr>
        <td>Cape</td>
        <td><canvas data-itemname="cape_of_legends" data-show-label="inline"></canvas></td>
        <td>+7 Stab Resistance</td>
    </tr>
    <tr>
        <td>Neck</td>
        <td><canvas data-itemname="gnome_amulet" data-show-label="inline"></canvas></td>
        <td>+13 Stab Resistance</td>
    </tr>
    <tr>
        <td>Weapon</td>
        <td><canvas data-itemname="dragon_mace" data-show-label="inline"></canvas></td>
        <td>+5 Prayer bonus</td>
    </tr>
    <tr>
        <td>Chest</td>
        <td><canvas data-itemname="rune_platebody" data-show-label="inline"></canvas></td>
        <td>+82 Stab Resistance</td>
    </tr>
    <tr>
        <td>Shield</td>
        <td><canvas data-itemname="dragon_sq_shield" data-show-label="inline"></canvas></td>
        <td>+50 Stab Resistance</td>
    </tr>
    <tr>
        <td>Legs</td>
        <td><canvas data-itemname="rune_platelegs" data-show-label="inline"></canvas></td>
        <td>+51 Stab Resistance</td>
    </tr>
    <tr>
        <td>Gloves</td>
        <td><canvas data-itemname="steel_gauntlets"></canvas><canvas data-itemname="gauntlets_of_chaos"></canvas><canvas data-itemname="gauntlets_of_cooking"></canvas><canvas data-itemname="gauntlets_of_goldsmithing"></canvas><br>Any Family Crest Gauntlets</td>
        <td>+8 Stab Resistance</td>
    </tr>
    <tr>
        <td>Boots</td>
        <td><canvas data-itemname="boots_ranger" data-show-label="inline"></canvas></td>
        <td>+2 Stab Resistance</td>
    </tr>
</table>
<hr>
<h3 id="defence-slash">Slash Defence</h3>
<table>
    <td>
        <img src="img/special_guides/bis/defenseslash.png" width="200px"/>
    </td>
    <td>
        <table class="subtable">
            <tbody><tr><th>Attack bonus</th><th>Defence bonus</th></tr><tr><td>Stab: 60</td><td>Stab: 246</td></tr><tr><td>Slash: 71</td><td>Slash: 251</td></tr><tr><td>Crush: 0</td><td>Crush: 232</td></tr><tr><td>Magic: -70</td><td>Magic: -2</td></tr><tr><td>Range: -18</td><td>Range: 220</td></tr><tr><th colspan="2">Other bonuses</th></tr><tr><td>Strength: 73</td><td>Prayer: 0</td></tr></tbody>
        </table>
    </td>
</table>
<table class="calculators">
    <tr>
        <th>Slot</th>
        <th>Item</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>Head</td>
        <td><canvas data-itemname="dragon_med_helm" data-show-label="inline"></canvas></td>
        <td>+35 Slash Resistance</td>
    </tr>
    <tr>
        <td>Cape</td>
        <td><canvas data-itemname="cape_of_legends" data-show-label="inline"></canvas></td>
        <td>+7 Slash Resistance</td>
    </tr>
    <tr>
        <td>Neck</td>
        <td><canvas data-itemname="gnome_amulet" data-show-label="inline"></canvas></td>
        <td>+13 Slash Resistance</td>
    </tr>
    <tr>
        <td>Weapon</td>
        <td><canvas data-itemname="dragon_longsword" data-show-label="inline"></canvas></td>
        <td>+3 Slash Resistance</td>
    </tr>
    <tr>
        <td>Chest</td>
        <td><canvas data-itemname="rune_platebody" data-show-label="inline"></canvas></td>
        <td>+80 Slash Resistance</td>
    </tr>
    <tr>
        <td rowspan="2">Shield</td>
        <td><canvas data-itemname="dragon_sq_shield" data-show-label="inline"></canvas></td>
        <td>+52 Slash Resistance</td>
    </tr>
    <tr>
        <td><div class="centered-content"><canvas data-itemname="antidragonbreathshield" data-show-label="inline"></canvas>*</div></td>
        <td>Anti-dragonbreath</td>
    </tr>
    <tr>
        <td>Legs</td>
        <td><canvas data-itemname="rune_platelegs" data-show-label="inline"></canvas></td>
        <td>+49 Slash Resistance</td>
    </tr>
    <tr>
        <td>Gloves</td>
        <td><canvas data-itemname="steel_gauntlets"></canvas><canvas data-itemname="gauntlets_of_chaos"></canvas><canvas data-itemname="gauntlets_of_cooking"></canvas><canvas data-itemname="gauntlets_of_goldsmithing"></canvas><br>Any Family Crest Gauntlets</td>
        <td>+9 Slash Resistance</td>
    </tr>
    <tr>
        <td>Boots</td>
        <td><canvas data-itemname="boots_ranger" data-show-label="inline"></canvas></td>
        <td>+3 Slash Resistance</td>
    </tr>
</table>
*Dragons primarily deal slash damage in melee, making this slash-defense build ideal when combined with a Dragonfire shield.
<hr>
<h3 id="defence-ranged">Ranged Defence</h3>
<table>
    <td>
        <img src="img/special_guides/bis/defenseranged.png" width="200px"/>
    </td>
    <td>
        <table class="subtable">
            <tbody><tr><th>Attack bonus</th><th>Defence bonus</th></tr><tr><td>Stab: 40</td><td>Stab: 232</td></tr><tr><td>Slash: -2</td><td>Slash: 236</td></tr><tr><td>Crush: 60</td><td>Crush: 221</td></tr><tr><td>Magic: -70</td><td>Magic: 5</td></tr><tr><td>Range: -18</td><td>Range: 229</td></tr><tr><th colspan="2">Other bonuses</th></tr><tr><td>Strength: 55</td><td>Prayer: 5</td></tr></tbody>
        </table>
    </td>
</table>
<table class="calculators">
    <tr>
        <th>Slot</th>
        <th>Item</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>Head</td>
        <td><canvas data-itemname="dragon_med_helm" data-show-label="inline"></canvas></td>
        <td>+34 Ranged Resistance</td>
    </tr>
    <tr>
        <td>Cape</td>
        <td><canvas data-itemname="cape_of_legends" data-show-label="inline"></canvas></td>
        <td>+7 Ranged Resistance</td>
    </tr>
    <tr>
        <td>Neck</td>
        <td><canvas data-itemname="amulet_of_defence" data-show-label="inline"></canvas></td>
        <td>+7 Ranged Resistance</td>
    </tr>
    <tr>
        <td>Weapon</td>
        <td><canvas data-itemname="dragon_mace" data-show-label="inline"></canvas></td>
        <td>+5 Prayer bonus</td>
    </tr>
    <tr>
        <td>Chest</td>
        <td><canvas data-itemname="rune_platebody" data-show-label="inline"></canvas></td>
        <td>+80 Ranged Resistance</td>
    </tr>
    <tr>
        <td>Shield</td>
        <td><canvas data-itemname="dragon_sq_shield" data-show-label="inline"></canvas></td>
        <td>+50 Ranged Resistance</td>
    </tr>
    <tr>
        <td>Legs</td>
        <td><canvas data-itemname="rune_platelegs" data-show-label="inline"></canvas></td>
        <td>+49 Ranged Resistance</td>
    </tr>
    <tr>
        <td>Gloves</td>
        <td><canvas data-itemname="ice_gloves" data-show-label="inline"></canvas></td>
        <td>+2 Ranged Resistance</td>
    </tr>
    <tr>
        <td>Boots</td>
        <td><div class="centered-content"><canvas data-itemname="leather_boots"></canvas>&nbsp;&nbsp;Any boots</td></div>
        <td>All give +0 Ranged Resistance</td>
    </tr>
</table>
<hr>
<h3 id="defence-magic">Magic Defence</h3>
<table>
    <td>
        <img src="img/special_guides/bis/defensemagic.png" width="200px"/>
    </td>
    <td>
        <table class="subtable">
            <tbody><tr><th>Attack bonus</th><th>Defence bonus</th></tr><tr><td>Stab: 0</td><td>Stab: 64</td></tr><tr><td>Slash: 0</td><td>Slash: 77</td></tr><tr><td>Crush: 0</td><td>Crush: 93</td></tr><tr><td>Magic: -31</td><td>Magic: 107</td></tr><tr><td>Range: 72</td><td>Range: 87</td></tr><tr><th colspan="2">Other bonuses</th></tr><tr><td>Ranged<br>strength: 48</td><td>Prayer: 0</td></tr></tbody>
        </table>
    </td>
</table>
<table class="calculators">
    <tr>
        <th>Slot</th>
        <th>Item</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>Head</td>
        <td><canvas data-itemname="robinhoodhat" data-show-label="inline"></canvas></td>
        <td>+4 Magic Resistance</td>
    </tr>
    <tr>
        <td>Cape</td>
        <td><canvas data-itemname="zamorak_cape"></canvas><canvas data-itemname="guthix_cape"></canvas><canvas data-itemname="saradomin_cape"></canvas><br>God cape</td>
        <td>+10 Magic Resistance</td>
    </tr>
    <tr>
        <td>Neck</td>
        <td><canvas data-itemname="amulet_of_defence" data-show-label="inline"></canvas></td>
        <td>+7 Magic Resistance</td>
    </tr>
    <tr>
        <td rowspan="2">Weapon</td>
        <td><canvas data-itemname="crossbow" data-show-label="inline"></canvas></td>
        <td>Excellent with Pearl Bolts</td>
    </tr>
    <tr>
        <td><canvas data-itemname="rune_dart_p" data-show-label="inline"></canvas></td>
        <td>Fast Tick + Poison damage</td>
    </tr>
    <tr>
        <td>Chest</td>
        <td><canvas data-itemname="black_dragonhide_body" data-show-label="inline"></canvas></td>
        <td>+45 Magic Resistance</td>
    </tr>
    <tr>
        <td>Shield</td>
        <td><canvas data-itemname="elemental_shield" data-show-label="inline"></canvas></td>
        <td>+6 Magic Resistance</td>
    </tr>
    <tr>
        <td>Legs</td>
        <td><canvas data-itemname="black_dragonhide_chaps" data-show-label="inline"></canvas></td>
        <td>+23 Magic Resistance</td>
    </tr>
    <tr>
        <td>Gloves</td>
        <td><canvas data-itemname="black_dragon_vambraces" data-show-label="inline"></canvas></td>
        <td>+8 Magic Resistance</td>
    </tr>
    <tr>
        <td>Boots</td>
        <td><canvas data-itemname="boots_wizard" data-show-label="inline"></canvas></td>
        <td>+4 Magic Resistance</td>
    </tr>
    <tr>
        <td>Ammo</td>
        <td><canvas data-itemname="pearl_bolt" data-show-label="inline"></canvas></td>
        <td>+48 Ranged Strength Bonus</td>
    </tr>
</table>
<hr>
<h3 id="offense-crush">Crush Offense</h3>
<table>
    <td>
        <img src="img/special_guides/bis/offensecrush.png" width="200px"/>
    </td>
    <td>
        <table class="subtable">
            <tbody><tr><th>Attack bonus</th><th>Defence bonus</th></tr><tr><td>Stab: 52</td><td>Stab: 235</td></tr><tr><td>Slash: 10</td><td>Slash: 236</td></tr><tr><td>Crush: 72</td><td>Crush: 217</td></tr><tr><td>Magic: -50</td><td>Magic: -1</td></tr><tr><td>Range: -16</td><td>Range: 223</td></tr><tr><th colspan="2">Other bonuses</th></tr><tr><td>Strength: 63</td><td>Prayer: 8</td></tr></tbody>
        </table>
    </td>
</table>
<table class="calculators">
    <tr>
        <th>Slot</th>
        <th>Item</th>
        <th>Description</th>
    </tr>
    <tr>
        <td rowspan="2">Head</td>
        <td><canvas data-itemname="dragon_med_helm" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="robinhoodhat" data-show-label="inline"></canvas></td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td rowspan="2">Cape</td>
        <td><canvas data-itemname="cape_of_legends" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="zamorak_cape"></canvas><canvas data-itemname="guthix_cape"></canvas><canvas data-itemname="saradomin_cape"></canvas><br>God cape</td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td>Neck</td>
        <td><canvas data-itemname="amulet_of_glory" data-show-label="inline"></canvas></td>
        <td>+10 Crush Attack<br>+6 Strength Bonus<br>+3 Prayer Bonus</td>
    </tr>
    <tr>
        <td rowspan="2">Weapon</td>
        <td><div class="centered-content"><canvas data-itemname="dragon_mace" data-show-label="inline"></canvas>*</div></td>
        <td>+60 Crush Attack<br>+55 Strength Bonus<br>+5 Prayer Bonus</td>
    </tr>
    <tr>
        <td><div class="centered-content"><canvas data-itemname="dragon_spear_p" data-show-label="inline"></canvas>*</div></td>
        <td>+55 Crush Attack<br>+60 Strength Bonus<br>Poison Damage</td>
    </tr>
    <tr>
        <td rowspan="2">Chest</td>
        <td><canvas data-itemname="rune_platebody" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="black_dragonhide_body" data-show-label="inline"></canvas></td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td rowspan="2">Shield</td>
        <td><canvas data-itemname="dragon_sq_shield" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="elemental_shield" data-show-label="inline"></canvas></td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td rowspan="2">Legs</td>
        <td><canvas data-itemname="rune_platelegs" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="black_dragonhide_chaps" data-show-label="inline"></canvas></td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td>Gloves</td>
        <td><canvas data-itemname="steel_gauntlets"></canvas><canvas data-itemname="gauntlets_of_chaos"></canvas><canvas data-itemname="gauntlets_of_cooking"></canvas><canvas data-itemname="gauntlets_of_goldsmithing"></canvas><br>Any Family Crest Gauntlets</td>
        <td>+2 Crush Attack<br>+2 Strength Bonus</td>
    </tr>
    <tr>
        <td>Boots</td>
        <td><canvas data-itemname="boots_ranger"></canvas><canvas data-itemname="ikov_bootsoflightness"></canvas><canvas data-itemname="boots_wizard"></canvas><br>Any decent boots</td>
        <td>Pick based on enemy</td>
    </tr>
</table>
*Both Dragon Mace and Dragon Spear have a fast tick of 4, but Dragon Mace has a +5 Prayer Bonus and can be equipped with a shield. Dragon Spear offers the advantage of poison.
<hr>
<h3 id="offense-stabslash">Stab/Slash Offense</h3>
<table>
    <td>
        <img src="img/special_guides/bis/offensestabslash.png" width="200px"/>
    </td>
    <td>
        <table class="subtable">
            <tbody><tr><th>Attack bonus</th><th>Defence bonus</th></tr><tr><td>Stab: 70</td><td>Stab: 235</td></tr><tr><td>Slash: 81</td><td>Slash: 239</td></tr><tr><td>Crush: 10</td><td>Crush: 219</td></tr><tr><td>Magic: -50</td><td>Magic: -1</td></tr><tr><td>Range: -16</td><td>Range: 223</td></tr><tr><th colspan="2">Other bonuses</th></tr><tr><td>Strength: 79</td><td>Prayer: 3</td></tr></tbody>
        </table>
    </td>
</table>
<table class="calculators">
    <tr>
        <th>Slot</th>
        <th>Item</th>
        <th>Description</th>
    </tr>
    <tr>
        <td rowspan="2">Head</td>
        <td><canvas data-itemname="dragon_med_helm" data-show-label="inline"></canvas></td>
        <td>More Melee Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="robinhoodhat" data-show-label="inline"></canvas></td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td rowspan="2">Cape</td>
        <td><canvas data-itemname="cape_of_legends" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="zamorak_cape"></canvas><canvas data-itemname="guthix_cape"></canvas><canvas data-itemname="saradomin_cape"></canvas><br>God cape</td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td>Neck</td>
        <td><canvas data-itemname="amulet_of_glory" data-show-label="inline"></canvas></td>
        <td>+10 Stab/Slash Attack<br>+6 Strength Bonus<br>+3 Prayer Bonus</td>
    </tr>
    <tr>
        <td rowspan="2">Weapon</td>
        <td><div class="centered-content"><canvas data-itemname="dragon_longsword" data-show-label="inline"></canvas>*</div></td>
        <td>+69 Slash Attack<br>+71 Strength Bonus</td>
    </tr>
    <tr>
        <td><div class="centered-content"><canvas data-itemname="dragon_spear_p" data-show-label="inline"></canvas>*</div></td>
        <td>+58 Stab Attack<br>+60 Strength Bonus<br>Poison Damage</td>
    </tr>
    <tr>
        <td rowspan="2">Chest</td>
        <td><canvas data-itemname="rune_platebody" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="black_dragonhide_body" data-show-label="inline"></canvas></td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td rowspan="2">Shield</td>
        <td><canvas data-itemname="dragon_sq_shield" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="elemental_shield" data-show-label="inline"></canvas></td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td rowspan="2">Legs</td>
        <td><canvas data-itemname="rune_platelegs" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="black_dragonhide_chaps" data-show-label="inline"></canvas></td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td>Gloves</td>
        <td><canvas data-itemname="steel_gauntlets"></canvas><canvas data-itemname="gauntlets_of_chaos"></canvas><canvas data-itemname="gauntlets_of_cooking"></canvas><canvas data-itemname="gauntlets_of_goldsmithing"></canvas><br>Any Family Crest Gauntlets</td>
        <td>+2 Stab/Slash Attack<br>+2 Strength Bonus</td>
    </tr>
    <tr>
        <td>Boots</td>
        <td><canvas data-itemname="boots_ranger"></canvas><canvas data-itemname="ikov_bootsoflightness"></canvas><canvas data-itemname="boots_wizard"></canvas><br>Any decent boots</td>
        <td>Pick based on enemy</td>
    </tr>
</table>
*The Dragon Spear offers a faster tick rate (4 ticks instead of 5) as well as poison damage compared to the Dragon Longsword. Use the Dragon Longsword for Slashing or more defence bonuses.
<hr>
<h3 id="offense-ranged">Ranged Offense</h3>
<table>
    <td>
        <img src="img/special_guides/bis/offenseranged.png" width="200px"/>
    </td>
    <td>
        <table class="subtable">
            <tbody><tr><th>Attack bonus</th><th>Defence bonus</th></tr><tr><td>Stab: 10</td><td>Stab: 68</td></tr><tr><td>Slash: 10</td><td>Slash: 82</td></tr><tr><td>Crush: 10</td><td>Crush: 98</td></tr><tr><td>Magic: -45</td><td>Magic: 92</td></tr><tr><td>Range: 153</td><td>Range: 90</td></tr><tr><th colspan="2">Other bonuses</th></tr><tr><td>Ranged<br>strength: 49</td><td>Prayer: 3</td></tr></tbody>
        </table>
    </td>
</table>
<table class="calculators">
    <tr>
        <th>Slot</th>
        <th>Item</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>Head</td>
        <td><canvas data-itemname="robinhoodhat" data-show-label="inline"></canvas></td>
        <td>+8 Ranged Attack</td>
    </tr>
    <tr>
        <td rowspan="2">Cape</td>
        <td><canvas data-itemname="cape_of_legends" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="zamorak_cape"></canvas><canvas data-itemname="guthix_cape"></canvas><canvas data-itemname="saradomin_cape"></canvas><br>God cape</td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td>Neck</td>
        <td><canvas data-itemname="amulet_of_glory" data-show-label="inline"></canvas></td>
        <td>+8 Ranged Attack<br>+3 Prayer Bonus</td>
    </tr>
    <tr>
        <td>Weapon</td>
        <td><canvas data-itemname="magic_shortbow" data-show-label="inline"></canvas></td>
        <td>+69 Ranged Attack</td>
    </tr>
    <tr>
        <td>Chest</td>
        <td><canvas data-itemname="black_dragonhide_body" data-show-label="inline"></canvas></td>
        <td>+30 Ranged Attack</td>
    </tr>
    <tr>
        <td>Legs</td>
        <td><canvas data-itemname="black_dragonhide_chaps" data-show-label="inline"></canvas></td>
        <td>+17 Ranged Attack</td>
    </tr>
    <tr>
        <td>Gloves</td>
        <td><canvas data-itemname="black_dragon_vambraces" data-show-label="inline"></canvas></td>
        <td>+11 Ranged Attack</td>
    </tr>
    <tr>
        <td>Boots</td>
        <td><canvas data-itemname="boots_ranger" data-show-label="inline"></canvas></td>
        <td>+8 Ranged Attack</td>
    </tr>
    <tr>
        <td>Ammo</td>
        <td><canvas data-itemname="rune_arrow_p" data-show-label="inline"></canvas></td>
        <td>+49 Ranged Strength Bonus</td>
    </tr>
</table>
<hr>
<h3 id="offense-magic">Magic Offense</h3>
<table>
    <td>
        <img src="img/special_guides/bis/offensemagic.png" width="200px"/>
    </td>
    <td>
        <table class="subtable">
            <tbody><tr><th>Attack bonus</th><th>Defence bonus</th></tr><tr><td>Stab: 22</td><td>Stab: 21</td></tr><tr><td>Slash: 11</td><td>Slash: 25</td></tr><tr><td>Crush: 52</td><td>Crush: 21</td></tr><tr><td>Magic: 46</td><td>Magic: 42</td></tr><tr><td>Range: 10</td><td>Range: 10</td></tr><tr><th colspan="2">Other bonuses</th></tr><tr><td>Strength: 58</td><td>Prayer: 6</td></tr></tbody>
        </table>
    </td>
</table>
<table class="calculators">
    <tr>
        <th>Slot</th>
        <th>Item</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>Head</td>
        <td><canvas data-itemname="gnome_hat_blue"></canvas><canvas data-itemname="gnome_hat_pink"></canvas><canvas data-itemname="gnome_hat_green"></canvas><canvas data-itemname="gnome_hat_cream"></canvas><canvas data-itemname="gnome_hat_turqoise"></canvas><br>Any Tree Gnome Hat</td>
        <td>+3 Magic Attack</td>
    </tr>
    <tr>
        <td>Cape</td>
        <td><canvas data-itemname="zamorak_cape"></canvas><canvas data-itemname="guthix_cape"></canvas><canvas data-itemname="saradomin_cape"></canvas><br>God cape</td>
        <td>+10 Magic Attack</td>
    </tr>
    <tr>
        <td>Neck</td>
        <td><canvas data-itemname="amulet_of_glory" data-show-label="inline"></canvas></td>
        <td>+10 Magic Attack<br>+3 Prayer Bonus</td>
    </tr>
    <tr>
        <td>Weapon</td>
        <td><canvas data-itemname="mystic_air_staff"></canvas><canvas data-itemname="mystic_water_staff"></canvas><canvas data-itemname="mystic_earth_staff"></canvas><canvas data-itemname="mystic_fire_staff"></canvas><br>Any Mystic Staff</td>
        <td>+14 Magic Attack</td>
    </tr>
    <tr>
        <td>Chest</td>
        <td><canvas data-itemname="wizards_robe"></canvas><canvas data-itemname="black_robe"></canvas><br>Wizards or Black Robe</td>
        <td>+3 Magic Attack</td>
    </tr>
    <tr>
        <td rowspan="2">Shield</td>
        <td><canvas data-itemname="antidragonbreathshield" data-show-label="inline"></canvas></td>
        <td>More General Defence</td>
    </tr>
    <tr>
        <td><canvas data-itemname="elemental_shield" data-show-label="inline"></canvas></td>
        <td>More Magic Defence</td>
    </tr>
    <tr>
        <td>Legs</td>
        <td><canvas data-itemname="zamrobebottom" data-show-label="inline"></canvas></td>
        <td>+2 Magic Attack<br>+3 Prayer Bonus</td>
    </tr>
    <tr>
        <td>Gloves</td>
        <td><canvas data-itemname="gauntlets_of_chaos" data-show-label="inline"></canvas></td>
        <td>+3 Max Hit to Bolt Spells</td>
    </tr>
    <tr>
        <td>Boots</td>
        <td><canvas data-itemname="boots_wizard" data-show-label="inline"></canvas></td>
        <td>+4 Magic Attack</td>
    </tr>
</table>
<hr>
This quest guide was written on 2004HQ by Fallnight. Thanks to Geerin for corrections.
<br><br>
This quest guide was entered into the database on Wed, Jul 30, 2025, at 11:51:20 PM by Halogod35 and was last updated on Sat, Aug 02, 2025, at 02:16:22 AM by Halogod35.
HTML; }