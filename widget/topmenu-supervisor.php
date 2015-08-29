<ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src='<?php
			 $file = "picture/".$userid.".jpg";
			 if (file_exists($file)==true){
				$pict = $userid; 
			 }else{
				 $pict = "no-pict";
			 }
			 echo "picture/".$pict.".jpg";

			
			 ?>'  width="30px" height="30px"  class="img-circle">
 <?php echo getuserdetails($userid, "FullName");  ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
