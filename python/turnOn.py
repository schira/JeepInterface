import RPi.GPIO as GPIO
import time
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(4, GPIO.OUT)

GPIO.output(4,False)

value = GPIO.input(4)
print(value)

time.sleep(5)

GPIO.output(4,True)

value = GPIO.input(4)
print(value)