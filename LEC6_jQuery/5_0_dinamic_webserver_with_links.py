#!/usr/bin/python3

import pymysql
from http.server import BaseHTTPRequestHandler, HTTPServer

class WebServerHandler(BaseHTTPRequestHandler):
	def do_GET(self):

		path_parts = self.path.split('/')
		print("path_parts length = "+str(len(path_parts)))
		for i in range(0,len(path_parts)):
			print("part"+str(i)+":"+path_parts[i])


		if self.path.endswith("/table"):
			self.send_response(200)
			self.send_header('Content-type', 'text/html; charset=utf-8')
			self.end_headers()

			con = pymysql.connect('185.4.72.67', 'testizo','123', 'testizo')
			cur = con.cursor()
			cur.execute("SELECT * FROM nti")
			rows = cur.fetchall()

			mysqloutput = ""
			for row in rows:
				cur2 = con.cursor()
				cur2.execute("SELECT name FROM trnames where idTr='"+str(row[2])+"'")
				rows2 = cur2.fetchall()
				for row2 in rows2:
					mysqloutput+="<tr><td>"+str(row[0])+"</td><td><a href=\"/table/person/"+str(row[0])+"\">"+str(row[1])+"</a></td><td>"+str(row2[0])+"</td></tr>"
					print(str(row[0])+"\t"+str(row[1])+"\t["+str(row2[0])+"]")

			output = """
				<html>
				<head>
				<title>Login form</title>
				<meta charset="utf-8">
				</head>
				<body>
				<table border="1">
				"""
			output+=mysqloutput
			output+="""
                                </table>
				</body>
				</html>
				"""

			self.wfile.write(output.encode("utf8"))
			return


		elif((len(path_parts)==4) and  path_parts[2]=="person"):
			self.send_response(200)
			self.send_header('Content-type', 'text/html; charset=utf-8')
			self.end_headers()

			con = pymysql.connect('185.4.72.67', 'testizo','123', 'testizo')
			cur = con.cursor()
			cur.execute("SELECT * FROM nti where id='"+path_parts[3]+"'")
			rows = cur.fetchall()

			print("------>"+str(rows[0][1]))


			mysqloutput = path_parts[3]+" "+str(rows[0][1])
			print(mysqloutput)

			output = """
				<html>
				<head>
				<title>Login form</title>
				<meta charset="utf-8">
				</head>
				<body>
				<table border="1">
				"""
			output+=mysqloutput
			output+="""
				</table>
				</body>
				</html>
				"""
			self.wfile.write(output.encode("utf8"))
			return










port = 9099
server = HTTPServer(('', port), WebServerHandler)
print("Web Server running on port: "+str(port))
server.serve_forever()
