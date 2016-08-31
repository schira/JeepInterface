__author__ = 'andrew'
import os,subprocess

proc = subprocess.Popen(["arp | grep wlan0 | awk '!/incomplete/'"], stdout=subprocess.PIPE, shell=True)
(out, err) = proc.communicate()

shutdownLimit = 10

file = open('offlineCount', 'r')
currentCount = int(file.read())

if currentCount > 0 and len(out) > 0:
    # Reset when device detected
    downCount = 0
    with open("offlineCount", "w") as text_file:
        text_file.write("%s" % (downCount))

elif len(out) == 0 and currentCount < shutdownLimit:
    #Increment when no device is detected on wifi
    downCount = currentCount + 1

    with open("offlineCount", "w") as text_file:
        text_file.write("%s" % (downCount))

    file = open('offlineCount', 'r')

elif currentCount >= shutdownLimit:
    #Shut Pi down since it has been offline for set time.
    #Also reset the counter so if phone is still off and restart it goes through the cycle again.
    downCount = 0
    with open("offlineCount", "w") as text_file:
        text_file.write("%s" % (downCount))
    print('shutdown')
    #os.system("sudo shutdown -h now")