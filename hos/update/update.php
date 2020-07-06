<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['uidUsers'])) {
	header('Location: ../home.php');
	exit();
}
require 'db_connect.php';
 
require_once('processForm.php');

$dbname = "bizclients";	
$host = "localhost";
$user = "roots";
$password = "impossible13";
			
		try{$db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8mb4', ''.$user.'', ''.$password) or die(print_r($db->errorInfo())); }
		catch (Exception $e){die('Erreur : ' . $e->getMessage());}

$statement = $db->prepare('SELECT * FROM leads WHERE uidUsers = :uidUsers');
$statement->bindParam(':uidUsers', $_SESSION['uidUsers'], PDO::PARAM_STR);
$statement->execute();
$leadData = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rate My Contractor</title>
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <link rel="icon" href="./favicon.ico" type="image/x-icon">
  <link href="homestyle.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  
  <!-- Bootstrap CSS -->
  
  <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css>
  <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js></script>
  <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <link rel="stylesheet" href="main.css">
  
</head>

<body class="loggedin" id="loggedin">
    
<?php include 'menu.php'; ?>

    <br>
    <br>
    <div class="container text-center">
      <br>
      <br>
      <br>
      <h3>Update Your Profile<h3>
</div>
    <br>
    
  <div class="container" id="container">
    <div class="row" id="row">
      <div class="col-xl-4 form-div">
        <form action="update.php" method="post" enctype="multipart/form-data" id="form">
          <h4 class="text-center mb-3 mt-3"> </h4>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Profile Image</label>
          </div>
          
          <div class="form-group">
            <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save Picture</button>
          </div>
        </form>
        </div>
        <div class="col-xl-7" id="up">
          <form class="border" id="form" action="insertform.php" method="post">
              <div class="form-group">
              <label for="update_profile">First Name:</label>
              <input type="text" name="fname" class="form-control" required id="update_profile" value="<?php if(isset($leadData[0]['fname'])){echo $leadData[0]['fname'];}?>">
              </div>
              <div class="form-group">
              <label for="update_profile">Last Name:</label>
              <input type="text" name="lname" class="form-control" required id="update_profile" placeholder="" value="<?php if(isset($leadData[0]['lname'])){echo $leadData[0]['lname'];}?>">
              </div>
              <div class="form-group">
              <label for="update_profile">Email:</label>
              <input type="email" name="emailclient" class="form-control" required id="update_profile" value="<?php if(isset($leadData[0]['emailclient'])){echo $leadData[0]['emailclient'];}?>">
              </div>
              <div class="form-group">
              <label for="update_profile">Phone:</label>
              <input type="text" name="phone" class="form-control" required id="update_profile" placeholder="123-456-7890" value="<?php if(isset($leadData[0]['phone'])){echo $leadData[0]['phone'];}?>">
              </div>
              <div class="form-group">
              <label for="update_profile">Address:</label>
              <input type="text" name="address" class="form-control" required id="update_profile" value="<?php if(isset($leadData[0]['address'])){echo $leadData[0]['address'];}?>">
              </div>
              <div class="form-group">
              <label for="update_profile">City:</label>
              <input type="text" name="city" class="form-control" required id="update_profile" value="<?php if(isset($leadData[0]['city'])){echo $leadData[0]['city'];}?>">
              </div>
              <div class="form-group">
              <label for="update_profile">State:</label>
              <input type="text" name="state" class="form-control" required id="update_profile" value="<?php if(isset($leadData[0]['state'])){echo $leadData[0]['state'];}?>">
              </div>
              <div class="form-group">
              <label for="update_profile">Zip:</label>
              <input type="text" name="zip" class="form-control" required id="update_profile" value="<?php if(isset($leadData[0]['zip'])){echo $leadData[0]['zip'];}?>">
              </div>
              <button type="submit" class="btn btn-primary btn-lg">Save Profile</button>
          </form>
        </div>
      </div>
    </div>
</body>

<?php include 'footer.php'; ?>

<script src="script.js"></script>

