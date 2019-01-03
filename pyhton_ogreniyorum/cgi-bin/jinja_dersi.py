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

# Capture our current directory
THIS_DIR = os.path.dirname(os.path.abspath(__file__))

def print_html_doc():
    # Create the jinja2 environment.
    # Notice the use of trim_blocks, which greatly helps control whitespace.
    j2_env = Environment(loader=FileSystemLoader(THIS_DIR),  trim_blocks=True)
    #print (j2_env.get_template('jinja_test_template.html').render(  title='Hellow Gist from GutHub'  ))
    title = 'Hellow Gist from GutHub'
    template=j2_env.get_template('jinja_dersi_template.html')
    templateVars = {"title": "jinja template ve cgi dersi ",
                    "description": "merhaba bu bir jinja template ornegidir "}

    print (template.render(   templateVars  ))


if __name__ == '__main__':
    print_html_doc()
