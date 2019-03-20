<?php
	
	include_once('../Scripts/DBconexion.php');    
    
    
	if(isset($_GET['id'])){
		$database = new Connection();
        $db = $database->open();
        
		try{
            $valor="ACTIVO";
            $cedula = $_GET['id'];
            
			$sql = "UPDATE pacientes SET estado = '".$valor."' WHERE cedula= '".$cedula."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Paciente reactivado' : 'Hubo un error al reactivar al paciente';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar miembro para eliminar primero';
	}

	header('location: ../Inactivos.php');

?>