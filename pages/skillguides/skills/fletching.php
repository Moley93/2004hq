<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<p>
    <b>Making Bows</b>
    <br><br>
    To make bows you first need to acquire some wood. Depending on the type of tree you chop
    down you can get different sorts of logs. Next use a knife with the logs to cut them into
    either a shortbow or a longbow. To make a bow string you need to find a flax plant and use
    it with a spinning wheel. Finally add the string to the bow to complete it.
    <br><br>
    Rarer types of wood are harder to acquire, but make better bows which shoot more accurately.
    The table below lists the different types of bow you can make.
    <br>
    <table width="100%" cellpadding="1" cellspacing="0" class="calculators">
        <tr>
            <th colspan="4">Bow type</th>
            <th>Fletching Level</th>
            <th>Ranged Level</th>
        </tr>
        <tr>
            <td>Bow</td>
            <td><canvas data-itemname="logs"></canvas></td>
            <td><canvas data-itemname="unstrung_shortbow"></canvas></td>
            <td><canvas data-itemname="shortbow"></canvas></td>
            <td>5</td>
            <td rowspan="2">1</td>
        </tr>
        <tr>
            <td>Long bow</td>
            <td><canvas data-itemname="logs"></canvas></td>
            <td><canvas data-itemname="unstrung_longbow"></canvas></td>
            <td><canvas data-itemname="longbow"></canvas></td>
            <td>10</td>
        </tr>
        <tr>
            <td>Oak shortbow</td>
            <td><canvas data-itemname="oak_logs"></canvas></td>
            <td><canvas data-itemname="unstrung_oak_shortbow"></canvas></td>
            <td><canvas data-itemname="oak_shortbow"></canvas></td>
            <td>20</td>
            <td rowspan="2">5</td>
        </tr>
        <tr>
            <td>Oak longbow</td>
            <td><canvas data-itemname="oak_logs"></canvas></td>
            <td><canvas data-itemname="unstrung_oak_longbow"></canvas></td>
            <td><canvas data-itemname="oak_longbow"></canvas></td>
            <td>25</td>
        </tr>
        <tr>
            <td>Willow shortbow</td>
            <td><canvas data-itemname="willow_logs"></canvas></td>
            <td><canvas data-itemname="unstrung_willow_shortbow"></canvas></td>
            <td><canvas data-itemname="willow_shortbow"></canvas></td>
            <td>35</td>
            <td rowspan="2">20</td>
        </tr>
        <tr>
            <td>Willow longbow</td>
            <td><canvas data-itemname="willow_logs"></canvas></td>
            <td><canvas data-itemname="unstrung_willow_longbow"></canvas></td>
            <td><canvas data-itemname="willow_longbow"></canvas></td>
            <td>40</td>
        </tr>
        <tr>
            <td>Maple shortbow</td>
            <td><canvas data-itemname="maple_logs"></canvas></td>
            <td><canvas data-itemname="unstrung_maple_shortbow"></canvas></td>
            <td><canvas data-itemname="maple_shortbow"></canvas></td>
            <td>50</td>
            <td rowspan="2">30</td>
        </tr>
        <tr>
            <td>Maple longbow</td>
            <td><canvas data-itemname="maple_logs"></canvas></td>
            <td><canvas data-itemname="unstrung_maple_longbow"></canvas></td>
            <td><canvas data-itemname="maple_longbow"></canvas></td>
            <td>55</td>
        </tr>
        <tr>
            <td>Yew shortbow</td>
            <td><canvas data-itemname="yew_logs"></canvas></td>
            <td><canvas data-itemname="unstrung_yew_shortbow"></canvas></td>
            <td><canvas data-itemname="yew_shortbow"></canvas></td>
            <td>65</td>
            <td rowspan="2">40</td>
        </tr>
        <tr>
            <td>Yew longbow</td>
            <td><canvas data-itemname="yew_logs"></canvas></td>
            <td><canvas data-itemname="unstrung_yew_longbow"></canvas></td>
            <td><canvas data-itemname="yew_longbow"></canvas></td>
            <td>70</td>
        </tr>
        <tr>
            <td>Magic shortbow</td>
            <td><canvas data-itemname="magic_logs"></canvas></td>
            <td><canvas data-itemname="unstrung_magic_shortbow"></canvas></td>
            <td><canvas data-itemname="magic_shortbow"></canvas></td>
            <td>80</td>
            <td rowspan="2">50</td>
        </tr>
        <tr>
            <td>Magic longbow</td>
            <td><canvas data-itemname="magic_logs"></canvas></td>
            <td><canvas data-itemname="unstrung_magic_longbow"></canvas></td>
            <td><canvas data-itemname="magic_longbow"></canvas></td>
            <td>85</td>
        </tr>
    </table>
</p>
HTML; }