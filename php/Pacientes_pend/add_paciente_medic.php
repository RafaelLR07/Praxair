<?php

include_once('../Scripts/DBconexion.php');   
include('../Recetas_methods/add_first_rec.php');

      session_start();

      
      $name="";
      if(isset($_SESSION['u_usuario'])){
        $name = $_SESSION['u_usuario'];
      }else{
        header("Location: ../index.php");
      }
    
    

	$database = new Connection();
	$db = $database->open();
	try{
        //hacer uso de una declaración preparada para prevenir la inyección de sql
        echo $name;
        $var_estado='ACTIVO';
        $pat_p = $_POST['ap_paterno'];
        $mat_p = $_POST['ap_materno'];
        $nombre_p = $_POST['nombre'];
        $nombre_p_comp = $pat_p." ".$mat_p." ".$nombre_p;

      

        $stmt = $db->prepare("INSERT INTO pacientes(cedula, no_paciente, nombre, telefono, fecha_nacimiento, edad, calle, numero_exterior, numero_interior, colonia,
        cp, ciudad, municipio, entre_calle1, entre_calle2, familiar_responsable, parentesco, email_familiar, telefono_familiar,
        observaciones, estado, diagnostico, indicaciones) 
        VALUES (:cedula, :no_paciente, :nombre, :telefono, :fecha_nacimiento, :edad, :calle, :numero_exterior, :numero_interior, :colonia,
:cp, :ciudad, :municipio, :entre_calle1, :entre_calle2, :familiar_responsable, :parentesco, :email_familiar, :telefono_familiar,
:observaciones, :estado, :diagnostico, :indicaciones)");
        //instrucción if-else en la ejecución de nuestra declaración preparada
        $_SESSION['message'] = ( $stmt->execute(
            array(
                
                    ':cedula' => $_POST['cedula'] ,
                    ':no_paciente' => 0 ,
                    ':nombre' => $nombre_p_comp , 
                    ':telefono' => "", 
                    ':fecha_nacimiento' => "" , 
                    ':edad' => $_POST['edad'] , 
                    ':calle' => "" , 
                    ':numero_exterior' => "" , 
                    ':numero_interior' => "" , 
                    ':colonia' => "" ,
                    ':cp' => "" , 
                    ':ciudad' => "", 
                    ':municipio' => "", 
                    ':entre_calle1' => "", 
                    ':entre_calle2' => "", 
                    ':familiar_responsable' => "" , 
                    ':parentesco' =>"" , 
                    ':email_familiar' => "" , 
                    ':telefono_familiar' => "" ,
                    ':observaciones' => "", 
                    ':estado' =>  $var_estado,
                    ':diagnostico' => $_POST['diagnostico'],
                    ':indicaciones' => $_POST['indicaciones'],

                )) ) 
            ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';
		

        /*

          scrit para insertar una recetam      




        */

       $anadir_receta = new add_first_rec();
       $medico = $añadir_receta->getMedic($_GET['id']);
	   $id_oxigenos = $_POST['oxigeno'];
       $fecha = $_POST['fecha'];
       $serie=$_POST['no_serie'];
       $diagnostico = $_POST['diagnostico'];
       $indicaciones = $_POST['indicaciones'];      
       $paciente = $_POST['paciente'];
       $oxigeno = $_POST['oxigeno'];
       $medico = $_POST['medico'];
       //$oxigeno,$cedula,$fech,$no_serie,$diagnostico,$indicaciones, $estado, $medico
       $anadir_receta->insertar_first_receta($id_oxigenos,$paciente,$fecha,$serie,$diagnostico, $indicaciones, $var_estado, $medico);


                
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();







	
?>