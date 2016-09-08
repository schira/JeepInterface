<link href="/css/system.css" rel="stylesheet">
<script src="js/system.js"></script>
<?php
$settingsArray = parse_ini_file("settings.ini");

$commandtemp = escapeshellcmd("sudo /opt/vc/bin/vcgencmd measure_temp");
$outputtemp = exec($commandtemp);
$cleantemp = explode('=', $outputtemp);

$commanddisk = escapeshellcmd("sudo df -h | grep /root");
$outputdiskspace = exec($commanddisk);
$cleandisk = explode('G', $outputdiskspace);

$commanduptime = escapeshellcmd("uptime");
$outputuptime = exec($commanduptime);
$cleanuptime = explode(',', $outputuptime);
$uptimeOnly = explode('up', $cleanuptime[0]);
?>
<table border="0" class='systemtable'>
    <tr>
        <th>Shutdown Time:</th>
        <td><input type="number" id='shutdown-phonecount' name="shutdowninput" class="settinginput" value='<?php echo $settingsArray['shutdown-phonecount']; ?>' /></td>

    </tr>
    <tr>
        <th>System Temp / Max 185&deg;F  :</th>
        <td><input type="text" name="tempinput" class="tempinput" disabled=true value='<?php echo number_format(($cleantemp[1] * 9 / 5) + 32, 1); ?>&deg;' /></td>
    </tr>
    <tr>
        <th>Space Available:</th>
        <td><input type="text" name="tempinput" class="spaceinput" disabled=true value='<?php echo trim($cleandisk[2]); ?> GB' /></td>

    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <th colspan='2' style='text-align: center;'>Resource Usage:</th>
    </tr>
    <tr>
        <th>UpTime:</th>
        <td><input type="text" name="tempinput" class="spaceinput" disabled=true value='<?php echo trim($uptimeOnly[1]); ?>' /></td>
    <tr>
        <th>Load 1 min:</th>
        <td><input type="text" name="tempinput" class="spaceinput" disabled=true value='<?php echo trim(str_replace('load average: ', ' ', $cleanuptime[3])) ?>' /></td>
    </tr>
    <tr>
        <th>Load 5 min:</th>
        <td><input type="text" name="tempinput" class="spaceinput" disabled=true value='<?php echo trim($cleanuptime[4]); ?>' /></td>
    </tr>
    <tr>
        <th>Load 10 min:</th>
        <td><input type="text" name="tempinput" class="spaceinput" disabled=true value='<?php echo trim($cleanuptime[5]); ?>' /></td>
    </tr>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
    <td style='text-align: center;' colspan='2'>
        <button type="button" id='btnSave' class="btn btn-success">Save</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" id='btnReboot' class="btn btn-warning">Reboot</button>
        <button type="button" id='btnShutdown' class="btn btn-danger">Shutdown</button>
    </td>
</tr>
</table>