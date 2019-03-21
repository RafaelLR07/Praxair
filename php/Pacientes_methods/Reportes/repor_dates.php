
<?php
    include_once('../../Scripts/DBconexion.php');  
    include 'template.php';
    
    $database = new Connection();
    $db = $database->open();
    
    $f_in = $_POST['fecha_in'];
    $f_end = $_POST['fecha_end'];
    $activo = "ACTIVO";

    //si se selecciona un reporte
    if (isset($_POST['reporte'])) {
    
    
   
   //consulta del reporte
  
   $sql = "SELECT pacientes.cedula,pacientes.nombre, 
   pacientes.ciudad, pacientes.municipio,pacientes.telefono,pacientes.familiar_responsable,altas.cedula, altas.fecha_alta
            FROM pacientes INNER JOIN altas
            WHERE 
            ciudad!='' AND
            estado='$activo' 
            AND (pacientes.cedula = altas.cedula) 
            AND (altas.fecha_alta>='$f_in' 
            AND  altas.fecha_alta<='$f_end')";

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','Legal');
    
    $pdf->Cell(120,10, 'Reporte General',0,0,'C');
    $pdf->Ln(20);
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'CEDULA',1,0,'C',1);
	$pdf->Cell(80,6,'NOMBRE',1,0,'C',1);
    $pdf->Cell(30,6,'CIUDAD',1,0,'C',1);
    $pdf->Cell(30,6,'MUNICIPIO',1,0,'C',1);
    $pdf->Cell(30,6,'TELEFONO',1,0,'C',1);
    $pdf->Cell(80,6,'RESPONSABLE',1,0,'C',1);
    $pdf->Cell(40,6,'FECHA DE ALTA',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
    
   
    
    $resultado = $db -> query($sql);
    foreach($resultado as $row){
        $pdf->Cell(30,6,utf8_decode($row['cedula']),1,0,'L');
        $pdf->Cell(80,6,utf8_decode($row['nombre']),1,0,'L');
        $pdf->Cell(30,6,utf8_decode($row['ciudad']),1,0,'L');
        $pdf->Cell(30,6,utf8_decode($row['municipio']),1,0,'L');
        $pdf->Cell(30,6,$row['telefono'],1,0,'L');
        $pdf->Cell(80,6,$row['familiar_responsable'],1,0,'L');
        $pdf->Cell(40,6,utf8_decode($row['fecha_alta']),1,1,'L');
       

        //$pdf->Cell($telefonoAncho,6,$row['telefono'],1,1,'C');
        //$pdf->Cell($telefonoAncho,6,$row['familiar_responsable'],1,1,'C');
    }




    $pdf->Output();
    }
    

    ?>  