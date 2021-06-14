#!/usr/bin/python3
import socket

sock = socket.socket()
sock.bind(('', 9090))
sock.listen(1)

while True:
	conn, addr = sock.accept()
	print("connected: "+addr[0])

	while True:
		data = conn.recv(1024)
		if not data:
			break
		else:
			print("client say: "+data.decode("utf-8"))
		conn.send(data.upper())
	conn.close()
