#!/usr/bin/python
# ใช้เพื่อระบุว่าไฟล์นี้เป็นไฟล์ Python และควรใช้โปรแกรม Python เวอร์ชันอะไรในการรัน
import RPi.GPIO as GPIO # เรียกใช้ library RPi.GPIO
import os # เรียกใช้ library os
import time # เรียกใช้ library time

sensor = 10
# กำหนดขาของเซ็นเซอร์

GPIO.setmode(GPIO.BOARD)
# กำหนดโหมดของ GPIO เป็น BOARD

GPIO.setup(sensor,GPIO.IN)
# กำหนดขาของเซ็นเซอร์เป็นขาที่ 10 และตั้งโหมดให้เป็น input


try:

    if GPIO.input(sensor):
            print("1")
            # ถ้าเซ็นเซอร์ตรวจเจอวัตถุให้แสดงผล 1

    else:
            
            print("0")
            # ถ้าเซ็นเซอร์ตรวจไม่เจอวัตถุให้แสดงผล 0


except KeyboardInterrupt:
    GPIO.cleanup()
    # ถ้าผู้ใช้กด Ctrl-C (KeyboardInterrupt) โปรแกรมจะทำความสะอาด GPIO และสิ้นสุดการทำงาน

