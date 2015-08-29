<?php
require('fpdf/fpdf.php');
require('core/init.php');
class PDF extends FPDF
{
	function Header()
{
    
    $this->Image('picture/logo.jpg',10,6,60);
   
    $this->SetFont('arial','B',13);
   
    $this->Cell(150);
    
    $this->Cell(18,5,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	 $this->Ln(8);
	$this->Cell(150);
    $this->Cell(26,5,'Date '.date("d/m/Y").'',0,0,'C');
		$this->Ln(8);
	$this->Cell(150);
    $this->Cell(41,5,'Report Number: '.rand(11111,99999).'',0,0,'C');
    $this->Ln(15);
	$this->SetFont('arial','B',15);
	$this->Cell(0,14,'Employee Salary Report',0,1,'C');

	$this->Ln(11);
}
function Footer()
{
 
    $this->SetY(-15);
  
    $this->SetFont('Arial','',10);
  
    $this->Cell(0,10,'Printed On '.date("d/m/Y").' By '.getuserdetails ($_SESSION['id'], "FullName").'',0,0,'R');
}
}
ob_start();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','',12);

$top= array('Number','Department Name', 'Avg. Salary(RM)','Total Salary(RM)');
foreach($top as $col){
	$pdf->Cell(40,7,$col,0);	
}
$pdf->Ln(11);
if($_POST['sort']=="department-ascending"){
$query= mysql_query("SELECT AVG(employees.Salary) AS Average, SUM(employees.Salary) AS Total, employees_department.Department_ID AS Current_Department
FROM employees_department  INNER JOIN employees ON employees_department.Employees_ID = employees.Employees_ID 
GROUP BY employees_department.Department_ID
ORDER BY employees_department.Department_ID ASC
");
}else if($_POST['sort']=="department-descending"){
$query= mysql_query("SELECT AVG(employees.Salary) AS Average, SUM(employees.Salary) AS Total, employees_department.Department_ID AS Current_Department
FROM employees_department  INNER JOIN employees ON employees_department.Employees_ID = employees.Employees_ID 
GROUP BY employees_department.Department_ID
ORDER BY employees_department.Department_ID DESC");	
}else if($_POST['sort']=="most-salary"){
$query= mysql_query("SELECT AVG(employees.Salary) AS Average, SUM(employees.Salary) AS Total, employees_department.Department_ID AS Current_Department
FROM employees_department  INNER JOIN employees ON employees_department.Employees_ID = employees.Employees_ID 
GROUP BY employees_department.Department_ID
ORDER BY average DESC");	
}else if($_POST['sort']=="least-salary"){
$query= mysql_query("SELECT AVG(employees.Salary) AS Average, SUM(employees.Salary) AS Total, employees_department.Department_ID AS Current_Department
FROM employees_department  INNER JOIN employees ON employees_department.Employees_ID = employees.Employees_ID 
GROUP BY employees_department.Department_ID
ORDER BY average ASC");	
}else{
$query= mysql_query("SELECT AVG(employees.Salary) AS Average, SUM(employees.Salary) AS Total, employees_department.Department_ID AS Current_Department
FROM employees_department  INNER JOIN employees ON employees_department.Employees_ID = employees.Employees_ID 
GROUP BY employees_department.Department_ID");		
}

$x=1;
$average=0;
$total=0;
while($result = mysql_fetch_assoc($query)){
	$pdf->Cell(40,7,$x,0);
	$pdf->Cell(40,7,getdepartmentname($result['Current_Department']),0);	
	$pdf->Cell(40,7,$result['Average'],0);	
	$pdf->Cell(40,7,$result['Total'],0);
	$pdf->Ln(11);	
	$x++;
	$average= $average+$result['Average'];
	$total= $total+$result['Total'];
}
$pdf->Ln(6);
	$pdf->Cell(40);
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(40,7,"Total ",0);
	$pdf->Cell(40,7,$average,0);
	$pdf->Cell(40,7,$total,0);
$pdf->Output();
ob_end_flush(); 
?>