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
        <form role="form" method ="post" action="confirm-edit.php">
        
             
 <h1>   Employee Personal Information </h1>
 
<div> <?php
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
           
           	</div>
           
           
              <label for="Username">Username:</label>
		<input type ="Text" height="20px" width="135px"
		enabled="True" id="Ausername"   required class="form-control" name="username" value="<?php
	
			$username =Agetuserlogin($userid,'UserName');
			echo $username;
?>">

  <label for="Password">Password:</label>
		<input type ="Password" height="20px" width="135px"
		enabled="True" id="Auserpass"  required class="form-control" name="userpass" value="<?php
		$userpass =Agetuserlogin($userid,'Password');
			echo $userpass;
		?>">	
       	
 
             <label for="Employees ID">Employees ID:</label>
		<input type ="Text" height="20px" width="135px"
		enabled="True" id="EmplyID" readonly class="form-control" name="empid" value="<?php
		$ID =getuserdetails($userid,'Employees_ID');
		echo $ID;
		?>">		

           
           <label for="Name">Name :</label>
             <input type="Text" Height="20px" Width="135px" 
                   Enabled="True" id="Name" readonly class="form-control" name="Fulname" value="<?php 
                    $name =getuserdetails ($userid, 'FullName'); 
                      echo $name; 
		?>">


	<label for="Identication Number">Identication No :</label>
	<input type="Text' height="20px" readonly width="135px" enabled="True" id="Name" class="form-control" name="ID" value="<?php
	$IC =getuserdetails($userid,'Identification_Card');
	echo $IC;
	?>">
   

 <label for="Address">Address :</label>
 <textarea class="form-control" style="resize:none" name="add" id="Address" Enabled="True" rows="3" required>
 <?php
        $address =getuserdetails ($userid, "Address"); 
                      echo $address;
                      ?>
 </textarea> 
	   



    <label for="Contact">Contact No:</label>
    <input type="text" Height="20px" Width="135px" 
            Enabled="True"  id="Contact" required class="form-control" name="conta" value="<?php 
			$contact =getuserdetails ($userid, "Contact_No"); 
                      echo $contact;?>
            ">
     <label for="Email">Email :</label>
     <input type="email" Height="20px" Width="135px" 
            Enabled="True" id="Email" required  class="form-control" name="email" value="<?php
			$email =getuserdetails($userid,'Email');
			echo $email;
			?>">
            
    <label for="Salary">Salary :</label>
    <input type="Text" Height="20px" Width="135px" 
            Enabled="True" id="Salary" class="form-control" name="sal" readonly value="<?php $salary =getuserdetails($userid,'Salary');
			echo "RM".$salary;
			?>">
    <label for="Experience">Experience :</label>
    <input type="Text" id="Experience" Height="20px" Width="135px" 
            Enabled="True" class="form-control" name="exp" readonly value="<?php
            $exp=getuserdetails($userid,'Experience');
			echo $exp."Years";?>">
            
    <label for = "Genderlist">Gender :</label>
    <select class="form-control" id = "Genderlist" name="gender" >
        	<?php $gender=getuserdetails($userid,'Gender');
				echo $gender;
			?>
               <option value = "Male"  <?php if($gender== "Male"){ echo 'selected'; }?> >Male</option>
               <option value = "Female"  <?php if($gender== "Female"){ echo 'selected'; }?> >Female</option>
               </select>
            
            
    <label for="RecDate">Recruitment Date :</label>
    <input type="Date" Height="20px" Width="135px" 
            Enabled="True" id="RecDate" class="form-control" name="recrdate" readonly value="<?php
            $recrdate=getuserdetails($userid,'Recruitment_Date');
			echo $recrdate;
			?>">
            
    <fieldset disabled>
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
        </fieldset>
   	<label for ="submit"></label>
     <input type="submit" id="submit" Value="Confirm" class="form-control" name="confirmbtn">
        </form>  

          </div>
        </div>

      </div>

    </div>

   

  </body>
</html>