

<div id="col-lg-3">
<h1>Approve Leave</h1>
<table class="table table-hover">
<tr>
<th>
Employee ID
</th>
<th>
Duration
</th>
<th>
Starting Date
</th>
<th>
Reason
</th>
<th>
Approval
</th>
</tr>

<?php
if (getuserdetails ($userid, 'Privilege')=="supervisor"){
$query = mysql_query ("SELECT * 
FROM employees_leave
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
FROM employees_leave
WHERE Employees_ID
IN (

SELECT Employees_ID
FROM employees 
WHERE Privilege= 'supervisor'
)");
	
	
}
while ($result = mysql_fetch_assoc($query)){
	$query2 = mysql_query ("SELECT Approval,Approve_By  FROM leave_track WHERE EmpLeave_ID = '$result[EmpLeave_ID]'");
	if(mysql_num_rows($query2) == 0){
		if(getLeaveDetails( $result['Leave_ID'], "Duration")>getleaveamount($result['Employees_ID'])){
					$approval = "<form action='approving-leave.php' method='POST' ><input type='submit' name='approve' value='not-approve'><input type='hidden' name ='id' value=".$result['EmpLeave_ID']."></form>";

		}else{
		$approval = "<form action='approving-leave.php' method='POST' ><input type='submit' name='approve' value='approve'><input type='submit' name='approve' value='not-approve'><input type='hidden' name ='id' value=".$result['EmpLeave_ID']."></form>";
		}
	}else{
		if(mysql_result($query2,0, "Approval")=="Approve"){
			
			$approval="Approved";
		}else{
			$approval = "Not Approve";
		}
	}
	echo "<tr><td>
				<ul class='nav navbar-nav navbar-left navbar-user'>
            <li class='dropdown alerts-dropdown'>
			<a href='#' class='dropdown-toggle' data-toggle='dropdown'> ".$result['Employees_ID']."<b class='caret'></b></a>	
				<ul class='dropdown-menu'>
			   ";
			   include 'user-status.php';
			    echo"</ul>
            </li></ul></td><td>".getLeaveDetails( $result['Leave_ID'], "Duration")."</td><td>".getLeaveDetails($result['Leave_ID'], "Starting_Date")."</td><td>".getLeaveDetails($result['Leave_ID'], "Reason")."</td><td>".$approval."</td></tr>";
		
}


?>

</table>
</div>
