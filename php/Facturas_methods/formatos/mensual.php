
<?php
    include_once('../../Scripts/DBconexion.php');  
    include_once('../../Visor/fechas.php');  
    include 'template_fac.php';
    
    $database = new Connection();
    $db = $database->open();
    
    $q = $_POST['kuery_1'];
    $q2 = $_POST['kuery_2'];
    $var_aco=0.0;
    $sql = "SELECT * FROM facturas 
            WHERE fec_ini>='$q' AND fec_ini<='$q2' order by paciente";

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L');
   
    $fechas = new funciones_varias();
    $fecha_valor = $fechas->getMonth($q);
    $pdf->Cell(0,10, utf8_decode('Facturación de Pacientes del mes de '.$fecha_valor),0,0,'C');
    $pdf->Ln(20);
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'CEDULA',1,0,'C',1);
    $pdf->Cell(80,6,'NOMBRE',1,0,'C',1);
    $pdf->Cell(35,6,'TIPO',1,0,'C',1);
    $pdf->Cell(20,6,'COSTO',1,0,'C',1);
    $pdf->Cell(30,6,'INICIO',1,0,'C',1);
	$pdf->Cell(25,6,'FIN',1,0,'C',1);
    $pdf->Cell(15,6,'DIAS ',1,0,'C',1);
    $pdf->Cell(35,6,'COSTO TOTAL',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
    
   
    
    $resultado = $db -> query($sql);
    $oxi_val = "";
    foreach($resultado as $row){
        $q = $_POST['kuery_1'];
        $q2 = $_POST['kuery_2'];
        $skl = "SELECT id_oxigenos, tipo FROM oxigenos";
                foreach ($db -> query($skl) as $fill){
                    if($row['oxigeno'] == $fill['id_oxigenos']){
                        $oxi_val = $fill['tipo'];
                    }
                }
        $calculatorFechas = new funciones_varias();
                

                //Se guarda la cedula del paciente 
                $paciente = $row['paciente'];
                //Altas
                $altaPaciente = "SELECT * FROM altas WHERE cedula='$paciente' AND fecha_alta>='$q' AND fecha_alta<='$q2' ";

                //Baja
                $bajaPaciente = "SELECT * FROM bajas WHERE paciente='$paciente' AND fecha>='$q' AND fecha<='$q2'";              
                //consultas de altas y bajas
                $altasPacientes_kuery = $db -> query($altaPaciente);
                $bajasPacientes_kuery = $db -> query($bajaPaciente);
                
                /*
                se valida si el paciente es dato de alta en este
                mes se debera colocar como inicio de facturacion la
                fecha de la receta

                */

                //hay altas
                if(($altasPacientes_kuery->rowCount())>0){
                    $cons_rect = "SELECT * FROM recetas WHERE paciente='$paciente'";
                    $recetasPacientes_kuery = $db -> query($cons_rect);
                    foreach($recetasPacientes_kuery as $rec);
                    $q = $rec['fecha'];
                }
                //si hay bajas
                if(($bajasPacientes_kuery->rowCount())>0){
                    $cons_rect = "SELECT fecha FROM bajas WHERE paciente='$paciente'";
                    $recetasPacientes_kuery = $db -> query($cons_rect);
                    foreach($recetasPacientes_kuery as $baja_down);
                    $q2 = $baja_down['fecha'];
                }

                //consulta el nombre del paciente
                $skl = "SELECT nombre FROM pacientes WHERE cedula='$paciente'";
                foreach ($db -> query($skl) as $name);

                $dias_fac = $calculatorFechas->getDiasFac($q,$q2);
                $factura = $dias_fac * $row['costo'];
                $factura_pretty = number_format($factura,2);
                $var_aco = $factura + $var_aco;

                

        $pdf->Cell(30,6,utf8_decode($row['paciente']),1,0,'L');
        $pdf->Cell(80,6,utf8_decode($name['nombre']),1,0,'L');
        $pdf->Cell(35,6,utf8_decode($oxi_val),1,0,'L');
        $pdf->Cell(20,6,utf8_decode('$'.$row['costo']),1,0,'L');
        $pdf->Cell(30,6,$q,1,0,'L');
        $pdf->Cell(25,6,utf8_decode($q2),1,0,'L');
        $pdf->Cell(15,6,$dias_fac,1,0,'C');
        $pdf->Cell(35,6,utf8_decode('$'.$factura_pretty),1,1,'R');
       

        //$pdf->Cell($telefonoAncho,6,$row['telefono'],1,1,'C');
        //$pdf->Cell($telefonoAncho,6,$row['familiar_responsable'],1,1,'C');
    }
    $pdf->SetFillColor(232,232,232);
    $pdf->Ln(5);
    $pdf->Cell(150,6,'TOTAL FACTURADO DEL MES',1,0,'C',1);
    $var_aco = number_format($var_aco,2);
    $pdf->Cell(120,6,'$'.$var_aco,1,-1,'C',1);


    $pdf->Output();

    

    ?>  