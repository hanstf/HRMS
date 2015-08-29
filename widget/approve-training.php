
<div id="col-lg-2">
<h1>Approve Training</h1>
<table class="table table-hover">
<tr>
<th>
Employee ID
</th>
<th>
Title
</th>
<th>
Total Joined/quota
</th>
<th>
Duration
</th>
<th>
Trainer
</th>
<th>Status</th>
</tr>
<?php
if (getuserdetails ($userid, 'Privilege')=="supervisor"){
$query = mysql_query ("SELECT * 
FROM employees_training
WHERE Employees_ID
IN (

SELECT Employees_ID
FROM employees_department
WHERE Department_ID	
IN (

SELECT Department_ID
FROM department
WHERE Supervisor_ID =  '$userid'
)
)
AND Employees_ID
IN (

SELECT Employees_ID
FROM employees
WHERE Privilege =  'normal'
)");
}else{
	$query = mysql_query ("SELECT * 
FROM employees_training
WHERE Employees_ID
IN (

SELECT Employees_ID
FROM employees 
WHERE Privilege= 'supervisor'
)");

}
while ($result = mysql_fetch_assoc($query)){
	$query2 = mysql_query ("SELECT Approval,Supervisor_ID  FROM training_track WHERE EmpTraining_ID = '$result[EmpTraining_ID]'");
	if(mysql_num_rows($query2) == 0){
		$approval = "<form action='approving-training.php' method='POST' ><input type='submit' name='approve' value='approve'><input type='submit' name='approve' value='not-approve'><input type='hidden' name ='id' value=".$result['EmpTraining_ID']."></form>";
	}else{
		if(mysql_result($query2,0, "Approval")=="Approve"){
			
			$approval="Approved";
		}else{
			$approval = "Not Approve";
		}
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
