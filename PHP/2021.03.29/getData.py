#!/usr/bin/python3
import pymysql
import json
from http.server import BaseHTTPRequestHandler, HTTPServer


class WebServerHandler(BaseHTTPRequestHandler):
    def do_GET(self):
        path = self.path.split('?')[0]
        search_params = ''

        responseData = {
            'data': None,
            'error': None,
            }
            
        if (len(self.path.split('?')) > 1):
            search_params = self.path.split('?')[1]
        
        if path == '/api/getData' or path == '/api/getData/':
            id = list(filter(lambda param: param.startswith('id'), search_params.split('&')))

            if len(id) == 0:
                pass #TODO: return error
            else:
                con = pymysql.connect('185.4.72.67', 'gritskova', '8pn93mUJ', 'gritskova')
                id = id[0].split('=')[1]
                cur = con.cursor()
                cur.execute("SELECT * FROM chat WHERE id = " + id)
                user = cur.fetchall()[0]
                responseData['data'] = '''
                    <table>
                    <tr>
                        <th scope="row" style="padding:0px 2px 0px 5px">Name: </th>
                        <td>''' + user[1] + '''</td>
                    </tr>
                    <tr>
                        <th scope="row" style="padding:0px 2px 0px 5px">Description: </th>
                        <td>''' + user[2] + '''</td>
                    </tr>
                    <tr>By python server</tr>
                    </table>'''
                self.send_response(200)
                self.send_header('Content-Type', 'application/json; charset=utf-8')
                self.send_header('Access-Control-Allow-Origin', '*')
                self.end_headers()
                self.wfile.write(json.dumps(responseData).encode('utf8'))
                return

port = 8013
server = HTTPServer(('', port), WebServerHandler)
print("Web Server running on port: "+str(port))
server.serve_forever()