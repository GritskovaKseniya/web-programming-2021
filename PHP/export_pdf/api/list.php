<?
header("Content-Type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *'); //можно делать запросы со всех хостингов на сервер
$conn = mysql_connect("localhost", "gritskova", "8pn93mUJ", "gritskova"); //connect to the database, cont is the connection handle
if (!$conn) {
    echo 'Can not connect with DB.: code of mistake' . mysql_connect_error() . ', mistake: ' . mysql_connect_error();
    exit;
    }
mysql_set_charset('utf-8');
mysql_select_db("gritskova", $conn);

$table_name = 'chat';

$all_users = mysql_query( "SELECT * FROM {$table_name} " , $conn);

$table_header = [['ID', 'Name', 'Description', 'Time', 'Date']];

while($row = mysql_fetch_array($all_users)) {
    array_push($table_header, [$row['id'], $row['name'], $row['description'], $row['time'], $row['date']]);
}
mysql_free_result($all_users);
mysql_close($conn);
echo json_encode(array('data' => $table_header));
?>

