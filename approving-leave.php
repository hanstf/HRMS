<?php 
require 'core/init.php';
 
 
if(isset($_POST['approve'])){
 if ($_POST['approve']=="approve"){
	mysql_query("INSERT INTO leave_track VALUES('','Approve','$userid','$_POST[id]')"); 
	
	$query = mysql_query("SELECT * FROM employees_leave WHERE EmpLeave_ID=$_POST[id]");
	$employees = mysql_result($query,0, "Employees_ID");
	$leave=mysql_result($query,0, "Leave_ID");
	$duration = getLeaveDetails ($leave, "Duration");
	echo $duration;
	mysql_query("UPDATE performances SET Leave_Amount = Leave_Amount-'$duration' WHERE Employees_ID= '$employees'");
	header("Location:main.php?page=ApproveLeave");
	exit();
 }else{
	 mysql_query("INSERT INTO leave_track VALUES('','Not Approve','$userid','$_POST[id]')"); 
	header("Location:main.php?page=ApproveLeave");
	 exit();
 }


}



?>
