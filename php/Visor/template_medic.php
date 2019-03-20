<?php
	
    require '../../fpdf/fpdf.php';	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/logo.jpg', 20, 10, 40 );
			$this->SetFont('helvetica','',11);
			
			
			
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, ''.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>