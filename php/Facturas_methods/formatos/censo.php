
<?php
    include_once('../../Scripts/DBconexion.php');  
    include_once('../../Visor/fechas.php');  
    include 'template_fac.php';
    
    $database = new Connection();
    $db = $database->open();
    
    $q = $_POST['censo1'];
    $q2 = $_POST['censo2'];
    $var_aco=0.0;
    $sql = "SELECT * FROM facturas WHERE fec_ini>='$q' AND fec_ini<='$q2' 
           ";

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L', 'Legal');
   
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(50,16,'UNIDAD MEDICA',1,0,'C',1);
    $pdf->Cell(80,16,'NOMBRE',1,0,'C',1);
    $pdf->Cell(30,16,'CEDULA',1,0,'C',1);
    $pdf->Cell(20,16,'ALTA',1,0,'C',1);
    $pdf->Cell(70,16,'DOMICILIO',1,0,'C',1);
    $pdf->Cell(40,16,'MEDICO',1,0,'C',1);
    $pdf->Cell(35,16,'DIAGNOSTICO',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
    
   
    
    $resultado = $db -> query($sql);
    $oxi_val = "";
    
    foreach($resultado as $row){

    $paciente = $row['paciente'];
    echo $paciente;

    $getPacien = "SELECT pacientes.nombre AS nombre, pacientes.cedula AS cedula,altas.fecha_alta AS alta,pacientes.calle AS calle, pacientes.numero_exterior AS numero,pacientes.colonia AS colonia,pacientes.cp AS cp, pacientes.municipio AS municipio 
    FROM pacientes INNER JOIN altas 
    WHERE pacientes.cedula=altas.cedula /*and pacientes.cedula='$paciente'  ORDER BY pacientes.cedula*/";

        $getMedic="SELECT medico,MAX(fecha), diagnostico FROM recetas WHERE paciente='$paciente'";

        $result_getMed = $db->query($getMedic);
        $result_getPac = $db->query($getPacien);
        foreach ($result_getPac as $paci);
        echo "paciente".$paciente."<br>";
        echo "valor es ";
        echo var_dump($paci);
        echo "<br>";
        foreach ($result_getMed as $med);
        //Se guarda la cedula del paciente 
     
       /*

        $pdf->Cell(30,6,utf8_decode('CLINICA HOSPITAL XALAPA'),1,0,'L');
        $pdf->Cell(80,6,utf8_decode($row['paciente']),1,0,'L');
        $pdf->Cell(30,6,utf8_decode($row['cedula']),1,0,'L');
        $pdf->Cell(20,6,utf8_decode('google'),1,0,'L');
        $pdf->Cell(30,6,$row['calle']." ".$row['numero_interior']." ".$row['colonia']." ".$row['cp']." ".$row['municipio']  ,1,0,'L');
        $pdf->Cell(25,6,utf8_decode('Medico'),1,0,'L');
        $pdf->Cell(35,6,utf8_decode('DIAGNOSTICO'),1,1,'C');
        
       */
        $pdf->Cell(50,18,utf8_decode('CLINICA HOSPITAL XALAPA'),1,0,'L');
        $pdf->Cell(80,18,utf8_decode($paci['nombre']),1,0,'L');
        $pdf->Cell(30,18,utf8_decode($paci['cedula']),1,0,'L');
        $pdf->Cell(20,18,utf8_decode($paci['alta']),1,0,'L');
        $valory = $pdf->GetY();
        $valorx = $pdf->GetX();
        $pdf->MultiCell(70,9,$paci['calle'].$paci['numero']." ".$paci['colonia'].$paci['cp'].$paci['municipio'] ,1,'L');
        $pdf->SetY($valory);
        $pdf->SetX($valorx+70);
        $pdf->Cell(40,18,utf8_decode($med['medico']),1,0,'L');
        $pdf->Cell(35,18,utf8_decode($med['diagnostico']),1,1,'C');
        //$pdf->Cell($telefonoAncho,6,$row['telefono'],1,1,'C');
        //$pdf->Cell($telefonoAncho,6,$row['familiar_responsable'],1,1,'C');
    }



    $pdf->Output();

    

    ?>  