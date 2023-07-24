from flask import Flask, request
import subprocess
import RPi.GPIO as GPIO
import time
import os
import pcf8574_io


app = Flask(__name__)

@app.route('/receive', methods=['POST'])
def receive_data():
    data = request.form['message']
    if data == 'servo1':
        
        try:
            #subprocess.run(['python', '/var/www/html/close_coin.py'])
            subprocess.run(['python', '/var/www/html/servo1.py'])

        except Exception as e:
            return f'Error executing script: {str(e)}'
    
        
    elif data == 'servo2':
       
        try:
            #subprocess.run(['python', '/var/www/html/close_coin.py'])
            subprocess.run(['python', '/var/www/html/servo2.py'])
        
        except Exception as e:
            return f'Error executing script: {str(e)}'
        
    elif data == 'coin':
        try:
        # Run the other Python script using subprocess
            subprocess.run(['python', '/var/www/html/open_module_and_send_coin.py'])
        
        except Exception as e:
            return f'Error executing script: {str(e)}'
        
    elif data == 'bat_on':
        try:
        # Run the other Python script using subprocess
            subprocess.run(['python', '/var/www/html/battery_on.py'])
        
        except Exception as e:
            return f'Error executing script: {str(e)}'
    
    
        #try:
        
        
    return 'Data received: ' + data

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)