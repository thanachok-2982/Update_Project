import RPi.GPIO as GPIO #import the GPIO library
import time


GPIO.setmode(GPIO.BOARD)
pin =35
GPIO.setup(pin, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)

name = "Ryan"
print("Hello " + name)
try:
    while True:
        if GPIO.input(pin):
            print("Door is closed")
            time.sleep(2)
        if GPIO.input(pin) == False:
            print("Door is open")
            time.sleep(2)


except KeyboardInterrupt:
    GPIO.cleanup()

