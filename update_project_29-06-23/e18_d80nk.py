#!/usr/bin/python
#class for e18-d80nk Distance measurement
import gpiozero
class e18_d80nk(object):
        def __init__(self, pin,default_high=False):
                self.sensor = gpiozero.InputDevice(pin, pull_up=default_high, active_state=None, pin_factory=None)
                #get state sensor if true = detect false = not detect
        def get_state(self):
                return self.sensor.is_active