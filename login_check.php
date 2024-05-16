<?php 

	ob_start();
	session_start();
	include('./assets/support/db_connection.php');
	if(!isset($_SESSION['user-log']))  //IF user session is not set 
	{
		//User is not Logged in 
		
		header('location:login.php');
	
	
	}
?>