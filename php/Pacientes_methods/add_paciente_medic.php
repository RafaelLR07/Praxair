<?php

include_once('../Scripts/DBconexion.php');        
include_once('../Visor/fechas.php');
      session_start();

      
      $name="";
      if(isset($_SESSION['u_usuario'])){
        $name = $_SESSION['u_usuario'];
        $no_user = $_SESSION['u_nouser'];
      }else{
        header("Location: ../index.php");
      }
    
    

	$database = new Connection();
	$db = $database->open();
	try{
        //hacer uso de una declaración preparada para prevenir la inyección de sql
        $medico = $name;
        $var_estado='ACTIVO';
        $pat_p = $_POST['ap_paterno'];
        $mat_p = $_POST['ap_materno'];
        $nombre_p = $_POST['nombre'];
        $nombre_p_comp = $pat_p." ".$mat_p." ".$nombre_p;
       $indicaciones = $_POST['dos_min']."/". $_POST['hora_dosis']."/".$_POST['tiempo'];
       

        
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
                    ':indicaciones' => $indicaciones,

                )) ) 
            ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';
		
	
        $oxigeno = $_POST['oxigeno'];
        $query_oxi = "SELECT * FROM oxigenos WHERE id_oxigenos='$oxigeno'";
        foreach ($db->query($query_oxi) as $row);

            
        
        //insertar en recetas
        $stmt2 = $db->prepare("INSERT INTO recetas(serie,fecha,diagnostico, indicaciones, estado, paciente, oxigeno, medico, costo) VALUES (:serie,:fecha,:diagnostico, :indicaciones, :estado, :paciente, :oxigeno, :medico, :costo) ");
        date_default_timezone_set('America/Mexico_City');
        $fecha = strftime("%Y-%m-%d");
        
        //echo $fecha;
        $stmt2->execute(array(
                      ':serie' => $_POST['serie'] ,
                      ':fecha' => $fecha,
                      ':diagnostico' => $_POST['diagnostico'] ,
                      ':indicaciones' => $indicaciones ,
                      ':estado' => $var_estado,
                      ':paciente' => $_POST['cedula'] ,
                      ':oxigeno' => $row['id_oxigenos'] ,
                      ':medico' => $medico ,
                      ':costo' => $row['precio'] ,

        ));

        //insertar en facturas
        $stmt3 = $db->prepare("INSERT INTO facturas (oxigeno, costo, dias_fac, fec_ini, fec_fin, paciente, estado, costo_fac) 
          VALUES (:oxigeno, :costo, :dias_fac, :fec_ini, :fec_fin, :paciente, :estado, :costo_fac)");

        date_default_timezone_set('America/Mexico_City');
        $fecha = strftime("%Y-%m-%d");
        $fechas_functions = new funciones_varias();
        $fecha_regis = $fecha;
        $fecha_ini = $fechas_functions->getOneday($fecha_regis);
        $fecha_fin = $fechas_functions->getFin($fecha_regis);

        $dias_fac = $fechas_functions->getDiasFac($fecha_ini,$fecha_fin);
        $factura_dias = $dias_fac*$row['precio'];
        
        /*
        echo 'inicio';
        echo "<input type='date' value='$fecha_ini'/>";
        echo 'final';
        echo "<input type='date' value='$fecha_fin'/>";
        echo '<br>'.$fecha_ini.'<br>';
        echo $fecha_fin.'<br>';
        echo $dias_fac.'<br>'; */


        //echo var_dump($fecha_fin);
       // echo $fecha_fin;

        $stmt3->execute(array(
                      ':oxigeno' => $row['id_oxigenos'] ,
                      ':costo' => $row['precio'] ,
                      ':dias_fac' => $dias_fac,
                      ':fec_ini' => $fecha_ini,
                      ':fec_fin' => $fecha_fin ,
                      ':paciente' => $_POST['cedula'],
                      ':estado' => $var_estado ,
                      ':costo_fac' => $factura_dias

        ));

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

//header('location: ../Visor/pdf_resp.php?id='.$_POST['cedula'].'');

//header('location: ../VisorMed.php?ido='.$no_user.'&id='.$_POST['cedula']);
echo "<script>"."alert('Paciente registrado');"."</script>";
header('location: ../Registro-Paciente_med.php');



	
?>
