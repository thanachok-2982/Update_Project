import RPi.GPIO as GPIO #import the GPIO library
import time


GPIO.setmode(GPIO.BOARD)
pin =35
GPIO.setup(pin, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)

try:
        if GPIO.input(pin):
            print("Door is closed")
        else:
            print("Door is open")


except KeyboardInterrupt:
    GPIO.cleanup()

