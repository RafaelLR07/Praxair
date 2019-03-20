<?php

include_once('../Scripts/DBconexion.php');        


	$database = new Connection();
	$db = $database->open();
	try{
        //hacer uso de una declaración preparada para prevenir la inyección de sql
        
        $var_estado='ACTIVO';
        $pat_p = $_POST['ap_paterno'];
        $mat_p = $_POST['ap_materno'];
        $nombre_p = $_POST['nombre'];
        $nombre_p_comp = $pat_p." ".$mat_p." ".$nombre_p;

        $pat_f = $_POST['ap_paterno_f'];
        $mat_f = $_POST['ap_materno_f'];
        $nombre_f = $_POST['nombre_f'];
        $nombre_f_comp = $pat_f. " " .$mat_f." ".$nombre_f;

        $fecha = $_POST['fecha_nac'];
        $dat = date("Y/m/d", strtotime($fecha));


        $stmt = $db->prepare("INSERT INTO pacientes(cedula, no_paciente, nombre, telefono, fecha_nacimiento, edad, calle, numero_exterior, numero_interior, colonia,
        cp, ciudad, municipio, entre_calle1, entre_calle2, familiar_responsable, parentesco, email_familiar, telefono_familiar,
        observaciones, estado) 
        VALUES (:cedula, :no_paciente, :nombre, :telefono, :fecha_nacimiento, :edad, :calle, :numero_exterior, :numero_interior, :colonia,
:cp, :ciudad, :municipio, :entre_calle1, :entre_calle2, :familiar_responsable, :parentesco, :email_familiar, :telefono_familiar,
:observaciones, :estado)");
        //instrucción if-else en la ejecución de nuestra declaración preparada
        $_SESSION['message'] = ( $stmt->execute(
            array(
                
                    ':cedula' => $_POST['cedula'] ,
                    ':no_paciente' => $_POST['no_paciente'] ,
                    ':nombre' => $nombre_p_comp , 
                    ':telefono' => $_POST['telefono'] , 
                    ':fecha_nacimiento' => $dat , 
                    ':edad' => $_POST['edad'] , 
                    ':calle' => $_POST['calle'] , 
                    ':numero_exterior' => $_POST['num_ext'] , 
                    ':numero_interior' => $_POST['num_int'] , 
                    ':colonia' => $_POST['colonia'] ,
                    ':cp' => $_POST['cp'] , 
                    ':ciudad' => $_POST['ciudad'] , 
                    ':municipio' => $_POST['municipio'] , 
                    ':entre_calle1' => $_POST['calle_1'] , 
                    ':entre_calle2' => $_POST['calle_2'] , 
                    ':familiar_responsable' => $nombre_f_comp , 
                    ':parentesco' => $_POST['parentesco'] , 
                    ':email_familiar' => $_POST['email'] , 
                    ':telefono_familiar' => $_POST['telefono_fav'] ,
                    ':observaciones' => $_POST['observaciones'] , 
                    ':estado' => $var_estado
                )) ) 
            ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';
            date_default_timezone_set('America/Mexico_City');
            $fecha = strftime("%Y-%m-%d");
		
	        $stmt4 = $db->prepare("INSERT INTO altas (fecha_alta, cedula) 
            VALUES (:fecha_alta, :cedula)");

            
        
            $stmt4->execute(array(
                      ':fecha_alta' => $fecha ,
                      ':cedula' => $_POST['cedula']
                      

            ));



        }
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();


//header('location:../modificar.php?id='.$_POST['cedula'].'');

header('location: ../Visor/pdf_resp.php?id='.$_POST['cedula'].'');

//header('location: ../index.php');


	
?>