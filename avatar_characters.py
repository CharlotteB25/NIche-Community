from sense_hat import SenseHat
from time import sleep
from random import randint
import sys

# init sensehat
sense = SenseHat()
sense.set_imu_config(False, False, False)

def main() :
    while(True):
        b = [0, 0, 255]
        y = [255, 255, 0]
        s = [255, 254, 189]
        r = [255, 0, 0]
        g = [0, 255, 0]
        black = [0, 0, 0]

        charlie = [
            black, black, black, b, b, black, black, black, 
            black, black, b, b, b, b, black, black,
            black, black, b, s, s, b, black, black,
            black, black, s, r, s, r, black, black,
            black, s, s, s, s, s, s, black, black,
            black, black, s, r, r, s, black, black, 
            black, black, s, s, s, s, black, black,
            black, black, black, black, black, black, black, black
        ]

        lucy = [
            black, black, black, y, y, black, black, black, 
            black, black, y, y, y, y, black, black,
            black, black, y, s, s, y, black, black,
            black, black, s, b, s, b, black, black,
            black, s, s, s, s, s, s, black, black,
            black, black, s, r, r, s, black, black, 
            black, black, s, s, s, s, black, black,
            black, black, black, black, black, black, black, black
        ]

        sense.set_pixels(charlie)
        sleep(4)

try :
    main()
except(KeyboardInterrupt, SystemExit) :
    print('Programma wordt gracefully gestopt')
finally :
    print('Sensehat leegmaken')
    sense.clear()
    sys.exit()
