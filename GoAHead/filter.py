import Queue
import threading
import sys, os, re, time, socket
from sys import stdout
from multiprocessing import Process
import urllib2
import base64
from random import randint
from time import sleep
import random
ips = open(sys.argv[1], "r").read().splitlines()
output = sys.argv[2]
if len(sys.argv) < 2:
    sys.exit("usage: python %s <input list> <output>" % (sys.argv[0]))

def gaydar(synoisgay):
    response = urllib2.urlopen('http://206.189.205.9/wasd.php?key=pen15&rIP='+ str(synoisgay) +'&rPort=81') # EDIT YOUR PHP HOST FILE HERE
    response = response.read()
    if "GoAhead-Webs" in response:
        vuln = open(output, "a").write(synoisgay +"\n")
        print '\x1b[1;32mIM GAY =>'  + synoisgay  
    else:
        print '\x1b[1;31mIM NOT GAY =>'  + synoisgay

for EkSdE in ips:
    sleep(random.uniform(0, 0.05))
    t = threading.Thread(target=gaydar, args = (EkSdE,))
    t.daemon = True
    t.start()
    
    
