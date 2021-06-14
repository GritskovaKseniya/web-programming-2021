<?
header("Content-Type: text/html; charset=utf-8");
$conn = mysql_connect("localhost", "gritskova", "8pn93mUJ", "gritskova"); //connect to the database, cont is the connection handle
if (!$conn) {
    echo 'Can not connect with DB.: code of mistake' . mysql_connect_error() . ', mistake: ' . mysql_connect_error();
    exit;
    }
mysql_set_charset('utf-8');
mysql_select_db("gritskova", $conn);
$table_name = 'chat';

$editPage = false;
$editUser = null;
$URL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$allUsers = [];

if (isset($_POST) && isset($_POST['name']) && isset($_POST['description'])) {
    if (isset($_GET['edit']) && isset($_POST['id'])) {
        mysql_query(
            "UPDATE {$table_name} SET ".
            "name = '{$_POST['name']}', ".
            "description = '{$_POST['description']}' ".
            "WHERE id={$_POST['id']}",
            $conn
        );
    } else {
        mysql_query(
            "INSERT INTO {$table_name} (name, description) ".
            "VALUES ('{$_POST['name']}', '{$_POST['description']}')",
            $conn
        );
    }
} else if (isset($_GET['edit']) && isset($_GET['id'])) {
    $editPage = true;
} else if (isset($_GET['delete']) && isset($_GET['id'])) {
    mysql_query("DELETE FROM {$table_name} WHERE id = {$_GET['id']}", $conn);
}

if ($editPage) {
    $editUser = mysql_fetch_array(mysql_query("SELECT * FROM {$table_name} WHERE id = {$_GET['id']}", $conn));
}

$allUsersQuery = mysql_query("SELECT * FROM {$table_name}", $conn);

while ($user = mysql_fetch_array($allUsersQuery)) {
    array_push($allUsers, $user);
}

require_once('lib/Smarty.class.php');
$smarty = new Smarty();
$smarty->assign('title','Kseniya Gritskova');
$smarty->assign('editPage', $editPage);
$smarty->assign('user', $editUser);
$smarty->assign('result', $allUsers );
$smarty->assign('URL', $URL );

$smarty->display('templates/index.tpl');

mysql_free_result($allUsersQuery);
mysql_close($conn);
?>