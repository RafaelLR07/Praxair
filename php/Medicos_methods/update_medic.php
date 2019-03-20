<?php
	
	include_once('../Scripts/DBconexion.php');   

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
            $id = $_GET['id'];
			$no_empleado = $_POST['num_empleado'];
			$ap_pat = $_POST['ap_paterno'];
			$ap_mat = $_POST['ap_materno'];
			$nombre = $_POST['nombre'];
			$nombre_com = $ap_pat." ".$ap_mat." ".$nombre;
		    $especialidad = $_POST['especialidad'];

			$sql = "UPDATE medicos SET no_empleado = '$no_empleado', nombre = '$nombre_com', especialidad = '$especialidad' WHERE no_empleado = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Empleado actualizado correctamente' : 'No se puso actualizar empleado';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: ../Medicos.php');

?>