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
        
        $idPac = $_POST['idPac'];
        $fecha = $_POST['fecha'];
        $dat = date("Y/m/d", strtotime($fecha));

        $oxiheno = $_POST['oxigeno'];
        $cadena = "";
        //general concentrador y cilindro
        /*
        $litros = $_POST['litros'];
        $dosis = $_POST['dosis'];
        $tiempo = $_POST['tiempo'];*/

        /*cpap bpap
        $rampa = $_POST['rampa'];
        $cms = $_POST['cms'];

        if($oxiheno==1||$oxiheno==2){
            $cadena =  $litros.$dosis.$tiempo;
        }

        if($oxiheno==3||$oxiheno==4){
            $cadena =  $litros.$dosis.$tiempo;
        }*/

         $idRec = $_POST['idRec'];
         $serie = $_POST['no_serie'];
         $diagnostico = $_POST['diagnostico'];
         $indicacione = $_POST['indicaciones'];
         
         $paciente=$_POST['paciente'];
         $oxigeno = $_POST['oxigeno'];
         $medico = $_POST['medico'];
    
         echo $serie.'<br>';
         echo $dat.'<br>';
         echo $diagnostico.'<br>';
         echo $indicacione.'<br>';
         echo $paciente.'<br>';
         echo $oxigeno.'<br>';
         echo $medico.'<br>';
         echo $costo.'<br>';
         echo $idRec.'<br>';
         echo $idPac.'<br>';

        $sql = "UPDATE recetas SET serie = '$serie', fecha = '$dat', diagnostico = '$diagnostico',indicaciones = '$indicacione', estado = 'SIN', paciente = '$paciente', oxigeno = '$oxigeno',medico='$medico', costo='$costo' WHERE id_recetas = '$idRec' AND paciente= '$idPac'";



       $db->exec($sql); 
    //insertar en facturas
        /*
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
        */
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
        /*
        $stmt3->execute(array(
                      ':oxigeno' =>$_POST['oxigeno'] ,
                      ':costo' => $costo,
                      ':dias_fac' => $dias_fac,
                      ':fec_ini' => $fecha_ini,
                      ':fec_fin' => $fecha_fin ,
                      ':paciente' => $_POST['paciente'],
                      ':estado' => 'ACTIVO' ,
                      ':costo_fac' => $factura_dias

        ));*/
	



    }
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();


    //preveer si es la primera receta
    /*
    $recetasQuery="SELECT COUNT(*) as suma FROM RECETAS WHERE paciente='$id_usuario'";

    $resultRecQuery = $db->query($recetasQuery);
    foreach ($resultRecQuery as $firstRec);
    $total_recetas = $firstRec['suma'];
    if($total_recetas>1){
        header('location: ../modificar.php?id='.$id_usuario);       
    }else{
        
        header('location: ../Visor/pdf_resp.php?id='.$_POST['cedula'].'');

    }*/
    header('location: ../modificar.php?id='.$paciente3);
 
 

	
?>