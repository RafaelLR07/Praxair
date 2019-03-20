<?php
	
    include_once('../Scripts/DBconexion.php');     

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$tipo = $_POST['tipo'];
			$costo = $_POST['precio'];
			

			$sql = "UPDATE oxigenos SET tipo = '$tipo', precio = '$costo'WHERE id_oxigenos = '$id'";
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

	header('location: ../Suministro.php');

?>