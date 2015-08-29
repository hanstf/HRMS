<?php 
include 'core/init.php';
mysql_query("UPDATE employees SET Employee_Status = 'deactive' WHERE Employees_ID = '$_POST[userid]'");
header ("Location:view-staff.php");
?>



