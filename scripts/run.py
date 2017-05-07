#!user/bin/env python

# Author: Megan Zimmerman

from lxml import html
import requests
import os
import sys
import urllib
import time


global U_FILE
global U_FILE_LAST
global working

#Wrapper for os.system
def bash(command):
	#print command # for debugging
	#supressing bash messages with 2> /dev/null 
	return os.system(command + " 2> /dev/null")
	
#wrapper for os.chdir
def cd(command):
	return os.chdir(command)

#wrapper for determining file existance
def exists(filename):
	return os.path.isfile(filename)

#wrapper for determining directory existance
def direxists(path):
	return os.path.isdir(path)

#compiles code, gets compilation errors if they exist
def compile_errors(command):
    error = False
    cmd = command + " 2>&1 | tee out.txt"
    r_value = bash(cmd)
    myfile = open("out.txt", "r")
    errors = []
    for line in myfile:
        if "src/main.cpp" in line:
            print(line)
            errors.append(line)
            error = True
    if error == True:
        working = False
        return errors
    else:
        return False

def getfile():
    cmd = "bash ./scrape.sh"
    bash(cmd)
    myfile = open("current.txt","r")
    html = myfile.readlines()
    myfile.close()
    cmd = "ls"
    bash(cmd)
    return html

def main():
    thing = True

    html = getfile()
    print(html)

    U_FILE = html
    U_FILE_LAST = "EMPTY"

    while (thing):
        if U_FILE == U_FILE_LAST:
            print("same")
            print(U_FILE)
            html = getfile()
            U_FILE = html
            time.sleep(10)
        else:
            myfile = file('platio/src/main.cpp','w')
            myfile.write('#include "Arduino.h" \n')
            myfile.write('#ifndef LED_BUILTIN \n')
            myfile.write('#define LED_BUILTIN 13\n')
            myfile.write('#endif\n')
            for line in html:
                myfile.write(line)
            myfile.close()

            arddir = "platio"
            cd(arddir)
    
            cmd = "platformio run"
            errors = compile_errors(cmd)
            
            #print out the file errors, else do nothing
            if errors != False:
                print("Errors in code:")
                working = False
                cmd = ".."
                cd(cmd)
                err = ""
                for i in errors:
                    i = i.replace('"','').replace('[','').replace(',','').replace(']','').replace(" ","_").replace("FILENAME","FILE").replace("<","").replace(">","").replace("#","").replace("\n"," _ ")
                    err = err + i + " "
                    print('\x1b[1;31;40m'+i+'\x1b[0m')
                print(err)
                cmd = "/usr/bin/expect enter " + str(err) 
                print(bash(cmd)) 
                cmd = "platio"
                cd(cmd)

            else:
                print(bash("ls"))
                working = True
                cmd = "platformio run --target upload"
                print("run code")
                bash(cmd)

            U_FILE_LAST = U_FILE
            cmd = ".."
            print(cd(cmd))
            html = getfile()
            U_FILE = html

    
main()
