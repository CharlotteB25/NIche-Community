from sense_hat import SenseHat
from time import sleep
from random import randint
import sys

# init sensehat

sense = SenseHat()
sense.set_imu_config(False, False, False)

def main() :
    sense.show_message("Hola",back_colour=[80, 0, 0], text_colour=[0, 255, 0])

try :
    main()
except(KeyboardInterrupt, SystemExit) :
    print('Programma wordt gracefully gestopt')
finally :
    print('Sensehat leegmaken')
    sense.clear()
    sys.exit()
