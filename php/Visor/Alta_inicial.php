<?php
include_once('../Scripts/DBconexion.php');  
include 'template_alta.php';
include_once('fechas.php');
//nombre rfc, diagnostico y observaciones
    session_start();
      
      $name="";
      
      if(isset($_SESSION['u_usuario'])){
        $name = $_SESSION['u_usuario'];
      }else{
       // header("Location: ../index.php");
      }
    
       

        


    $database = new Connection();
    $db = $database->open();
    
    $pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();
    $valor = $_GET['id'];

    $skl = "SELECT * FROM pacientes WHERE cedula = '$valor'";
    $skl2 = "SELECT * FROM recetas WHERE paciente = '$valor'";

    $resultado_pac = $db -> query($skl);
    $resultado_rec = $db -> query($skl2);
    
    foreach($resultado_pac as $dates_pac);
    foreach($resultado_rec as $dates_rec);

    //cscmedigas@praxair.com
    //mauricio_contreras@
    //zona 1
    //Primer campo del formato
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
	$pdf->SetFont('Helvetica','B',11);
    $pdf->Cell(90,6,'FECHA',0,0,'C',1);
    
    //fecha expedida
    $fechas_functions = new funciones_varias();
    $imprimer_fec = $fechas_functions->obtener_fecha2($dates_rec['fecha']);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6, $imprimer_fec,1,0,'C',true);

    //inicia la zona 2
    $pdf->Ln(8);
    $pdf->SetFillColor(3, 50, 132);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,6,'DATOS DEL PACIENTE',0,0,'C',1);

    //datos del paciente

    //nombre
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'NOMBRE DEL PACIENTE',0,0,'C',1);
    
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($dates_pac['nombre']),1,0,'C',true);
    
    /*apellidos
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'APELLIDOS DEL PACIENTE',0,0,'C',1);
    
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,'',1,0,'C',true);*/

    //numero de afilicacion
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,utf8_encode('NUMERO DE AFILIACION'),0,0,'C',1);
    
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$dates_pac['cedula'],1,0,'C',true);

    //apartado de direccion (sigue en datos)
    //calle
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'CALLE',0,0,'C',1);
    
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($dates_pac['calle']),1,0,'C',true);

    //numero exterior
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'NUMERO EXTERIOR',0,0,'C',1);
    
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$dates_pac['numero_exterior'],1,0,'C',true);


    //numero interior
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'NUMERO INTERIOR',0,0,'C',1);
    
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$dates_pac['numero_interior'],1,0,'C',true); 

    //ESPECIFICAR SI ES PLANTA ALTA (PA) O BAJA (PB)
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',9);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'ESPECIFICAR SI ES PLANTA ALTA (PA) O BAJA (PB)
    ',0,0,'C',1);
    
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$dates_pac['planta'],1,0,'C',true);
     
    //COLONIA
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'COLONIA',0,0,'C',1);
    
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($dates_pac['colonia']),1,0,'C',true);
     
    //CP
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'CP',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$dates_pac['cp'],1,0,'C',true);
 
    //CIUDAD
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'CIUDAD',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($dates_pac['ciudad']),1,0,'C',true);

    //MUNICIPIO
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'MUNICIPIO',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($dates_pac['municipio']),1,0,'C',true);

    //ENTRE CALLES
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'ENTRE CALLES',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($dates_pac['entre_calle1'].' y '.$dates_pac['entre_calle2']),1,0,'C',true);

    //TELEFONO
    $pdf->Ln(10);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'TELEFONO O CELULAR',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$dates_pac['telefono'],1,0,'C',true);

    /*CELULAR
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'CELULAR',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,'CELULAR??',1,0,'C',true);*/


    //inicia zona 3 
    //DAtos del contacto del paciente

    $pdf->Ln(8);
    $pdf->SetFillColor(3, 50, 132);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,6,'DATOS DEL CONTACTO PACIENTE',0,0,'C',1);

    //NOMBRE DEL FAMILIAR RESPONSABLE
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'NOMBRE FAMILIAR RESPONSABLE',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($dates_pac['familiar_responsable']),1,0,'C',true);

    //PARENTESCO
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'PARENTESCO',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($dates_pac['parentesco']),1,0,'C',true);

    //CORREO ELECTRONICO
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'CORREO ELECTRONICO',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($dates_pac['email_familiar']),1,0,'C',true);

    //CELULAR
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'TELEFONO O CELULAR',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$dates_pac['telefono_familiar'],1,0,'C',true);

    /*TELEFONO
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'TELEFONO(CON LADA)',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,,1,0,'C',true);*/

    //inicia zona 4
    //INFORMACION DEL PADECIMIENTO DEL PACIENTE

    $pdf->Ln(8);
    $pdf->SetFillColor(3, 50, 132);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,6,'INFORMACION DEL PADECIMIENTO DEL PACIENTE',0,0,'C',1);

    //PADECIMIENTO
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'PADECIMIENTO',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($dates_rec['diagnostico']),1,0,'C',true);

    //inicia zona 5
    //INFORMACION DEL FLUJo

    $pdf->Ln(8);
    $pdf->SetFillColor(3, 50, 132);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,6,'INFORMACION DEL FLUJO',0,0,'C',1); 
    
    //LITROS
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'LITROS',0,0,'C',1);


    $eval_norm = strpos($dates_rec['indicaciones'], '-');
    $eval_especial = strpos($dates_rec['indicaciones'], '|');
    $eval_rara = strpos($dates_rec['indicaciones'], '/');

    $var_litros="";
    $var_horas="";
    $var_2="";
    $rampa="";
    $cms="";

    if($eval_norm){

         list($var_litros,$var_horas,$var_2) = explode('-',$dates_rec['indicaciones']);

    }

    if($eval_especial){
       
         list($var_litros,$var_horas,$rampa,$cms,$var_2) = explode('|',$dates_rec['indicaciones']);

    }

    if($eval_rara){
       
         list($rampa,$cms,) = explode('|',$dates_rec['indicaciones']);

    }



   
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,utf8_decode($var_litros),1,0,'C',true);

    //horas
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'HORAS',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$var_horas,1,0,'C',true);
    
    //EDAD DEL PACIENTE
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'EDAD DEL PACIENTE',0,0,'C',1);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$dates_pac['edad'],1,0,'C',true);

    //inicia zona 6
    //INFORMACION CPAP / BPAP

    $pdf->Ln(8);
    $pdf->SetFillColor(3, 50, 132);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,6,'INFORMACION CPAP / BPAP',0,0,'C',1); 
    
     //RAMPA
     $pdf->Ln(8);
     $pdf->SetFillColor(206,204,204);
     $pdf->SetFont('Helvetica','B',11);
     $pdf->SetTextColor(0,0,0);
     $pdf->Cell(90,6,'RAMPA',0,0,'C',1);
 
     $pdf->SetFillColor(255,255,255);
     $pdf->SetFont('Helvetica','',11);
     $pdf->Cell(0,6,$rampa,1,0,'C',true);
 

     //CMS DE AGUA
     $pdf->Ln(8);
     $pdf->SetFillColor(206,204,204);
     $pdf->SetFont('Helvetica','B',11);
     $pdf->SetTextColor(0,0,0);
     $pdf->Cell(90,6,'CMS DE AGUA',0,0,'C',1);
 
     $pdf->SetFillColor(255,255,255);
     $pdf->SetFont('Helvetica','',11);
     $pdf->Cell(0,6,$cms,1,0,'C',true);
 

    //inicia zona 7
    //INF. CELULAR PARA ACTIVAR PEDIDOS POR MENSAJES DE TEXTO SMS	


    $pdf->Ln(8);
    $pdf->SetFillColor(3, 50, 132);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,6,'INF. CELULAR PARA ACTIVAR PEDIDOS POR MENSAJES DE TEXTO SMS	
    ',0,0,'C',1); 
    
