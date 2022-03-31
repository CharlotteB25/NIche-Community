from sense_hat import SenseHat
from time import sleep
from random import randint
import math
import sys

# init sensehat
sense = SenseHat()
sense.set_imu_config(False, False, False)

def main() :
    row = 0
    column = 0

    def random_colour():
        return (randint(0, 255), randint(0, 255), randint(0, 255))

    while True:
        for row in range(8):
            for column in range(8):
                sleep(0.2)
                sense.set_pixel(row, column, random_colour())

#tried to do a easing function. looked online. doesn't work
        def ease(self, alpha):
            t = self.limit[0] * (1 - alpha) + self.limit[1] * alpha
            t /= self.duration
            a = self.func(t)
            return self.end * a + self.start * (1 - a)

    class QuadEaseInOut(main):
        def func(self, t):
            if t < 0.5:
             return 2 * t * t
            return (-2 * t * t) + (4 * t) - 1

    
try :
    main()
except(KeyboardInterrupt, SystemExit) :
    print('Programma wordt gracefully gestopt')
finally :
    print('Sensehat leegmaken')
    sense.clear()
    sys.exit()
