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
        <div id="col-xs-3">
        <h1> View Training Program</h1>
       <?php
	   if(isset($_POST['gobtn'])==TRUE){
					if($_POST['searchoption']=="SearchName"){
						
					$query= mysql_query("SELECT *
FROM training_programs WHERE Title LIKE '%$_POST[search]%'");
					}else{
						$query= mysql_query("SELECT *
FROM training_programs WHERE Trainer LIKE '%$_POST[search]%'");

						
					}
				}else{
					
					$query= mysql_query("SELECT *
FROM training_programs");



				}
	   
	   
	   
	   ?>
<form method ="post" action="" class="form-inline" role="form">
		<input type="search" name ="search" class="form-control" placeholder="Search">
  		<input type="submit" name="gobtn" id="button" value="GO" class="form-control">
		
        
        
        
        <div class="radio" >
  	<label>
    	<input type="radio" name="searchoption" id="optionsRadios1" value="SearchName" checked>
    Search by name
  </label>
</div>

<div class="radio">
  <label>
    <input type="radio" name="searchoption" id="optionsRadios2" value="SearchTrainer">
    Search by trainer
  </label>
</div>
      </form>   
          <?php
if(mysql_num_rows($query)==0){
		echo '<div class="alert alert-danger"><p>No search result found</p></div>';
	}else{

	echo ' 		
<table class="table">';
while($result=mysql_fetch_assoc($query)){
			
			 $file = "picture/training/".$result['Program_ID'].".jpg";
			 if (file_exists($file)==true){
				$pict = $result['Program_ID']; 
			 }else{
				 $pict = "no-pict";
			 } 	  
			 
			echo "
			<tr>
			<th >ID : (".$result['Program_ID'].")</th>
			<td colspan='1'>
			<td>
			<form class='form-inline' action='edit-training.php' method='GET'>
			<input type='submit' name='edit' value='edit' class='form-control'>
			<input type='hidden' name='prog_id' value='".$result['Program_ID']."'>
			</form>
			</td>
			<td>
			
			</td>
			</tr>
			<tr>
			<td rowspan='2'>
			<img src='picture/training/".$pict.".jpg'  width='110' height='120' >
			</td>
			<td>Title: ".$result['Title']."</td><td>Total Join/Quota:".$result['Total_Joined']."/".$result['Quota']."</td>
			<td>Trainer:".$result['Trainer']."</td>
			</tr>
			<tr><td colspan='3'>".$result['Description']."</td>
			</tr>
			";
			
			}
	}
?>
</table>
          </div>
        </div>

      </div>

    </div>

   

  </body>
</html>