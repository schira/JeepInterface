<?php

switch ($_POST['Task']) {
    case 'getx':
        $command = escapeshellcmd("sudo /usr/bin/python /var/www/html/getx.py");
        echo exec($command);
        break;
    case 'gety':
        $command = escapeshellcmd("sudo /usr/bin/python /var/www/html/gety.py");
        echo exec($command);
        break;
}




