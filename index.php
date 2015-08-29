<?php require 'core/init.php' ?>
    

<div class="container">
  <form class="form-signin" method="POST" action="">
  <?php
if (empty($_POST)==false){
	$username=$_POST['username'];	
	$password=$_POST['password'];
	if(checkuserexist($username)==false){
		$error[]='Username not exist';
	}
	$user =checkpassword($username, $password);
	if($user==false){
		$error[]='Wrong Password';	
	}else{
		$_SESSION['id']=$user;
		header('Location:main.php');
		exit();
	}
	$warning = implode('<br/>', $error);
	echo '<div class="alert alert-danger"><p>';echo $warning; echo '</p></div>'; 
}

?>	       
      <h1 class="form-signin-heading">XBase HRMS Login</h1>
      <input type="text" class="form-control" name="username" placeholder="username" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>     
      
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="LogIn" value="Log In" />   
    </form>
    </div>
    
