<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Gritskova</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>        
<body>
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
            echo "UPDATE";
            mysql_query(
                "UPDATE {$table_name} SET name = '{$_POST['name']}', description = '{$_POST['description']}', time='$time', date='$date' where id = {$_POST['id']}",
                $conn
            );
        }else {
            echo "INSERT";
            mysql_query(
                "INSERT INTO {$table_name} (name, description, time, date) VALUES ('{$_POST['name']}', '{$_POST['description']}', '$time', '$date')",
                $conn
            );

        }
    } elseif (isset($_GET['delete']) && isset($_GET['id'])) {
        mysql_query("DELETE FROM {$table_name} WHERE id = {$_GET['id']}", $conn);
    }
    $rez= mysql_query( "SELECT * FROM {$table_name} " , $conn);
        ?>
    
        <div class="container">
        <div class="row">
            <div class="col text-center mt-3"><h4>Table</h4></div>
        </div>
        <table class="table table-bordered table-striped">
            <tr><th>ID</th><th>Name</th><th>Description</th><th>Time</th><th>Date</th><th>Edit</th><th>Delite</th></tr>  
            <div class=" name-output">
        <?
            while($row = mysql_fetch_array($rez)){
                echo "<tr>";
                if (isset($_GET['edit']) && isset($_GET['id']) && $_GET['id'] == $row['id']){
                    echo "<td id=\"id\">".$row['id']."</td>";
                    echo "<td><input class=\"form-control\" id=\"name\" value=\"".$row['name']."\" required /></td>";
                    echo "<td><input class=\"form-control\" id =\"description\" value=\"".$row['description']."\" required /></td>";
                    echo "<td>".$row['time']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td><button id=\"save\" class=\"btn btn-warning\">Save</button></td>";
                } else {
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['time']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td><a href=\"".$URL."?edit=&id=".$row['id']."\">Edit</a></td>";
                }
                echo "<td><a href=\"".$URL."?delete=&id=".$row['id']."\">Delete</a></td>";
                echo "</tr>";
                echo "</div>";
            }
            echo "</table></div>";

    ?>
    <div class="container mt-50">
        <div class="auth-form-body mt-3 w-30 mx-auto rounded-sm">
            <form action="index.php" method="POST">
                <div class="form-group">
                    <p>Name: <input type="text" class="form-control" placeholder="Enter name" name="name"/></p>
                </div>
                <div class="form-group">
                    <p>Description: <input type="text" class="form-control" placeholder="Enter description" name="description"/></p>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Add</button>
                </div>
            </form>
        </div> 
    </div>
    <script src="lodash.js"></script>
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
<?
mysql_free_result($rez);
mysql_close($conn);
?>
