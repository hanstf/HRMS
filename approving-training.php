<?php 
require 'core/init.php';
 
 
if(isset($_POST['approve'])){
 if ($_POST['approve']=="approve"){
	mysql_query("INSERT INTO training_track VALUES('','Approve','$userid','$_POST[id]')"); 
	mysql_query("UPDATE training_programs SET Total_Joined = Total_Joined + 1 WHERE Program_ID = '$_POST[id]'");
	header("Location:main.php?page=ApproveTraining");
	exit();
 }else{
	 mysql_query("INSERT INTO training_track VALUES('','Not Approve','$userid','$_POST[id]')"); 
	header("Location:main.php?page=ApproveTraining");
	 exit();
 }


}



?>
