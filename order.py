#!/usr/bin/env python 
import sys, time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
servo1 = 16    # GPIO @ connected on 16 pin / Ref RasPi4B.
servo2 = 17    # GPIO @ connected on 16 pin / Ref RasPi4B.
servo3 = 18    # GPIO @ connected on 16 pin / Ref RasPi4B.
GPIO.setup(servo1, GPIO.OUT, initial=GPIO.LOW)    #Set GPIO 
GPIO.setup(servo2, GPIO.OUT, initial=GPIO.LOW)    #Set GPIO 
GPIO.setup(servo3, GPIO.OUT, initial=GPIO.LOW)    #Set GPIO 

order = ' '.join(sys.argv[1:])

class Control_servo:
  def Servo(self, order):
    self.order = order
    print (f"Servo {self.order} ON!") 
    if (self.order == '1'):
        GPIO.output(16, GPIO.HIGH) # Turn on
        sleep(1)                  # Sleep for 1 second
        GPIO.output(16, GPIO.LOW)  # Turn off
        sleep(1)                  # Sleep for 1 second
        
    elif (self.order == '2'):
        GPIO.output(17, GPIO.HIGH) # Turn on
        sleep(1)                  # Sleep for 1 second
        GPIO.output(17, GPIO.LOW)  # Turn off
        sleep(1)                  # Sleep for 1 second
        
    elif (self.order == '3'):
        GPIO.output(18, GPIO.HIGH) # Turn on
        sleep(1)                  # Sleep for 1 second
        GPIO.output(18, GPIO.LOW)  # Turn off
        sleep(1)                  # Sleep for 1 second
    
s = Control_servo()
s.Servo(order)