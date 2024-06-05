<?php
ob_start();
date_default_timezone_set("Asia/Dhaka");


$servername = "localhost";
$username = "root";
$password = "";
$db_name="rs_driving_erpdb";

// Create connection
$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>