//NOMBRE DEL FAMILIAR RESP. DE SMS
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'NOMBRE DEL FAMILIAR RESP. DE SMS',0,0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,'',1,0,'C',true);

    //CELULAR 1
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'CELULAR 1',0,0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,'',1,0,'C',true);

    //CELULAR 2
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'CELULAR 2',0,0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,'',1,0,'C',true);

    
    //inicia zona 8
    //INFORMACION DE CLINICA


    $pdf->Ln(8);
    $pdf->SetFillColor(3, 50, 132);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,6,'INFORMACION DE CLINICA',0,0,'C',1); 

    //NOMBRE O NUMERO DE CLINICA
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'NOMBRE O NUMERO DE CLINICA',0,0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,'CLINICA HOSPITAL XALAPA',1,0,'C',true);

    //NOMBRE DE QUIEN SOLICITA EL SERVICIO
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'NOMBRE DE QUIÉN SOLICITA EL SERVICIO',0,0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$name,1,0,'C',true);


    //inicia zona 9
    //INFORMACION DE RECETA

    $pdf->Ln(8);
    $pdf->SetFillColor(3, 50, 132);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,6,'INFORMACIÓN DE RECETA',0,0,'C',1); 

//NUMERO DE RECETA
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'NUMERO DE RECETA',0,0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$dates_rec['serie'],1,0,'C',true);

    date_default_timezone_set('America/Mexico_City');
    $var_fecha = $dates_rec['fecha'];
    $fechas_functions = new funciones_varias();
    
    $fecha_ini = new DateTime($var_fecha);
    $fecha_ini->modify('+1 day');
    $fecha_fin = $fechas_functions->final_mes($var_fecha);

  
    //FECHA PERIODO QUE CUBRE (INICIO)
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'FECHA PERIODO QUE CUBRE (INICIO)',0,0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$fecha_ini->format('Y/m/d'),1,0,'C',true);

    //FECHA PERIODO QUE CUBRE (TERMINO)
    $pdf->Ln(8);
    $pdf->SetFillColor(206,204,204);
    $pdf->SetFont('Helvetica','B',11);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(90,6,'FECHA PERIODO QUE CUBRE (TERMINO)',0,0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(0,6,$fecha_fin,1,0,'C',true);




$pdf->Output();






?>