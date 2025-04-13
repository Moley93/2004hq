<?php
function getSkillContent($skill) { return <<<HTML
<h2>$skill Skill Guide</h2>
<p>
    The thieving skill is used for a number of different activities.
    The main uses of the thieving skill are pickpocketing, lock picking,
    trap disarming and stealing from market stalls.


    <table><tr><td>

    <b>Pickpocketing</b><br><br>
    It is possible to steal from various npcs in the game, it is not possible to steal from other players.
    To start off with you can only steal from men, later on you can steal from farmers, warriors, guards and more.
    To pickpocket an npc right click on it and select the pickpocket option. There is a chance that the npc you are stealing from will notice and will attack you.
    As your thieving skill increases, you will get noticed less often.


    <table border="0">
    <tr><td>
    <b>Levels required to pick the pockets of various npcs </b><br>
    <table bgcolor="black" cellpadding="4" width="150">
    <tr>
    <td bgcolor="#382418">Character</td>
    <td bgcolor="#382418">Level required</td>
    </tr>
    <tr>
    <td>Man</td>
    <td>0</td>
    </tr>
    <tr>
    <td>Farmer</td>
    <td>10</td>
    </tr>
    <tr>
    <td>Warrior</td>
    <td>25</td>
    </tr>
    <tr>
    <td>Guard</td>
    <td>40</td>
    </tr>
    <tr>
    <td>Knight</td>
    <td>55</td>
    </tr>
    <tr>
    <td>Paladin</td>
    <td>70</td>
    </tr>
    <tr>
    <td>Hero</td>
    <td>80</td>
    </tr>
    </table>

    </td>
    <td valign="top">
    <table border="0"><tr><td align="center" colspan="2"><b>Lockpicking</b><br><br></td></tr>

    Certain doors in the game can only be opened by picking their locks. To pick the lock on a door right click on it and select the picklock option.

    </td></tr>
    <tr><td colspan="2"><br>A low level thief will only be able to pick the locks on 1 or 2 doors, as your thieving level increases you will be a able to get into a greater variety of new areas.</td></tr></table>

    </td></tr></table>


    <b>Trap disarming</b><br><br>
    Certain objects in the game such as chests have traps on them.
    If you don't disarm a trap on an item, you could receive damage or other penalties when trying to use it.
    If there is a trap to disarm you will find an option to disarm the trap when you right click on the item.
    If you are a high enough thieving level you will then be able to disarm the trap. Remember traps will become re-enabled again later.



    <b>Stealing from market stalls</b><br><br>
    You can use your thieving skill to take goods from the various market stalls in Ardougne.
    To steal from a market stall right click on it and select the "steal from" option. If you are a high enough level your character will attempt to steal something from it.
    Certain characters will try to stop you stealing from market stalls, so wait until these npcs do not have a line of sight to you or are otherwise distracted/dead.


    <b>Thieving levels needed to be able to <br>steal from the various market stalls. </b><br>


    <table bgcolor="black" cellpadding="4" width="200">
    <tr>
    <td bgcolor="#382418"><b>Stall</b></td>
    <td bgcolor="#382418"><b>Level required</b></td>
    </tr>
    <tr>
    <td>Cake stall</td>
    <td>5</td>
    </tr>
    <tr>
    <td>Silk stall</td>
    <td>20</td>
    </tr>
    <tr>
    <td>Fur stall</td>
    <td>35</td>
    </tr>
    <tr>
    <td>Silver stall</td>
    <td>50</td>
    </tr>
    <tr>
    <td>Spices stall</td>
    <td>65</td>
    </tr>
    <tr>
    <td>Gems stall</td>
    <td>75</td>
    </tr>
    </table>

    </td></tr></table>
</p>
HTML; }