<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Gritskova</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <link href="styles/style.css" rel="stylesheet" type="text/css"/>
</head>        
<body>
    <div class="container-lg" id="content">
        <? include './templates/table.php'; ?>
        <div class="row">
                <button id="export_excel" type="button" class="btn btn-success mr-2 ml-3">Export to Excel file</button>
                <button id="export_pdf" type="button" class="btn btn-danger ml-2 mr-2">Export to PDF file</button>
        </div>
        <div class="row"><? include './templates/add_form.php'; ?></div>
    </div>
    <div id="elementH"></div>
    <script src="scripts/lodash.js"></script>
    <script type="text/javascript" src="node_modules/file-saver/dist/FileSaver.min.js"></script>
    <script type="text/javascript" src="node_modules/xlsx/xlsx.mini.js"></script>
    <script type="text/javascript" src="node_modules/dompurify/dist/purify.min.js"></script>
    <script type="text/javascript" src="node_modules/html2canvas/dist/html2canvas.min.js"></script>
    <script type="text/javascript" src="node_modules/jspdf/dist/jspdf.umd.min.js"></script>
    <script type="text/javascript" src="scripts/script.js"></script>
</body>
</html>