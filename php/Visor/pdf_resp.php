<?php
include_once('../Scripts/DBconexion.php');  
include 'templete_resp.php';
require_once 'fechas.php';
//nombre rfc, diagnostico y observaciones

$pdf = new PDF();
    $id = $_GET['id'];
    //Fecha de hoy
	$database = new Connection();
    $db = $database->open();
    
    
    $skl = "SELECT nombre, diagnostico,observaciones, familiar_responsable, parentesco FROM pacientes 
            WHERE cedula='$id'";
    $resultado = $db -> query($skl);
    
    foreach($resultado as $dates);
	$pdf->AliasNbPages();
	$pdf->AddPage();
    
    $pdf->setX(20);
    $pdf->Cell(180,10,utf8_decode('El que suscribe: '.$dates['nombre'].''),'');
    $pdf->Ln(5);
    $pdf->setX(20);
    $pdf->Cell(180,10,utf8_decode('Diagnóstico:'.$dates['diagnostico'].''),'');
    
    $pdf->Ln(12);
    $pdf->setX(20);
    $pdf->MultiCell(175,5,utf8_decode('Nos comprometemos con la Administración de la Clínica Hospital ISSSTE Xalapa a dar cabal cumplimiento a las siguientes recomendaciones:'),'');

    $pdf->ln(7);
    $pdf->setX(35);
    $pdf->MultiCell(160,5,utf8_decode('1.	Para recibir la dotación de oxígeno es importante acudir a tu cita el día indicado para que se te otorgue la receta médica y así evitar la suspensión del servicio por parte del proveedor.'),'');

    $pdf->ln(7);
    $pdf->setX(35);
    $pdf->MultiCell(160,5,utf8_decode('2.	El paciente y familiar deben verificar que el médico anote en la receta de la dotación de oxígeno:'),'');

    $pdf->ln(4);
    $pdf->setX(50);
    $pdf->Cell(160, 5, chr(127).utf8_decode('    Fecha de inicio y término del uso'), 0, 0, 'L');

    $pdf->ln(6);
    $pdf->setX(50);
    $pdf->Cell(160, 5, chr(127).utf8_decode('    Velocidad de flujo (litros por minuto)'), 0, 0, 'L');

    $pdf->ln(6);
    $pdf->setX(50);
    $pdf->Cell(160, 5, chr(127).utf8_decode('    Frecuencia (continua o intermitente)'), 0, 0, 'L');

    
    $pdf->ln(6);
    $pdf->setX(50);
    $pdf->Cell(160, 5, chr(127).utf8_decode('    Duración (horas)'), 0, 0, 'L');
    
    $pdf->ln(6);
    $pdf->setX(50);
    $pdf->Cell(160, 5, chr(127).utf8_decode('    Si es temporal o permanente'), 0, 0, 'L');

    
    $pdf->ln(6);
    $pdf->setX(50);
    $pdf->Cell(160, 5, chr(127).utf8_decode('    Cita para la próxima dotación'), 0, 0, 'L');

    $pdf->ln(8);
    $pdf->setX(35);
    $pdf->MultiCell(160,5,utf8_decode('3.	Es importante reportar a la subdirección administrativa o asistente médica en un plazo no mayor a 5 días hábiles vía telefónica o mensaje al número: (228) 8-15-00-00 Ext. 118  y Celular 2281535082(llamada, SMS o uhatts app)  y/o al correo electrónico: 2772.sistchxal@issste.gob.mx en caso de:'),'');

    $pdf->ln(6);
    $pdf->setX(50);
    $pdf->Cell(160, 5, chr(127).utf8_decode('    Alta del tratamiento'), 0, 0, 'L');
	
    $pdf->ln(6);
    $pdf->setX(50);
    $pdf->Cell(160, 5, chr(127).utf8_decode('    Ingreso a unidad médica hospitalaria'), 0, 0, 'L');
    
    
    $pdf->ln(6);
    $pdf->setX(50);
    $pdf->Cell(160, 5, chr(127).utf8_decode('    Cambio de domicilio'), 0, 0, 'L');

    $pdf->ln(6);
    $pdf->setX(50);
    $pdf->Cell(160, 5, chr(127).utf8_decode('    Fallecimiento del paciente'), 0, 0, 'L');
    
    $pdf->ln(8);
    $pdf->setX(35);
    $pdf->MultiCell(160,5,utf8_decode('4.	Entregar en el área de Sistemas de la Clínica Hospital ISSSTE Xalapa a más tardar dentro de los cinco primeros días de cada mes, la receta original expedida por el médico facultado para indicar el suministro de oxígeno medicinal domiciliario.'),'');

    $pdf->ln(2);
    $pdf->setX(35);
    $pdf->MultiCell(160,5,utf8_decode('5.	Atender lo indicado en la receta, en cuanto al suministro de oxígeno medicinal'),'');

    $pdf->ln(2);
    $pdf->setX(35);
    $pdf->MultiCell(160,5,utf8_decode('6.	Agendar y acudir a las citas de valoración que le indique el médico especialista del caso.'),'');
    
    $pdf->ln(8);
    $pdf->setX(20);
    
    $info_grl = new funciones_varias();
	$imprimer_fec = $info_grl->obtener_fecha();
    $pdf->MultiCell(160,5,utf8_decode($imprimer_fec),'');
    
    $pdf->ln(4);
    $pdf->Cell(30);
    $pdf->Cell(120,10,utf8_decode($dates['familiar_responsable'].' ( '.$dates['parentesco'].' ) '),0,0,'C',false);
    
    $pdf->ln(4);
    $pdf->Cell(30);
    $pdf->Cell(120,10,utf8_decode('Firma del derechohabiente o persona responsable'),0,0,'C',false);
    
   

$pdf->Output();






?>