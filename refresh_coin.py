from time import sleep
import sys
# import RPi.GPIO as GPIO
# GPIO.setmode(GPIO.BOARD)
# coinpin = 16    # GPIO @ connected on 16 pin / Ref RasPi4B.
# GPIO.setup(coinpin, GPIO.IN)    #Set GPIO pin Input.
coin = ' '.join(sys.argv[1:])

class Control_servo:
  def Servo(self, coin):
    self.coin = coin   
    print("{} Bath" .format(self.coin))


c = Control_servo()
c.Servo(coin)
