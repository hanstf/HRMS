<div class="col-lg-5">
<h1>Send Warning or Merit</h1>
<?php 
if (isset($_POST['submit'])==true){
	if($_POST['type']=="warning"){
		$type="warning";
	}else{
		$type="merit";
	}
	$date=date("Y-m-d");
	if(mysql_query("INSERT INTO assessment VALUES ('', '$type', '$_POST[description]', DATE(NOW()))")&& mysql_query("INSERT INTO employees_assessment VALUES ('',LAST_INSERT_ID(),'$_POST[employees]','$userid')")){
		echo '<div class="alert alert-success">Successfully sent warning or merit</div>';		
	}else{
		echo '<div class="alert alert-danger">Failed to send warning/merit</div>';	
	}
		
	
	
}


?>


<form action="" method="POST">
<?php
$depart=getdepartmentID ($userid);
			
$query = mysql_query("SELECT employees.*
FROM employees
LEFT JOIN employees_department ON employees_department.Employees_ID = employees.Employees_ID
WHERE employees.Privilege = 'Normal' AND employees_department.Department_ID= '$depart'");


	echo "<br/><strong >Select Supervisee:</strong><br/><select class='form-control' id = 'employees' name='employees' >";
		while ($result = mysql_fetch_assoc ($query)){
			echo "<option value = '".$result['Employees_ID'] ."'";
		
			echo " >".$result['FullName']." (ID ".$result['Employees_ID'].")</option>";	
	
		}
		
		
	
?>
</select>
<div class="radio">
  <label>
    <input type="radio" name="type" id="warning" value="warning" checked>
   Warning
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="type" id="merit" value="merit">
   Merit
  </label>
</div>Description
<textarea class="form-control" required rows="3" name='description'></textarea>
<br/>
<input type="submit" class="form-control" name="submit" value="submit" >
</form>
</div>