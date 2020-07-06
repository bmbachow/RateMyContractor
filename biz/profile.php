<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['uidUsers'])) {
	header('Location: bizsignin.php');
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
		<title>Rate My Contractor | Profile</title>
		<link rel="stylesheet" href="../modules/review/css/default.css" />
		<link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../resources/favicon.ico" type="image/x-icon">
		<link href="homestyle.css" rel="stylesheet" type="text/css">
		<link href="style2.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css>
        <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js></script>
        <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<?php 
			$GLOBALS["modulesPath"] = "../modules/review/";
			include("../modulesInclude.php");
		?>
	</head>
	<body class="loggedin">
		
	<?php include 'menu.php'; ?>

<?php
    
	$stmt = $conn->prepare("SELECT * FROM users WHERE uidUsers = '$uid'");
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	
?>
<section id="body">
        <div class="container">
			<br>
			<br>
			<br>
			<br>
			<div class="row">
				<div class="col">
					<h1 class="text-center"> <?=$row['bname']?> </h1>
				</div>
			</div>
        </div>
		<div class="container">
			<div class="row">
				<div class="col-xl-3">
					<h1>   </h1>
					<img src="<?php echo './update/images/' . $row['profile_image'] ?>" width="256" height="350" alt="">					
				</div>
				<div class="col-xl-5">
					<br>
					<br>
					<br>
					<h3> Owner: <?=$row['fname']?> <?=$row['lname']?></h3>
					<br>
					<br>
				    <h3>About Us:</h3>
					<?=$row['bio'] ?>
					
				</div>
				<div class="col-xl-2">
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
				<div class="col-xl-2">
					<br>
					<br>
					<h3>Contact Info:</h3>
					    <h5>Email:</h5>
						<h4><?=$row['emailUsers'] ?></h4><br>
				
						<h5>Phone:</h5>
						<h4><?=$row['phone'] ?></h4><br>
						
						<h5>Website:</h5>
						<h4><?=$row['web'] ?></h4>
					
				</div>			
			</div>
		</div>
	
		<div class="container">
			<div class="row">
			    <div class="col-xl-3 mt-4">
				    <a  href="update/update.php"><button class="btn btn-primary btn-block text-uppercase" >Update Profile</button></a>
				</div>
			</div>
	</div>
	<main>
      <section class="container gallery-links">
      <?php
      
      $sql = "SELECT * FROM users WHERE uidUsers= '$uid'";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "SQL statement failed!";
} else {
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
  if ($row[0]['paying'] == 0) {
	  echo '<h3 style= "color: red";>Want to upload images of your GREAT work? <br> Want to reply to Positive and Negative client reviews? <br> Become a Paying CUSTOMERS Today and GAIN full ACCESS to your profile features.</h3>';
	  exit();
	} elseif ($row[0]['paying']==1) {  
	  ?>
      
          <h1>Gallery</h1>

          <div class="gallery-container">
              <?php
              include "../db_connect.php";

            $sql = "SELECT * FROM gallery WHERE userID= '$uid' ORDER BY orderGallery DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="d-inline-flex"  style="margin: 1em auto">
                    <a href="#">
                  <div style="background-image: url(./gallery/<?=$row["imgFullNameGallery"];?>);"></div>
                  <h3><?=$row["titleGallery"];?></h3>
                </a>
                    </div>
           <?php   }
            }
            ?>
          </div>
<?php

  
$sql = "SELECT * FROM gallery WHERE userID= '$uid'";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "SQL statement failed!";
} else {
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $rowCount = mysqli_num_rows($result);
  if(8 == $rowCount){
	  echo '<h1>You have reached your Image Limit</h1>';
	  exit();
  } else {

    if (!isset($_SESSION['uidUsers'])) {
        echo '';
        exit();
    }else{ ?>
          <div class="gallery-upload">
            <form action="gallery.inc.php" method="POST" enctype="multipart/form-data">
                <input class="form-control-lg" type="text" name="filename" placeholder="File Name...">
                <input class="form-control-lg" type="text" name="filetitle" placeholder="Image Title...">
                <input class="form-control-lg" type="file" name="file">
                <button class="btn-primary btn-lg" type="submit" name="submit">UPLOAD</button>
            </form>
		  </div>
		  <section class="container">
          <h1>Reviews</h1>
<?php } 
  }
}
  }
  include "../modules/review/reviewList.php";}
}
?>

        </div>
      </section>
      </section>
    </main>
	</body>
	<br>

	<br>
	<br>
	<br>
	<br>
	<br>

  <?php include 'footer.php';?>
</section>
</html>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>