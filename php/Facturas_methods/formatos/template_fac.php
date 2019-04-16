<?php
	
    require '../../../fpdf/fpdf.php';	
    include_once('../../Visor/fechas.php'); 
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../Pacientes_methods/img/logo.jpg', 10, 10, 40 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, utf8_decode('CLINICA HOSPITAL XALAPA'),0,0,'C');
			$this->Ln(20);

		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, ''.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>