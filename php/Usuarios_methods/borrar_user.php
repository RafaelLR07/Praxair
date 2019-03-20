<?php
	
	include_once('../Scripts/DBconexion.php');    

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM usuarios WHERE no_empleado = '".$_GET['id']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Usuario Borrado' : 'Hubo un error al borrar el usuario';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar usuario para eliminar primero';
	}

	header('location: ../Usuario.php');

?>