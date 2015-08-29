<div class="col-lg-3">

<form action="" method="POST">
<h1>Apply Leave</h1>
<?php
$leave= getleaveamount($userid);
if(empty($error)==false){
	$errors = implode (", ", $error);
	echo '<div class="alert alert-danger">'.$errors.'</div>';	
}


?>


<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php $leavebar=round(($leave/14)*100); echo $leavebar; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php $leavebar=($leave/14)*100; echo $leavebar; ?>%">
    <?php echo $leave."/14 leaves" ?>
  </div>
</div>
<?php
if(isset($_POST['send'])== TRUE){
	if($_POST['Duration'] >= $leave) {
		echo '<div class="alert alert-danger">Duration can not be bigger than the total leave available</div>';
	}else{
		if ($_POST['Starting_Date']> date("Y-m-d")){
	if (mysql_query("INSERT INTO leaves VALUES ('', '$_POST[Duration]', '$_POST[Starting_Date]', '$_POST[Reason]')")&& mysql_query("INSERT INTO employees_leave VALUES ('',LAST_INSERT_ID(),'$userid')")){
		echo'<script> window.location="main.php?page=LeaveStatus"; </script> ';
	}else{
		echo 'not success';	
	}
		}else{
			echo '<div class="alert alert-danger">Date should be today or above</div>';
			
		}	
	}
}
?>
<form role="form">
<label for="Duration">Duration</label>
<div class="input-group">

<input type="number"  min="1" name="Duration" id="Duration" class="form-control" required/>

<span class="input-group-addon">Days</span>
</div>
<div class="input-group">
<label for="Starting_Date">Starting Date</label>
<input type="date" name="Starting_Date" id="Starting_Date" class="form-control" required/>
</div>
<div class="input-group">
<label for="Reason">Reason</label>
<textarea class="form-control" name="Reason" id="Reason" rows="3" required></textarea>
</div>
<br/>
<div class="col-xs-6">
<input type="submit" name="send" id="send" value="send" class="form-control"/</td>
</div>

</form>


</div>