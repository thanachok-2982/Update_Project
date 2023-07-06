#!/usr/bin/python
# ใช้เพื่อระบุว่าไฟล์นี้เป็นไฟล์ Python และควรใช้โปรแกรม Python เวอร์ชันอะไรในการรัน
import RPi.GPIO as GPIO # เรียกใช้ library RPi.GPIO
import time # เรียกใช้ library time

servoPIN = 15
# กำหนดขาของเซอร์โว
GPIO.setmode(GPIO.BOARD)
# กำหนดโหมดของ GPIO เป็น BOARD
GPIO.setup(servoPIN, GPIO.OUT)
# กำหนดขาของเซอร์โวเป็นขาที่ 15 และตั้งโหมดให้เป็น output

p = GPIO.PWM(servoPIN, 50) # กำหนดขา GPIO ที่ใช้เป็น servoPIN และความถี่ 50Hz
p.start(12) # เซอร์โวหมุนไปองศาที่ 12
time.sleep(1) # หน่วงเวลา 1 วินาที 
p.ChangeDutyCycle(7) # เซอร์โวหมุนไปองศาที่ 7
time.sleep(0.5) # หน่วงเวลา 1 วินาที            
p.stop() # หยุดส่งสัญญาณ PWM
GPIO.cleanup() # ทำความสะอาดการกำหนดค่าขา GPIO ที่ใช้งานเมื่อโปรแกรมสิ้นสุดการทำงาน