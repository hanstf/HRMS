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
          <div class="col-xs-3">
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
           
    <h1>Employees Profile</h1>
    
             
             <table class="table">
             <tr>
	 <td>
             <?php
			 $file = "picture/".$Asearch.".jpg";
			 if (file_exists($file)==true){
				$pict = $Asearch; 
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
		     
             <th>User Name :</th>
		<td><?php
			$username =Agetuserlogindetail($login,'UserName');
			echo $username;
?>
		
		</td>
		</tr>
             <th>Password :</th> 
             <td><?php
		
			$userpass =Agetuserlogindetail($login,'Password');
			echo $userpass;
			?>
            </td>
		
        </tr>
        <th>Employees ID :</th>
		<td><?php
			$ID =Agetuserdetails($Asearch,'Employees_ID');
			echo $ID;
?>
		</td>
		</tr>
         

        <tr>
        <th>Name :</th>
        <td><?php 
                    $name =Agetuserdetails ($Asearch, 'FullName'); 
                      echo $name; 
			?>
    </td>
    </tr>

<tr>
		
		<th>Identification Card:</th>
		<td><?php
			$IC =Agetuserdetails($Asearch,'Identification_Card');
			echo $IC;
?>

		</td>
		</tr>
              
<tr>
        <th>Address :</th>
        <td><?php
            $address =Agetuserdetails($Asearch, "Address"); 
                      echo $address;
                      ?>
    </td>
    </tr>
   
    <tr>
        <th>Contact No:</th>
        <td><?php $contact =Agetuserdetails ($Asearch, "Contact_No"); 
                      echo $contact;?>
           
     </td>
    </tr>
   
    <tr>
        <th>Email :</th>
        <td><?php
			$email =Agetuserdetails($Asearch,'Email');
			echo $email;
			?>
            
    </td>
    </tr>
 
    <tr>
        <th>Salary :</th> 
        <td><?php $salary =Agetuserdetails($Asearch,'Salary');
			echo $salary;
			?>
    </td>
    </tr>
    <tr>
        <th>Experience :</th>
        <td><?php
            $exp=Agetuserdetails($Asearch,'Experience');
			echo $exp;?>
    </td>
    </tr>
   
    <tr>
        <th>Gender :</th>
        <td><?php 
			$gender=Agetuserdetails($Asearch,'Gender');
			echo $gender;
			?>
            
    </td>
    </tr>
   
    <tr>
        <th>Recruitment Date :</th>
        <td><?php
            $recrdate=Agetuserdetails($Asearch,'Recruitment_Date');
			echo $recrdate;
			?>
    </td>
    </tr>
  
    <tr>
        <th>Department :</th>
        <td><?php
			$depart=getdepartmentname (AgetdepartmentID ($Asearch));
			echo $depart;
			
			?>
            
                 <th>Privilege:</th>
        <td><?php
			$pri=Agetuserdetails($Asearch,'Privilege');
			echo $recrdate;
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