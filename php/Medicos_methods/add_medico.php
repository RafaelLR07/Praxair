<?php

include('../Scripts/DBconexion.php');        


	$database = new Connection();
	$db = $database->open();
	try{
        //hacer uso de una declaración preparada para prevenir la inyección de sql
        $no_empleado = $_POST['num_empleado'];
        
		$nombre =$_POST['nombre'];
		$user = 'Usuario';

        $nombre_c = $paterno." ".$materno." ".$nombre;

		$stmt = $db->prepare("INSERT INTO medicos (no_empleado, nombre, especialidad) VALUES (:num_empleado, :nombre, :especialidad)");

		
        
        //instrucción if-else en la ejecución de nuestra declaración preparada
        $stmt->execute(array(':num_empleado' => $no_empleado,':nombre' => $nombre  , ':especialidad' => $_POST['especialidad']));
			
		$stmt2 = $db->prepare("INSERT INTO usuarios (no_empleado, nombre, pass, tipo_usuario) VALUES (:no_empleado, :nombre, :pass, :tipo_usuario)");
		
		$stmt2->execute(array(':no_empleado' => $no_empleado,
							  ':nombre' => $nombre_c  , 
		                   	  ':pass' => $no_empleado,
						      ':tipo_usuario' => $user));

	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();



header('location: ../Medicos.php');
	
?>