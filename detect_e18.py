import e18_d80nk as e18_d80nk
import time
import RPi.GPIO as GPIO
import requests
import pcf8574_io
import os


#pin Gpio
pin = 4
p1 = pcf8574_io.PCF(0x20)

#e18_d80nk default gpio High when object detect gpio went low
default_high = True

#Distance
distance_sensor = e18_d80nk.e18_d80nk(pin,default_high)

time.sleep(1)
running = True
while(running):
    try:
        time.sleep(0.1)
        #HIGH = NORMAL , LOW = OBJECT DETECT
        if (distance_sensor.get_state() == True):
            print ("Object is detect.")
            file_path = '/home/pi/Desktop/example.txt'
            with open(file_path, 'w') as file:
                file.write('This is an example file.')
            p1.pin_mode("p1", "OUTPUT")
            p1.pin_mode("p2", "OUTPUT")
            p1.pin_mode("p4", "OUTPUT")
            p1.pin_mode("p5", "OUTPUT")
            p1.pin_mode("p6", "OUTPUT")
            p1.pin_mode("p7", "OUTPUT")
            p1.write("p1", "HIGH")
            p1.write("p2", "LOW")
            p1.write("p4", "HIGH")
            p1.write("p5", "HIGH")
            p1.write("p6", "HIGH")
            p1.write("p7", "HIGH")
            p1.set_i2cBus(1)
            p1.get_i2cBus()

        else:
            print ("Object is not detect.")
            if os.path.exists(file_path):
                os.remove(file_path)
                print(f"File '{file_path}' deleted.")
            else:
                print(f"File '{file_path}' does not exist. Continuing...")
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
            p1.set_i2cBus(1)
            p1.get_i2cBus()
    except KeyboardInterrupt:
        running = False

