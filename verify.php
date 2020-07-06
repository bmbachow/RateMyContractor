
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="./resources/favicon.ico" type="image/x-icon">
  <link rel="icon" href="./resources/favicon.ico" type="image/x-icon">
  <title>Rate My Contractor</title>
  
  <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./css/Signup.css" rel="stylesheet">

</head>
<body id="body">
  
<?php include "menu.php"; ?>
<div>
    <div class="container"></div>
    <div class="row col"></div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    <div class="containter col-4"></div>
      <div class="text-center">
        <h1>Verify Your Email</h1>
      </div>
      <div class="container text-center">
        <p>Welcome to RateMyContractor. As soon as you login you be able to read and write reviews. Please feel free to submit a review on any contractor you have used in the past 3 years. We like to keep our reviews short and sweet but if you have a lot to write please do so. Also with new functionality you can add any contractor who is not in the database. Furthermore, when you need a quote we will be right there to help you. Thanks and have a great day!</p>
      </div>
    </div>
</div>  
    <?php

$token = $_GET["token"];
$emailclient = $_GET["emailclient"];

if (empty($token)) {
    echo "could not validate your request";
} else {
    if(ctype_xdigit($token) == false) {

        ?>
    <br>
    <div class="container">
            <form action="verify.inc.php" method="POST">
                <div class="form-label-group">
                    <Input class="form-control" type="hidden" name="token" value="<?php echo $token ?>">
                </div>
                <div class="form-label-group">
                    <Input class="form-control" type="hidden" name="emailclient" value="<?php echo $emailclient ?>">
                </div>
                <button class="btn btn-lg btn-primary btn-block rounded-pill" type="submit" name="verify">Click Here To Verify Email</button>
            </form>
            <?php
    }}
    ?>
        </div>
      </div>
    </div>
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
<?php include "footer.php"; ?>

</body>

</html> 