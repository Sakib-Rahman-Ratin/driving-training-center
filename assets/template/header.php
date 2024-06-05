<?php include('./assets/support/db_connection.php');
error_reporting(0);
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon/favicon.ico">
  <title>ERP.COM.BD</title>
  <?php include('./assets/support/css.php')?>
</head>

<body>

<div class='dashboard'>
<?php include('./assets/template/menu.php')?>

<div class='dashboard-app'>
  
<?php include('./assets/template/top_menu.php')?>

<div class='dashboard-content'>

<?php include('login_check.php')?>