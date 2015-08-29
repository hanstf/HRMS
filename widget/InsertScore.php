
<div id="col-lg-2">
<h1>Insert Training Score</h1>
<table class="table table-hover">
<tr>
<th>
Employee ID
</th>
<th>
Title
</th>
<th>
empty slot/quota
</th>
<th>
Duration
</th>
<th>
Trainer
</th>
<th>
Score
</th>
</tr>
<?php

	$query = mysql_query ("SELECT * 
FROM employees_training
WHERE Employees_ID
IN (

SELECT Employees_ID
FROM employees 
) AND EmpTraining_ID IN(SELECT EmpTraining_ID FROM training_track WHERE Approval='Approve')");


while ($result = mysql_fetch_assoc($query)){
	$query2 = mysql_query ("SELECT Score FROM training_result WHERE EmpTraining_ID = '$result[EmpTraining_ID]'");
	if(mysql_num_rows($query2) == 0){
		$approval = "<form action='approving-Score.php' method='POST' ><input type='number' min=0 max=100 name='score' ><input type='submit' name='insert' value='insert'><input type='hidden' name ='id' value=".$result['EmpTraining_ID']."></form>";
	}else{
			$approval=mysql_result($query2,0,"Score");	
	}
	echo "<tr><td><ul class='nav navbar-nav navbar-left navbar-user'>
            <li class='dropdown alerts-dropdown'>
			<a href='#' class='dropdown-toggle' data-toggle='dropdown'> ".$result['Employees_ID']."<b class='caret'></b></a>	
				<ul class='dropdown-menu'>
			   ";
			   include 'user-status.php';
			   include 'result-status.php';
			    echo"</ul></td><td>".getTrainingDetails ($result['Program_ID'], 'Title')."</td><td>".getTrainingDetails ($result['Program_ID'], 'Total_Joined')."/".getTrainingDetails ($result['Program_ID'], 'Quota')."</td><td>".getTrainingDetails ($result['Program_ID'], 'Duration')."</td><td>".getTrainingDetails ($result['Program_ID'], 'Trainer')."</td><td>".$approval."</td></tr>";
		
}


?>

</table>
</div>
