<!doctype html>
<html>
<?php
require 'core/init.php';
?>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php

$Stafflognam=$_POST['loginname'];
$Stafflogpas=$_POST['loginpass'];
$Staffname = $_POST['Fulname_ad'];
$StaffIC=$_POST['IC'];
$Staffadd = $_POST['Add_ad'];
$Staffconta=$_POST['conta_ad'];
$Staffemail =$_POST['email_ad'];
$Staffsal=$_POST['sal_ad'];
$Staffexp=$_POST['exp_ad'];
$Staffgender=$_POST['gen'];
$Staffrecruit = $_POST['recrdate_ad'];
$Staffpriv=$_POST['Priv'];
$Staffdepart = $_POST['department'];

if(isset($_POST['edite_ad'])==true){
	if(mysql_query ("INSERT INTO employees VALUES ('','$Staffname','$StaffIC','$Staffadd','$Staffconta','$Staffemail','$Staffsal', '$Staffexp','$Staffgender','$Staffrecruit','$Staffpriv','active')")){
	    $empid = mysql_insert_id();	
		
		mysql_query("INSERT INTO login VALUES('','$Stafflognam','$Stafflogpas','$empid')");
		
		if ($Staffpriv == "admin"){ 
			
		}else{
			mysql_query ("INSERT INTO employees_department VALUES ('','$empid','$Staffdepart')");	
			
			
		}
		
		mysql_query ("INSERT INTO performances VALUES('','14','$empid')");	
		
		if (isset($_FILES['pict'])== true){
			
				
		$type = $_FILES['pict']['type'];
		$size = $_FILES['pict']['size'];
		$temp = $_FILES['pict']['tmp_name'];
		$error = $_FILES['pict']['error'];
		
		if($error >0){
	
			die("Error uploading picture!! ");
		}else {
			move_uploaded_file($temp,"picture/".$empid.".jpg");
		}
	
		}
			
		header ("Location: InsertNewStaff.php?code=success");
			
	}else{
		header ("Location: InsertNewStaff.php?code=fail");
	}
	
}
?>
</body>
</html>