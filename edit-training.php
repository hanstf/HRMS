<?php require 'core/init.php' ?>

  <body>

    <div id="wrapper">
<?php
				if ($privilege== "normal"){
					include 'widget/header-normal.php';
				}else if ($privilege=="supervisor"){
					include 'widget/header-supervisor.php';
				}else if ($privilege=="admin"){
					include 'widget/header-admin.php';
				}
				
?>

      <div id="page-wrapper">

        <div class="row">
                  <div class="col-xs-4">

            <?php
	
	if(isset($_GET['id'])== true){
		if ($_GET['id']== "success"){
			echo '<div class="alert alert-success"><p>successfully edit</p></div>';
		}else{
			echo '<div class="alert alert-danger"><p>fail to edit information</p></div>';
		}
		
	}
	
	?>
    
 <form role="form" method ="GET" action="comfirmedit-training.php" enctype="multipart/form-data">
        
             
 <h1>   Training Program </h1>
 
<div> <?php
			$userid= $_GET['prog_id'];
			 $file = "picture/training/".$userid.".jpg";
			 if (file_exists($file)==true){
				$pict = $userid; 
			 }else{
				 $pict = "no-pict";
			 }
			 ?>
             <img src="picture/training/<?php
			 echo $pict;
			 ?>.jpg"  width="150" height="150" class="img-thumbnail">
            
        
           	</div>
          
          
          
         <label for="t">Title :</label>
		<input type ="Text" height="20px" width="135px"
		enabled="True" id="title" required class="form-control" name="tilte" value="<?php
		$ID =getTrainingDetails($userid,'Title');
		echo $ID;
		?>">	
        	

  <label for="Q">Quota :</label>
		<input type ="Number" height="20px" width="135px"
		enabled="True" id="quota" required class="form-control" name="quota" value="<?php
		$ID =getTrainingDetails($userid,'Quota');
		echo $ID;
		?>">		

       <label for="TJ">Total_Joined:</label>
		<input type ="Number" height="20px" width="135px"
		enabled="True" id="totalj" required readonly class="form-control" name="TJ" value="<?php
		$ID =getTrainingDetails($userid,'Total_Joined');
		echo $ID;
		?>">		

           
           <label for="dur">Duration :</label>
             <input type="Number" Height="20px" Width="135px" 
                   Enabled="True" id="Name" required class="form-control" name="duration" value="<?php 
                    $name =getTrainingDetails ($userid, 'Duration'); 
                      echo $name; 
		?>">


	<label for="Trainer">Trainer :</label>
	<input type="Text" height="20px" required width="135px" enabled="True" id="Name" class="form-control" name="trainer" value="<?php
	$IC =getTrainingDetails($userid,'Trainer');
	echo $IC;
	?>">
   

 <label for="des">Description :</label>
 
 <textarea class="form-control" style="resize:none" id="Address" required class="form-control" name="descr" rows="3" required>
 <?php
        $address =getTrainingDetails ($userid, "Description"); 
                      echo $address;
                      ?> 
 </textarea> 
	   
 
 

<input type="hidden" name="training_ID" value="<?php echo $_GET['prog_id']; ?>">

 <input type="submit" id="submit" Value="Confirm" class="form-control" name="confirmsub">

   
            
    
   
            
            
  
            
    
			

        </form>  

          </div>
        </div>

      </div>

    </div>

   

  </body>
</html>

