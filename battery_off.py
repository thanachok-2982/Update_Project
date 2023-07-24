#!/usr/bin/python
# ใช้เพื่อระบุว่าไฟล์นี้เป็นไฟล์ Python และควรใช้โปรแกรม Python เวอร์ชันอะไรในการรัน
import RPi.GPIO as GPIO #เรียกใช้ library RPi.GPIO
import requests #เรียกใช้ library requests
import time #เรียกใช้ library time
import pcf8574_io #เรียกใช้ library PCF8574 ซึ่งเป็น I/O Expander for I²C Bus
import os #เรียกใช้ library os


p1 = pcf8574_io.PCF(0x20)
# กำหนด Address เพื่ออ้างอิงว่าจะสื่อสารกับ IC ตัวไหน โดย PCF8574 นั้นมีให้ set ได้ถึง 8 address
# บอร์ดจะเริ่มที่ input mode และแต่ละ pin จะมีสถานะเป็น HIGH

p1.pin_mode("p1", "OUTPUT")
p1.pin_mode("p4", "OUTPUT")
p1.pin_mode("p6", "OUTPUT")
p1.pin_mode("p7", "OUTPUT")
# กำหนดให้ ic แต่ละขาเป็น OUTPUT

p1.write("p1", "HIGH")
p1.write("p4", "LOW")
p1.write("p6", "LOW")
p1.write("p7", "HIGH")
# กำหนดให้ขา p4 เป็น LOW

p1.set_i2cBus(1)
# เป็นการกำหนดค่าช่องทาง I2C ใน Raspberry Pi เป็นค่า 1 ซึ่งในที่นี้หมายถึงใช้ช่องทาง I2C หมายเลข 1 ใน Raspberry Pi

p1.get_i2cBus()
# เป็นการแสดงค่าช่องทาง I2C ปัจจุบันที่ถูกกำหนดให้ใช้งานใน Raspberry Pi

