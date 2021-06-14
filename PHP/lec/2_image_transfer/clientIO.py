#!/usr/bin/python3
import io
import socket
from PIL import Image

sock = socket.socket()
sock.connect(('dev.izobretarium.ru', 9090))


buf = io.BytesIO()
im = Image.open(r"./in.jpg")
im.save(buf,"PNG")
sock.sendall(buf.getvalue())

my_string = "test"
enc_my_string = my_string.encode('UTF-8')
#sock.send(enc_my_string)

data = sock.recv(1024)
sock.close()
#print(data.decode("utf-8"))
