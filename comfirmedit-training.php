<?php require 'core/init.php'
 ?>

<?php


		if(isset($_GET['confirmsub'])){
			$tpid = $_GET['training_ID'];
			if(mysql_query("UPDATE training_programs SET Title='$_GET[tilte]',Quota='$_GET[quota]', Total_Joined='$_GET[TJ]',Duration='$_GET[duration]',Trainer='$_GET[trainer]',Description='$_GET[descr]' WHERE Program_ID = '$tpid'"))	
			
			{
				
				
					
					header("Location:view-trainingprogram.php?id=success");
					exit();
							
			}else{
					header("Location:edit-training.php?id=fail&prog_id=".urlencode($tpid)."");
				exit();
					
				}
				
               }
				
				?>