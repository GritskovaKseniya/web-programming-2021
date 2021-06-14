<table class="table table-bordered mt-5">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>  
    {foreach from=$result item=user}
      <tr>
        <td>{$user.id}</td>
        <td>{$user.name}</td>
        <td>{$user.description}</td>
        <td><a href="{$URL}?edit=&id={$user.id}">Edit<a></td>
        <td><a href="{$URL}?delete=&id={$user.id}">Delete<a></td>
      </tr>
    {/foreach}
  </table>