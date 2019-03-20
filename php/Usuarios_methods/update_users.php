<?php
	
    include_once('../Scripts/DBconexion.php');     

	if(isset($_POST['editar'])){
		$database = new Connection();
        $db = $database->open();
        
		try{
			$id = $_GET['id'];
			$no_empleado = $_POST['no_empleado'];
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo_user'];
            $contra_2 = $_POST['contra_2'];
			

			$sql = "UPDATE usuarios
                    SET no_empleado='$no_empleado', nombre = '$nombre', pass = '$contra_2', tipo_usuario = '$tipo'
                    WHERE no_empleado = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Usuario actualizado correctamente' : 'No se puso actualizar usuario';

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

	header('location: ../Usuario.php');
    
?>