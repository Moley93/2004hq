<?php
function getPageContent() { return <<<HTML
<table>
<tbody>
    <tr valign="top">
        <td width="100" align="center">
            <a href="?p=questlist">
                <img src="img\questicon.png" border="0">
            </a>
        </td>
        <td width="120">
            <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;" />
            </div>
            <br />
            <br />
            Quest Guides
            <br />
            <a href="?p=questlist" class="c">Click here</a>
        </td>

        <td width="10"></td>
        
        <td width="100" align="center">
            <a href="?p=skillguides">
                <img src="img\stats.png" border="0" />
            </a>
        </td>
        
        <td width="120">
            <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;">
            </div>
            <br />
            <br />
            Skill Guides
            <br />
            <a href="?p=skillguides" class="c">Click here</a>
        </td>
    </tr>
    <tr valign="top">
        <td width="100" align="center">
            <a href="?p=droptables">
                <img src="img\skeleton.png" border="0">
            </a>
        </td>
        <td width="120">
            <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;" />
            </div>
            <br />
            <br />
            Monster Drops
            <br />
            <a href="?p=droptables" class="c">Click here</a>
        </td>

        <td width="10"></td>
        
        <td width="100" align="center">
            <a href="?">
                <img src="img\swordicon.png" border="0" />
            </a>
        </td>
        <td width="120">
            <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;" />
            </div>
            <br />
            <br />
            Calculators
            <br />
            <a href="?" class="c">Coming Soon</a>
        </td>
    </tr>
    <tr valign="top">
    <td width="100" align="center">
            <a href="?">
            <img src="img\clueicon.png" border="0" />
            </a>
        </td>
        <td width="120">
            <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;" />
            </div>
            <br />
            <br />
            Treasure Trails
            <br />
            <a href="?" class="c">Coming Soon</a>
        </td>

        <td width="10"></td>
        
        <td width="100" align="center">
            <a href="?p=cluetables">
                <img src="img\casket1.png" border="0" />
            </a>
        </td>
        
        <td width="120">
            <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;" />
            </div>
            <br />
            <br />
            Clue Rewards
            <br />
            <a href="?p=cluetables" class="c">Click Here</a>
        </td>
    </tr>
 </tbody>
 </table>
HTML; }
