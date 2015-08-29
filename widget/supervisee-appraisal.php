<div class="col-lg-5">
<h1>Supervisee Appraisal</h1>
<?php
if(isset($_GET['code'])=='true'){
if ($_GET['code']=="success"){
	echo '<div class="alert alert-success">Successfully sent appraisal to supervisee</div>';	
}else if ($_GET['code']=="fail"){
	echo '<div class="alert alert-danger">Failed to send appraisal</div>';
	}
}

?>
<?php
//question list
$q=array();
$q[1]= "What is the effort rate for this specific employees within this three month?rate between (1-10)";
$q[2]= "Within this three month, how much is the rate of this employees attending the meeting? rate between (1-10)";
$q[3]= "Based on your opinion, how much does this employee deserve for accomplishing jobs on time and correctly? rate between (1-10)";
$q[4]= "Is this employee willing to cooperate with his/her respective group members and colleague? rate between (1-10)";
$q[5]= "How Is this employee punctuallity? rate between (1-10)";
?>

<form action='appraisal-confirm.php' method='POST' >
<?php
$depart=getdepartmentID ($userid);
$today = date("Y-m-d");		
		$query = mysql_query("
SELECT employees.*
FROM employees
LEFT JOIN employees_appraisals ON employees_appraisals.Employees_ID = employees.Employees_ID 
LEFT JOIN appraisals ON appraisals.Appraisals_ID = employees_appraisals.Appraisals_ID
LEFT JOIN employees_department ON employees_department.Employees_ID = employees.Employees_ID
WHERE (employees_appraisals.Employees_ID IS NULL OR (DATE(NOW())-appraisals.Date_In) > 3 )
AND employees.Privilege = 'Normal' 
AND employees_department.Department_ID= '$depart' 
GROUP BY Employees_ID");

		if (mysql_num_rows($query)>0){
			echo "<br/><strong >Select Supervisee:</strong><br/><select class='form-control' id = 'employees' name='employees' >";
		while ($result = mysql_fetch_assoc ($query)){
			echo "<option value = '".$result['Employees_ID'] ."'";
		
			echo " >".$result['FullName']." (ID ".$result['Employees_ID'].")</option>";	
					}
		echo "</select><br/>";

		for($ques=1;$ques<=5;$ques++){
		echo "<table class='table'><tr><th>".$q[$ques]."</th></tr><tr><td><form role='form'><div class='form-group'><input type='range' required class='form-control' name='".$ques."' value='5' min='1' max='10' ></div></td></tr></table>";
		}
		echo "<input type='submit' class='form-control' name='send' value='submit appraisal' >";
		echo "</form>";
        }else{
echo "<div class='alert alert-info'>No more pending appraisals for this 3 months</div>";			
		}
?>




</form>
</div>