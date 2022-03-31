from sense_hat import SenseHat
from time import sleep
from random import randint
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
                sleep(0.3)
                sense.set_pixel(row, column, random_colour())

try :
    main()
except(KeyboardInterrupt, SystemExit) :
    print('Programma wordt gracefully gestopt')
finally :
    print('Sensehat leegmaken')
    sense.clear()
    sys.exit()
