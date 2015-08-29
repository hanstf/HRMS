<?php 
require 'core/init.php';
 
 

 if (isset($_POST['insert'])==true){
	mysql_query("INSERT INTO training_result VALUES('','$_POST[score]','$_POST[id]')"); 

	header("Location:main.php?page=InsertScore");
	exit();
 }






?>
