#!/usr/bin/env/python
# 
# More of a reference of using jinaj2 without actual template files.
# This is great for a simple output transformation to standard out.
#
# Of course you will need to "sudo pip install jinja2" first!
#
# I like to refer to the following to remember how to use jinja2 :)
# http://jinja.pocoo.org/docs/templates/
#https://gist.github.com/wrunk/1317933
#http://matthiaseisen.com/pp/patterns/p0198/
#

from jinja2 import Environment, FileSystemLoader
import os
# Import modules for CGI handling
import cgi, cgitb
import sozluk
import metaboxengine_



# Capture our current directory
THIS_DIR = os.path.dirname(os.path.abspath(__file__))

def print_html_doc():
    # Create the jinja2 environment.
    # Notice the use of trim_blocks, which greatly helps control whitespace.
    j2_env = Environment(loader=FileSystemLoader(THIS_DIR),  trim_blocks=True)
    #print (j2_env.get_template('jinja_test_template.html').render(  title='Hellow Gist from GutHub'  ))
    title = 'Hellow Gist from GutHub'
    template=j2_env.get_template('jinja_test_template.html')
    templateVars = {"title": "Test Example",
                    "description": "A simple inquiry of function."}

    print (template.render(   templateVars  ))

	
	

# Create instance of FieldStorage 
form = cgi.FieldStorage() 

if form.getvalue('text_'):
   t_flag = form.filename
else:
    t_flag = "OFF"

# Get data from fields
if form.getvalue('maths'):
   math_flag = "ON"
else:
   math_flag = "OFF"

if form.getvalue('physics'):
   physics_flag = "ON"
else:
   physics_flag = "OFF"

print ("Content-type:text/html")
print()

#print(a)
print ("<h2> text is  is : %s</h2>" % t_flag)
print ("<h2> CheckBox Maths is : %s</h2>" % math_flag)
print ("<h2> CheckBox Physics is : %s</h2>" % physics_flag)
print(sozluk.ara("kitap"))
print(metaboxengine_.metaboxEngine.kabiliyetleri)
if __name__ == '__main__':
    print_html_doc()
	
	