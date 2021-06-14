#!/usr/bin/python3
import socket

sock = socket.socket()
sock.connect(('dev.izobretarium.ru', 9090))
sock.send(b"halt")

data = sock.recv(1024)
sock.close()
print(data.decode("utf-8"))
