#!/usr/bin/python 
# ใช้เพื่อระบุว่าไฟล์นี้เป็นไฟล์ Python และควรใช้โปรแกรม Python เวอร์ชันอะไรในการรัน

import gpiozero # เรียกใช้ library gpiozero 
class e18_d80nk(object):
        def __init__(self, pin,default_high=False):
                self.sensor = gpiozero.InputDevice(pin, pull_up=default_high, active_state=None, pin_factory=None)
                # โดยกำหนดพินของเซ็นเซอร์ด้วยพารามิเตอร์ pin และกำหนดค่า pull_up จากพารามิเตอร์ default_high ถ้า default_high เป็น True จะใช้การ pull-up และถ้า default_high เป็น False จะใช้การ pull-down
                #get state sensor if true = detect false = not detect
        def get_state(self):
                return self.sensor.is_active
                # ดึงสถานะของเซ็นเซอร์ โดยการเรียกใช้เมธอด is_active ของ self.sensor ซึ่งจะคืนค่า True ถ้าเซ็นเซอร์ตรวจจับวัตถุ และคืนค่า False ถ้าเซ็นเซอร์ไม่เจอวัตถุ