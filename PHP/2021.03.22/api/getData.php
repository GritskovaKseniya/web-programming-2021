<?php
header('Content-Type: application/json; charset=utf-8');

$conn = mysqli_connect('localhost', 'gritskova', '8pn93mUJ', 'gritskova');
mysqli_set_charset($conn, 'utf8');
$table_name = 'chat';

$responseData = [
  'data' => null,
  'error' => null,
];

if (!isset($_GET) || !isset($_GET['id'])) {
  $responseData['error'] = 'ID is required';
  http_response_code(400);
  echo(json_encode($responseData));
  die();
}

$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM {$table_name} WHERE id = {$_GET['id']}"));

if (!$user) {
  $responseData['error'] = 'User not found';
  http_response_code(404);
  echo(json_encode($responseData));
  die();
}

$responseData['data'] =
'<table>'.
  '<tr>'.
    '<th scope="row" style="padding:0px 2px 0px 5px">Name: </th>'.
    "<td>{$user['name']}</td>".
  '</tr>'.
  '<tr>'.
    '<th scope="row" style="padding:0px 2px 0px 5px">Description: </th>'.
    "<td>{$user['description']}</td>".
  '</tr>'.
'</table>';

echo(json_encode($responseData));
?>