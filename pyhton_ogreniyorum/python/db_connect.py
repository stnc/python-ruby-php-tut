#!/usr/bin/python
# -*- coding: utf-8 -*-

import MySQLdb as mdb
import sys

def question():
	print "where are the nuclear wessels?"
	con = mdb.connect('127.0.0.1', 'root', '123456', 'application2',charset='utf8', init_command='SET NAMES UTF8')

	with con:

		cur = con.cursor(mdb.cursors.DictCursor)
		cur.execute("SELECT * FROM sanal_iller LIMIT 5");
		
		rows = cur.fetchall();

		for row in rows:
			print row["id"], row["adi"]	
question()
#http://www.tutorialspoint.com/python/python_classes_objects.htm
class Employee:
   'Common base class for all employees'
   empCount = 0

   def __init__(self, name, salary):
      self.name = name
      self.salary = salary
      Employee.empCount += 1
   
   def displayCount(self):
     print "Total Employee %d" % Employee.empCount

   def displayEmployee(self):
      print "Name : ", self.name,  ", Salary: ", self.salary  
	  
emp1 = Employee("Zara", 2000)

emp1.displayEmployee()
print "Total Employee %d" % Employee.empCount
raw_input("Press Enter to continue...")
exit()