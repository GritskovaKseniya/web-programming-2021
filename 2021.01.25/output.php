<?php
header("Content-Type: text/html; charset=utf-8");
$db = file("./in.txt");

function print_table($db)
{

?>
<table border=\"2\">
<?php
    for($string=0; $string<sizeof($db); $string++){
        $column= explode("::", $db[$string]);
        echo "<tr>";
        echo "<td>".$column[0]."</td>";
        echo "<td>".$column[1]."</td>";
        echo "<td>".$column[2]."</td>";
        echo "<td>".$column[3]."</td>";
        echo "</tr>";
    }
}
print_table($db);
echo "PRINT";
?>
</table>
