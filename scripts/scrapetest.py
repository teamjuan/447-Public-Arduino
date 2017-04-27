from lxml import html
import requests

import urllib

url = "http://userpages.umbc.edu/~squire/download/tadd32.vhdl"

page = urllib.urlopen(url)
html = page.read()
print(html)
print(page)
