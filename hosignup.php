
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
  <link href="./css/Signup.css" rel="stylesheet">

</head>
<body id="body">
  
<?php include("menu.php"); ?>

    <div class="container">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
          <div class="card card-signin flex-row my-5">
            <div id="cardleft" class="card-img-left d-none d-md-flex">
               <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">Register</h5>
              <form class="form-signin" action="./hos/register.php" method="POST">
                <div class="form-label-group">
                  <input type="text" name= "uidUsers" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                  <label for="inputUserame">Username</label>
                </div>

                <div class="form-label-group">
                  <input type="email" name= "emailclient" id="inputEmail" class="form-control" placeholder="Email address" required>
                  <label for="inputEmail">Email address</label>
                </div>
                
  
                <div class="form-label-group">
                  <input type="password" name= "pwdUsers" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>
                
                <div class="form-label-group">
                  <input type="password" name= "pwdrepeat" id="inputPasswordRepeat" class="form-control" placeholder="Password Repeat" required>
                  <label for="inputPasswordRepeat">Password Repeat</label>
                </div>
  
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                <div class="justify-content-between">
                    <div>
                    <a class="text-right float-right mt-2 small" href="hosignin.php">Have An Account?<br> Sign In Here</a>
                    </div>
                    <div>
                    <a class= "text-left mt-2 small" href="resetpwd.php">Forgot Password?</a>
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
<?php include("footer.php"); ?>

</body>

</html>  