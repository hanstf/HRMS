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
        <div class="col-lg-5">
        <h1>My Performances</h1>
	
       <?php $userids= $userid; include 'widget/performances.php'; ?>
          </div>
        </div>

      </div>

  

   

  </body>
</html>