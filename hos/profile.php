<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['uidUsers'])) {
	header('Location: ../hosignin.php');
	exit();
}
require '../db_connect.php';

$uid = $_SESSION['uidUsers'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Profile | Rate My Contractor</title>
		<link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../resources/favicon.ico" type="image/x-icon">
		<link href="homestyle.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css>
        <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js></script>
        <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body class="loggedin">
	
	<?php include 'menu.php'; ?>
	
<?php
    
	$stmt = $conn->prepare("SELECT * FROM leads WHERE uidUsers = '$uid'");
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	
?>
<section id="body">
        <div class="container-fluid">
			<div class="row">
				<div class="col">
					<h1 class="text-center"> Profile Page </h1>
				</div>
			</div>
        </div>
		<div class="container">
			<div class="row">
				<div id="imgpro" class="col-xl-3">
					<h1>   </h1>
					<img src="<?php echo './update/images/' . $row['profile_image'] ?>" width="275" height="350" alt="">					
				</div>
				<div class="col-xl-4">
					<br>
					<br>
					<br>
					<h3> Name: <?=$row['fname']?> <?=$row['lname']?> </h3>
					<br>
					<h3> Username: <?=$row['uidUsers']?></h3>
					<br>
				    <h3> Address: <?=$row['address']?></h3>
					
				</div>
				<div class="col-xl-2 text-left">
					<br>
					<br>
					<h3>Location:</h3>
					    <h5>City:</h5>
							<h4><?=$row['city'] ?><h4><br>
						<h5>State:</h5>
						    <h4><?=$row['state'] ?></h4><br>
						<h5>Zip Code:</h5>
					        <h4><?=$row['zip'] ?></h4>		    
				</div>
				




				<div class="col-xl-3">
					<br>
					<br>
					<h3>Contact Info:</h3>
					    <h5>Email:</h5>
						<h4><?=$row['emailclient'] ?></h4><br>
				
						<h5>Phone:</h5>
						<h4><?=$row['phone'] ?></h4><br>
						
					
				</div>			
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col">
				
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
			    <div class="col-xl-3">
					<br>
					<br>
				    <a href="update/update.php"><button class="btn btn-primary btn-block text-uppercase" >Update Profile</button></a>
				</div>
			</div>
		</div>
	</body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
  
	<?php include 'footer.php'; ?>

</section>
</html>