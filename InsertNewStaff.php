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
          <h1> Insert New Staff</h1>
          <div class="col-lg-4">
          
	<?php 
	if(isset($_GET['code'])== true){
		if ($_GET['code']== "success"){
			echo '<div class="alert alert-success"><p>successfully added new staff</p></div>';
		}else{
			echo '<div class="alert alert-danger"><p>fail to add new staff</p></div>';
		}
	} 

	?>
        <form method ="post" action="AddStaff2.php" enctype="multipart/form-data">     
       

<div id ="Admineditinfor">
                      
 		<table class="table">
        <tr class="active"><td>Username:
        <input type="Text" required Height="20px" Width="135px" Enabled="True" class ="form-control" name="loginname" value="">
    </td>
    
    <td>
     Password:
        <input type="Password" required Height="20px" Width="135px" Enabled="True" name="loginpass" class ="form-control" value="">
        </td>
    </tr>    
    </table>
         
        
            Name :
        <input type="Text" required Height="20px" Width="135px" Enabled="True" name="Fulname_ad" class ="form-control" value="">
   
        Identification Card :
        <input type="Text" required Height="20px" Width="135px" Enabled="True" name="IC" class ="form-control" value="">
   Address :
        <input type="Text" requiredHeight="20px" Width="135px" 
            Enabled="True" name="Add_ad" class ="form-control" value="">
   Contact No:<input requiredtype="Text" Height="20px" Width="135px" 
            Enabled="True" name="conta_ad" class ="form-control" value="">
   Email :<input required type="email" Height="20px" Width="135px" 
            Enabled="True" name="email_ad" class ="form-control" value="">
            
    Salary :<div class="input-group">
         <span class="input-group-addon">RM</span><input required type="number" Height="20px" class ="form-control" Width="30px" 
            Enabled="True" name="sal_ad" min="0" value=""></div>
  Experience :<div class="input-group">
<input type="number" min="0" required Height="20px" class ="form-control" Width="135px" 
            Enabled="True" name="exp_ad" value="">  <span class="input-group-addon">Years</span></div>
   Recruitment Date :<input required type="Date" Height="20px" Width="135px" 
            Enabled="True" name="recrdate_ad" class ="form-control" value="">
    
    <label for = "Genderlist">Gender :</label>
    <select class="form-control" id = "Genderlist" name="gen" Width="135" >
        	
               <option value = "Male" >Male</option>
               <option value = "Female">Female</option>
        </select>       
            
   
    <label for = "Privileges">Privileges :</label>
    <select class="form-control" id = "Prilist" name="Priv" Width="135" >
        	
               <option value = "admin" >Admin</option>
               <option value = "supervisor">Supervisor</option>
		<option value = "normal">Normal</option>
               </select>

       
    <label for="Departmentlist">Department *:</label>
  <select class="form-control"  id = "Departmentlist" name="department" Width="135">
    
	
		<?php
		$query = mysql_query("SELECT * FROM department ");
		while ($result = mysql_fetch_assoc ($query)){
			echo "<option value = '".$result['Department_ID']."'";
			
			echo " >".$result['Department_Name']."</option>";	
			
		}
			
		?>
        </select>	
        <div class="alert alert-warning"><p>* Ignore that field if your are registering for admin</p></div>
  		
        <br/>
        		
    </div>
   
       <div class="form-group">
    <label for="uploadpict">Upload User picture</label>
    
    <input type='file' name='pict'>
  </div>

     <input type="submit" class ="form-control" Value="Insert" name="edite_ad">
	
 
        </form>
          </div>
        </div>

      </div>

    </div>

   

  </body>