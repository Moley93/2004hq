<?php
function getPageContent() { return <<<HTML
<table>
    <tbody>
        <tr valign="top">
            <td width="100">
                <a href="?p=questguides">
                    <img src="img/questicon.png">
                </a>
            </td>
            <td width="120">
                <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                    <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;"></div>
                </div>
                <br>
                <br>
                Quest Guides<br>
                <a href="?p=questguides" class="c">Click Here</a>
            </td>

            <td width="10"></td>
            
            <td width="100">
                <a href="?p=skillguides">
                    <img src="img/stats.png" />
                </a>
            </td>
            
            <td width="120">
                <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                    <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;"></div>
                </div>
                <br>
                <br>
                Skill Guides<br>
                <a href="?p=skillguides" class="c">Click Here</a>
            </td>
        </tr>
        <tr valign="top">
            <td width="100">
                <a href="?p=droptables">
                    <img src="img/skeleton.png">
                </a>
            </td>
            <td width="120">
                <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                    <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;"></div>
                </div>
                <br>
                <br>
                Monster Drop Tables<br>
                <a href="?p=droptables" class="c">Click Here</a>
            </td>

            <td width="10"></td>
            
            <td width="100">
                <a href="?p=cluetables"><img src="img/casket1.png" /></a>
            </td>
            
            <td width="120">
                <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                    <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;"></div>
                </div>
                <br>
                <br>
                Clue Casket Tables<br>
                <a href="?p=cluetables" class="c">Click Here</a>
            </td>
        </tr>
        <tr valign="top">
            <td width="100">
                <a href="?">
                    <img src="img/swordicon.png" />
                </a>
            </td>
            <td width="120">
                <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                    <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;"></div>
                </div>
                <br>
                <br>
                Calculators<br>
                <a href="?" class="c">Coming Soon</a>
            </td>

            <td width="10"></td>

            <td width="100">
                <a href="?p=clueguides">
                <img src="img/clueicon.png" />
                </a>
            </td>
            <td width="120">
                <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                    <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;"></div>
                </div>
                <br>
                <br>
                Treasure Trail Guides<br>
                <a href="?p=clueguides" class="c">Click Here</a>
            </td>
        </tr>
        <tr valign="top">
            <td width="100">
                <a href="?p=streetprices">
                    <img src="img/coinstack.png" style="width:80px;margin-top:20px;" /></a>
            </td>
            <td width="120">
                <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                    <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;"></div>
                </div>
                <br>
                <br>
                Item Street Prices<br>
                <a href="?p=streetprices" class="c">Click Here</a>
            </td>

            <td width="10"></td>

            <td width="100">
                <a href="?">
                <img src="img/sextant.png" style="width:90px;margin-top:10px;" /></a>
            </td>
            <td width="120">
                <div style="LEFT: 0px; TOP: 0px; POSITION: relative;">
                    <div style="LEFT: 0px; TOP: 0px; POSITION: absolute;"></div>
                </div>
                <br>
                <br>
                Coordinate Locator<br>
                <a href="?" class="c">Coming Soon</a>
            </td>
        </tr>
    </tbody>
</table>
HTML; }
