<?php
include_once('../Scripts/DBconexion.php');  
include 'template_medic.php';
require_once 'fechas.php';
//nombre rfc, diagnostico y observaciones

$pdf = new PDF();
    $id = $_GET['id'];
    //cedula de empleado
    $ido=$_GET['ido'];
    //Fecha de hoy
	$database = new Connection();
    $db = $database->open();
    
    //usuarios
    $sk_usu = "SELECT no_empleado, nombre FROM usuarios WHERE no_empleado='$ido'";

    //medicos
    $sk_med = "SELECT no_empleado, nombre FROM medicos WHERE no_empleado='$ido'";

    //pacientes
    $sk_pac = "SELECT nombre,cedula, indicaciones, diagnostico FROM pacientes WHERE cedula='$id'";

    //indicaciones y razon
    $sk_indicaciones = "SELECT indicaciones,diagnostico,cedula_paci FROM salidas_dos WHERE cedula_paci='$id'";

    $resultado = $db -> query($sk_pac);
    $resultado2 = $db -> query($sk_med);
    $resultado3 = $db->query($sk_usu); 
    $resultado4 = $db->query($sk_indicaciones);
    //$resultado4 = $db->kuery($sk_indicaciones);   

    foreach($resultado as $dates);
    foreach($resultado2 as $dates_med);
    foreach($resultado3 as $dates_admin);
    foreach ($resultado4 as $dates_baja);
    
    

    $var_tipo="";
    $var_bajador="";

    if( ($resultado2->rowCount())>0 && ($resultado3->rowCount()>0) )
    {
        $var_bajador = $dates_med['nombre'];
        $var_tipo = "Medico";
    }else{
        $var_bajador = $dates_admin['no_empleado'];
        $var_tipo = "Administrador";
    }

	$pdf->AliasNbPages();
	$pdf->AddPage();

    $info_grl = new funciones_varias();
    $pdf->ln(15);
    $pdf->setX(19);
    $imprimer_fec = $info_grl->obtener_fecha();
    $pdf->Cell(175,5,utf8_decode($imprimer_fec),0,0,'R',false);


    $pdf->Ln(15);
    $pdf->setX(20);
    $pdf->Cell(180,10,utf8_decode('Paciente: '),'');

    $pdf->Ln(10);
    $pdf->setX(20);
    $pdf->Cell(180,10,utf8_decode($dates_baja['cedula_paci'].'  '.$dates['nombre']),0,0,'J',false);

    $pdf->Ln(10);
    $pdf->setX(20);
    $pdf->Cell(180,10,utf8_decode('Razon: '),0,0,'C',false);

    $pdf->Ln(10);
    $pdf->setX(20);
    $pdf->Cell(180,10,utf8_decode($dates_baja['diagnostico']),'');
    
    $pdf->Ln(25);
    $pdf->setX(20);
    $pdf->Cell(175,5,utf8_decode('Indicaciones'),0,0,'C',false);

    $pdf->Ln(25);
    $pdf->setX(20);
    $pdf->MultiCell(175,5,utf8_decode($dates_baja['indicaciones']),'');

  
   
    
    
    $pdf->ln(10);
    $pdf->Cell(30);
    $pdf->Cell(120,10,utf8_decode($var_bajador),0,0,'C',false);
    
    $pdf->ln(4);
    $pdf->Cell(30);
    $pdf->Cell(120,10,utf8_decode('Firma del '.$var_tipo),0,0,'C',false);
    
   

$pdf->Output();






?>