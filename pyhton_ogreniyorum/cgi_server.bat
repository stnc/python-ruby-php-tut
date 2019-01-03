echo 'lütfen açýlan sayfayý yenileyiniz'
python -mwebbrowser http://localhost:8000/cgi-bin/jinja.py
python -m http.server --bind localhost --cgi 8000
