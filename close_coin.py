#!/usr/bin/python
import RPi.GPIO as GPIO
import requests
import time
import pcf8574_io
import os


# You can use up to 8 PCF8574 boards
# the board will start in input mode
# the pins are HIGH in input mode
p1 = pcf8574_io.PCF(0x20)

# You can use multiple boards with different addresses
#p2 = pcf8574_io.PCF(0x21)

# p0 to p7 are the pins name
# INPUT or OUTPUT is the mode

#p1.pin_mode("p0", "INPUT")
#print(p1.read("p0"))

# You can write and read the output pins
# use HIGH or LOW to set the pin, HIGH is +3.3v LOW is 0v
p1.pin_mode("p1", "OUTPUT")
p1.pin_mode("p2", "OUTPUT")
p1.pin_mode("p4", "OUTPUT")
p1.pin_mode("p5", "OUTPUT")
p1.pin_mode("p6", "OUTPUT")
p1.pin_mode("p7", "OUTPUT")
p1.write("p1", "HIGH")
p1.write("p2", "HIGH")
p1.write("p4", "HIGH")
p1.write("p5", "HIGH")
p1.write("p6", "HIGH")
p1.write("p7", "HIGH")
