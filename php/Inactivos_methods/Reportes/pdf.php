
<?php
    include_once('../../Scripts/DBconexion.php');  
    include 'template.php';
    
    $database = new Connection();
    $db = $database->open();
    
    $q = $_POST['kuery_2'];

    $sql = "SELECT * FROM pacientes WHERE 
        estado='INACTIVO' AND(
		cedula LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
        ciudad LIKE '%".$q."%' OR
        municipio LIKE '%".$q."%' OR
        telefono LIKE '%".$q."%' OR
		familiar_responsable LIKE '%".$q."%')";

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L');

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'CEDULA',1,0,'C',1);
	$pdf->Cell(80,6,'NOMBRE',1,0,'C',1);
    $pdf->Cell(30,6,'CIUDAD',1,0,'C',1);
    $pdf->Cell(30,6,'MUNICIPIO',1,0,'C',1);
    $pdf->Cell(30,6,'TELEFONO',1,0,'C',1);
    $pdf->Cell(80,6,'RESPONSABLE',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
    
   
    
    $resultado = $db -> query($sql);
    foreach($resultado as $row){
        $pdf->Cell(30,6,utf8_decode($row['cedula']),1,0,'L');
        $pdf->Cell(80,6,utf8_decode($row['nombre']),1,0,'L');
        $pdf->Cell(30,6,utf8_decode($row['ciudad']),1,0,'L');
        $pdf->Cell(30,6,utf8_decode($row['municipio']),1,0,'L');
        $pdf->Cell(30,6,$row['telefono'],1,0,'L');
        $pdf->Cell(80,6,utf8_decode($row['familiar_responsable']),1,1,'L');
       

        //$pdf->Cell($telefonoAncho,6,$row['telefono'],1,1,'C');
        //$pdf->Cell($telefonoAncho,6,$row['familiar_responsable'],1,1,'C');
    }




    $pdf->Output();

    

    ?>  