#!/usr/bin/python3
import socket

sock = socket.socket()
sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
sock.bind(('', 8013))
sock.listen(1)

while True:
    conn, addr = sock.accept()

    while True:
        data = conn.recv(1024)
        if not data:
            break
        else:
            result = int(data.decode("utf-8")) * 10
            conn.send(str(result).encode("utf-8"))
    conn.close()
