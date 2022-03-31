from sense_hat import SenseHat
from time import sleep
from random import randint
import sys

# init sensehat
sense = SenseHat()
sense.set_imu_config(False, False, False)

def main() :
    b = [0, 0, 255]
    p = [128, 0, 128]

    rect1 = [
	b, b, b, b, b, b, b, b,
	b, b, b, b, b, b, b, b,
	b, b, b, b, b, b, b, b,
	b, b, b, p, p, b, b, b,
	b, b, b, p, p, b, b, b,
	b, b, b, b, b, b, b, b,
	b, b, b, b, b, b, b, b,
	b, b, b, b, b, b, b, b,
    ]

    rect2 = [
	b, b, b, b, b, b, b, b,
	b, b, b, b, b, b, b, b,
	b, b, p, p, p, p, b, b,
	b, b, p, b, b, p, b, b,
	b, b, p, b, b, p, b, b,
	b, b, p, p, p, p, b, b,
	b, b, b, b, b, b, b, b,
	b, b, b, b, b, b, b, b,
    ]

    rect3 = [
	b, b, b, b, b, b, b, b,
	b, p, p, p, p, p, p, b,
	b, p, b, b, b, b, p, b,
	b, p, b, b, b, b, p, b,
	b, p, b, b, b, b, p, b,
	b, p, b, b, b, b, p, b,
	b, p, p, p, p, p, p, b,
	b, b, b, b, b, b, b, b
    ]

    rect4 = [
	p, p, p, p, p, p, p, p,
	p, b, b, b, b, b, b, p,
	p, b, b, b, b, b, b, p,
	p, b, b, b, b, b, b, p,
	p, b, b, b, b, b, b, p,
	p, b, b, b, b, b, b, p,
	p, b, b, b, b, b, b, p,
	p, p, p, p, p, p, p, p
    ]

    while True:
	    sense.set_pixels(rect1)
	    sleep(0.3)
	    sense.set_pixels(rect2)
	    sleep(0.3)
	    sense.set_pixels(rect3)
	    sleep(0.3)
	    sense.set_pixels(rect4)
	    sleep(0.3)
	    sense.set_pixels(rect3)
	    sleep(0.3)
	    sense.set_pixels(rect2)
	    sleep(0.3)
	    sense.set_pixels(rect1)

    	

try :
    main()
except(KeyboardInterrupt, SystemExit) :
    print('Programma wordt gracefully gestopt')
finally :
    print('Sensehat leegmaken')
    sense.clear()
    sys.exit()
