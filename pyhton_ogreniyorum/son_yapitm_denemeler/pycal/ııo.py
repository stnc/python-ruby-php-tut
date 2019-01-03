# -*- coding: utf-8 -*-
import pprint

"""
http://stackoverflow.com/questions/25300556/php-like-array-handling-in-python-indexing-multidimensional-array
http://stackoverflow.com/questions/1781617/to-understand-from-php-array-to-python
http://scribu.net/blog/python-equivalents-to-phps-foreach.html
"""


class metaboxEngine:
    kabiliyetleri = ['sınıf niteliği']

    def __init__(self, fields):
        self.meta_key = 'selman'
        self.fields = fields
        self.kabiliyetleri

    def meta_box_output(self, post, field_arg):
        print("selman")


st_studio_prefix_post = "enginex "
options = {
    'name': st_studio_prefix_post + 'meta-box-page',
    'nonce': 'st_studio',
    'title': 'Post Settings',
    'page': 'post',
    'title_h2': True,
    'context': 'normal',
    'priority': 'default',
    'class': '',
    'style': '',
    'fields': {
        'field1': {
            'name': st_studio_prefix_post + 'background_repeat1',
            'title': 'Background Repeat',
            'type': 'select',
            'description': 'Upload a custom background image for this page. Once uploaded, click "Insert to Post"',
            'style': '',
            'class': '',
            'options': {
                'no-repeat': 'No Repeat',
                'repeat': 'Repeat',
                'repeat-x': 'Repeat Horizontally',
                'repeat-y': 'Repeat Vertically'
            },
        },
        'field2': {
            'name': st_studio_prefix_post + 'background_repeat2',
            'title': 'Background Repeat',
            'type': 'select',
            'description': 'Upload a custom background image for this page. Once uploaded, click "Insert to Post"',
            'style': '',
            'class': '',
            'options': {
                'no-repeat': 'No Repeat',
                'repeat': 'Repeat',
                'repeat-x': 'Repeat Horizontally',
                'repeat-y': 'Repeat Vertically'
            },
        }
    }}

"""
       {
                   'name': st_studio_prefix_post + 'backgroundColor',
                   'title': 'Background Color',
                   'type': 'color',
                   'description': 'Select a custom background color for the uploaded image.',
                   'style': 'color:#fff;box-shadow:none;',
                   'class': '',
                   'default_color': '#453435'
               }

               """  # pprint.pprint(options)

kac_adet=len(options['fields'])
print(kac_adet)
i=0;
for key, value in options['fields'].items():
    i=i+1
    #print("Key : {0}, Value : {1}".format(key, value))
    print(value['name'])
   # for key1, value1 in  key['field'+i].items():
      #  print("Code : {0}, Value : {1}".format(key1, value1))

exit()
print(options['fields2']['name'])
print(options['fields']['name'])
print(type(options['page']))
print(options['fields']['name'])

meta = metaboxEngine("sa")
print(meta.kabiliyetleri)
meta.meta_box_output("sds", "sd")
