#!/usr/bin/python3
import cgi
import pymysql
import datetime
from http.server import BaseHTTPRequestHandler, HTTPServer


class WebServerHandler(BaseHTTPRequestHandler):
	def do_GET(self):
		if self.path.endswith("/"):
			self.send_response(200)
			self.send_header('Content-type', 'text/html; charset=utf-8')
			self.end_headers()
			output = """

<html>
<head>
<title>jQuery Python Example</title>
<meta charset="utf8">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<a href="#" id="price">Open back end</a>
<div id="content"></div>
</body>
<script type="text/javascript">
$(function(){
	$('#price').on('click', function(){
		$.ajax({
			url: 'back',
			type: 'GET',
			beforeSend: function(){
				$('#content').empty();
			},
			success: function(responce){
					$('#content').append(responce);
			},
			error: function(){
				alert('Error!');
			}
		});
	});
});
</script>
</html>
"""
			self.wfile.write(output.encode("utf8"))
			return

		elif self.path.endswith("/back1"):
			self.send_response(200)
			self.send_header('Content-type', 'text; charset=utf-8')
			self.end_headers()
			output = "BackEnd data on port 8001"
			output = str(datetime.datetime.now())
			self.wfile.write(output.encode("utf8"))
			return

		elif self.path.endswith("/back"):
			self.send_response(200)
			self.send_header('Content-type', 'text; charset=utf-8')
			self.end_headers()

			con = pymysql.connect('185.4.72.67', 'testizo','123', 'testizo')
			cur = con.cursor()
			cur.execute("SELECT * FROM chat")
			rows = cur.fetchall()
			output = ""
			for i in range (0,len(rows)):
				output += str(i)+" "+str(rows[i][0])+" "+str(rows[i][1])+" "+str(rows[i][2])+" "+str(rows[i][3])+"<br>"
			con.commit()

			self.wfile.write(output.encode("utf8"))
			return

port = 8000
server = HTTPServer(('', port), WebServerHandler)
print("Web Server running on port: "+str(port))
server.serve_forever()
