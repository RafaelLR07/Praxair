
<?php
    include_once('../../Scripts/DBconexion.php');  
    include 'template_fac.php';
    
    $database = new Connection();
    $db = $database->open();
    
    $q = $_POST['kuery_2'];

    $sql = " SELECT * FROM facturas WHERE fec_ini LIKE '%".$q."%' OR fec_fin LIKE '%".$q."%'";

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L');
   
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'PACIENTE',1,0,'C',1);
    $pdf->Cell(80,6,'DIAGNOSTICO',1,0,'C',1);
    $pdf->Cell(30,6,'OXIGENO',1,0,'C',1);
    $pdf->Cell(20,6,'COSTO',1,0,'C',1);
    $pdf->Cell(30,6,'INICIO',1,0,'C',1);
	$pdf->Cell(25,6,'FIN',1,0,'C',1);
    $pdf->Cell(20,6,'DIAS ',1,0,'C',1);
    $pdf->Cell(35,6,'COSTO TOTAL',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
    
   
    
    $resultado = $db -> query($sql);
    $oxi_val = "";
    foreach($resultado as $row){
        $skl = "SELECT id_oxigenos, tipo FROM oxigenos";
                foreach ($db -> query($skl) as $fill){
                    if($row['oxigeno'] == $fill['id_oxigenos']){
                        $oxi_val = $fill['tipo'];
                    }
                }
                        
        $pdf->Cell(30,6,utf8_decode($row['paciente']),1,0,'L');
        $pdf->Cell(80,6,utf8_decode($row['estado']),1,0,'L');
        $pdf->Cell(30,6,utf8_decode($oxi_val),1,0,'L');
        $pdf->Cell(20,6,utf8_decode($row['costo']),1,0,'L');
        $pdf->Cell(30,6,$row['fec_ini'],1,0,'L');
        $pdf->Cell(25,6,utf8_decode($row['fec_fin']),1,0,'L');
        $pdf->Cell(20,6,$row['dias_fac'],1,0,'C');
        $pdf->Cell(35,6,utf8_decode($row['costo_fac']),1,1,'C');
       

        //$pdf->Cell($telefonoAncho,6,$row['telefono'],1,1,'C');
        //$pdf->Cell($telefonoAncho,6,$row['familiar_responsable'],1,1,'C');
    }




    $pdf->Output();

    

    ?>  