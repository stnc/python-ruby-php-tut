echo 'l�tfen a��lan sayfay� yenileyiniz'
python -mwebbrowser http://localhost:8000/cgi-bin/jinja.py
python -m http.server --bind localhost --cgi 8000
