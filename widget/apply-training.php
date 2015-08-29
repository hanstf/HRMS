<div id="col-lg-4">
<h1>Apply Training</h1>
<table class="table table-hover">
<tr>
<th>
Training Title
</th>
<th>
People Joining
</th>
<th>
Quota
</th>
<th>
Duration
</th>
<th>
Trainer
</th>
<th>
Description
</th>
<th>
Status
</th>
</tr>
<?php
$query= mysql_query ("SELECT * FROM training_programs");



$date=date("Y-m-d");
while($result = mysql_fetch_assoc($query)){
	$id = $result['Program_ID'];
	$query2 = mysql_query("SELECT * FROM employees_training WHERE Program_ID = '$id' AND Employees_ID= '$userid'");
				
				 $file = "picture/training/".$result['Program_ID'].".jpg";
			 if (file_exists($file)==true){
				$pict = $result['Program_ID']; 
			 }else{
				 $pict = "no-pict";
			 } 	  
			 


	echo "<tr><td ><img  width='80' height='80' src='picture/training/".$pict.".jpg'></<td>".$result['Title']."</td><td>".$result['Total_Joined']."</td><td>".$result['Quota']."</td><td>".$result['Duration']." Days</td><td>".$result['Trainer']."</td><td>".$result['Description']."</td>";
	if (mysql_num_rows($query2)>0){
	echo "<td>You Had applied For this training</td></tr>";			
	}else{
		if ($result['Total_Joined']>= $result['Quota']){
			echo "No more slot";
		}else{
	echo "<td><form action='' method='POST'><input type='submit' class='btn btn-default btn-xs' name='apply' value='Apply'> <input type='hidden' name='program_id' value='".$result['Program_ID']."'/></form></td></tr>";	
		}
	}
}
if(isset($_POST['apply'])== TRUE){
	if (mysql_query("INSERT INTO employees_training VALUES('', '$_POST[program_id]', '$userid', '$date')")){
		echo'<script> window.location=""; </script> ';
		echo 'successfully applied';
	}else{
		echo 'not success';	
		
	}
}

?>

</table>
</div>