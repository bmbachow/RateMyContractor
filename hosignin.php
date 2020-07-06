<?php require "db_connect.php"; 
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="./resources/favicon.ico" type="image/x-icon">
  <link rel="icon" href="./resources/favicon.ico" type="image/x-icon">
  <title>RMC</title>
  
  <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./css/Signin.css" rel="stylesheet">

</head>
<body id="body">
  
<?php include("menu.php");?>
    <br>
    
    <div class="container">
      <br>  
      <br>  
      <br>  
      <br>  
      <br>  
      <br>  
      <br>   
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Sign In</h5>
              <form class="form-signin" action="./hos/authenticate.php" method="POST">
                <div class="form-label-group">
                  <input type="text" name= "uidEmail" id="inputUsernameEmail" class="form-control" required placeholder="Username"  autofocus>
                  <label for="inputUsernameEmail">Email/Username</label>
                </div>  
                <div class="form-label-group">
                  <input type="password" name= "pwdUsers" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                <div class="justify-content-between">
                    <div>
                    <a class="text-right float-right mt-2 small" href="hosignup.php">Need An Account?<br> Register Here</a>
                    </div>
                    <div>
                    <a class= "text-left mt-2 small" href="resetpwd.php">Forgot Password?</a>
                    </div>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <?php 

include('footer.php'); 
    
?>

</body>

</html>