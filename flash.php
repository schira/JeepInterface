<?php

//1 is light off
$lightNum = 4;
$command = escapeshellcmd("/usr/bin/python /var/www/html/disableLight.py " . $lightNum);
$returnStatus = exec($command);
if ($returnStatus == 1) {
    echo 'Light Off';
} else {
    echo 'Error';
}
?>