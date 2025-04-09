                                                                    <br />
                                                                    </center>
                                                                </td>
                                                                <td width="7"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table cellpadding="0" cellspacing="0"><tbody><tr><td colspan="3"><img src="img\fm_bottom.gif"></td></tr></tbody></table>
                                                    <br>
                                                    <br>
                                                                </div>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td align="bottom"><img src="img\edge_g2.jpg" width="100" height="82" hspace="0" vspace="0"></td>
                                            <td align="bottom">
                                                <div align="center" style="font-family:Arial,Helvetica,sans-serif; font-size:11px;height:40px;">
                                                    Site by Moley, Eilert, Halogod & Collin.<br>
                                                    Join our <a href="https://discord.gg/jdFmMvz33j">Discord</a> for feedback and updates.<br>
                                                    <label for="style-select">Website Style:</label>
                                                    <select id="style-select">
                                                        <option value="default">Modern (RS Look)</option>
                                                        <option value="oldschool">Oldschool (RuneHQ Look)</option>
                                                    </select>
                                                </div>
                                                <img src="img\edge_c.jpg" width="400" height="42" hspace="0" vspace="0">
                                            </td>
                                            <td align="bottom"><img src="img\edge_h2.jpg" width="100" height="82" hspace="0" vspace="0"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </td>
                </tr>
            </tbody>
        </table>
        <script>
        document.getElementById('style-select').addEventListener('change', function () {
            const style = this.value;
            document.cookie = "style=" + style + "; path=/; max-age=" + (60 * 60 * 24 * 30); // 30 days
            location.reload();
        });
        window.addEventListener('DOMContentLoaded', function () {
            document.getElementById('style-select').value = "<?= $style ?>";
        });
        </script>
    </body>
</html>