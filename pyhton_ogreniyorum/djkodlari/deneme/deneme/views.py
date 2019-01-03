#-*-coding: utf-8 -*-
from  django.http import *

def merhaba_dunya(request):
    return HttpResponse('hello world')
