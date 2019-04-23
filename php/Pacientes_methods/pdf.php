
<?php
    include_once('../Scripts/DBconexion.php');  
    //include 'template.php';
    
    $database = new Connection();
    $db = $database->open();
    
    $q = $_POST['kuery_2'];

    $sql = "SELECT * FROM pacientes WHERE 
        ciudad!='' AND
        estado='ACTIVO' AND(
		cedula LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
        ciudad LIKE '%".$q."%' OR
        municipio LIKE '%".$q."%' OR
        telefono LIKE '%".$q."%' OR
		familiar_responsable LIKE '%".$q."%') 
        ORDER BY nombre ASC";

    /*$pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','Legal');

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(50,6,'UNIDAD MEDICA',1,0,'C',1);
	$pdf->Cell(30,6,'CEDULA',1,0,'C',1);
	$pdf->MultiCell(80,6,'NOMBRE',1,0,'C',1);
    $pdf->Cell(60,6,'CIUDAD',1,0,'C',1);
    //$pdf->Cell(30,6,'MUNICIPIO',1,0,'C',1);
    $pdf->Cell(25,6,'TELEFONO',1,0,'C',1);
    $pdf->Cell(80,6,'RESPONSABLE',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
    
   
    
    $resultado = $db -> query($sql);
    foreach($resultado as $row){
        $pdf->Cell(50,6,utf8_decode('CLINICA HOSPITAL XALAPA'),1,0,'L');
        $pdf->Cell(30,6,utf8_decode($row['cedula']),1,0,'L');
        $pdf->Cell(80,6,utf8_decode($row['nombre']),1,0,'L');
        $pdf->Cell(60,6,utf8_decode($row['ciudad']),1,0,'L');
        //$pdf->Cell(30,6,utf8_decode($row['municipio']),1,0,'L');
        $pdf->Cell(25,6,$row['telefono'],1,0,'L');
        $pdf->Cell(80,6,utf8_decode($row['familiar_responsable']),1,1,'L');
        //$pdf->Cell($telefonoAncho,6,$row['telefono'],1,1,'C');
        //$pdf->Cell($telefonoAncho,6,$row['familiar_responsable'],1,1,'C');
    }
    $pdf->Output();*/
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
            </tr>
            <?php
        }

         ?>


    </table>