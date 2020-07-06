<?php
session_start();

require 'db_connect.php';

$uid = $_SESSION['uidUsers'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
	$email = $_POST['emailclient'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];







$sql = "UPDATE leads SET fname='$fname', lname='$lname', emailclient='$email', phone='$phone', address='$address', city='$city', state='$state', zip='$zip' WHERE uidUsers= '$uid'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
header('Refresh: 0; url= update.php');

mysqli_close($conn);
?>