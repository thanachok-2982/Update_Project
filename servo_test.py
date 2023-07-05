#!/usr/bin/python
import RPi.GPIO as GPIO
import time

servo_pin = 12  # GPIO pin number where the signal wire is connected

GPIO.setmode(GPIO.BCM)
GPIO.setup(servo_pin, GPIO.OUT)

pwm = GPIO.PWM(servo_pin, 50)  # PWM frequency of 50 Hz
pwm.start(2.5)  # Initial position of the servo motor (may need to be adjusted)

try:
    while True:
        # Move the servo to different positions
        pwm.ChangeDutyCycle(2.5)  # 0 degrees
        time.sleep(1)
        pwm.ChangeDutyCycle(7.5)  # 90 degrees
        time.sleep(1)
        pwm.ChangeDutyCycle(12.5)  # 180 degrees
        time.sleep(1)

except KeyboardInterrupt:
    pass

pwm.stop()
GPIO.cleanup()
