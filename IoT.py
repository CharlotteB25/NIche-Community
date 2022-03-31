from sense_hat import SenseHat
from time import sleep
from random import randint
import sys

# init sensehat
sense = SenseHat()
sense.set_imu_config(False, False, False)

def main() :
    random_colour1 = (randint(0, 255), randint(0, 255), randint(0, 255))
    random_colour2 = (randint(0, 255), randint(0, 255), randint(0, 255))
    random_colour3 = (randint(0, 255), randint(0, 255), randint(0, 255))

    while True:
        sense.show_letter("I", random_colour1)
        sleep(1)
        sense.show_letter("o", random_colour2)
        sleep(1)
        sense.show_letter("T", random_colour3)
        sleep(3)  


try :
    main()
except(KeyboardInterrupt, SystemExit) :
    print('Programma wordt gracefully gestopt')
finally :
    print('Sensehat leegmaken')
    sense.clear()
    sys.exit()
