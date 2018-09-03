<?php
require('fpdf/fpdf.php');


$id = 42;
class pdf extends FPDF
{
	public function header()
	{
		$this->SetFillColor(253, 135,39);
		$this->Rect(0,0, 220, 50, 'F');
		$this->SetY(25);
		$this->SetFont('Arial', 'B', 30);
		$this->SetTextColor(255,255,255);
		$this->Write(5, 'CodeStack');

	}

	public function footer()
	{
		$this->SetFillColor(253, 135,39);
		$this->Rect(0, 250, 220, 50, 'F');
		$this->SetY(-20);
		$this->SetFont('Arial', '', 12);
		$this->SetTextColor(255,255,255);
		$this->SetX(120);
		$this->Write(5, 'CodeStack');
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, 'jose.jairo.fuentes@gmail.com');
		$this->SetX(120);
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, '+(503)7889-8787');
	}
}

$fpdf = new pdf('P','mm','letter',true);

$fpdf->AddPage('portrait', 'letter');




//....


$fpdf->SetMargins(10,30,20,20);
$fpdf->SetFont('Arial', '', 9);
$fpdf->SetTextColor(255,255,255);
$fpdf->Cell(130,5,'',1,1);
$fpdf->SetY(15);
$fpdf->SetX(120);
$fpdf->Write(5, 'DETALLES DEL ENVÍO ');
$fpdf->Ln();
$fpdf->SetX(120);
$fpdf->Write(5, 'Fecha de la orden: ');
$fpdf->Ln();
$fpdf->SetX(120);
$fpdf->Write(5, 'Fecha de envío: ');
$fpdf->Ln();
$fpdf->SetX(120);
$fpdf->Write(5, 'Dirección: ');
$fpdf->Ln();
$fpdf->SetX(120);
$fpdf->Write(5, 'Ciudad: ');

$fpdf->SetTextColor(0,0,0);
$fpdf->Image('img/2.png', 20, 55);






$fpdf->SetY(100);
$fpdf->SetTextColor(255,255,255);
$fpdf->SetFillColor(79,78,77);
$fpdf->Cell(60, 10, 'PRODUCTO', 0, 0, 'C', 1);
$fpdf->Cell(60, 10, 'DESCRIPCION', 0, 0, 'C', 1);
$fpdf->Cell(20, 10, 'P. UNITARIO', 0, 0, 'C', 1);
$fpdf->Cell(20, 10, 'CANTIDAD', 0, 0, 'C', 1);
$fpdf->Cell(30, 10, 'SUBTOTAL', 0, 0, 'C', 1);
$fpdf->Ln();

$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(255,255,255);


$fpdf->Cell(20,10,'IasfsdfsdD',1,0); //vertically merged cell, height=2x row height=2x5=10
$fpdf->Cell(50,10,'Name',1,0); //vertically merged cell
$fpdf->Cell(100,5,'Score',1,0); //normal height, but occupy 4 columns (horizontally merged)
$fpdf->Cell(20,10,'Passing',1,0); //vertically merged cell
$fpdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 

//second line(row)
$fpdf->Cell(70,5,'',0,0); //dummy cell to align next cell, should be invisible
$fpdf->Cell(25,5,'q1',1,0);
$fpdf->Cell(25,5,'q2',1,0);
$fpdf->Cell(25,5,'q3',1,0);
$fpdf->Cell(25,5,'q4',1,1);

//data rows
$fpdf->Cell(20,5,'',1,0);
$fpdf->Cell(50,5,'',1,0);
$fpdf->Cell(25,5,'',1,0);
$fpdf->Cell(25,5,'',1,0);
$fpdf->Cell(25,5,'',1,0);
$fpdf->Cell(25,5,'',1,0);
$fpdf->Cell(20,5,'',1,0);

$fpdf->OutPut();