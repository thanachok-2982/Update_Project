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
# p1.write("p1", "HIGH")
# p1.write("p2", "LOW")
p1.write("p4", "LOW")
# p1.write("p5", "LOW")
# p1.write("p6", "HIGH")
# p1.write("p7", "HIGH")
#print(p1.read("p2"))

# Additional you can do the following
p1.set_i2cBus(1)
p1.get_i2cBus()
###############################################################################
#print(p1.get_pin_mode("p2")) # returns string OUTPUT, INPUT
#print(p1.is_pin_output("p2")) # returns boolean True, False
#print(p1.get_all_mode()) # returns list of all pins ["OUTPUT","INPUT",...etc]
# sensor = 40


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
GPIO.setup(sensor, GPIO.IN, pull_up_down=GPIO.PUD_UP)


def doCounter(channel):
    global isCounter, count
    isCounter = True
    count = count + 1



GPIO.add_event_detect(sensor, GPIO.RISING, callback=doCounter, bouncetime=150)


try: 
    while True: 

        if  i == 20:
            if isCounter == True:
                isCounter = False
            #if count > 0:    
            url = "http://localhost/system.php"
            print("{} Bath" .format(count))
            postdata = {'msg' : str(count) }
            x = requests.post(url, data = postdata)
            count = 0
            i = 0
           # time.sleep(0.75)
            #print("0 Bath")
            #postdata = {'msg' : str(count) }
            #x = requests.post(url, data = postdata)
            
            
        if isCounter == True:
            i += 1

        
        time.sleep(0.1)
        
except KeyboardInterrupt:   # Press ctrl-c to end the program.
    GPIO.cleanup()

#c = Coin()
#c.send_count("https://vendingmproject.000webhostapp.com/show_text.php")
#c.send_count('http://localhost/Realtimetest/system.php')
