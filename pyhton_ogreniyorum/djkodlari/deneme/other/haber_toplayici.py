#-*-coding: utf-8 -*-
import urllib_.request as ur
import re,sys
print(type(sys.version_info))
print(sys.version_info)
site="http://hurriyet.com.tr"

regex='<title>(.+?)<title>'
comp=re.compile(regex)
htmlkod=ur.urlopen(site).read()

titles=re.findall(comp,htmlkod)
i=1
for title in titles:
    print (str(i)),title.decode('iso8859-9')
    i+=1
print (htmlkod)