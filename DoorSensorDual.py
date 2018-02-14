#!/usr/bin/env python

from time import sleep
import datetime
import RPi.GPIO as GPIO
import paho.mqtt.client as mqtt

GPIO.setmode (GPIO.BOARD)
doorState = False # Set the initial door State to closed
DOWN_SENSOR = 11 # door sensor connected to GPIO physical pin
UP_SENSOR = 15 # door sensor connected to GPIO physical pin
downActive = False # State door sensor

GPIO.setwarnings(False)

GPIO.setup (DOWN_SENSOR, GPIO.IN, pull_up_down=GPIO.PUD_DOWN) # Setup the GPIO pin connected to the door Sensor to read as input
GPIO.setup (UP_SENSOR, GPIO.IN, pull_up_down=GPIO.PUD_DOWN) # Setup the GPIO pin connected to the door Sensor to read as input
#GPIO.setup (DOWN_SENSOR, GPIO.IN) # Setup the GPIO pin connected to the door Sensor to read as input

# Main program loop
while True:

    try:
        # Get the current state of the sensor and store it in a variable
        downActive = GPIO.input(DOWN_SENSOR)
        upActive = GPIO.input(UP_SENSOR)
        print "door Active = " + str(downActive)

        if( downActive == False and upActive == False):
            #magnet is not present at either sensor, door is in motion
            sleep(0.05)
            if(downActive == False and upActive == False):
                print("Both Switch state FALSE, door is in motion")
                #print("Switch state FALSE, door is closed")
                client = mqtt.Client()
                client.connect("192.168.1.189",1883,60)
                client.publish("GarageLed", "0");
                client.disconnect();
                #timestamp = now.strftime("%Y/%m/%d %H:%M")
                print("MQTT - 0 ")
                print datetime.datetime.now()
        elif(downActive == True and upActive == False):
            #magnet is present on Door sensor, door is closed
            sleep(0.05)
            if(downActive == True and upActive == False):
                print("Door Switch state TRUE, door is Closed!")
                client = mqtt.Client()
                client.connect("192.168.1.189",1883,60)
                client.publish("GarageLed", "1");
                client.disconnect();
                print("MQTT - 1")
        else:
            #magnet is present on Door sensor, door is closed
            sleep(0.05)
            if(downActive == False and upActive == True):
                print("Up Switch state TRUE, door is open!")
                client = mqtt.Client()
                client.connect("192.168.1.189",1883,60)
                client.publish("GarageLed", "2");
                client.disconnect();
                print("MQTT - 2")


        # Wait a while before checking again.
        sleep(1)

    except KeyboardInterrupt:
        GPIO.cleanup() # Clean up GPIO on CTRL+C exit

# End of main program loop

# Clean up on normal exit
GPIO.cleanup()
