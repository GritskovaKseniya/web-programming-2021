<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Gritskova</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
  <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
  <link href="style.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<?
header("Content-Type: text/html; charset=utf-8");

function print_table($db){
?>
    <div class="container">
        <div class="row">
            <div class="col text-center"><h4>Table.</h4></div>
        </div>
    <table class="table table-bordered table-striped">
        <tr><th>ID</th><th>Name</th><th>Age</th><th>Description</th></tr>  
        <div class=" name-output">
<?
    for($string=0; $string<sizeof($db); $string++){
        $column= explode("::", $db[$string]);
        echo "<tr>";
        echo "<td>".$column[0]."</td>";
        echo "<td>".$column[1]."</td>";
        echo "<td>".$column[2]."</td>";
        echo "<td>".$column[3]."</td>";
        echo "</tr>";
        echo "</div>";
    }
    echo "</table>";
}
?>

<a href = "index.php?Add" class="ml-3">Add entry</a> or <a href = "index.php?Table">See the table</a>

<?
if(isset($_GET['Add'])){
?>
    <div class="container mt-50">
        <div class="auth-form-body mt-3 w-30 mx-auto rounded-sm">
            <form action="index.php" method="POST">
                <div class="form-group">
                    <p>Name: <input type="text" class="form-control" placeholder="Enter name" name="name"/></p>
                </div>
                <div class="form-group">
                    <p>Age: <input type="text" class="form-control" placeholder="Enter age" name="age"/></p>
                </div>
                <div class="form-group">
                    <p>Description: <input type="text" class="form-control" 
                        placeholder="Enter description" name="description"/></p>
                </div>
                <div class="form-group">
                    <p><input type="submit" name = "Send" value="Send"/></p>
                </div>
            </form>
        </div> 
    </div>
<?
} elseif(isset($_GET['Table'])){
    $db = file("./in.txt");
    print_table($db);
} 
if(isset($_POST)){
    if(isset($_POST['Send'])){
        $db = file("./in.txt");
        $id = sizeof($db) + 1;
        $fp = fopen("./in.txt", "a+") or die("не удалось открыть файл");
        fwrite($fp, $id."::".$_POST['name']."::".$_POST['age']."::".$_POST['description']."\r\n");
        fclose($fp);
        $db = file("./in.txt");
        print_table($db);
    }
}
?>
</body>
</html>