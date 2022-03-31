from sense_hat import SenseHat
from time import sleep
from random import randint
import sys

# init sensehat
sense = SenseHat()
sense.set_imu_config(False, False, False)

def main() :
    while(True):
        black = [0, 0, 0]
        y = [255, 255, 0]
        b = [0, 0, 255]
        r = [255, 0, 0]

        happy = [
            black, black, black, y, y, black, black, black,
            black, y, y, y, y, y, y, black,
            black, y, black, y, y, black, y, black,
            y, y, y, y, y, y, y, y,
            y, y, black, y, y, black, y, y,
            black, y, y, black, black, y, y, black,
            black, y, y, y, y, y, y, black,
            black, black, black, y, y, black, black, black

        ]

        sad = [
            black, black, black, y, y, black, black, black,
            black, y, y, y, y, y, y, black,
            black, y, black, y, y, black, y, black,
            y, y, b, y, y, b, y, y,
            y, y, black, y, y, black, y, y,
            black, y, b, black, black, b, y, black,
            black, y, b, y, y, b, y, black,
            black, black, b, y, y, b, black, black
        ]

        wink = [
            black, black, black, y, y, black, black, black,
            black, y, y, y, y, y, y, black,
            black, y, black, y, y, black, y, black,
            y, black, y, black, y, y, y, y,
            y, y, y, y, y, y, y, y,
            black, y, black, y, y, black, y, black,
            black, y, y, black, black, y, y, black,
            black, black, black, y, y, black, black, black
        ]

        heart = [
            black, black, black, y, y, black, black, black,
            black, r, y, r, r, y, r, black,
            black, r, r, r, r, r, r, black,
            y, y, r, y, y, r, y, y,
            y, y, black, y, y, black, y, y,
            black, y, y, black, black, y, y, black,
            black, y, y, y, y, y, y, black,
            black, black, black, y, y, black, black, black
        ]

        while True:
            sense.set_pixels(happy)
            sleep(3)
            sense.set_pixels(sad)
            sleep(3)
            sense.set_pixels(wink)
            sleep(3)
            sense.set_pixels(heart)
            sleep(3)            
try :
    main()
except(KeyboardInterrupt, SystemExit) :
    print('Programma wordt gracefully gestopt')
finally :
    print('Sensehat leegmaken')
    sense.clear()
    sys.exit()