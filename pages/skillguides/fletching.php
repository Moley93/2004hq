<?php
function getPageTitle() { return 'Fletching'; }
function getPageMetaIcon() { return 'img/skillicons/fletching.webp'; }
function getSkillContent() { return <<<HTML
<b>Fletching guide</b>
<br>
<b>Making Bows</b><p>
<p>
To make bows you first need to acquire some wood. Depending on the type of tree you chop
down you can get different sorts of logs. Next use a knife with the logs to cut them into
either a shortbow or a longbow. To make a bow string you need to find a flax plant and use
it with a spinning wheel. Finally add the string to the bow to complete it.
<p>
Rarer types of wood are harder to acquire, but make better bows which shoot more accurately.
The table below lists the different types of bow you can make.

<p>
<b>Different types of bows</b><br>
<table cellpadding="6" width="480" style="background-color:black;">
<tr>
<td style="text-align: center; vertical-align: middle;background-color:#382418;text-size:12px;" colspan="4">Bow type</td>
<td style="text-align: center; vertical-align: middle;background-color:#382418;text-size:12px;">Fletching Level</td>
<td style="text-align: center; vertical-align: middle;background-color:#382418;text-size:12px;">Ranged Level</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Bow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">5</td>
<td style="text-align: center; vertical-align: middle;">1</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Long bow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">10</td>
<td style="text-align: center; vertical-align: middle;">1</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Oak shortbow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="oak_logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_oak_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="oak_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">20</td>
<td style="text-align: center; vertical-align: middle;">5</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Oak longbow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="oak_logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_oak_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="oak_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">25</td>
<td style="text-align: center; vertical-align: middle;">5</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Willow shortbow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="willow_logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_willow_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="willow_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">35</td>
<td style="text-align: center; vertical-align: middle;">20</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Willow longbow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="willow_logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_willow_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="willow_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">40</td>
<td style="text-align: center; vertical-align: middle;">20</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Maple shortbow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="maple_logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_maple_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="maple_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">50</td>
<td style="text-align: center; vertical-align: middle;">30</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Maple longbow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="maple_logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_maple_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="maple_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">55</td>
<td style="text-align: center; vertical-align: middle;">30</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Yew shortbow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="yew_logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_yew_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="yew_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">65</td>
<td style="text-align: center; vertical-align: middle;">40</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Yew longbow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="yew_logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_yew_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="yew_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">70</td>
<td style="text-align: center; vertical-align: middle;">40</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Magic shortbow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="magic_logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_magic_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="magic_shortbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">80</td>
<td style="text-align: center; vertical-align: middle;">50</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;">Magic longbow</td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="magic_logs"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="unstrung_magic_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;"><canvas data-itemname="magic_longbow"></canvas></td>
<td style="text-align: center; vertical-align: middle;">85</td>
<td style="text-align: center; vertical-align: middle;">50</td>
</tr>
</table>
HTML; }