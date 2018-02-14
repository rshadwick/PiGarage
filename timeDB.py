#!/usr/bin/python
import sys
import time
##
import MySQLdb
import datetime

##
date = datetime.datetime.now()
ServerID = "1"
##
db = MySQLdb.connect("localhost", "rshad", "shadMin1", "mydb")
#sqlQuery = "INSERT INTO GarageTime (DoorUp) VALUES ('NOW()')"
curs=db.cursor()
#curs.execute ("INSERT INTO GarageTime (DoorDown) VALUES (NOW())")
curs.execute ("UPDATE GarageTime SET DoorUp=NOW() WHERE ID=1")
#curs.execute (sqlQuery)
#print datetime.datetime.now()
#print "Let's talk about %s." % date
##
db.commit()
curs.close



db.close()
#print datetime.datetime.now()