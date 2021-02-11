<div class="container">
    <div class="row">
        <div class="col text-center mt-3"><h4>Table</h4></div>
    </div>
    <table class="table table-bordered table-striped">
        <tr><th>ID</th><th>Name</th><th>Description</th><th>Time</th><th>Date</th><th>Edit</th><th>Delite</th></tr>  
        <div class=" name-output">
        <? while($row = mysql_fetch_array($rez)){ ?>
            <tr>
            <? if (isset($_GET['edit']) && isset($_GET['id']) && $_GET['id'] == $row['id']){ ?>
                <td id="id"><? echo $row['id']?></td>
                <td><input class="form-control" id="name" value="<? echo $row['name']?>" required /></td>
                <td><input class="form-control" id ="description" value="<? echo $row['description']?>" required /></td>
                <td><? echo $row['time']?></td>
                <td><? echo $row['date']?></td>
                <td><button id="save" class="btn btn-warning">Save</button></td>
            <? } else { ?>
                <td><? echo $row['id'] ?></td>
                <td><? echo $row['name']?></td>
                <td><? echo $row['description']?></td>
                <td><? echo $row['time']?></td>
                <td><? echo $row['date']?></td>
                <td><a href=<?php echo '"'.$URL."?edit=&id={$row['id']}".'"' ?>>Edit</a></td>
            <? }?>
                <td><a href=<?php echo '"'.$URL."?delete=&id={$row['id']}".'"' ?>>Delete</a></td>
            </tr>
        </div>
        <?}?>
    </table>
</div>