<div class="col-lg-6">

<h1>Leave Status</h1>
<?php
$leave= getleaveamount($userid);
if(empty($error)==false){
	$errors = implode (", ", $error);
	echo $errors;	
}
?>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo ($leave/14)*100; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php $leavebar=($leave/14)*100; echo $leavebar; ?>%;">
    <?php echo $leave."/14 leaves" ?>
  </div>
</div>	

<table class="table table-hover">
<tr>
<th>Duration
</th>
<th>Starting Date
</th>
<th>Reason
</th>
<th>Status
</th>
<label><?php 
$query = mysql_query("SELECT * 
FROM employees_leave
INNER JOIN leaves ON leaves.Leaves_ID = employees_leave.Leave_ID
WHERE employees_leave.Employees_ID ='$userid'");

while($result= mysql_fetch_assoc($query)){	
	$empleave_id = $result['EmpLeave_ID'];
	$query2 = mysql_query ("SELECT Approval, Approve_By FROM leave_track WHERE EmpLeave_ID = '$empleave_id'");
	
	if(mysql_num_rows($query2)>0){
		if (mysql_result($query2, 0, 'Approval') == "Approve"){
			$status = "Approve";				
		}else{
			$status = "Not Approve";
		}
	}else{
		$status ="Pending Approval";
	}
	
	echo "<tr><td>". $result['Duration']." Days</td> <td>". $result['Starting_Date']."</td><td>". $result['Reason']."</td><td>".$status."</td></tr>" ;
		
 }

?></label>
</table>
</div>
