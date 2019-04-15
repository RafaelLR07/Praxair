
<?php
    include_once('../../Scripts/DBconexion.php');  
    include 'template.php';
    
    $database = new Connection();
    $db = $database->open();
    
    $activo = "ACTIVO";

    //si se selecciona un reporte
    if (isset($_POST['reporte'])) {
    
    //variables de filtros
    $ubicacion = $_POST['for_local'];
    
    if($ubicacion=='XALAPA'){
        //consulta del reporte
  
    $sql = "SELECT pacientes.municipio, pacientes.telefono, pacientes.familiar_responsable , pacientes.ciudad,pacientes.no_paciente, pacientes.nombre, altas.cedula, altas.fecha_alta
            FROM pacientes INNER JOIN altas
            WHERE 
            pacientes.ciudad!='' AND
            pacientes.estado='$activo' 
            AND (pacientes.cedula = altas.cedula) 
            AND (pacientes.ciudad ='$ubicacion')";

    }else if($ubicacio = 'foraneo'){
        $sql = "SELECT pacientes.municipio, pacientes.telefono, pacientes.familiar_responsable , pacientes.ciudad,pacientes.no_paciente, pacientes.nombre, altas.cedula, altas.fecha_alta
            FROM pacientes INNER JOIN altas
            WHERE 
            pacientes.ciudad!='' AND
            pacientes.estado='$activo' 
            AND (pacientes.cedula = altas.cedula) 
            AND (pacientes.ciudad !='XALAPA')
            AND (pacientes.municipio !='XALAPA')";
    }

   
   

    /*
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','Legal');
    
    $pdf->Cell(120,10, 'Reporte por ubicacion',0,0,'C');
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
    }*/
      header('Content-type:application/xls');
      header('Content-Disposition: attachment; filename=usuarios.xls');
    ?>  

    <table border="1">
        <tr  style="background-color:pink;">
            <th>UNIDAD MEDICA</th> 
            <th>CEDULA</th>
            <th>NOMBRE</th>
            <th>CIUDAD</th>
            <th>MUNICIPIO</th>
            <th>TELEFONO</th>
            <th>RESPONSABLE</th>
            <th>FECHA ALTA</th>
        </tr>
        <?php 
        $result = $db->query($sql);
        foreach ($result as $paciente) {
            ?>
            <tr>
                <td><?php echo "CLINICA HOSPITAL XALAPA"; ?></td>
                <td><?php echo $paciente['cedula']; ?></td>
                <td><?php echo utf8_decode($paciente['nombre']); ?></td>
                <td><?php echo utf8_decode($paciente['ciudad']); ?></td>
                <td><?php echo utf8_decode($paciente['municipio']); ?></td>
                <td><?php echo utf8_decode($paciente['telefono']); ?></td>
                <td><?php echo utf8_decode($paciente['familiar_responsable']); ?></td>
                <td><?php echo utf8_decode($paciente['fecha_alta']); ?></td>
            </tr>
            <?php
        }}

         ?>


    </table>