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
p1.pin_mode("p2", "OUTPUT")
p1.pin_mode("p4", "OUTPUT")
p1.pin_mode("p5", "OUTPUT")
p1.pin_mode("p6", "OUTPUT")
p1.pin_mode("p7", "OUTPUT")
# กกำหนดให้ ic แต่ละขาเป็น OUTPUT
p1.write("p4", "LOW")
# กำหนดให้ขา p4 เป็น LOW

p1.set_i2cBus(1)
# เป็นการกำหนดค่าช่องทาง I2C ใน Raspberry Pi เป็นค่า 1 ซึ่งในที่นี้หมายถึงใช้ช่องทาง I2C หมายเลข 1 ใน Raspberry Pi

p1.get_i2cBus()
# เป็นการแสดงค่าช่องทาง I2C ปัจจุบันที่ถูกกำหนดให้ใช้งานใน Raspberry Pi



sensor = 40
i = 0
k = 0
kc = 0 
s = 0 
sc = 0 
j = 0 
jc = 0 
a = 0 
i10 = 0 
i5 = 0 
i1 = 0 
count = 0
isCounter = False

GPIO.setmode(GPIO.BOARD)
# กำหนดโหมดของ GPIO เป็น BOARD
GPIO.setup(sensor, GPIO.IN, pull_up_down=GPIO.PUD_UP)
# กำหนดขาของเซ็นเซอร์เป็นขาที่ 40 และตั้งโหมดให้เป็น input


def doCounter(channel):
    global isCounter, count
    isCounter = True
    count = count + 1
# ฟังก์ชัน doCounter ที่จะถูกเรียกเมื่อเกิดการเปิดเซ็นเซอร์ และเพิ่มค่าตัวแปร count ขึ้นทีละ 1




GPIO.add_event_detect(sensor, GPIO.RISING, callback=doCounter, bouncetime=150)
# ตรวจจับการเปิดเซ็นเซอร์ และให้เรียกใช้งานฟังก์ชัน doCounter เมื่อเกิดขอบขาของสัญญาณที่เปลี่ยนระดับจากต่ำไปยังระดับสูง

try: 
    while True: 

        if  i == 20:
            if isCounter == True:
                isCounter = False  
            url = "http://localhost/system.php"
            print("{} Bath" .format(count))
            postdata = {'msg' : str(count) }
            x = requests.post(url, data = postdata)
            count = 0
            i = 0
            # ถ้าตัวแปร i เป็น 20 จะทำการส่งค่า count ไปยังเว็บเซิร์ฟเวอร์โดยใช้ HTTP POST และรีเซ็ตค่า count เป็น 0
            
            
        if isCounter == True:
            i += 1
            # ถ้าตัวแปร isCounter เป็น True ก็จะเพิ่มค่า i ขึ้นทีละ 1

        
        time.sleep(0.1)
        # หยุดรอเวลา 0.1 วินาทีก่อนที่จะเริ่มต้นรอบใหม่
        
except KeyboardInterrupt:   
    GPIO.cleanup()
    # ถ้าผู้ใช้กด Ctrl-C (KeyboardInterrupt) โปรแกรมจะทำความสะอาด GPIO และสิ้นสุดการทำงาน
