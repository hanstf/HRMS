<div id="col-md-4">
<h1>Training Report</h1>

<form action="trainingreportpdf.php" method="post">
<table class="table">
<?php
$query=mysql_query("SELECT* FROM department");
if($privilege=='admin'){
	echo'<tr><td>Department:</td><td> <select  name="department" class="form-control" placeholder="col-md-4">';
while($result=mysql_fetch_assoc($query)){
	echo '<option value="'.$result['Department_ID'].'" >'.$result['Department_Name'].'</option>';
}
echo '</select></td></tr>';

}else{
	echo '<input type="hidden" name="department" value="'.getdepartmentID($_SESSION['id']).'">';	
}

?>
<tr><td>Month:</td><td><input type="month" required name="month" class="form-control" placeholder="col-md-4"></td></tr>
<tr><td>Sort From:</td><td><select name="sort" class="form-control" placeholder="col-md-4">
<option value="training-ascending" >Training name Ascending</option>
<option value="training-descending" >Training name Descending</option>
<option value="most-people">Most people joined</option>
<option value="least-people">Least people joined</option>
</select>
</td></tr>
</table>
  <div class="col-xs-2">
<input type="submit" name="generate" value="generate" placeholder="col-xs-2" class="form-control">
</div>
</form>

</div>