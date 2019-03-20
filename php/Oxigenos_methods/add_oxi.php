<?php

include_once('../Scripts/DBconexion.php');        


	$database = new Connection();
	$db = $database->open();
	try{
        //hacer uso de una declaración preparada para prevenir la inyección de sql
        $costo =90.0 ;
        $stmt = $db->prepare("INSERT INTO oxigenos (tipo, precio) VALUES (:tipo, :costo)");
        //instrucción if-else en la ejecución de nuestra declaración preparada
        $_SESSION['message'] = ( $stmt->execute(array(':tipo' => $_POST['nombre'],':costo' => $_POST['costo'])) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';
		
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();



	
header('location: ../Suministro.php');

	
?>