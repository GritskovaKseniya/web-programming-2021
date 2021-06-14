<form action="{$URL}?edit=" method="post" enctype="multipart/form-data">
    <div class="form-group m-2">
        <label>ID</label>
        <input class="form-control" type="number" name="id" value="{$user.id}" readonly />
    </div>
    <div class="form-group m-2">
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="{$user.name}" required />
    </div>
    <div class="form-group m-2">
        <label>Description</label>
        <input class="form-control" type="text" name="description" value="{$user.description}" required />
    </div>
    <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>