#!/usr/bin/python3
import socket

sock = socket.socket()
sock.connect(('dev.izobretarium.ru', 9090))


my_string = "test"
enc_my_string = my_string.encode('UTF-8')
sock.send(enc_my_string)

data = sock.recv(1024)
sock.close()
print(data.decode("utf-8"))
