<?php
function getPageTitle() { return 'Defence'; }
function getPageMetaIcon() { return 'img/skillicons/defence.webp'; }
function getSkillContent() { return <<<HTML
<div style="text-align:center;"><b>Defence</b></div>
<br><br><h4 style="display: inline;">Melee Armour:</h4><br><br><b>Helmets</b><br><table style="text-align: center;" align="center">
<tr>
<td><canvas data-itemname="bronze_med_helm"></canvas><canvas data-itemname="iron_med_helm"></canvas><canvas data-itemname="steel_med_helm"></canvas><canvas data-itemname="black_med_helm"></canvas><canvas data-itemname="mithril_med_helm"></canvas><canvas data-itemname="adamant_med_helm"></canvas><canvas data-itemname="rune_med_helm"></canvas><canvas data-itemname="dragon_med_helm"></canvas><br><canvas data-itemname="bronze_full_helm"></canvas><canvas data-itemname="iron_full_helm"></canvas><canvas data-itemname="steel_full_helm"></canvas><canvas data-itemname="black_full_helm"></canvas><canvas data-itemname="mithril_full_helm"></canvas><canvas data-itemname="adamant_full_helm"></canvas><canvas data-itemname="rune_full_helm"></canvas></td>
</tr>
<tr>
<td>There are two types of helmet: full helms and medium helms. Full helms offer better protection than medium helms, but casting magic or using a ranged weapon is more difficult when using a full helm, since your vision is partially obstructed.</td>
</tr>
</table><br><br><b>Chainmail</b><br><table style="text-align: center;" align="center">
<tr>
<td><canvas data-itemname="bronze_chainbody"></canvas><canvas data-itemname="iron_chainbody"></canvas><canvas data-itemname="steel_chainbody"></canvas><canvas data-itemname="black_chainbody"></canvas><canvas data-itemname="mithril_chainbody"></canvas><canvas data-itemname="adamant_chainbody"></canvas><canvas data-itemname="rune_chainbody"></canvas></td>
</tr>
<tr>
<td>Chainmail is made up of small rings connected together. It is particularly useful for deflecting slashing weapons and absorbing the impact of crush attacks. Chainmail is weak against stabbing weapons as small pointy blades can pierce the rings.  Chainmail is quite flexible and so does not cause any disadvantages while using ranged weapons. Mages will tend to find the armour gets slightly in the way of some of the finer spell casting techniques.</td>
</tr>
</table><br><br><b>Plate Armour</b><br><table style="text-align: center;" align="center">
<tr>
<td><canvas data-itemname="bronze_platebody"></canvas><canvas data-itemname="iron_platebody"></canvas><canvas data-itemname="steel_platebody"></canvas><canvas data-itemname="black_platebody"></canvas><canvas data-itemname="mithril_platebody"></canvas><canvas data-itemname="adamant_platebody"></canvas><canvas data-itemname="rune_platebody"></canvas></td>
</tr>
<tr>
<td>Plate armour is much heavier and stronger than chain. Rangers and mages find it incredibly difficult to use plate armour in conjunction with firing arrows or casting spells.<br><br>Plate armour is weakest against crushing damage as it cannot absorb the impact as well as it can absorb slashing or stabbing attacks.</td>
</tr>
</table><br><br><b>Shields</b><br><table style="text-align: center;" align="center">
<tr>
<td><canvas data-itemname="bronze_sq_shield"></canvas><canvas data-itemname="iron_sq_shield"></canvas><canvas data-itemname="steel_sq_shield"></canvas><canvas data-itemname="black_sq_shield"></canvas><canvas data-itemname="mithril_sq_shield"></canvas><canvas data-itemname="adamant_sq_shield"></canvas><canvas data-itemname="rune_sq_shield"></canvas><canvas data-itemname="dragon_sq_shield"></canvas><br><canvas data-itemname="bronze_kiteshield"></canvas><canvas data-itemname="iron_kiteshield"></canvas><canvas data-itemname="steel_kiteshield"></canvas><canvas data-itemname="black_kiteshield"></canvas><canvas data-itemname="mithril_kiteshield"></canvas><canvas data-itemname="adamant_kiteshield"></canvas><canvas data-itemname="rune_kiteshield"></canvas><br>Both varieties of shield feature excellent defences against slashing attacks. However, the kite shield is weak against stabbing attacks, and, the square shield is weak against crush attacks. Using the shield while casting magic or ranging is very difficult as it restricts the user's movement.<br><br></td>
</tr>
<tr>
<td><canvas data-itemname="dragonfire_shield"></canvas><br>Invaluable in the fight against all fire-breathing dragons, this shield reduces the damage from dragon fire considerably, and is strongly recommended every time you fight dragons.</td>
</tr>
</table><br><br><b>Prayer Enhancing Armour</b><br><table style="text-align: center;" align="center">
<tr>
<td><canvas data-itemname="zamorak_monk_top"></canvas><canvas data-itemname="druid_robe_top"></canvas><canvas data-itemname="monk_robe_top"></canvas><br><canvas data-itemname="zamorak_monk_bottom"></canvas><canvas data-itemname="druid_robe_bottom"></canvas><canvas data-itemname="monk_robe_bottom"></canvas></td>
</tr>
<tr>
<td>There are many items of armour in game that will boost prayer. With the support of the Gods, you can wear these items to ensure your prayer will be maintained for a longer amount of time. Such items include the Priest, Monk, Shade, Druid, and Zamorak robe sets.</td>
</tr>
</table><br><br><h4 style="display: inline;">Ranger Armour:</h4><br><br><b>Leather</b><br><table style="text-align: center;" align="center">
<tr>
<td><canvas data-itemname="leather_body"></canvas><canvas data-itemname="hardleather_body"></canvas><canvas data-itemname="studded_body"></canvas></td>
</tr>
<tr>
<td>Leather tends to be very weak armour, but can be improved by studding the leather or hardening it. Leather is more resistant to crush attacks and weaker against stab attacks. However, its flexibility makes it ideal for use by rangers.</td>
</tr>
</table><br><br><b>Dragonhide</b><br><table style="text-align: center;" align="center">
<tr>
<td><canvas data-itemname="dragonhide_body"></canvas><canvas data-itemname="blue_dragonhide_body"></canvas><canvas data-itemname="red_dragonhide_body"></canvas><canvas data-itemname="black_dragonhide_body"></canvas><br><canvas data-itemname="dragonhide_chaps"></canvas><canvas data-itemname="blue_dragonhide_chaps"></canvas><canvas data-itemname="red_dragonhide_chaps"></canvas><canvas data-itemname="black_dragonhide_chaps"></canvas></td>
</tr>
<tr>
<td>The same applies for Dragonhide armour as to leather armour, although it is much stronger. The magic of dragons makes it very useful when defending against spells and magical effects. However, this tends to interfere with the wearer's ability to cast magic.</td>
</tr>
</table><br><br><h4 style="display: inline;">Mage Armour:</h4><br><br><b>Mage Robes</b><br><table style="text-align: center;" align="center">
<tr>
<td><canvas data-itemname="wizards_robe"></canvas><canvas data-itemname="wizards_robe_black"></canvas></td>
</tr>
<tr>
<td>Mage robes offer no extra defence against ranged or melee combat, but do give an advantage for spell casting and defending against magic.</td>
</tr>
</table>
HTML; }