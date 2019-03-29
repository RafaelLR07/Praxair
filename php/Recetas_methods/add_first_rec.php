<?php

include('../Scripts/DBconexion.php');        


	

    /**
    * 
    */
    $database = new Connection();
    $db = $database->open();
    class add_first_rect
    {
        
        

        function getMedic($medico){
         
            $kuery = "SELECT no_empleado from medicos WHERE no_empleado='$medico'";
            foreach($db->query($kuery) as $medic);
            $valor = $medic['no_empleado'];
            return $valor;

        }

        function insertar_first_receta($oxigeno,$cedula,$fech,$no_serie,$diagnostico,$indicaciones, $estado, $medico )
        
        {
        try{
            //hacer uso de una declaración preparada para prevenir la inyección de sql
            
            
            $query = "SELECT * FROM oxigenos WHERE id_oxigenos='$oxigeno'";
            $costo=0;
            foreach($db->query($query) as $row){
            $costo = $row['precio'];
            }
        
                //$id_usuario = $_POST['idd'];
                $fecha = $fech;
                date_default_timezone_set('America/Mexico_City');
                $dat = date("Y/m/d", strtotime($fecha));

                $stmt = $db->prepare("INSERT INTO recetas (serie, fecha, diagnostico, indicaciones, estado, paciente, oxigeno, medico, costo)
                VALUES (:serie, :fecha, :diagnostico, :indicaciones, :estado, :paciente, :oxigeno, :medico, :costo)");
                //instrucción if-else en la ejecución de nuestra declaración preparada
                $_SESSION['message'] = ( 
                    $stmt->execute(
                        array( ':serie'=> $no_serie, 
                        ':fecha'=> $dat, 
                        ':diagnostico'=> $diagnostico, 
                        ':indicaciones'=> $indicaciones, 
                        ':estado'=> $estado, 
                        ':paciente'=> $cedula, 
                        ':oxigeno'=> $oxigeno, 
                        ':medico'=> $medico, 
                        ':costo'=> $costo)) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';
                
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();



    //header('location: ../Visor.php?id='.$_POST['paciente']);
    }







 }

	
?>