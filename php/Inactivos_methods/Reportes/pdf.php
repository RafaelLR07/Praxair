
<?php
    include_once('../../Scripts/DBconexion.php');  
    include 'template.php';
    
    $database = new Connection();
    $db = $database->open();
    
    $q = $_POST['kuery_2'];

    $sql = "SELECT * FROM pacientes WHERE 
        ciudad!='' AND
        estado='INACTIVO' OR  estado='DEFUNCIÓN' AND(
		cedula LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
        ciudad LIKE '%".$q."%' OR
        municipio LIKE '%".$q."%' OR
        telefono LIKE '%".$q."%' OR
		familiar_responsable LIKE '%".$q."%')";

     $sqll = "SELECT pacientes.estado AS estado, pacientes.nombre AS nombre, pacientes.edad AS edad, pacientes.cedula AS cedula, bajas.fecha AS fecha FROM pacientes INNER JOIN bajas 
        WHERE pacientes.cedula=bajas.paciente";

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','Legal');

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(50,15,'UNIDAD MEDICA',1,0,'C',1);
    $pdf->Cell(80,15,'NOMBRE',1,0,'C',1);
    $pdf->Cell(30,15,'EDAD',1,0,'C',1);
	$pdf->Cell(30,15,'CEDULA',1,0,'C',1);
    $pdf->Cell(50,15,'FECHA DE BAJA',1,0,'C',1);
    $pdf->Cell(50,15,'FECHA DE DEFUNCION',1,0,'C',1);
    $pdf->Cell(30,15,'OTRO MOTIVO DE BAJA',1,1,'L',1);
	$pdf->SetFont('Arial','',10);
    
   
    
    $resultado = $db -> query($sqll);
    foreach($resultado as $row){
        $isDef = "";
        if($row['estado']=='DEFUNCIÓN'){
            $isDef = $row['fecha'];
        }

        $pdf->Cell(50,10,utf8_decode('CLINICA HOSPITAL XALAPA'),1,0,'L');
        $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'L');
        $pdf->Cell(30,10,utf8_decode($row['edad']),1,0,'L');
        $pdf->Cell(30,10,utf8_decode($row['cedula']),1,0,'L');
        $pdf->Cell(50,10,utf8_decode($row['fecha']),1,0,'L');
        $pdf->Cell(50,10,$isDef,1,0,'L');
        $pdf->Cell(30,10,utf8_decode(""),1,1,'L');
       

        //$pdf->Cell($telefonoAncho,6,$row['telefono'],1,1,'C');
        //$pdf->Cell($telefonoAncho,6,$row['familiar_responsable'],1,1,'C');
    }




    $pdf->Output();

    

    ?>  