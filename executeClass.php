<?php

function __autoload($class_name) {

    require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/class.' . $class_name . '.php';
}

$gpio = new gpio();
$lightNum = $_POST['lightNum'];

switch ($_POST['Task']) {
    case 'enable':
        echo $gpio->enableLight($lightNum);
        break;
    case 'disable':
        echo $gpio->disableLight($lightNum);
        break;
    case 'allStatus':
        echo $gpio->allLightStatus();
        break;
    case 'rebootSystem':
        $commandtemp = escapeshellcmd("sudo reboot");
        $outputtemp = exec($commandtemp);
        break;
    case 'shutdownSystem':
        $commandtemp = escapeshellcmd("sudo shutdown -h now");
        $outputtemp = exec($commandtemp);
        break;
    case 'updateSystemSettings':
        $path_to_file = '/var/www/html/settings.ini';
        $file_contents = file_get_contents($path_to_file);
        $updatedContents = str_replace("shutdown-phonecount = " + $_POST['oldValue'], "shutdown-phonecount = " + $_POST['newValue'], $file_contents);
        echo $updatedContents;
        file_put_contents($path_to_file, $updatedContents);
        break;
}
