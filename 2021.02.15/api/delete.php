<?
header("Content-Type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *'); //можно делать запросы со всех хостингов на сервер
header('Access-Control-Allow-Headers: Content-Type');
$conn = mysql_connect("localhost", "gritskova", "8pn93mUJ", "gritskova"); //connect to the database, cont is the connection handle
if (!$conn) {
    echo 'Can not connect with DB.: code of mistake' . mysql_connect_error() . ', mistake: ' . mysql_connect_error();
    exit;
    }
mysql_set_charset('utf-8');
mysql_select_db("gritskova", $conn);


$table_name = 'chat';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $postData = file_get_contents('php://input'); // get post request 
    $data = json_decode($postData, true);
    $id = $data['id'];
    mysql_query("DELETE FROM {$table_name} WHERE id = $id", $conn);
}
mysql_close($conn);
?>