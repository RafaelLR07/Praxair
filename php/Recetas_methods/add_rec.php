<?php

include_once('../Scripts/DBconexion.php');        
include_once('../Visor/fechas.php');


	$database = new Connection();
	$db = $database->open();
	try{
        //hacer uso de una declaración preparada para prevenir la inyección de sql
        $id_oxigenos = $_POST['oxigeno'];
        
        $query = "SELECT * FROM oxigenos WHERE id_oxigenos='$id_oxigenos'";
        $costo=0;
        foreach($db->query($query) as $row){
            $costo = $row['precio'];
        }
        
        $id_usuario = $_POST['idd'];
        $fecha = $_POST['fecha'];
        $dat = date("Y/m/d", strtotime($fecha));

        $oxiheno = $_POST['oxigeno'];
        $cadena = "";
        //general concentrador y cilindro
        $litros = $_POST['litros'];
        $dosis = $_POST['dosis'];
        $tiempo = $_POST['tiempo'];

        //cpap bpap
        $rampa = $_POST['rampa'];
        $cms = $_POST['cms'];

        //Registro general de indicaciones

        //normal cilindro o concentrador
        if($oxiheno==1||$oxiheno==2){
            $cadena =  $litros.'/'.$dosis.'/'.$tiempo;
        }
        //especial + cilindro
        if($oxiheno==5||$oxiheno==6){
             $cadena =  $litros.'|'.$dosis.'|'.$tiempo.'|'.$rampa.'|'.$cms;
        }

        //especial + concentrador
        if($oxiheno==7||$oxiheno==8){
            $cadena =  $litros.'|'.$dosis.'|'.$tiempo.'|'.$rampa.'|'.$cms;
        }

        //bpap o cpap --> caso poco probable
        if($oxiheno==3||$oxiheno==4){
            $cadena =  $rampa.'-'.$cms;
        }



		$stmt = $db->prepare("INSERT INTO recetas (serie, fecha, diagnostico, indicaciones, estado, paciente, oxigeno, medico, costo)
        VALUES (:serie, :fecha, :diagnostico, :indicaciones, :estado, :paciente, :oxigeno, :medico, :costo)");
        //instrucción if-else en la ejecución de nuestra declaración preparada
        $_SESSION['message'] = ( 
            $stmt->execute(
                array( ':serie'=> $_POST['no_serie'], 
                ':fecha'=> $dat, 
                ':diagnostico'=> $_POST['diagnostico'], 
                ':indicaciones'=> $cadena, 
                ':estado'=> 'SIN', 
                ':paciente'=> $_POST['paciente'], 
                ':oxigeno'=> $_POST['oxigeno'], 
                ':medico'=> $_POST['medico'], 
                ':costo'=> $costo)) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';
		
    
    //insertar en facturas
        $stmt3 = $db->prepare("INSERT INTO facturas (oxigeno, costo, dias_fac, fec_ini, fec_fin, paciente, estado, costo_fac) 
          VALUES (:oxigeno, :costo, :dias_fac, :fec_ini, :fec_fin, :paciente, :estado, :costo_fac)");

        date_default_timezone_set('America/Mexico_City');
        $fecha = strftime("%Y-%m-%d");
        $fechas_functions = new funciones_varias();
        $fecha_regis = $fecha;
        $fecha_ini = $fechas_functions->getOneday($fecha_regis);
        $fecha_fin = $fechas_functions->getFin($fecha_regis);

        $dias_fac = $fechas_functions->getDiasFac($fecha_ini,$fecha_fin);
        $factura_dias = $dias_fac*$costo;
        
        /*
        echo 'inicio';
        echo "<input type='date' value='$fecha_ini'/>";
        echo 'final';
        echo "<input type='date' value='$fecha_fin'/>";
        echo '<br>'.$fecha_ini.'<br>';
        echo $fecha_fin.'<br>';
        echo $dias_fac.'<br>'; */


        //echo var_dump($fecha_fin);
       // echo $fecha_fin;

        $stmt3->execute(array(
                      ':oxigeno' =>$_POST['oxigeno'] ,
                      ':costo' => $costo,
                      ':dias_fac' => $dias_fac,
                      ':fec_ini' => $fecha_ini,
                      ':fec_fin' => $fecha_fin ,
                      ':paciente' => $_POST['paciente'],
                      ':estado' => 'ACTIVO' ,
                      ':costo_fac' => $factura_dias

        ));	
	



    }
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();


    //preveer si es la primera receta
    $action=2;
    $recetasQuery="SELECT COUNT(*) as suma FROM RECETAS WHERE paciente='$id_usuario'";

    $resultRecQuery = $db->query($recetasQuery);
    foreach ($resultRecQuery as $firstRec);
    $total_recetas = $firstRec['suma'];
    if($total_recetas>1){
        header('location: ../modificar.php?id='.$id_usuario);       
    }else{
        
          header('location: ../Visor.php?action='.$action. '&id='.$id_usuario);

    }

     //header('location: ../modificar.php?id='.$id_usuario);       
 

	
?>