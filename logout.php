<?php 
session_start();


include('./assets/support/db_connection.php');
 session_destroy();
 
 
 //Redirect to login page 
 
 header('location:login.php');


?>