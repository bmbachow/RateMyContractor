<?php
session_start();

	require('../db_connect.php');
   
    $fname = $_POST['fname'];
    $emailclient = $_POST['emailclient'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
	  $state = $_POST['state'];
    $zip = $_POST['zip'];
    $time = $_POST['time'];
    $money = $_POST['money'];
    $type = $_POST['type'];
	  $leadinfo = $_POST['leadinfo'];
	  $uid = $_POST['uidUsers'];
	  $pwd = $_POST['pwdUsers'];
    $pwdRepeat = $_POST['pwd-repeat'];
    $token = random_bytes(12);

    

    $_SESSION['fname']=$_POST['fname'];
    $_SESSION['emailclient']=$_POST['emailclient'];
    $_SESSION['phone']=$_POST['phone'];
    $_SESSION['city']=$_POST['city'];
    $_SESSION['state']=$_POST['state'];
    $_SESSION['zip']=$_POST['zip'];
    $_SESSION['time']=$_POST['time'];
    $_SESSION['money']=$_POST['money'];
    $_SESSION['type']=$_POST['type'];
    $_SESSION['leadinfo']=$_POST['leadinfo'];
    $_SESSION['uid']=$_POST['uidUsers'];


    // Then we perform a bit of error handling to make sure we catch any errors made by the user. Here you can add ANY error checks you might think of! I'm just checking for a few common errors in this tutorial so feel free to add more. If we do run into an error we need to stop the rest of the script from running, and take the user back to the signup page with an error message. As an additional feature we will also send all the data back to the signup page, to make sure all the fields aren't empty and the user won't need to type it all in again.

  // We check for any empty inputs. (PS: This is where most people get errors because of typos! Check that your code is identical to mine. Including missing parenthesis!)
  if (empty($uid) || empty($emailclient) || empty($pwd) || empty($pwdRepeat)) {
    header("Location: ../getquotes.php?error=emptyfields&uid=".$uid."&mail=".$emailclient);
    exit();
  }
  // We check for an invalid username AND invalid e-mail.
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $uid) && !filter_var($emailclient, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../getquotes.php?error=invaliduidmail");
    exit();
  }
  // We check for an invalid username. In this case ONLY letters and numbers.
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
    header("Location: ../getquotes.php?error=invaliduid&mail=".$emailclient);
    exit();
  }
  // We check for an invalid e-mail.
  else if (!filter_var($emailclient, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../getquotes?error=invalidmail&uid=".$uid);
    exit();
  }
  // We check if the repeated password is NOT the same.
  else if ($pwd !== $pwdRepeat) {
    header("Location: ../getquotes?error=passwordcheck&uid=".$uid."&mail=".$emailclient);
    exit();
  }
  else {

    // We also need to include another error handler here that checks whether or the username is already taken. We HAVE to do this using prepared statements because it is safer!

    // First we create the statement that searches our database table to check for any identical usernames.
    $sql = "SELECT uidUsers FROM leads WHERE uidUsers=?;";
    // We create a prepared statement.
    $stmt = mysqli_stmt_init($conn);
    // Then we prepare our SQL statement AND check if there are any errors with it.
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // If there is an error we send the user back to the signup page.
      header("Location: getquotes.php?error=sqlerror1");
      exit();
    }
    else {
      // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
      // In case you need to know, "s" means "string", "i" means "integer", "b" means "blob", "d" means "double".
      mysqli_stmt_bind_param($stmt, "s", $uid);
      // Then we execute the prepared statement and send it to the database!
      mysqli_stmt_execute($stmt);
      // Then we store the result from the statement.
      mysqli_stmt_store_result($stmt);
      // Then we get the number of result we received from our statement. This tells us whether the username already exists or not!
      $resultCount = mysqli_stmt_num_rows($stmt);
      // Then we close the prepared statement!
      mysqli_stmt_close($stmt);
      // Here we check if the username exists.
      if ($resultCount > 0) {
        header("Location: getquotes.php?error=usertaken&mail=".$emailclient);
        exit();
      }
      else {
        // If we got to this point, it means the user didn't make an error! :)

        // Next thing we do is to prepare the SQL statement that will insert the users info into the database. We HAVE to do this using prepared statements to make this process more secure. DON'T JUST SEND THE RAW DATA FROM THE USER DIRECTLY INTO THE DATABASE!

        // Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
        $sql = "INSERT INTO leads (fname, emailclient, phone, city, state, zip, time, money, type, leadinfo, uidUsers, pwdUsers, token) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        // Here we initialize a new statement using the connection from the dbh.inc.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the signup page.
          header("Location: getquotes.php?error=sqlerror2");
          exit();
        }
        else {

          // If there is no error then we continue the script!

          // Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission!
          // The hashing method I am going to show here, is the LATEST version and will always will be since it updates automatically. DON'T use md5 or sha256 to hash, these are old and outdated!
          $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
          $hashtoken = password_hash($token, PASSWORD_DEFAULT);
          
          // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
          mysqli_stmt_bind_param($stmt, "sssssssssssss", $fname, $emailclient, $phone, $city, $state, $zip, $time, $money, $type, $leadinfo, $uid, $hashedPwd, $hashtoken);
          // Then we execute the prepared statement and send it to the database!
          // This means the user is now registered! :)
          mysqli_stmt_execute($stmt);

          $url="ratemycontractor.com/verify.php?token=".$hashtoken."&emailclient=".$emailclient;
	
	        $to = $emailclient;

          $subject = 'Verify Your Email For Rate My Contractor';

          $message = '<p>We recieved a User with this email address. The link to verify your email is below. If you did not make this request, you can ignore this email.';
          $message .= 'Here is your email verify link: </br>';
          $message .= '<a href="' .$url . '">' .$url . '</a></p>';

          $headers = "From: RMC <noreply@gmail.com>\r\n";
          $headers .= "Content-type: text/html\r\n";

          if(mail($to, $subject, $message, $headers))
            echo "Email Success";
          else
            echo "Email sending failed";

          header('Refresh: 0; url= ./email.php');	
          exit();

       

        }
      }
    }
  }
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  
  
