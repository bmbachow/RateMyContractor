<?php
$dBServername = "localhost";
$dBUsername = "roots";
$dBPassword = "impossible13";
$dBName = "bizclients";

// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}