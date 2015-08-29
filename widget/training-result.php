<div id="col-lg-3">
<h1>Training Result</h1>
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
$query = mysql_query("SELECT * 
FROM employees_training
INNER JOIN training_programs ON training_programs.Program_ID = employees_training.Program_ID
WHERE employees_training.Employees_ID ='$userid'");

while($result= mysql_fetch_assoc($query)){	
	$empTraining_id = $result['EmpTraining_ID'];
	$query2 = mysql_query ("SELECT Score FROM training_result WHERE EmpTraining_ID = '$empTraining_id'");
	
	if(mysql_num_rows($query2)>0){
		$score = mysql_result($query2,0, 'Score');
		
	}else{
		$score = "N/A";
	}
	echo "<tr><td>". $result['Apply_Date']."</td> <td>". $result['Title']."</td><td>". $result['Duration']."</td><td>".$result['Trainer']."</td><td>".$score."/100</td></tr>" ;
		
 }

?>


</table>
</div>