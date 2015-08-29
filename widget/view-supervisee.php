<h1>View Supervisee</h1>


<?php
$query= mysql_query("SELECT employees.*
FROM employees
WHERE employees_ID
IN (

SELECT employees_ID 
FROM employees_department
WHERE Department_ID
IN (

SELECT Department_ID
FROM department
WHERE Supervisor_ID =  '$userid' 
)
) AND Privilege ='normal'AND Employee_Status='active'");
if(isset($_GET['id'])==false){
	echo '<div id="col-xs-3">

<div class="list-group">';
while($result=mysql_fetch_assoc($query)){
			
			 $file = "picture/".$result['Employees_ID'].".jpg";
			 if (file_exists($file)==true){
				$pict = $result['Employees_ID']; 
			 }else{
				 $pict = "no-pict";
			 } 	  
			echo "<a href='main.php?page=ViewSupervisee&id=".$result['Employees_ID']."' class='list-group-item'><table class='table'>
			<tr><th colspan='4'>ID : (".$result['Employees_ID'].")</th>
			<tr><td rowspan='3'><img src='picture/".$pict.".jpg'  width='150' height='150' class='img-thumbnail'></td><td>".$result['FullName']."</td><td>Email:".$result['Email']."</td><td>Gender:".$result['Gender']."</td></tr>
			<tr><td>Address:".$result['Address']."</td><td>Salary: RM ".$result['Salary']."</td><td>Recruiment Date:".$result['Recruitment_Date']."</td></tr> 
			<tr><td>Contact No: ".$result['Contact_No']."</td><td>Experience:".$result['Experience']." years</td><td>Department:".getdepartmentname(getdepartmentID($result['Employees_ID']))."</td></tr></table></a>";
			echo '</div></div>';
}
}else{ ?><div id="col-xs-2">

	 <table class="table">
     <tr>
		<th>Employees ID :</th>
		<td><?php
			$ID =getuserdetails($_GET['id'],'Employees_ID');
			echo $ID;
?>
		</td></tr>
             <tr>
	 <td rowspan= '4'>
             <?php
			 $file = "picture/".$_GET['id'].".jpg";
			 if (file_exists($file)==true){
				$pict = $_GET['id']; 
			 }else{
				 $pict = "no-pict";
			 }
			 ?>
             <img class="img-thumbnail" src="picture/<?php
			 echo $pict;
			 ?>.jpg" width="200" height="300" >
             
           	
            </td>
        <td><b>Name :</b>       <?php 
                    $name =getuserdetails ($_GET['id'], 'FullName'); 
                      echo $name; 
			?>
    </td>
		
		<td><b>Identification Card:</b>
		<?php
			$IC =getuserdetails($_GET['id'],'Identification_Card');
			echo $IC;
?>

		</td>
		
             
        <td><b>Address :</b>
        <?php
            $address =getuserdetails ($_GET['id'], "Address"); 
                      echo $address;
                      ?>
    </td>
    </tr>
   
    <tr>
        <td><b>Contact No:</b>
        <?php $contact =getuserdetails ($_GET['id'], "Contact_No"); 
                      echo $contact;?>
           
     </td>
<td><b>Email :</b>
        <?php
			$email =getuserdetails($_GET['id'],'Email');
			echo $email;
			?>
            
    </td>
  
        <td><b>Salary :</b> RM 
        <?php $salary =getuserdetails($_GET['id'],'Salary');
			echo $salary;
			?>
    </td>
    </tr>
    <tr>
        <td><b>Experience :</b>
        <?php
            $exp=getuserdetails($_GET['id'],'Experience');
			echo $exp;?> Years
    </td>
   
        <td><b>Gender :</b>
        <?php 
			$gender=getuserdetails($_GET['id'],'Gender');
			echo $gender;
			?>
            
    </td>
  
        <td><b>Recruitment Date :</b>
        <?php
            $recrdate=getuserdetails($_GET['id'],'Recruitment_Date');
			echo $recrdate;
			?>
    </td>
    </tr>
  
    <tr>
        <td><b>Department :</b>
        <?php
			$depart=getdepartmentname (getdepartmentID($_GET['id']));
			echo $depart;
			?>
   	</td>
    </tr>
    </table>
	</div>
	<?php $userids= $_GET['id'];
	
	include 'widget/performances.php';
	
	?>
<?php }
	

?>



