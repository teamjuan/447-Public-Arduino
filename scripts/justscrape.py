from lxml import html
import requests
import os
import sys
import urllib2

def main():
	url = "http://userpages.umbc.edu/~sg8/447/getCode.php"
	page =  urllib2.urlopen(url)
	html = page.read()
	page.close()
	myfile = open("current.txt","w")
	myfile.write(html)
	myfile.close()
	url2 = "http://userpages.umbc.edu/~zimmer1/errors.txt"
	page = urllib2.urlopen(url2)
	return 0;
main()
