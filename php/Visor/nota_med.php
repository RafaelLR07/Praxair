<?php
include_once('../Scripts/DBconexion.php');  
include 'template_medic.php';
require_once 'fechas.php';
//nombre rfc, diagnostico y observaciones

$pdf = new PDF();
    $id = $_GET['id'];
    $ido=$_GET['ido'];
    //Fecha de hoy
	$database = new Connection();
    $db = $database->open();
    

    $sk_med = "SELECT nombre, no_empleado FROM medicos  WHERE no_empleado='$ido'";
    $sk_pac = "SELECT nombre,cedula, indicaciones, diagnostico FROM pacientes 
            WHERE cedula='$id'";
    $resultado = $db -> query($sk_pac);
    $resultado2 = $db -> query($sk_med);
    
    foreach($resultado as $dates);
    foreach($resultado2 as $dates_med);

	$pdf->AliasNbPages();
	$pdf->AddPage();
    $pdf->Ln(30);
    $pdf->setX(20);
    $pdf->Cell(180,10,utf8_decode('Paciente: '.$dates['nombre'].''),'');
    
    $pdf->Ln(10);
    $pdf->setX(20);
    $pdf->Cell(180,10,utf8_decode('Cedula: '.$dates['cedula'].''),'');


    $pdf->Ln(10);
    $pdf->setX(20);
    $pdf->Cell(180,10,utf8_decode('Diagnóstico: '.$dates['diagnostico'].''),'');
    
    $pdf->Ln(25);
    $pdf->setX(20);
    $pdf->Cell(175,5,utf8_decode('Indicaciones'),0,0,'C',false);

    $pdf->Ln(25);
    $pdf->setX(20);
    $pdf->MultiCell(175,5,utf8_decode($dates['indicaciones']),'');

    
    $info_grl = new funciones_varias();
   
    $pdf->ln(10);
    $pdf->setX(19);
	$imprimer_fec = $info_grl->obtener_fecha();
    $pdf->Cell(175,5,utf8_decode($imprimer_fec),'');
    
    $pdf->ln(10);
    $pdf->Cell(30);
    $pdf->Cell(120,10,utf8_decode($dates_med['nombre']),0,0,'C',false);
    
    $pdf->ln(4);
    $pdf->Cell(30);
    $pdf->Cell(120,10,utf8_decode('Firma del medico'),0,0,'C',false);
    
   

$pdf->Output();






?>