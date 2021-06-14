#!/usr/bin/python3
import io
import socket
from PIL import Image


sock = socket.socket()
sock.bind(('', 9090))
sock.listen(1)

while True:
	conn, addr = sock.accept()
	print("connected: "+addr[0])


	while True:
		data = conn.recv(1024)
		rawIO = io.BytesIO(data)
		rawIO.seek(0)
		im = Image.open(rawIO)
		im.convert('RGB').save("out.jpg","PNG")

		if not data:
			break
		conn.send(data)
	conn.close()
