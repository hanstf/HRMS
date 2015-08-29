<?php
include 'core/init.php';

if(isset($_POST['send'])==true){

	if(mysql_query("INSERT INTO appraisals VALUES('','$_POST[1]','$_POST[2]','$_POST[3]','$_POST[4]','$_POST[5]',DATE(NOW()))") && mysql_query("INSERT INTO employees_appraisals VALUES ('',LAST_INSERT_ID(),'$_POST[employees]','$userid')")){
			header("Location:main.php?page=SuperviseeAppraisal&code=success");
			exit;
	}else{
		header("Location:main.php?page=SuperviseeAppraisal&code=fail");
			exit;
	}
}


?>