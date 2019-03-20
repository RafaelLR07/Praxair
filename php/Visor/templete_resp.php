<?php
	
    require '../../fpdf/fpdf.php';	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/logo.jpg', 20, 10, 40 );
			$this->SetFont('helvetica','',11);
			
			$this->setXY(20,28);
			$this->Cell(9,10, 'Director de la Clinica Hospital Xalapa ',0,0,'L');
			
			$this->Ln(5);
			$this->setX(20);
			$this->Cell(8,10, 'Presente',0,0,'L');
			$this->Ln(15);
			
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, ''.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>