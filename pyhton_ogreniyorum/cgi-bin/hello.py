#!/usr/bin/python3
import os
print ("Content-type:text/html")
print()
print ("<html>")
print ('<head>')
print ('<title>Hello Word - First CGI Program</title>')
print ('</head>')
print ('<body>')
print ('<h2>Hello Word! This is my first CGI program</h2>')

print ()
print ("<font size=+1>Environment</font><\br>")
for param in os.environ.keys():
  print ("<b>%20s</b>: %s<\br>" % (param, os.environ[param]))

print ('</body>')
print ('</html>')

import sessions
session = sessions.Session()
print (session)