<?
header("Content-Type: text/html; charset=utf-8");
$conn = mysql_connect("localhost", "gritskova", "8pn93mUJ", "gritskova"); //connect to the database, cont is the connection handle
if (!$conn) {
    echo 'Can not connect with DB.: code of mistake' . mysql_connect_error() . ', mistake: ' . mysql_connect_error();
    exit;
    }
mysql_set_charset('utf-8');
mysql_select_db("gritskova", $conn);
$URL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$table_name = 'chat';

if(isset($_POST) && isset($_POST['name']) && isset($_POST['description'])){ 
    $time = date("H:i:s");
    $date = date("Ymd");
    if(isset($_POST['id']) ) {
        mysql_query(
            "UPDATE {$table_name} SET name = '{$_POST['name']}', description = '{$_POST['description']}', time='$time', date='$date' where id = {$_POST['id']}",
            $conn
        );
    }else {
        mysql_query(
            "INSERT INTO {$table_name} (name, description, time, date) VALUES ('{$_POST['name']}', '{$_POST['description']}', '$time', '$date')",
            $conn
        );

    }
} elseif (isset($_GET['delete']) && isset($_GET['id'])) {
    mysql_query("DELETE FROM {$table_name} WHERE id = {$_GET['id']}", $conn);
}
$rez= mysql_query( "SELECT * FROM {$table_name} " , $conn);

include './templates/base.php';
mysql_free_result($rez);
mysql_close($conn);
?>
