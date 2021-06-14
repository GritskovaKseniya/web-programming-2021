#!/usr/bin/python3
import asyncio
import pymysql
import websockets

async def getData(websocket, path):
    id = await websocket.recv()

    con = pymysql.connect('185.4.72.67', 'gritskova', '8pn93mUJ', 'gritskova')
    cur = con.cursor()
    cur.execute("SELECT * FROM chat WHERE id = " + id)
    user = cur.fetchall()[0]
    responseData = '''
        <table>
            <tr>
                <th scope="row" style="padding:0px 2px 0px 5px">Name: </th>
                <td>''' + user[1] + '''</td>
            </tr>
            <tr>
                <th scope="row" style="padding:0px 2px 0px 5px">Description: </th>
                <td>''' + user[2] + '''</td>
            </tr>
            <tr>By python websocket-server</tr>
        </table>
        '''

    await websocket.send(responseData)
    print("Successfully!")

start_server = websockets.serve(getData, "151.248.113.144", 8013)

asyncio.get_event_loop().run_until_complete(start_server)
asyncio.get_event_loop().run_forever()