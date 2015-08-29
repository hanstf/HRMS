<div id="col-lg-3">
<h1>Training Status</h1>
<table class="table table-hover">
<tr>
<th>Apply Date
</th>
<th>Training Title
</th>
<th>Duration
</th>
<th>Trainer
</th>
<th>Status
</th>
</tr>
<?php
$query = mysql_query("SELECT * 
FROM employees_training
INNER JOIN training_programs ON training_programs.Program_ID = employees_training.Program_ID
WHERE employees_training.Employees_ID ='$userid'");
while($result= mysql_fetch_assoc($query)){	
	$empTraining_id = $result['EmpTraining_ID'];
	$query2 = mysql_query ("SELECT Approval, Supervisor_ID FROM training_track WHERE EmpTraining_ID = '$empTraining_id'");
	
	if(mysql_num_rows($query2)>0){
		if (mysql_result($query2, 0, 'Approval') == "Approve"){
			$status = "Approve";				
		}else{
			$status = "Not Approve";
		}
	}else{
		$status ="Pending Approval";
	}
	
	echo "<tr><td>". $result['Apply_Date']."</td> <td>". $result['Title']."</td><td>". $result['Duration']."</td><td>".$result['Trainer']."</td><td>".$status."</td></tr>" ;
		
 }

?>


</table>



</div>