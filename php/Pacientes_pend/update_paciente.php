<?php
	
	include_once('../Scripts/DBconexion.php');   

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{

            $action = 2;
            $id = $_REQUEST['id'];
            
            $nombre_p = $_POST['nombre'];

            
    
            
            $nombre_f = $_POST['nombre_f'];
            
    
            $fecha = $_POST['fecha_nac'];
            $dat = date("Y/m/d", strtotime($fecha));

            
		$cedula = $_POST['cedula'] ;
            $no_paciente = $_POST['no_paciente'] ;
            $nombre = $nombre_p ;
            $telefono = $_POST['telefono'] ;
            $edad = $_POST['edad']  ;
            $calle = $_POST['calle'] ; 
            $numero_exterior = $_POST['num_ext']; 
            $numero_interior = $_POST['num_int']; 
            $colonia = $_POST['colonia'] ;
            $cp = $_POST['cp'] ;
            $ciudad = $_POST['ciudad'] ;
            $municipio = $_POST['municipio'] ;
            $entre_calle1 = $_POST['calle_1'] ;
            $entre_calle2 = $_POST['calle_2'] ;
            $familiar_responsable = $nombre_f ;
            $parentesco = $_POST['parentesco'] ;
            $email_familiar = $_POST['email']; 
            $telefono_familiar = $_POST['telefono_fav'];
            $observaciones = $_POST['observaciones'] ;
            $estado = $_POST['estado'];//estado del paciente Activo inactivo o defunsion

			$sql = "UPDATE pacientes SET cedula = '$cedula',no_paciente = '$no_paciente', nombre= '$nombre', telefono= '$telefono', fecha_nacimiento= '$dat', edad= '$edad', calle= '$calle', numero_exterior='$numero_exterior', numero_interior='$numero_interior', colonia='$colonia',
            cp='$cp', ciudad='$ciudad', municipio='$municipio', entre_calle1='$entre_calle1', entre_calle2='$entre_calle2', familiar_responsable='$familiar_responsable', parentesco='$parentesco', email_familiar='$email_familiar', telefono_familiar='$telefono_familiar',
            observaciones='$observaciones', estado='$estado'
                    WHERE cedula = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Paciente actualizado correctamente' : 'No se puso actualizar paciente';

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

      header('location: ../Visor.php?action='.$action. '&id='.$cedula);

?>