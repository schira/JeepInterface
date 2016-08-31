?php

class gpio {

    private $lightsNum = array(3, 4);

    public function lightStatus($lightNum) {
        $command = escapeshellcmd("gpio -g read " . $lightNum);
        $output = exec($command);
        if ($output == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function enableLight($lightNum) {
        //0 is light on
        $command = escapeshellcmd("/usr/bin/python /var/www/html/enableLight.py " . $lightNum);
        $returnStatus = exec($command);
        if ($returnStatus == 0) {
            return 'Light On';
        } else {
            return 'Error';
        }
    }

    public function disableLight($lightNum) {
        //1 is light off
        $command = escapeshellcmd("/usr/bin/python /var/www/html/disableLight.py " . $lightNum);
        $returnStatus = exec($command);
        if ($returnStatus == 1) {
            return 'Light Off';
        } else {
            return 'Error';
        }
    }

    public function allLightStatus() {
        foreach ($this->lightsNum as $eachLight) {
            $status[$eachLight] = $this->lightStatus($eachLight);
        }
        echo json_encode($status);
    }

}
