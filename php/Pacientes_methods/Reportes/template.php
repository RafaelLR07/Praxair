<?php
	
    require '../../../fpdf/fpdf.php';	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../img/logo.jpg', 10, 10, 40 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, ''.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>