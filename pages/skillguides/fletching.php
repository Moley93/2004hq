<?php
function getPageTitle() { return 'Fletching'; }
function getPageMetaIcon() { return 'img/skillicons/fletching.webp'; }
function getSkillContent() { return <<<HTML
<center><b>Fletching guide</b></center>
<br>
<center><b>Making Bows</b></center><p>
<p>
To make bows you first need to acquire some wood. Depending on the type of tree you chop
down you can get different sorts of logs. Next use a knife with the logs to cut them into
either a shortbow or a longbow. To make a bow string you need to find a flax plant and use
it with a spinning wheel. Finally add the string to the bow to complete it.
<p>
Rarer types of wood are harder to acquire, but make better bows which shoot more accurately.
The table below lists the different types of bow you can make.

<p>
<b><center>Different types of bow</b></center><br>
<table bgcolor="black" cellpadding="6" width="480">
<tr>
<td bgcolor="#382418" colspan="2"><center>Bow type</center></td>
<td bgcolor="#382418"><center>Fletching level to make</center></td>
<td bgcolor="#382418"><center>Ranged level to wield</center></td>
</tr>
<tr>
<td><center>Bow</center></td>
<td><center><img src="https://web.archive.org/web/20040622202347im_/http://www.runescape.com/img/rs2/manual/fletching/bow.gif"></center></td>
<td><center>Shortbow: Level 5<br>Longbow: Level 10</center></td>
<td><center>Any</center></td>
</tr>
<tr>
<td><center>Oak bow</center></td>
<td><center><img src="https://web.archive.org/web/20040622202347im_/http://www.runescape.com/img/rs2/manual/fletching/oak.gif"></center></td>
<td><center>Shortbow: Level 20<br>Longbow: Level 25</center></td>
<td><center>Shortbow: Level 5<br>Longbow: Level 5</center></td>
</tr>
<tr>
<td><center>Willow bow</center></td>
<td><center><img src="https://web.archive.org/web/20040622202347im_/http://www.runescape.com/img/rs2/manual/fletching/willow.gif"></center></td>
<td><center>Shortbow: Level 35<br>Longbow: Level 40</center></td>
<td><center>Shortbow: Level 20<br>Longbow: Level 20</center></td>
</tr>
<tr>
<td><center>Maple bow</center></td>
<td><center><img src="https://web.archive.org/web/20040622202347im_/http://www.runescape.com/img/rs2/manual/fletching/maple.gif"></center></td>
<td><center>Shortbow: Level 50<br>Longbow: Level 55</center></td>
<td><center>Shortbow: Level 30<br>Longbow: Level 30</center></td>
</tr>
<tr>
<td><center>Yew bow</center></td>
<td><center><img src="https://web.archive.org/web/20040622202347im_/http://www.runescape.com/img/rs2/manual/fletching/yew.gif"></center></td>
<td><center>Shortbow: Level 65<br>Longbow: Level 70</center></td>
<td><center>Shortbow: Level 40<br>Longbow: Level 40</center></td>
</tr>
<tr>
<td><center>Magic bow</center></td>
<td><center><img src="https://web.archive.org/web/20040622202347im_/http://www.runescape.com/img/rs2/manual/fletching/magic.gif"></center></td>
<td><center>Shortbow: Level 80<br>Longbow: Level 85</center></td>
<td><center>Shortbow: Level 50<br>Longbow: Level 50</center></td>
</tr>
</table>
HTML; }