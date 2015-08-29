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
          <div class="col-xs-5">
           <?php
	
	if(isset($_GET['id'])== true){
		if ($_GET['id']== "success"){
			echo '<div class="alert alert-success"><p>successfully edit</p></div>';
		}else{
			echo '<div class="alert alert-danger"><p>fail to edit information</p></div>';
		}
		
	}
	
	?>
		
			<form method ="post" action="profile-edit.php">
           
    <h1>My Profile</h1>
    
             
             <table class="table">
             <tr>
	 <td>
             <?php
			 $file = "picture/".$userid.".jpg";
			 if (file_exists($file)==true){
				$pict = $userid; 
			 }else{
				 $pict = "no-pict";
			 }
			 ?>
             <img src="picture/<?php
			 echo $pict;
			 ?>.jpg" width="200" height="300" >
             
           	
            </td>
            </tr>
                 <tr>
             
		
		<th>UserName :</th>
		<td><?php
			$username =Agetuserlogin($userid,'UserName');
			echo $username;
?>
		</td>
		</tr>
        
             <tr>
             
		
		<th>Password :</th>
		<td><?php
			echo "******";
?>
		</td>
		</tr>
             <tr>
             
		
		<th>Employees ID :</th>
		<td><?php
			$ID =getuserdetails($userid,'Employees_ID');
			echo $ID;
?>
		</td>
		</tr>
             

        <tr>
        <th>Name :</th>
        <td><?php 
                    $name =getuserdetails ($userid, 'FullName'); 
                      echo $name; 
			?>
    </td>
    </tr>

<tr>
		
		<th>Identification Card:</th>
		<td><?php
			$IC =getuserdetails($userid,'Identification_Card');
			echo $IC;
?>

		</td>
		</tr>
              
<tr>
        <th>Address :</th>
        <td><?php
            $address =getuserdetails ($userid, "Address"); 
                      echo $address;
                      ?>
    </td>
    </tr>
   
    <tr>
        <th>Contact No:</th>
        <td><?php $contact =getuserdetails ($userid, "Contact_No"); 
                      echo $contact;?>
           
     </td>
    </tr>
   
    <tr>
        <th>Email :</th>
        <td><?php
			$email =getuserdetails($userid,'Email');
			echo $email;
			?>
            
    </td>
    </tr>
 
    <tr>
        <th>Salary :</th> 
        <td><?php $salary =getuserdetails($userid,'Salary');
			echo "RM ".$salary;
			?>
    </td>
    </tr>
    <tr>
        <th>Experience :</th>
        <td><?php
            $exp=getuserdetails($userid,'Experience');
			echo $exp." Years";?>
    </td>
    </tr>
   
    <tr>
        <th>Gender :</th>
        <td><?php 
			$gender=getuserdetails($userid,'Gender');
			echo $gender;
			?>
            
    </td>
    </tr>
   
    <tr>
        <th>Recruitment Date :</th>
        <td><?php
            $recrdate=getuserdetails($userid,'Recruitment_Date');
			echo $recrdate;
			?>
    </td>
    </tr>
  
    <tr>
        <th>Department :</th>
        <td><?php
			$depart=getdepartmentname (getdepartmentID($userid));
			echo $depart;
			?>
   	</td>
    </tr>
    </table>
           
      
      <input type="submit" Value="Edit" class="form-control" name="edite">
	
 
        </form>

		
		

         
           

          </div>
        </div>

      </div>

    </div>

   

  </body>
</html>