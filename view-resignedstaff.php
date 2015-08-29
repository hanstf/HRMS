<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
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
        <h1>View Staff</h1>
        <div id="col-xs-3">
      
        <?php
				if(isset($_POST['gobtn'])==TRUE){
					if($_POST['searchoption']=="SearchID"){
						
					$query= mysql_query("SELECT *
				FROM employees
				WHERE (  Privilege ='normal' OR Privilege ='supervisor') AND Employees_ID LIKE '%$_POST[search]%' AND Employee_Status='deactive'");

					}else{
						$query= mysql_query("SELECT *
				FROM employees
				WHERE ( Privilege ='normal' OR Privilege ='supervisor' ) AND FullName LIKE '%$_POST[search]%' AND Employee_Status='deactive'");
						
					}
				}else{
					
					$query= mysql_query("SELECT *
FROM employees
WHERE (Privilege ='normal' OR Privilege ='supervisor') AND Employee_Status='deactive' ORDER BY Privilege DESC, Employees_ID ASC");



				}
if(isset($_GET['id'])==false){
	?>  <form method ="post" action="" class="form-inline" role="form">
		<input type="search" name ="search" class="form-control" placeholder="Search">
  		<input type="submit" name="gobtn" id="button" value="GO" class="form-control">
		
        
        
        
        <div class="radio" >
  	<label>
    	<input type="radio" name="searchoption" id="optionsRadios1" value="SearchID" checked>
    Search From ID
  </label>
</div>

<div class="radio">
  <label>
    <input type="radio" name="searchoption" id="optionsRadios2" value="SearchName">
    Search From Name
  </label>
</div>
        
    <?php
	if(mysql_num_rows($query)==0){
		echo '<div class="alert alert-danger"><p>No search result found</p></div>';
	}else{
	echo '

<div class="list-group">';
while($result=mysql_fetch_assoc($query)){
			
			 $file = "picture/".$result['Employees_ID'].".jpg";
			 if (file_exists($file)==true){
				$pict = $result['Employees_ID']; 
			 }else{
				 $pict = "no-pict";
			 } 	  
			 
			echo "<a href='viewresignstaff.php?id=".$result['Employees_ID']."' class='list-group-item'><table class='table'>
			<tr><th colspan='2'>ID : (".$result['Employees_ID'].")</th><th colspan='2'>Privilege: ".$result['Privilege']."</th></tr>
			<tr><td rowspan='3'><img src='picture/".$pict.".jpg'  width='90' height='120' ></td><td>".$result['FullName']."</td><td>Email:".$result['Email']."</td><td>Gender:".$result['Gender']."</td></tr>
			<tr><td>Address:".$result['Address']."</td><td>Salary: RM ".$result['Salary']."</td><td>Recruiment Date:".$result['Recruitment_Date']."</td></tr> 
			<tr><td>Contact No: ".$result['Contact_No']."</td><td>Experience:".$result['Experience']." years</td><td>Department:".getdepartmentname(getdepartmentID($result['Employees_ID']))."</td></tr></table></a>";
			
			}
			echo '</div>';
}
}else{
	?><div id="col-xs-2">

	 <table class="table">
     <tr>
		<th>Employees ID :</th>
		<th><?php
			$ID =getuserdetails($_GET['id'],'Employees_ID');
			echo $ID;
?>
		</th>
        <td>
        <form action='Admin-editStaff.php' method='POST' class="form-inline">
          <input type= 'hidden' name='userid' value='<?php echo $_GET['id']; ?>'>
        </form>
</td>
<td>
<form action='deactive-staff.php' method='POST' class="form-inline">
</form>
 </td>       
        </tr>
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
    
        <td><b>Privilege :</b>
        <?php
			$depart=getuserdetails ($_GET['id'], "Privilege");
			echo $depart;
			?>
   	</td>
    
    </tr>
    
    </table>
    		
			
			<?php 
            $userid= $_GET['id'];
        
        if(getuserdetails ($_GET['id'], "Privilege")=="supervisor"){
            include 'widget/leave-status.php';
        }else{
        $userids= $_GET['id'];
            $userid= $_GET['id'];
            echo '<h2>Appraisals</h2>';
        include 'widget/performances.php';
        echo '<h2>Warning / Merit</h2>';
        $query= mysql_query ("SELECT * FROM assessment WHERE Employees_ID = '$userids'");
            while ($result= mysql_fetch_assoc ($query)){
                if ($result['Assessment_type']== "warning"){
                        echo '<div class="alert alert-danger"> Warning: ';		
                }else{
                    echo '<div class="alert alert-success"> Merit:';		
                }
                echo "".$result['Description']."</div>";			
            }
        
        
        ?>
        
    
    
    <h2>Leave Status</h2>
    
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
    <h2>Training Status</h2>
<table class="table table-hover">
<tr>
<th>Apply Date
</th>
<th>Traing Title
</th>
<th>Duration
</th>
<th>Trainer
</th>
<th>Status
</th>
<th>Result
</th>
</tr>
<?php
$query = mysql_query("SELECT * 
FROM employees_training
INNER JOIN training_programs ON training_programs.Program_ID = employees_training.Program_ID

WHERE employees_training.Employees_ID ='$userid'");
while($result= mysql_fetch_assoc($query)){	
	$empTraining_id = $result['EmpTraining_ID'];
	$query2 = mysql_query ("SELECT Approval, Supervisor_ID FROM training_track WHERE EmpTraining_ID = '$empTraining_id'");
	$query3 = mysql_query ("SELECT Score FROM training_result WHERE EmpTraining_ID = '$empTraining_id'");
	if(mysql_num_rows($query2)>0){
		if (mysql_result($query2, 0, 'Approval') == "Approve"){
			$status = "Approve";				
		}else{
			$status = "Not Approve";
		}
	}else{
		$status ="Pending Approval";
	}
	if(mysql_num_rows($query3)>0){
		$score = mysql_result($query3,0, 'Score');
		
	}else{
		$score = "N/A";
	}
	echo "<tr><td>". $result['Apply_Date']."</td> <td>". $result['Title']."</td><td>". $result['Duration']."</td><td>".$result['Trainer']."</td><td>".$status."</td><td>".$score."/100</td></tr>" ;
		
 }
	}
?>


</table>



    
   
<?php }
	
	
	
	

?>

		
          </div>
        </div>

      </div>

    </div>

   

</body>
</html>