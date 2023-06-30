from flask import Flask, request
import subprocess
import RPi.GPIO as GPIO
import time
import os


app = Flask(__name__)

@app.route('/receive', methods=['POST'])
def receive_data():
    data = request.form['message']
    if data == 'servo':
        subprocess.run(['python', '/var/www/html/close_coin.py'])
        try:
        # Run the other Python script using subprocess
            servoPIN = 
            GPIO.setmode(GPIO.BOARD)
            GPIO.setup(servoPIN, GPIO.OUT)

            p = GPIO.PWM(servoPIN, 50) # GPIO 17 for PWM with 50Hz
            p.start(2) # Initializat
            time.sleep(1)
            p.ChangeDutyCycle(12) # หมุนไปทางที่ต่างจา
            time.sleep(0.5) # หน่วงเวลา 1 วินาที            
            p.stop()
            GPIO.cleanup()
        except Exception as e:
            return f'Error executing script: {str(e)}'
        # Process the data as needed
        
    
    elif data == 'coin':
        # Run the other Python script using subprocess
            subprocess.run(['python', '/var/www/html/open_module_and_send_coin.py'])
        
        # Process the data as needed
    #elif data == 'close':
        # Run the other Python script using subprocess
            
            #subprocess.run(['python', '/var/www/html/close_coin.py'])

        # Process the data as needed
    
    return 'Data received: ' + data

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)