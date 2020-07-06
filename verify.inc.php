<?php
session_start();

if (isset($_POST["verify"])) {
    $token= $_POST["token"];
    $emailclient= $_POST["emailclient"];
    
    

if (empty($token)) {
    header("Location: hosignup.com");
    exit();
} 

require "db_connect.php";


$sql = "SELECT * FROM leads WHERE emailclient= ?";
$stmt= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error";
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "s", $emailclient);
    mysqli_stmt_execute($stmt);

    $result = mysqli_store_result($stmt);
    if ($row= mysqli_fetch_assoc($result)) {
        echo "You need to resubmit your 1 reset request.";
        exit();
    } else {
    
    $tokenCheck = password_verify($token, $row["token"]);
  if ($tokenCheck !== false) { 
      echo "you need to resubmit your reset 2 request.";
      exit();
  }elseif ($tokenCheck !== true) {
    session_regenerate_id();
    $_SESSION['uidUsers'] = $row['uidUsers'];
    $_SESSION['emailclient'] = $row['emailclient'];

    $sql = "UPDATE leads SET verified='1' WHERE emailclient=?";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an 3 error";
        exit();
    } else {
       mysqli_stmt_bind_param($stmt, "s", $emailclient);
       mysqli_stmt_execute($stmt);

       
  
    header("Location: hosignin.php");
}  
    } 
    }
}


} else {
    header("Location: index.php");

}