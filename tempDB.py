#!/usr/bin/python
import sys
import Adafruit_DHT
#import paho.mqtt.client as mqtt
import time
import urllib2
import urllib
##
import MySQLdb
import datetime

aiokey = '686423f9b2c64e2abe55ddff80ff6643'



#mqtt_client = MQTT::Client.connect(url, 8883)
#mqtts://#rshadwick:#686423f9b2c64e2abe55ddff80ff6643@io.adafruit.com
while True:

    humidity, temperature = Adafruit_DHT.read_retry(11, 4)


    temppass = (temperature * 1.8) + 32
    print 'Temp: {0:0.1f} f  Humidity: {1:0.1f} %'.format(temppass, humidity)
    url3 = 'https://io.adafruit.com/api/groups/weather/send.json?x-aio-key=686423f9b2c64e2abe55ddff80ff6643&temp={}&humidity={}'.format(temppass, humidity)
    #data3 = urllib.urlencode(temperature)

    req3 = urllib2.Request(url3)
    response3 = urllib2.urlopen(req3)
    #req3.add_header('Content-Type','application/x-www-form-urlencoded; charset=UTF-8')
    #req3.add_header('x-aio-key',aiokey)

    ##
    date = datetime.datetime.now()

    ##
    db = MySQLdb.connect("localhost", "rshad", "shadMin1", "mydb")
    curs=db.cursor()
    curs.execute ("INSERT INTO GarageTemp (Temp, Humidity, RecordDate) VALUES (%s, %s, %s)",(temppass, humidity, date))
    ##
    db.commit()
    curs.close
    db.close()



    time.sleep(300)
