  <table>
		 <?php
		$query=mysql_query("SELECT * FROM appraisals INNER JOIN employees_appraisals ON appraisals.Appraisals_ID = employees_appraisals.Appraisals_ID WHERE employees_appraisals.Employees_ID='$userids' ORDER BY appraisals.Date_in DESC");
		
		$amount= mysql_num_rows($query);
		$leave= getleaveamount($userids);
		if(empty($amount)==true){
			echo '<tr><th>No appraisal yet</th></tr>';
			echo '<tr><td>    <br/>             </td></tr>';
			$Q1=0;
			$Q2=0;
			$Q3=0;
			$Q4=0;
			$Q5=0;
		}else{
			$result=mysql_result($query, 0);
			$Q1= mysql_result($query, 0, "Q1")*10;
		$Q2=mysql_result($query, 0, "Q2")*10;

		$Q3=mysql_result($query, 0, "Q3")*10;

		$Q4=mysql_result($query, 0, "Q4")*10;

		$Q5=mysql_result($query, 0, "Q5")*10;
		echo '<tr><th>Effort Rate</th></tr><tr><td><div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$Q1.'%">'.mysql_result($query, 0, "Q1").'/10
  </div>
</div>
</td><tr>';
echo '<tr><th>Meeting Attendance Rate</th></tr><tr><td><div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$Q2.'%">'.mysql_result($query, 0, "Q2").'/10
  </div>
</div>
</td><tr>';
echo '<tr><th>Workdone Attendance Rate</th></tr><tr><td><div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$Q3.'%">'.mysql_result($query, 0, "Q3").'/10
  </div>
</div>
</td><tr>';
echo '<tr><th>Teamwork Rate</th></tr><tr><td><div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$Q4.'%">'.mysql_result($query, 0, "Q4").'/10
  </div>
</div>
</td><tr>';		
echo '<tr><th>Punctiality Rate</th></tr><tr><td><div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$Q5.'%">'.mysql_result($query, 0, "Q5").'/10
  </div>
</div>
</td><tr>';		
		}
		?>
        <tr><th>Leave Amount</th></tr><tr><td>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php $leavebar=round(($leave/14)*100); echo $leavebar; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php $leavebar=($leave/14)*100; echo $leavebar; ?>%">
    <?php echo $leave."/14 leaves" ?>
  </div>
</div>
</td></tr>

<tr><th>Training Attended</th><td><?php echo trainingAttended($userids); ?></td></tr>
<tr><th>Training Failed</th><td><?php echo trainingFailed($userids); ?></td></tr>
<tr><th>Training Passed</th><td><?php echo trainingPassed($userids); ?></td></tr>
<tr><th>Warning Amount</th><td><?php echo warningAmount($userids); ?></td></tr>
<tr><th>Merit Amount</th><td><?php echo meritAmount($userids); ?></td></tr>
<tr><th>KPI</th><td><?php echo ($Q1+$Q2+$Q3+$Q4+$Q5)/50 ?></td></tr>

         
           
</table>