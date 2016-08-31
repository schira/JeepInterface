__author__ = 'andrew'

import RPi.GPIO as GPIO
import sys

pinList = sys.argv
pinNum = int(pinList[1])

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

GPIO.setup(pinNum, GPIO.LOW) #OUT=Off --- IN=On


value = GPIO.input(pinNum)

print(value)

