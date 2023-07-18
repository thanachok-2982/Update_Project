from flask import Flask, request
import subprocess
import RPi.GPIO as GPIO
import time
import os
import pcf8574_io

p1 = pcf8574_io.PCF(0x20)
p1.pin_mode("p0", "OUTPUT")
p1.pin_mode("p1", "OUTPUT")
p1.pin_mode("p2", "OUTPUT")
p1.pin_mode("p3", "OUTPUT")
p1.pin_mode("p4", "OUTPUT")
p1.pin_mode("p5", "OUTPUT")
p1.pin_mode("p6", "OUTPUT")
p1.pin_mode("p7", "OUTPUT")
x = 1

app = Flask(__name__)

@app.route('/receive', methods=['POST'])
def receive_data():
    data = request.form['message']
    if data == 'servo1':
        
        try:
            subprocess.run(['python', '/var/www/html/close_coin.py'])
            subprocess.run(['python', '/var/www/html/servo1.py'])

        except Exception as e:
            return f'Error executing script: {str(e)}'
    
        
    elif data == 'servo2':
       
        try:
            subprocess.run(['python', '/var/www/html/close_coin.py'])
            subprocess.run(['python', '/var/www/html/servo2.py'])
        
        except Exception as e:
            return f'Error executing script: {str(e)}'
        
    elif data == 'coin':
        try:
        # Run the other Python script using subprocess
            subprocess.run(['python', '/var/www/html/open_module_and_send_coin.py'])
        
        except Exception as e:
            return f'Error executing script: {str(e)}'
        
    elif data == 'open':
        #try:
        # Run the other Python script using subprocess
         #   subprocess.run(['python', '/var/www/html/close_door.py'])
        
        #except Exception as e:
         #   return f'Error executing script: {str(e)}'
        def on():
            p1.write("p2", "LOW")
    #p1.write("p1", "HIGH")
    #p1.write("p2", "HIGH")
    #p1.write("p4", "HIGH")
    #p1.write("p5", "HIGH")
    #p1.write("p6", "HIGH")
    #p1.write("p7", "HH")
            print("on")
            p1.set_i2cBus(1)
            p1.get_i2cBus()
    #time.sleep(3)

        def off():
            p1.write("p2", "HIGH")
    #p1.write("p1", "HIGH")
    #p1.write("p2", "HIGH")
    #p1.write("p4", "HIGH")
    #p1.write("p5", "HIGH")
    #p1.write("p6", "HIGH")
    #p1.write("p7", "HIGH")
            print("off")
#print(p1.read("p2"))

# Additional you can do the following
            p1.set_i2cBus(1)
            p1.get_i2cBus()
    #time.sleep(3)

        for x in range(1):
    
            off()
            time.sleep(1)
            on()
            time.sleep(1)
        
    return 'Data received: ' + data

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)