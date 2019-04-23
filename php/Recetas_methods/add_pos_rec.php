<?php

include_once('../Scripts/DBconexion.php');        
include_once('../Visor/fechas.php');


	$database = new Connection();
	$db = $database->open();
	try{
        //hacer uso de una declaración preparada para prevenir la inyección de sql
        $fechas_functions = new funciones_varias();
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
        $indicaciones = $_POST['indicaciones'];

        //Registro general de indicaciones

      

       


		$stmt = $db->prepare("INSERT INTO recetas (serie, fecha, diagnostico, indicaciones, estado, paciente, oxigeno, medico, costo)
        VALUES (:serie, :fecha, :diagnostico, :indicaciones, :estado, :paciente, :oxigeno, :medico, :costo)");
        //instrucción if-else en la ejecución de nuestra declaración preparada
        $_SESSION['message'] = ( 
            $stmt->execute(
                array( ':serie'=> $_POST['no_serie'], 
                ':fecha'=> $dat, 
                ':diagnostico'=> $_POST['diagnostico'], 
                ':indicaciones'=> $indicaciones, 
                ':estado'=> 'SIN', 
                ':paciente'=> $_POST['paciente'], 
                ':oxigeno'=> $_POST['oxigeno'], 
                ':medico'=> $_POST['medico'], 
                ':costo'=> $costo)) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';
        

        $pacient3 = $_POST['paciente'];
       
        //consulta de id guardado de recetas
        $skl_id_rec = "SELECT MAX(id_recetas) as id_recetas FROM recetas";
        $result_rec_id = $db->query($skl_id_rec);
        foreach ($result_rec_id as $ulti_id);

        //insertar en facturas
        $stmt3 = $db->prepare("INSERT INTO facturas (oxigeno, costo, dias_fac, fec_ini, fec_fin, paciente, estado, costo_fac,id_receta) 
          VALUES (:oxigeno, :costo, :dias_fac, :fec_ini, :fec_fin, :paciente, :estado, :costo_fac,:id_receta)");
        
        $recetasQuery="SELECT COUNT(*) as suma FROM recetas WHERE paciente='$pacient3'";

        $resultRecQuery = $db->query($recetasQuery);
        foreach ($resultRecQuery as $firstRec);
        $total_recetas = $firstRec['suma'];
        if($total_recetas>1){
            $fecha = $fechas_functions->get_init_month($_POST['fecha']);
        }else{
            $fecha = $_POST['fecha'];

        }
      
        $fecha_regis = $fecha;
        $fecha_ini = $fecha;
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
        $ulti_id['id_recetas'];
        $array = array(
                      ':oxigeno' =>$_POST['oxigeno'] ,
                      ':costo' => $costo,
                      ':dias_fac' => $dias_fac,
                      ':fec_ini' => $fecha_ini,
                      ':fec_fin' => $fecha_fin ,
                      ':paciente' => $_POST['paciente'],
                      ':estado' => 'ACTIVO' ,
                      ':costo_fac' => $factura_dias,
                      ':id_receta' => $ulti_id['id_recetas']

        );  
       
        $stmt3->execute($array);	
	       
        echo var_dump($array);


    }
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
  
       

     header('location: ../modificar.php?id='.$id_usuario);       
 

	
?>