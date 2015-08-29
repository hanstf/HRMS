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
          <h1> Insert New Training Program</h1>
          <?php 
		  
		  if (isset($_POST['submit'])==true){

	if(mysql_query("INSERT INTO training_programs VALUES ('', '$_POST[title]','$_POST[quota]','$_POST[total_joined]','$_POST[duration]','$_POST[trainer]','$_POST[description]')")){
		echo '<div class="alert alert-success">Successfully add new training program</div>';		
		
		
	}else{
		echo '<div class="alert alert-danger">Failed to add new training program</div>';	
	}
	
		if (isset($_FILES['pict'])== true){
			
		$query= mysql_query("SELECT LAST_INSERT_ID() FROM training_programs");
		$result =mysql_result($query, 0);
		
		$name = $result;
		$type = $_FILES['pict']['type'];
		$size = $_FILES['pict']['size'];
		$temp = $_FILES['pict']['tmp_name'];
		$error = $_FILES['pict']['error'];
		if($error >0){
	
			die("Error uploading picture!! ");
		}else {
			move_uploaded_file($temp,"picture/training/".$name.".jpg");
		}
	
		}
}
		  
		  
		  
		  
		  ?>
          
          <div class="col-xs-3">
     <form enctype="multipart/form-data" action="insert-trainingprogram.php" method="POST">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" required class="form-control" id="title"  name="title">
  </div>
   <div class="form-group">
    <label for="quota">Quota</label>
    <input type="number" required class="form-control" min=0 id="quota"  name="quota">
  </div>
    <div class="form-group">
    <label for="total_joined">Total Joined</label>
    <input type="number" required class="form-control" min=0 id="total_joined"  name="total_joined">
  </div>
     <div class="form-group">
    <label for="duration">Duration (in hours)</label>
    <input type="number" min=0 required class="form-control" step ="0.1" id="duration"  name="duration">
  </div>
      <div class="form-group">
    <label for="trainer">Trainer</label>
    <input type="text" required class="form-control" id="trainer"  name="trainer">
  </div>
  Description
<textarea class="form-control" rows="3" name='description'></textarea>
 <div class="form-group">
    <label for="uploadpict">Upload Training picture</label>
    
    <input type='file' name='pict'>
  </div>
 
  <input type="submit" name="submit" value="Insert" class="btn btn-default" >
</form>

           

          </div>
        </div>

      </div>

    </div>

   

  </body>
</html>