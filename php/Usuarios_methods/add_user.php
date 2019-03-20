<?php

include_once('../Scripts/DBconexion.php');        


	$database = new Connection();
	$db = $database->open();
	try{
        //hacer uso de una declaración preparada para prevenir la inyección de sql
        $nombre_c = $_POST['ap_paterno'].' '.$_POST['ap_materno'].' '.$_POST['nombre'];
        $stmt = $db->prepare("INSERT INTO usuarios (no_empleado, nombre, pass, tipo_usuario) VALUES (:no_empleado, :nombre, :pass, :tipo_usuario)");
        //instrucción if-else en la ejecución de nuestra declaración preparada
        $_SESSION['message'] = ( $stmt->execute(array(':no_empleado' => $_POST['no_empleado'],':nombre' => $nombre_c,':pass' => $_POST['contra'],':tipo_usuario' => $_POST['tipo_user'])) ) ? 'Usuario guardado correctamente' : 'Algo salió mal. No se puede agregar usuario';
		
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();



header('location: ../Usuario.php');
	
?>