<?php
require('fpdf/fpdf.php');
$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,'administrator');


$query = mysqli_query($connection,"SELECT 
					user_name,
					email,
					full_name,
					user_role,
					status,
					image FROM users WHERE id_user = '".$_GET['idUser']."'");

$data=mysqli_fetch_array($query);

class PDF extends FPDF {
	function Header(){
		$this->SetFont('Arial','B',20);		
		//put logo
		$this->Image('img/EGD.jpg',15,15,15);
		$this->SetY(20);
		$this->Cell(0,5,'User Information',0,0,'C');


	}
}


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new PDF('P','mm','A4'); //use new class

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(0,0,0);

$pdf->Ln(70);
$pdf->Image('img/4.jpg',88,35,35);

$pdf->SetFont('Arial','B',12);
		
$pdf->SetFillColor(255,255,255);

$pdf->Cell(190,5,'User ID',0,1,'C',true);

$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,$_GET['idUser'],0,1,'C',true);
		
$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'User Name',0,1,'C',true);
		
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,$data['user_name'],0,1,'C',true);

$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'Full Name',0,1,'C',true);
		
$pdf->SetFont('Arial','',12);
		$pdf->Cell(190,5,$data['full_name'],0,1,'C',true);
		
$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'Email',0,1,'C',true);
		
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,$data['email'],0,1,'C',true);

$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'Role',0,1,'C',true);

$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,$data['user_role'],0,1,'C',true);
		
$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'Status',0,1,'C',true);

$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,$data['status'],0,1,'C',true);


$pdf->Output();
?>
