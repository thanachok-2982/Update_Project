#!/usr/bin/env python
import RPi.GPIO as GPIO
import time

servoPIN = 15
GPIO.setmode(GPIO.BOARD)
GPIO.setup(servoPIN, GPIO.OUT)
x = 0
p = GPIO.PWM(servoPIN, 50) # GPIO 17 for PWM with 50Hz
for x in range(1):
    p.start(12) # Initializat
    time.sleep(2)
    p.ChangeDutyCycle(7) # หมุนไปทางที่ต่างจา
    time.sleep(1) # หน่วงเวลา 1 วินาที   
    
p.stop()
GPIO.cleanup()
