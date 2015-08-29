	
<?php require 'core/init.php'
 ?>
<?php

		if(isset($_POST['confirmbtn'])){
			
		if(mysql_query("UPDATE employees SET Address='$_POST[add]',Contact_No='$_POST[conta]', Email='$_POST[email]',Gender='$_POST[gender]' WHERE Employees_ID = '$userid'")&& mysql_query("UPDATE login SET UserName='$_POST[username]',Password='$_POST[userpass]' WHERE Employee_ID='$userid'"))
		{
					header("Location:profile.php?id=success");
					exit();
							
			}else{
					header("Location:profile-edit.php?id=fail");
				exit();
					
				}
				
               }
				
				?>