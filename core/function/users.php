<?php
function checkuserexist ($username){
	sanitize($username);
	$query= mysql_query("SELECT COUNT(UserName) FROM login WHERE UserName='$username'");
	if(mysql_result($query,0)>0){
		return true;
	}else{
		return false;
	}
}	

function checkpassword ($username, $password){
	sanitize($username);
	sanitize($password);
	$query=mysql_query("SELECT Employee_ID FROM login WHERE UserName='$username' AND Password='$password'");

	if(mysql_num_rows($query)===0){
			return false;
	}else{
		$empID = mysql_result($query,0,'Employee_ID');
		return $empID;
		
		}
}

//gab
function getuserdetails ($id, $parameter){
	//$id =sanitize($id);
	//$parameter = sanitize($parameter);
	
    $query= mysql_query("SELECT * FROM employees WHERE Employees_ID='$id'");
    $result = mysql_result($query,0, $parameter);
    return $result;
        
}



function Agetuserlogin($id,$parameter){
	$query= mysql_query("SELECT * FROM login WHERE Employee_ID ='$id'");
	$result = mysql_result($query,0, $parameter);
	return $result;
}


function Agetuserdetails( $Asearch,$parameter){
	$query=mysql_query("SELECT * FROM employees WHERE Employees_ID ='$Asearch'");
	$result =mysql_result($query,0,$parameter);
	return $result;
}



function checkprivilege ($id){
	$query = mysql_query("SELECT Privilege FROM employees WHERE Employees_ID='$id'");
	$result = mysql_result($query, 0, "Privilege");
	return $result;
}

function getdepartmentname ($id){
	
	$query= mysql_query("SELECT Department_Name FROM department WHERE Department_ID='$id'");
	
	$result =mysql_result($query, 0);
	return $result;
}

function getdepartmentID ($id){
	$query = mysql_query("SELECT Department_ID FROM employees_department WHERE Employees_ID = '$id' ");
	$result = mysql_result($query, 0);
	return $result;
}

function AgetdepartmentID ($Asearch){
	$query = mysql_query("SELECT Department_ID FROM employees_department WHERE Employees_ID = '$id' ");
	$result = mysql_result($query, 0);
	return $result;
}

function getleaveamount ($id){
	$query= mysql_query("SELECT Leave_Amount FROM Performances WHERE Employees_ID ='$id'");
	$result = mysql_result($query, 0);
	return $result;

	
	
}
function createNewLeave ($id, $duration, $startingDate, $reason){
	mysql_query("
	INSERT INTO leaves VALUES ('', '$duration', '$startingDate', '$reason');
	INSERT INTO employees_leave VALUES ('',LAST_INSERT_ID(),'$id');
	");
}

function getPendingLeave ($id){
	$query = mysql_query("SELECT * 
FROM employees_leave
INNER JOIN leaves ON leaves.Leaves_ID = employees_leave.Leave_ID
WHERE employees_leave.Employees_ID ='$id'");
	$result = mysql_fetch_assoc ($query);
	return $result;
}

function getLeaveDetails ($person, $criteria){
	$query = mysql_query("SELECT * FROM leaves WHERE Leaves_ID = '$person'");
	$result= mysql_result($query,0, $criteria);
	return $result;

}

function getTrainingDetails ($person, $criteria){
	$query = mysql_query("SELECT * FROM training_programs WHERE Program_ID = '$person'");
	$result= mysql_result($query,0, $criteria);
	return $result;

}
function trainingAttended($userid){
	$query=mysql_query("SELECT * FROM training_track INNER JOIN employees_training ON employees_training.EmpTraining_ID = training_track.EmpTraining_ID WHERE employees_training.Employees_ID = '$userid' AND training_track.Approval='Approve'");
	$result = mysql_num_rows ($query);
	
	return $result;
}

function warningamount($userid){
	$query=mysql_query("SELECT * FROM assessment INNER JOIN employees_assessment ON assessment.assessment_ID = employees_assessment.assessment_ID WHERE employees_assessment.Employees_ID = '$userid' AND assessment.Assessment_type='Warning'");
	$result = mysql_num_rows ($query);
	
	return $result;
	
	
}
function meritAmount($userid){
	$query=mysql_query("SELECT * FROM assessment INNER JOIN employees_assessment ON assessment.assessment_ID = employees_assessment.assessment_ID WHERE employees_assessment.Employees_ID = '$userid' AND assessment.Assessment_type='Merit'");
	$result = mysql_num_rows ($query);
	
	return $result;
}

function trainingPassed($userid){
	$query =mysql_query ("SELECT * FROM training_result INNER JOIN employees_training ON employees_training.EmpTraining_ID = training_result.EmpTraining_ID WHERE employees_training.Employees_ID = '$userid' AND training_result.Score>=50");
	$result =mysql_num_rows ($query);
	return $result;	
	
	
}

function trainingFailed($userid){
	$query =mysql_query ("SELECT * FROM training_result INNER JOIN employees_training ON employees_training.EmpTraining_ID = training_result.EmpTraining_ID WHERE employees_training.Employees_ID = '$userid' AND training_result.Score<50");
	$result =mysql_num_rows ($query);
	return $result;	
	
	
}
function calculateKPI($userid){
	
	
	
	
}
?>


