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
          <h1> Approve supervisor leave</h1>
          <div class="col-lg-4">
          


<table class="table table-hover"><tr>
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
</td>
</tr>
<?php
$query = mysql_query ("SELECT * 
FROM employees_leave
WHERE Employees_ID
IN (

SELECT Employees_ID
FROM employees 
WHERE Privilege= 'supervisor'
)");
while ($result = mysql_fetch_assoc($query)){
	$query2 = mysql_query ("SELECT Approval,Approve_By  FROM leave_track WHERE EmpLeave_ID = '$result[EmpLeave_ID]'");
	if(mysql_num_rows($query2) == 0){
		$approval = "<form action='approving-leave.php' method='POST' ><input type='submit' name='approve' value='approve'><input type='submit' name='approve' value='not-approve'><input type='hidden' name ='id' value=".$result['EmpLeave_ID']."></form>";
	}else{
		if(mysql_result($query2,0, "Approval")=="Approve"){
			
			$approval="Approved";
		}else{
			$approval = "Not Approve";
		}
	}
	echo "<tr><td>".$result['Employees_ID']."</td><td>".getLeaveDetails( $result['Leave_ID'], "Duration")."</td><td>".getLeaveDetails($result['Leave_ID'], "Starting_Date")."</td><td>".getLeaveDetails($result['Leave_ID'], "Reason")."</td><td>".$approval."</td></tr>";
		
}


?>

</table>
</div>

	
          </div>
        </div>

      </div>

    </div>

   

  </body>