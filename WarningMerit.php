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
        <h1>My Warning Or Merit</h1>
         
         
          <div class="col-xs-3">
        <?php
		$query= mysql_query ("SELECT * FROM assessment INNER JOIN employees_assessment ON assessment.assessment_ID = employees_assessment.assessment_ID WHERE 
employees_assessment.Employees_ID = '$userid'");
		while ($result= mysql_fetch_assoc ($query)){
			if ($result['Assessment_type']== "warning"){
				echo '<div class="alert alert-danger"> Warning: ';		
			}else{
				echo '<div class="alert alert-success"> Merit:';		
			}
				echo "".$result['Description']."</div>";			
		}
		
		
		
		?>
           

          </div>
        </div>

      </div>

    </div>

   

  </body>
</html>