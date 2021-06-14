#!/usr/bin/python3
from http.server import BaseHTTPRequestHandler, HTTPServer
class WebServerHandler(BaseHTTPRequestHandler):
	def do_GET(self):
		if self.path.endswith("/"):
			self.send_response(200)
			self.send_header('Content-type', 'text; charset=utf-8')
			self.end_headers()
			output = "BackEnd data on port 8001"
			self.wfile.write(output.encode("utf8"))
			return
port = 8001
server = HTTPServer(('', port), WebServerHandler)
print("Web Server running on port: "+str(port))
server.serve_forever()