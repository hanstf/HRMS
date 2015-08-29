<?php require 'core/init.php'
 ?>

<?php

		if(isset($_POST['confirm'])){
		$empid = $_POST['employee_id'];
		if(mysql_query("UPDATE employees SET FullName='$_POST[Fullname]', Identification_Card='$_POST[ID]', Address='$_POST[add]',Contact_No='$_POST[conta]', Email='$_POST[email]', Salary='$_POST[sal_ad]', Experience ='$_POST[exp_ad]', Recruitment_Date='$_POST[recrdate_ad]', Gender='$_POST[gender]', Privilege='$_POST[Priv]' WHERE Employees_ID = '$empid'") && mysql_query("UPDATE employees_department SET Employees_ID='$empid', Department_ID='$_POST[department]' WHERE Employees_ID = '$empid'"))	
			
			{
				
				if (isset($_FILES['picts'])== true){
			
				$name = $empid;
		$type = $_FILES['picts']['type'];
		$size = $_FILES['picts']['size'];
		$temp = $_FILES['picts']['tmp_name'];
		$error = $_FILES['picts']['error'];
		if($error >0){
	
			die("Error uploading picture!! ");
		}else {
			move_uploaded_file($temp,"picture/".$name.".jpg");
		}
	
		}
					
					header("Location:loading.php?link=view-staff.php?status=success&id=".$empid."");
					exit();
							
			}else{
				
					header("Location:loading.php?link=view-staff.php?status=fail&id=".$empid."");
				exit();
					
				}
				
               }
				
				?>