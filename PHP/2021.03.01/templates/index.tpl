<html xmlns="//www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>{$title}</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

{********************************************************* 
  @ author:         Kseniya Gritskova
**********************************************************}

  <div class="container">
    <h3>Шаблонизатор</h3>
    {include file='table.tpl'}
    {if $editPage && !is_null($user)} 
      {include file='editForm.tpl'}
    {else}
      {include file='addForm.tpl'}
    {/if}
  </div>
</body>
</html>
