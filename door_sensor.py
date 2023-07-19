#!/usr/bin/python
import RPi.GPIO as GPIO #import the GPIO library
import time


GPIO.setmode(GPIO.BOARD)
pin =35
GPIO.setup(pin, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
try:
    while (True):    
        time.sleep(0.5)
        if GPIO.input(pin):
            print(GPIO.input(pin))
            f = open("/var/www/html/door.txt", "w")
            f.write("1")
            f.close() 
        else:
            print("0")
            f = open("/var/www/html/door.txt", "w")
            f.write("0")
            f.close()


except KeyboardInterrupt:
    GPIO.cleanup()

