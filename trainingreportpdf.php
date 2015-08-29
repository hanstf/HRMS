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
	$this->Cell(0,14,'Employee Training Report',0,1,'C');
	$this->Cell(0,4,getdepartmentname($_POST['department']),0,1,'C');
	$this->Cell(0,15,'Month of '.date('F/Y',strtotime($_POST['month'])).'',0,1,'C');
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

$top= array('Number','Program Name', 'No. of People');
foreach($top as $col){
	$pdf->Cell(40,7,$col,0);	
}
$pdf->Ln(11);
if($_POST['sort']=="training-ascending"){
$query= mysql_query("SELECT Count(employees_training.Employees_ID) As amount , employees_training.Program_ID FROM employees_training 
INNER JOIN employees_department ON employees_training.Employees_ID = employees_department.Employees_ID 
Where employees_training.Apply_Date Like '$_POST[month]%' AND employees_department.Department_ID = '$_POST[department]'
Group By employees_training.Program_ID 
ORDER BY Program_ID Asc");
}else if($_POST['sort']=="training-descending"){
$query= mysql_query("SELECT Count(employees_training.Employees_ID) As amount , employees_training.Program_ID FROM employees_training 
INNER JOIN employees_department ON employees_training.Employees_ID = employees_department.Employees_ID 
Where employees_training.Apply_Date Like '$_POST[month]%' AND employees_department.Department_ID = '$_POST[department]'
Group By employees_training.Program_ID 
ORDER BY Program_ID DESC");	
}else if($_POST['sort']=="most-people"){
$query= mysql_query("SELECT Count(employees_training.Employees_ID) As amount , employees_training.Program_ID FROM employees_training 
INNER JOIN employees_department ON employees_training.Employees_ID = employees_department.Employees_ID 
Where employees_training.Apply_Date Like '$_POST[month]%' AND employees_department.Department_ID = '$_POST[department]'
Group By employees_training.Program_ID 
ORDER BY amount ASC");	
}else if($_POST['sort']=="least-people"){
$query= mysql_query("SELECT Count(employees_training.Employees_ID) As amount , employees_training.Program_ID FROM employees_training 
INNER JOIN employees_department ON employees_training.Employees_ID = employees_department.Employees_ID 
Where employees_training.Apply_Date Like '$_POST[month]%' AND employees_department.Department_ID = '$_POST[department]'
Group By employees_training.Program_ID 
ORDER BY amount DESC");	
}else{
$query= mysql_query("SELECT Count(employees_training.Employees_ID) As amount , employees_training.Program_ID FROM employees_training 
INNER JOIN employees_department ON employees_training.Employees_ID = employees_department.Employees_ID 
Where employees_training.Apply_Date Like '$_POST[month]%' AND employees_department.Department_ID = '$_POST[department]'
Group By employees_training.Program_ID 
");		
}

$x=1;
$total=0;
while($result = mysql_fetch_assoc($query)){
	$pdf->Cell(40,7,$x,0);
	$pdf->Cell(40,7, getTrainingDetails ($result['Program_ID'],"Title"),0);
	$pdf->Cell(40,7,$result['amount'],0);	
	$pdf->Ln(11);	
	$x++;
	$total = $result['amount'] +$total;
}
	$pdf->Ln(6);
	$pdf->Cell(40);
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(40,7,"Total ",0);
	$pdf->Cell(40,7,$total,0);	
$pdf->Output();
ob_end_flush(); 
?>