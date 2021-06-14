#!/usr/bin/python3
import socket

sock = socket.socket()
sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
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
			if data.decode("utf-8")=="halt":
				print("halting server...")
				conn.close()
				exit(0)
			else:
				conn.send(data.upper())

	conn.close()
