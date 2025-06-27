<?php

function getPageContent() {
    global $meta_data;
    $meta_data['title'] = 'Wallpapers';
    $meta_data['og:title'] = $meta_data['title'];
    $meta_data['og:image'] = 'img/rune_kite.png';

    return <<<HTML
    <h2>Wallpapers</h2>
    <p style="font-style:italic;">Bring Gielinor to your desktop with these official Jagex wallpapers</p>
    <hr>
    <div class="lightbox-overlay" id="lightbox" onclick="closeLightbox()">
        <img id="lightbox-img" src="">
    </div>
    <!-- <h3>2004</h3> use later when we're in 2005 -->
    <table>
        <tbody>
            <tr>
                <td>
                    <img src="img/rswallpapers/2004/w1_800x600.jpg" width="150" onclick="openLightbox(this.src)"><br>
                </td>
                <td width="5"></td>
                <td align="left">
                    <b>Warrior and Skeleton</b><br>
                    A very detailed wallpaper featuring the RuneScape Warrior and Skeleton.<br><br><br>
                    <a href="img/rswallpapers/2004/w1_800x600.jpg" download>800x600</a> | 
                    <a href="img/rswallpapers/2004/w1_1024x768.jpg" download>1024x768</a> | 
                    <a href="img/rswallpapers/2004/w1_1280x1024.jpg" download>1280x1024</a> | 
                    <a href="img/rswallpapers/2004/w1_1600x1200.jpg" download>1600x1200</a>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 1em;">
                    <img src="img/rswallpapers/2004/w2_800x600.jpg" width="150" onclick="openLightbox(this.src)"><br>
                </td>
                <td width="5"></td>
                <td align="left" style="padding-top: 1em;">
                    <b>Wandering Warrior</b><br>
                    A wallpaper depicting a warrior wandering in the fields of RuneScape.<br><br><br>
                    <a href="img/rswallpapers/2004/w2_800x600.jpg" download>800x600</a> | 
                    <a href="img/rswallpapers/2004/w2_1024x768.jpg" download>1024x768</a> | 
                    <a href="img/rswallpapers/2004/w2_1280x1024.jpg" download>1280x1024</a> | 
                    <a href="img/rswallpapers/2004/w2_1600x1200.jpg" download>1600x1200</a>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 1em;">
                    <img src="img/rswallpapers/2004/w3_800x600.jpg" width="150" onclick="openLightbox(this.src)"><br>
                </td>
                <td width="5"></td>
                <td align="left" style="padding-top: 1em;">
                    <b>The Grand Tree</b><br>
                    This recently unearthed drawing of The Grand Tree should make an exquisite backdrop for your computer.<br><br>
                    <a href="img/rswallpapers/2004/w3_800x600.jpg" download>800x600</a> | 
                    <a href="img/rswallpapers/2004/w3_1024x768.jpg" download>1024x768</a> | 
                    <a href="img/rswallpapers/2004/w3_1280x1024.jpg" download>1280x1024</a> | 
                    <a href="img/rswallpapers/2004/w3_1600x1200.jpg" download>1600x1200</a>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 1em;">
                    <img src="img/rswallpapers/2004/w4_800x600.jpg" width="150" onclick="openLightbox(this.src)"><br>
                </td>
                <td width="5"></td>
                <td align="left" style="padding-top: 1em;">
                    <b>RuneScape Map</b><br>
                    An excellent drawing of the RuneScape world. Something every traveler should have in their backpack.<br><br>
                    <a href="img/rswallpapers/2004/w4_800x600.jpg" download>800x600</a> | 
                    <a href="img/rswallpapers/2004/w4_1024x768.jpg" download>1024x768</a> | 
                    <a href="img/rswallpapers/2004/w4_1280x1024.jpg" download>1280x1024</a> | 
                    <a href="img/rswallpapers/2004/w4_1600x1200.jpg" download>1600x1200</a>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 1em;">
                    <img src="img/rswallpapers/2004/w5_800x600.jpg" width="150" onclick="openLightbox(this.src)"><br>
                </td>
                <td width="5"></td>
                <td align="left" style="padding-top: 1em;">
                    <b>Green Dragon</b><br>
                    Unfortunately we can't offer you a real dragon to keep in your garden, but we can offer you this flaming good picture of one!<br><br>
                    <a href="img/rswallpapers/2004/w5_800x600.jpg" download>800x600</a> | 
                    <a href="img/rswallpapers/2004/w5_1024x768.jpg" download>1024x768</a> | 
                    <a href="img/rswallpapers/2004/w5_1280x1024.jpg" download>1280x1024</a> | 
                    <a href="img/rswallpapers/2004/w5_1600x1200.jpg" download>1600x1200</a>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
HTML; }