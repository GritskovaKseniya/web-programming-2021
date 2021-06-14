<?
function print_form()
{
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Add form</title>
  <meta charset="utf-8">
</head>

<body>
  
    <form action="output.php" method="POST">
        <p>Name: <input type="text" name="name"/></p>
        <p>Age: <input type="text" name="age"/></p>
        <p>Description: <input type="text" name="description"/></p>
        <p><input type="submit" name="send" value="Send"/></p>
    </form>

</body>
</html>
<?
}
print_form();
?>