<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['uidUsers'])) {
	header('Location: ../hosignin.php');
	exit();
}
require ('../db_connect.php');

$email = $_SESSION['emailclient'];
$uid = $_SESSION['uidUsers'];
$zip = $_SESSION['zip'];
$id = $_SESSION['id'];


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Rate My Contractor | Home</title>
		<link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../resources/favicon.ico" type="image/x-icon">
		<link href="homestyle.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css>
		<script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js></script>
        <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../modules/review/css/default.css" />
		<script type="text/javascript" src="../modules/review/js/default.js"></script>
		<link href="https://unpkg.com/tabulator-tables@4.5.3/dist/css/tabulator.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.5.3/dist/js/tabulator.min.js"></script>
        <link rel="stylesheet" href="../table.css">
	</head>
	<body class="loggedin">
		
	<?php include 'menu.php';?>



		<br>
	<?php 
$sql="SELECT * FROM leads WHERE uidUsers = '$uid'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
    if ($row['verified'] == 0) { ?>
    
    <br>
    <br>
    <br>
    <br>
    <br>
	<div class="text-center" >
	<?php echo '<h2>Please, verify your email to start viewing and rating contractors.</h2> <br> <h3>Check your email for the link.</h3>'?>
  </div>
  <?php
	exit();
} else {

?>

		<div id="contents" class="container">
			<br>
			<br>
			<br>
			<div class="row">
		        <h2>Home Page</h2>
			</div>
		</div>
		<div class="container">
			<div class="row d-flex justify-content-xl-around">
				<div id="content" class="flex-grow-1">
			        <p>Welcome back, <?=$uid?>!</p>
			    </div>
		        <div class="">
			        <a href="estimates.php"><input id="btn" class="btn-sm btn-primary text-center" value="Get Quotes"></a>
		        </div>
		        <div class="">
                    <a href="reviews.php"><input id="btn" class="btn-sm btn-primary text-center" value="Rate Contractors"></a>
				</div>
			</div>
		</div>
      <br>

	  <div class="container">
			<div class="row">
				<h2>Find A Contractor</h2>
			</div>
		</div>
	  
	  <div class="s01">
    <form action="../search/find.php" method="POST">
      <div class="inner-form">
        <div class="input-field first-wrap">
          <input name="bname" id="search" type="text" value= "" placeholder= "Painting, Handyman, Etc.">
        </div>
        <div class="input-field second-wrap">
          <input name="zip" id="location" type="text" value="" placeholder="Zip or City">
        </div>
        <div class="input-field third-wrap">
          <button class="btn-search" type="submit">Search</button>
        </div>
      </div>
    </form>
  </div>
		
			
		<br>
		<br>
<div class="container">
			<div class="row">
				<h2>Business' You Rated</h2>
			</div>
		</div>
		<?php
		
		$sql= "SELECT bname, phone, emailUsers, bio FROM users JOIN reviews ON users.id= reviews.userID WHERE reviews.leadID= '$id';";
$result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $row = json_encode($row);
       
        ?>

        <div class="container">
            <div id="example-table">
            </div>
        </div>
				
		<script>
    <?php
        echo 'var tabledata = ['.$row.'];';
    ?>
   
 var table = new Tabulator("#example-table", {
 	layout: "fitDataStretch",
 	data:tabledata, //assign data to table
 	columns:[ //Define Table Columns
	 	{title:"Name", field:"bname", width:170, headerSort:false},
	 	{title:"Phone", field:"phone", align:"left", width:130, headerSort:false},
	 	{title:"Email", field:"emailUsers", width:140, headerSort:false},
	 	
 	],
});

table.setData(tabledata[0]);

   </script>
	<?php } ?>	
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include "./footer.php";?>
	</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"></script>