<?php
function sanitize($username){
	$usernew=mysql_real_escape_string($username);
	return $usernew;	
	
}

?>