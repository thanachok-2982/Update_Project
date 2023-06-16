#!/usr/bin/env python
import RPi.GPIO as GPIO
import time

servoPIN = 12
GPIO.setmode(GPIO.BOARD)
GPIO.setup(servoPIN, GPIO.OUT)

p = GPIO.PWM(servoPIN, 50) # GPIO 17 for PWM with 50Hz
p.start(12) # Initializat
time.sleep(1)
p.ChangeDutyCycle(7) # หมุนไปทางที่ต่างจา
time.sleep(0.5) # หน่วงเวลา 1 วินาที            
p.stop()
GPIO.cleanup()
