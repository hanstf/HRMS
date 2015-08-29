 
     
        <li>
             <?php
			 $file = "picture/".$result['Employees_ID'].".jpg";
			 if (file_exists($file)==true){
				$pict = $result['Employees_ID']; 
			 }else{
				 $pict = "no-pict";
			 }
			 ?>
             <img  src="picture/<?php
			 echo $pict;
			 ?>.jpg" width="76" height="100" >
             
           	
            </li>
            <li><b>Name :</b>       <?php 
                    $name =getuserdetails ($result['Employees_ID'], 'FullName'); 
                      echo $name; 
			?>
   </li>
		
		<li><b>Identification Card:</b>
		<?php
			$IC =getuserdetails($result['Employees_ID'],'Identification_Card');
			echo $IC;
?>

		</li>
		
             
        <li><b>Address :</b>
        <?php
            $address =getuserdetails ($result['Employees_ID'], "Address"); 
                      echo $address;
                      ?>
  </li>
  <li><b>Contact No:</b>
        <?php $contact =getuserdetails ($result['Employees_ID'], "Contact_No"); 
                      echo $contact;?>
           
     </li>
     <li><b>Email :</b>
        <?php
			$email =getuserdetails($result['Employees_ID'],'Email');
			echo $email;
			?>
            
    <li><b>Gender :</b>
        <?php 
			$gender=getuserdetails($result['Employees_ID'],'Gender');
			echo $gender;
			?>
  <li><b>Department :</b>
        <?php
			$depart=getdepartmentname (getdepartmentID($result['Employees_ID']));
			echo $depart;
			?>
   </li>
<?php
$leave= getleaveamount($result['Employees_ID']);

?>
	<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php $leavebar=round(($leave/14)*100); echo $leavebar; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php $leavebar=($leave/14)*100; echo $leavebar; ?>%">
    <?php echo $leave."/14 leaves" ?>
  </div>
</div>
