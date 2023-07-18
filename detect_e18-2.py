#!/usr/bin/python
# ใช้เพื่อระบุว่าไฟล์นี้เป็นไฟล์ Python และควรใช้โปรแกรม Python เวอร์ชันอะไรในการรัน
import e18_d80nk as e18_d80nk #เรียกใช้ library e18_d80nk
import RPi.GPIO as GPIO # เรียกใช้ library RPi.GPIO
import requests # เรียกใช้ library requests
import time # เรียกใช้ library time
import pcf8574_io # เรียกใช้ library PCF8574 ซึ่งเป็น I/O Expander for I²C Bus
import os # เรียกใช้ library os



pin = 24
# กำหนด pin 
p1 = pcf8574_io.PCF(0x20)
# กำหนด Address เพื่ออ้างอิงว่าจะสื่อสารกับ IC ตัวไหน โดย PCF8574 นั้นมีให้ set ได้ถึง 8 address
# บอร์ดจะเริ่มที่ input mode และแต่ละ pin จะมีสถานะเป็น HIGH

# กำหนดสถานะเริ่มต้นเป็น HIGH 
default_high = True

#กำหนดระยะห่าง
distance_sensor = e18_d80nk.e18_d80nk(pin,default_high)

p1.pin_mode("p1", "OUTPUT")
p1.pin_mode("p2", "OUTPUT")
p1.pin_mode("p4", "OUTPUT")
p1.pin_mode("p5", "OUTPUT")
p1.pin_mode("p6", "OUTPUT")
p1.pin_mode("p7", "OUTPUT")
# กำหนดให้ ic แต่ละขาเป็น OUTPUT


running = True
while(running):
    try:
        time.sleep(0.1)
        if (distance_sensor.get_state() == True):
            print ("Object is detect.")
            p1.write("p5", "HIGH")
            p1.set_i2cBus(1)
            p1.get_i2cBus()
           # time.sleep(1)
            # เมื่อ distance_sensor.get_state() == True จะสั่งให้ มีสภานะเป็น HIGH

        else:
            print ("Object is not detect.")
            p1.write("p5", "LOW")
            p1.set_i2cBus(1)
            p1.get_i2cBus()
            # เมื่อ distance_sensor.get_state() != True จะสั่งให้ มีสภานะเป็น LOW

    except KeyboardInterrupt:
        running = False
        # ถ้าผู้ใช้กด Ctrl-C (KeyboardInterrupt) โปรแกรมจะสิ้นสุดการทำงาน
