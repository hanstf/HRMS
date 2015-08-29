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

        <div class="row"><?php
        if(isset($_GET['page'])==false){
?>
        <div class="jumbotron">
  <h1>Hello, <?php echo getuserdetails($userid, "FullName"); ?></h1>
  <p>Welcome to XBase HRMS <?php echo $privilege; ?> Control panel Home page</p>
  <p><a class="btn btn-primary btn-lg" href="picture/icon/learn.jpg" role="button">Learn more</a></p>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">News</h3>
  </div>
  <div class="panel-body">
  <ul>
  <li> <p>New Office in damansara launched</p></li>
  <li>  <p>New Training program Launched</p> </li>
  <li><p>Gathering on 17-5-2014</p> </li>
</ul>
  
  
   
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Event</h3>
  </div>
  <div class="panel-body">
 <div class="row">
  <?php include 'widget/slideshow.php' ?>
</div>
</div>
</div>	
<?php }?>
          		<?php
			if(isset($_GET['page'])==true){
				if($_GET['page']=="ApplyLeave"){
					include'widget/apply-leave.php';
				}else if($_GET['page']=="LeaveStatus"){
					 include'widget/leave-status.php';
				}else if($_GET['page']=="ApplyTraining"){
					 include'widget/apply-training.php';
				}else if($_GET['page']=="TrainingStatus"){
					 include'widget/training-status.php';
				}else if($_GET['page']=="TrainingResult"){
					 include'widget/training-result.php';
				}else if($_GET['page']=="ApproveTraining"){
					 include'widget/approve-training.php';
				}else if($_GET['page']=="ApproveLeave"){
					 include'widget/approve-leave.php';
				}else if($_GET['page']=="ViewSupervisee"){
					 include'widget/view-supervisee.php';
				}else if($_GET['page']=="SuperviseeAppraisal"){
					 include'widget/supervisee-appraisal.php';
				}else if($_GET['page']=="SendWarningmerit"){
					 include'widget/SendWarningmerit.php';
				}else if($_GET['page']=="InsertScore"){
					 include'widget/InsertScore.php';
				}else if($_GET['page']=="trainingreport"){
					include'widget/trainingreport.php';
				}else if($_GET['page']=="salaryreport"){
					include'widget/salaryreport.php';
				}else if($_GET['page']=="employeereport"){
					include'widget/employeereport.php';
				}
			}	
		

		?>


         
           

          </div>
        </div>

      </div>

  

   

  </body>
</html>