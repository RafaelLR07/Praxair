<?php
include_once('../Scripts/DBconexion.php');  
include 'template_medic.php';
require_once 'fechas.php';
//nombre rfc, diagnostico y observaciones

$pdf = new PDF();
    $id = $_GET['id'];
    //cedula de empleado
    $ido=$_GET['ido'];
    $soli=$_GET['rem'];
    //Fecha de hoy
	$database = new Connection();
    $db = $database->open();
    
    //usuarios
    $sk_usu = "SELECT no_empleado, nombre FROM usuarios WHERE no_empleado='$ido'";

    //medicos
    $sk_med = "SELECT no_empleado, nombre FROM medicos WHERE no_empleado='$ido'";

    //pacientes
    $sk_pac = "SELECT nombre,cedula, indicaciones, diagnostico,familiar_responsable,parentesco FROM pacientes WHERE cedula='$id'";

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
    $pdf->SetFont('arial','B',10);
    $pdf->Cell(180,10,utf8_decode('DR(A): '),'');

    $pdf->Ln(10);
    $pdf->setX(20);
    $pdf->SetFont('arial','B',10);
    $pdf->Cell(180,10,utf8_decode('SUBDIRECTOR MÉDICO DE LA CLINICA HOSPITAL ISSSTE XALAPA'),0,0,'J',false);

    $pdf->Ln(25);
    $pdf->setX(20);
    $pdf->SetFont('helvetica','',10);
    $pdf->Cell(180,10,utf8_decode('ASUNTO: BAJA VOLUNTARIA DE OXIGENO MEDICINAL DOMICILIARIO'),0,0,'R',false);

    $pdf->Ln(20);
    $pdf->setX(20);
     $pdf->MultiCell(180,7,utf8_decode('POR ESTE CONDUCTO Y DE LA MANERA MÁS ATENTA, ME PERMITO SOLICITAR SU INTERVENCIÓN ANTE QUIEN CORRESPONDA, A EFECTO DE QUE SE LLEVE A CABO EL TRÁMITE DE BAJA DEL SERVICIO DE OXIGENO MEDICINAL DOMICILIARIO, MISMO QUE A LA FECHA SUMINISTRA LA EMPRESA PRAXAIR MÉXICO S. DE R. L. DE C.V.  AL, C. '.$dates['nombre']).' CON CEDULA: '.$dates['cedula'],'');

    $pdf->Ln(15);
    $pdf->setX(20);
    $pdf->MultiCell(180,7,utf8_decode('LO ANTERIOR, POR SER SU VOLUNTAD QUE SE LE RETIRE DICHO SERVICIO DE MANERA TEMPORAL, YA QUE SE ENCUENTRA RECIBIENDO ATENCIÓN MÉDICA EN LA CIUDAD DE MÉXICO, D.F.   POR LO QUE MEDIANTE ESTE DOCUMENTO, SE LIBERA DE CUALQUIER RESPONSABILIDAD A LA CLINICA HOSPITAL ISSSTE XALAPA.'),'');
    
    $pdf->Ln(25);
    $pdf->setX(20);
    $pdf->Cell(175,5,utf8_decode('SIN OTRO PARTICULAR, LE AGRADEZCO LA ATENCIÓN AL PRESENTE.'),0,0,'L',false);

    $pdf->Ln(25);
    $pdf->setX(20);
    $pdf->Cell(175,5,utf8_decode('A T E N T A M E N T E'),0,0,'C',false);

    
    $remitente="";
    $rol_rem="";
    if($soli=='paciente'){
        $remitente=$dates['nombre'];
        $rol_rem="PACIENTE";
     }
    if($soli=='fami'){
        $remitente=$dates['familiar_responsable'];
        $rol_rem= $dates['parentesco'];
    }
    $pdf->ln(10);
    $pdf->Cell(30);
    $pdf->Cell(120,10,utf8_decode($remitente),0,0,'C',false);
    
    $pdf->ln(4);
    $pdf->Cell(30);
    $pdf->Cell(120,10,utf8_decode($rol_rem).' DEL PACIENTE',0,0,'C',false);
    
   

$pdf->Output();






?>