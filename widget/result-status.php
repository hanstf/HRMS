
<li>
<table class="table table-hover">
<tr>
<td>Apply Date
</td>
<td>Training Title
</td>
<td>Duration
</td>
<td>Trainer
</td>
<td>Result
</td>

</tr>
<?php
$query3 = mysql_query("SELECT * 
FROM employees_training
INNER JOIN training_programs ON training_programs.Program_ID = employees_training.Program_ID
INNER JOIN training_track ON employees_training.EmpTraining_ID = training_track.EmpTraining_ID
WHERE employees_training.Employees_ID ='$result[Employees_ID]' AND training_track.Approval = 'Approve'");

while($result3= mysql_fetch_assoc($query3)){	
	$empTraining_id = $result['EmpTraining_ID'];
	$query4 = mysql_query ("SELECT Score FROM training_result WHERE EmpTraining_ID = '$empTraining_id'");
	
	if(mysql_num_rows($query4)>0){
		$score = mysql_result($query4,0, 'Score');
		
	}else{
		$score = "N/A";
	}
	echo "<tr><td>". $result3['Apply_Date']."</td><td>". $result3['Title']."</td><td>". $result3['Duration']."</td><td>".$result3['Trainer']."</td><td> ".$score."/100</td></tr> " ;
		
 }

?>
</table>
</li>
