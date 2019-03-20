<?php
	
	include_once('../Scripts/DBconexion.php');   

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		$valor="INACTIVO";
		$cedula = $_GET['id'];
			
		try{
			$sql_1 = "DELETE FROM recetas WHERE paciente= '".$cedula."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql_1) ) ? 'Receta Borrada' : 'Hubo un error al borrar la receta';

			$sql_2 = "DELETE FROM altas WHERE cedula= '".$cedula."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql_2) ) ? 'Alta borrada' : 'Hubo un error al borrar la alta';

			$sql_3 = "DELETE FROM facturas WHERE paciente= '".$cedula."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql_3) ) ? 'Factura eliminada' : 'Hubo un error al borrar la factura';

			$sql_4 = "DELETE FROM pacientes WHERE cedula= '".$cedula."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql_4) ) ? 'Paciente Borrado' : 'Hubo un error al borrar al paciente';


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
	

	header('location: ../Pacientes_pend.php');

?>