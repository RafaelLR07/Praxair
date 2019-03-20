<?php
	
    require '../../fpdf/fpdf.php';	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/head2.jpg', 20, 10, 180 ,8);
			$this->SetFont('helvetica','',11);

			$this->Ln(10);
			$this->SetFillColor(8, 187, 10);
			$this->SetFont('Helvetica','B',11);
			$this->SetTextColor(255,255,255);
			$this->Cell(0,6,'FORMATO DE SERVICIOS INICIALES OXIGENO MEDICINAL PRAXAIR MEXICO',0,0,'C',1);
		
			
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, ''.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>