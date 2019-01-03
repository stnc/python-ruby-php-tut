
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