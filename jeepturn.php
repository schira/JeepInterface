<?php

switch ($_POST['Task']) {
    case 'getaxis':
        $command = escapeshellcmd("sudo /usr/bin/python /var/www/html/python/getAxis.py");
        echo exec($command);
        break;
}




