	<?php
session_start();

require 'database/connect.php';
require 'function/users.php';
require 'function/generals.php';

$error = array();

if(isset($_SESSION['id'])==true){
	$userid = $_SESSION['id'];
	$privilege = checkprivilege($userid);
}


$today = date("Y/m/d");
date_default_timezone_set('Asia/Kuala_Lumpur')

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Hans, Gabriel, Zy">

    <title>XBase HR Management</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
   <script src="js/jquery-1.10.2.js"></script>
   <script src="js/bootstrap.js"></script>
  </head>
