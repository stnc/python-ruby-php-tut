#!/usr/bin/python3
import cgi, cgitb 

# Create instance of FieldStorage 
form = cgi.FieldStorage() 

if form.getvalue('name_lastnema'):
   name_ = form.getvalue('name_lastnema')

# Get data from fields
if form.getvalue('maths'):
   math_flag = "evet dedi"
else:
   math_flag = "hayır dedi"

if form.getvalue('physics'):
   physics_flag = "evet dedi"
else:
   physics_flag = "hayır dedi"

print ("Content-type:text/html")
print()
print ("<html>")
print ("<head>")
print ("<title>CGI ile post islemleri</title>")
print ("</head>")
print ("<body>")
if form.getvalue('name_lastnema'):
   print ("<h2> Adınız  : %s</h2>" % name_)
if form.getvalue('maths'):
   print ("<h2> Matematik dersini sever misin?  : %s</h2>" % math_flag)
if form.getvalue('physics'):
   print ("<h2> Fizik dersini sever misin? : %s</h2>" % physics_flag)

print ("""<form action="" method="POST" >
  Adınız Nedir <input type="text" name="name_lastnema" value="">
  <br>
<input type="checkbox" name="maths" value="on" /> Matematik dersini sever misin?
<br>
<input type="checkbox" name="physics" value="on" /> Fizik dersini sever misin?
<br><br>
<input type="submit" value="Select Subject" />
</form>""")

print ("</body>")
print ("</html>")