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
    <!-- <h3>2004</h3> use later when we're in 2005 -->
    <table>
        <tbody>
            <tr>
                <td>
                    <div>w1<br>
                        <img src="img/rswallpapers/2004/w1_800x600.jpg" width="225"><br>
                        <a href="img/rswallpapers/2004/w1_800x600.jpg" download>800x600</a><br>
                        <a href="img/rswallpapers/2004/w1_1024x768.jpg" download>1024x768</a><br>
                        <a href="img/rswallpapers/2004/w1_1280x1024.jpg" download>1280x1024</a><br>
                        <a href="img/rswallpapers/2004/w1_1600x1200.jpg" download>1600x1200</a>
                    </div>
                </td>
                <td width="5"></td>
                <td>
                    <div>w2<br>
                        <img src="img/rswallpapers/2004/w2_800x600.jpg" width="225"><br>
                        <a href="img/rswallpapers/2004/w2_800x600.jpg" download>800x600</a><br>
                        <a href="img/rswallpapers/2004/w2_1024x768.jpg" download>1024x768</a><br>
                        <a href="img/rswallpapers/2004/w2_1280x1024.jpg" download>1280x1024</a><br>
                        <a href="img/rswallpapers/2004/w2_1600x1200.jpg" download>1600x1200</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 2em;">
                    <div>w3<br>
                        <img src="img/rswallpapers/2004/w3_800x600.jpg" width="225"><br>
                        <a href="img/rswallpapers/2004/w3_800x600.jpg" download>800x600</a><br>
                        <a href="img/rswallpapers/2004/w3_1024x768.jpg" download>1024x768</a><br>
                        <a href="img/rswallpapers/2004/w3_1280x1024.jpg" download>1280x1024</a><br>
                        <a href="img/rswallpapers/2004/w3_1600x1200.jpg" download>1600x1200</a>
                    </div>
                </td>
                <td width="5"></td>
                <td style="padding-top: 2em;">
                    <div>w5<br>
                        <img src="img/rswallpapers/2004/w5_800x600.jpg" width="225"><br>
                        <a href="img/rswallpapers/2004/w5_800x600.jpg" download>800x600</a><br>
                        <a href="img/rswallpapers/2004/w5_1024x768.jpg" download>1024x768</a><br>
                        <a href="img/rswallpapers/2004/w5_1280x1024.jpg" download>1280x1024</a><br>
                        <a href="img/rswallpapers/2004/w5_1600x1200.jpg" download>1600x1200</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
HTML; }