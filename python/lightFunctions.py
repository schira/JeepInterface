#!/usr/bin/python
__author__ = 'andrew'

import RPi.GPIO as GPIO
import sys

pinList = sys.argv
pinNum = int(pinList[1])

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

if pinList[1]:
    if pinList[2] == 1:
        GPIO.setup(pinNum, GPIO.HIGH) # light ON
    elif pinList[2] == 0:
        GPIO.setup(pinNum, GPIO.LOW)  # light off

value = GPIO.input(pinNum)

print(value)

