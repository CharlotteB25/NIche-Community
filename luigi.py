from sense_hat import SenseHat
from time import sleep
from random import randint
import sys

# init sensehat
sense = SenseHat()
sense.set_imu_config(False, False, False)

def main() :
    while(True):
        G = [0, 255,0]
        B = [0, 0 , 255]
        S = [255, 254, 189]
        black = [0, 0, 0]
        brown = [56, 37, 14]

        luigi = [
            black, black, G, G, G, black, black, black,
            black, black, G, G, G, G, G, black,
            black, black, brown, S, brown, black, black, black,
            black, black, brown, S, S, S, black, black,
            black, G, G, B, G, B, black, black,
            G, black, G, B, B, B, G, black,
            black, black, B, B, B, B, black, black,
            black, black, brown, black, black, brown, black, black
        ]

        luigi_jump = [
            black, black, brown, S, brown, black, black, black,
            black, black, brown, S, S, S, black, black,
            black, G, G, B, G, B, black, black,
            G, black, G, B, B, B, G, black,
            black, black, B, B, B, B, black, black,
            black, black, brown, black, black, brown, black, black,
            black, black, black, black, black, black, black, black,
            black, black, black, black, black, black, black, black

        ]


        sense.set_pixels(luigi)

        for event in sense.stick.get_events():
            sense.set_pixels(luigi_jump)
            sleep(1)
            sense.set_pixels(luigi)
            
try :
    main()
except(KeyboardInterrupt, SystemExit) :
    print('Programma wordt gracefully gestopt')
finally :
    print('Sensehat leegmaken')
    sense.clear()
    sys.exit()
