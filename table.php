<?php

require "./db_connect.php"

?>

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css>
    <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js></script>
    <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="shortcut icon" href="resources/favicon.ico" type="image/x-icon">
    <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
    <title>RMC</title>

        <link href="https://unpkg.com/tabulator-tables@4.5.3/dist/css/tabulator.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.5.3/dist/js/tabulator.min.js"></script>
    <link rel="stylesheet" href="table.css">
    </head>
    <body>
        <?php
		
		$sql= "SELECT id, bname, phone, emailUsers, bio FROM users WHERE zip= '90291';";
$result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $row = json_encode($row);
       
        ?>

        <div class="container">
            <div id="example-table">
            </div>
        </div>
    </body>
</html>
<script>
    <?php
        echo 'var tabledata = ['.$row.'];';
    ?>
   
 var table = new Tabulator("#example-table", {
 	layout: "fitColumns",
 	data:tabledata, //assign data to table
 	columns:[ //Define Table Columns
	 	{title:"Name", field:"bname", width:200},
	 	{title:"Phone", field:"phone", align:"left"},
	 	{title:"Email", field:"emailUsers"},
	 	{title:"About", field:"bio", sorter:"date", align:"center"},
 	],
});

table.setData(tabledata[0]);

   </script>