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
                  <div class="col-xs-4">

            <?php
	
	if(isset($_GET['id'])== true){
		if ($_GET['id']== "success"){
			echo '<div class="alert alert-success"><p>successfully edit</p></div>';
		}else{
			echo '<div class="alert alert-danger"><p>fail to edit information</p></div>';
		}
		
	}
	
	?>
        <form role="form" method ="post" action="Admin-confirmedit.php" enctype="multipart/form-data">
        
             
 <h1>   Employee Personal Information </h1>
 
<div> <?php
			$userid= $_POST['userid'];
			 $file = "picture/".$userid.".jpg";
			 if (file_exists($file)==true){
				$pict = $userid; 
			 }else{
				 $pict = "no-pict";
			 }
			 ?>
             <img src="picture/<?php
			 echo $pict;
			 ?>.jpg"  width="150" height="150" class="img-thumbnail">
            <input type="file" name="picts">
           	</div>
          
          <label for="Username">Username:</label>
		<input type ="Text" height="20px" width="135px"
		enabled="True" id="Ausername" required class="form-control" name="Ausername" value="<?php
		$ID =Agetuserlogin($userid,'UserName');
		echo $ID;
		?>">		

  <label for="Password">Password:</label>
		<input type ="Password" height="20px" width="135px"
		enabled="True" id="Ausername" required class="form-control" name="Auserpass" value="<?php
		$ID =Agetuserlogin($userid,'Password');
		echo $ID;
		?>">		

             <label for="Employees ID">Employees ID:</label>
		<input type ="Text" height="20px" width="135px"
		enabled="True" id="EmplyID" readonly class="form-control" name="empid" value="<?php
		$ID =getuserdetails($userid,'Employees_ID');
		echo $ID;
		?>">		

           
           <label for="Name">Name :</label>
             <input type="Text" Height="20px" Width="135px" 
                   Enabled="True" required id="Name"  class="form-control" name="Fullname" value="<?php 
                    $name =getuserdetails ($userid, 'FullName'); 
                      echo $name; 
		?>">


	<label for="Identication Number">Identication No :</label>
	<input type="Text" height="20px"  required width="135px" enabled="True" id="Name" class="form-control" name="ID" value="<?php
	$IC =getuserdetails($userid,'Identification_Card');
	echo $IC;
	?>">
   

 <label for="Address">Address :</label>

	 <textarea class="form-control" style="resize:none" name="add" id="Address" Enabled="True" rows="3" required><?php $address =getuserdetails ($userid, "Address"); 
 echo $address;
 ?></textarea> 
 
    <label for="Contact">Contact No:</label>
    <input type="Text" Height="20px" required Width="135px" 
            Enabled="True"  id="Contact" class="form-control" name="conta" value="<?php $contact =getuserdetails ($userid, "Contact_No"); 
                      echo $contact;?>
            ">
     <label for="Email">Email :</label>
     <input type="email" required Height="20px" Width="135px" 
            Enabled="True" id="Email" class="form-control" name="email" value="<?php
			$email =getuserdetails($userid,'Email');
			echo $email;
			?>">
            
     Salary :<div class="input-group">
         <span class="input-group-addon">RM</span><input type="number" required Height="20px" class ="form-control" Width="30px" 
            Enabled="True" name="sal_ad" min="0" value="<?php 
			$salary =getuserdetails($userid,'Salary');
			echo $salary;
			?>"></div>
            
            
   Experience :<div class="input-group"> 
   
<input type="number" min="0" Height="20px" class ="form-control" Width="135px" 
            Enabled="True" name="exp_ad" required value="<?php
            $exp=getuserdetails($userid,'Experience');
			echo $exp;?>"> 
            <span class="input-group-addon">Years</span>
          </div> 
   
            
            
   Recruitment Date :<input type="Date" required Height="20px" Width="135px" 
            Enabled="True" name="recrdate_ad" class ="form-control" value="<?php 
			$recrdate=getuserdetails($userid,'Recruitment_Date');
			echo $recrdate;
			?>">
           
            
                     
    <label for = "Genderlist">Gender :</label>
    <select class="form-control" id = "Genderlist" name="gender" >
        	<?php $gender=getuserdetails($userid,'Gender');
				echo $gender;
			?>
               <option value = "Male"  <?php if($gender== "Male"){ echo 'selected'; }?> >Male</option>
               <option value = "Female"  <?php if($gender== "Female"){ echo 'selected'; }?> >Female</option>
               </select>
            
    
    <label for="Departmentlist">Department :</label>
    <select class="form-control"  id = "Departmentlist" name="department" >
		<?php
		$depart=getdepartmentID($userid);
			echo $depart;
		$query = mysql_query("SELECT * FROM department ");
		while ($result = mysql_fetch_assoc ($query)){
			echo "<option value = '".$result['Department_ID']."'";
			if ($depart == $result['Department_ID']){
				echo "selected";	
			}
			echo " >".$result['Department_Name']."</option>";	
			
		}
			
		?>
        </select>
        
         <label for = "Privileges">Privileges :</label>
    <select class="form-control" id = "Prilist" name="Priv" Width="135" >
        	<?php $Privilege=getuserdetails($userid,"Privilege");
				echo $Privilege;
			?>
               <option value = "admin"  <?php if($Privilege== "admin"){ echo 'selected'; }?> >admin</option>
               <option value = "supervisor" <?php if($Privilege== "supervisor"){ echo 'selected'; }?> >supervisor</option>
		<option value = "normal" <?php if($Privilege== "normal"){ echo 'selected'; }?> >normal</option>
               </select>
</td>
</tr>

	<input type="hidden" name="employee_id" value="<?php echo getuserdetails($userid,'Employees_ID'); ?>" >
     <label for ="submit"></label>
     <input type="submit" id="submit" Value="Confirm" class="form-control" name="confirm">
        </form>  

          </div>
        </div>

      </div>

    </div>

   

  </body>
</html>


 