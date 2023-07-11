#!/usr/bin/python
import RPi.GPIO as GPIO
import requests
import time
import pcf8574_io
import os


p1 = pcf8574_io.PCF(0x20)
x = 1

p1.pin_mode("p0", "OUTPUT")
p1.pin_mode("p1", "OUTPUT")
p1.pin_mode("p2", "OUTPUT")
p1.pin_mode("p4", "OUTPUT")
p1.pin_mode("p5", "OUTPUT")
p1.pin_mode("p6", "OUTPUT")
p1.pin_mode("p7", "OUTPUT")

def on():
    p1.write("p2", "LOW")

    p1.set_i2cBus(1)
    p1.get_i2cBus()
    #time.sleep(3)

#def off():
#    p1.write("p7", "HIGH")
#    p1.set_i2cBus(1)
#    p1.get_i2cBus()
    #time.sleep(3)

#for x in range(1):
    
on()
#    time.sleep(1)
#    off()
#    time.sleep(1)
