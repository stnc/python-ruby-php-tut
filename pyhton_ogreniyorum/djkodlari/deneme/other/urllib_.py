from urllib.request import urlopen
import urllib.request
import django
url = 'https://www.google.com/search'
values = {'q' : 'python programming tutorials'}
data = urllib.parse.urlencode(values)
data = data.encode('utf-8') # data should be bytes
req = urllib.request.Request(url, data)
resp = urllib.request.urlopen(req)
respData = resp.read()
django.getversion()
print(respData)

