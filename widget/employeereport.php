<div id="col-md-4">
<h1>Employee Distribution Report</h1>
<table>
<form action="employeereportpdf.php" method="post">
<tr><td>Sort From:</td><td><select name="sort" class="form-control" placeholder="col-md-4">
<option value="department-ascending" >Department name Ascending</option>
<option value="department-descending" >Department name Descending</option>
<option value="most-male">Most male joined</option>
<option value="least-male">Least male joined</option>
<option value="most-female">Most female joined</option>
<option value="least-female">Least female joined</option>
</select>
</td></tr>
</table><br>


 <div class="col-xs-2">
<input type="submit" name="generate" value="generate" placeholder="col-xs-2" class="form-control">
</div>
</form>

</div>