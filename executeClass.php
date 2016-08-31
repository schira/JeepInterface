<?php

function __autoload($class_name) {

    require_once $_SERVER['DOCUMENT_ROOT'] . '/class.' . $class_name . '.php';
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
}
