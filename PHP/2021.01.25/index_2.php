<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Add form</title>
  <meta charset="utf-8">
</head>

<body>

<?
header("Content-Type: text/html; charset=utf-8");

function print_table($db){
    echo "<table border=\"2\">";
    
    for($string=0; $string<sizeof($db); $string++){
        $column= explode("::", $db[$string]);
        echo "<tr>";
        echo "<td>".$column[0]."</td>";
        echo "<td>".$column[1]."</td>";
        echo "<td>".$column[2]."</td>";
        echo "<td>".$column[3]."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

<a href = "index.php?Add">Add</a>/<a href = "index.php?Table">Table</a>

<?
if(isset($_GET['Add'])){
?>

    <form action="index.php" method="POST">
        <p>Name: <input type="text" name="name"/></p>
        <p>Age: <input type="text" name="age"/></p>
        <p>Description: <input type="text" name="description"/></p>
        <p><input type="submit" name="Send" value="Send"/></p>
    </form>

<?
} elseif(isset($_GET['Table'])){
    $db = file("./data.txt");
    echo "<table border=\"2\">";
    print_table($db);
} elseif(isset($_GET['Edit'])){

}
if(isset($_POST)){
    if(isset($_POST['Send'])){
        $fp = fopen("./data.txt", "a+") or die("не удалось открыть файл");
        $id = sizeof($fp) + 1;
        echo "ID ", $id;
        fwrite($fp, $id."::".$_POST['name']."::".$_POST['age']."::".$_POST['description']."\r\n");
        fclose($fp);
        $db = file("./in.txt");
        print_table($db);
    }
}
?>
</body>
</html>