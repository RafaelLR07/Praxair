<?php
	
	include_once('../Scripts/DBconexion.php');   
	include_once('../Visor/fechas.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		$valor=$_POST['estatus'];
		$cedula = $_GET['id'];
		$no_user = $_GET['ido'];

		$fecha = $_POST['fecha_doun'];

		
	 $_POST['diagnostico'];
	 $_POST['indicaciones'];


			
		try{
			$sql = "UPDATE pacientes SET estado = '".$valor."' WHERE cedula= '".$cedula."'";

			$stmt = $db->prepare("INSERT INTO salidas_dos(diagnostico, indicaciones,cedula_paci) VALUES (:diagnostico, :indicaciones, :cedula_paci)");

			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Paciente Borrado' : 'Hubo un error al borrar al paciente';
			
			      
            
			$_SESSION['message'] = ( $stmt->execute(
				array(
                
					':diagnostico' => $_POST['diagnostico'] ,
                    ':indicaciones' => $_POST['indicaciones'] ,
                    ':cedula_paci' => $cedula , 
                     )	));

			$stmt2 = $db->prepare("INSERT INTO bajas(no_baja, fecha,paciente) VALUES (:no_baja, :fecha, :paciente)");

			//date_default_timezone_set('America/Mexico_City');
        	//$fecha = strftime("%Y-%m-%d");
			 $stmt2->execute(
				array(
                	':no_baja' => "1" ,
                    ':fecha' => $fecha ,
                    ':paciente' => $cedula 
                     ));	

			$sql4 = "SELECT id_factura, fec_ini, costo  from facturas
					WHERE fec_fin  = (
    					SELECT MAX(fec_fin)
    					FROM facturas WHERE paciente = '$cedula'
						) and  paciente = '$cedula'";

			foreach ($resultado = $db -> query($sql4) as $fill);
 

            $fun_dates = new funciones_varias();
            $days = $fun_dates->getDiasFac($fill['fec_ini'], $fecha);
            $cost = $days * $fill['costo'];
            //echo $costo.'          '.$fill['costo'];
			 $stm3 = "UPDATE facturas SET estado = '$valor' ,fec_fin = '$fecha', dias_fac = '$days'	,costo_fac = '$cost'
                    WHERE id_factura = ".$fill['id_factura'];

            $db->exec($stm3);

            
		
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
	
	//accion de dar de baja

	$action=6;

	//header('location: ../index.php');
	header('location: ../Visor_baja.php?ido='.$no_user.'&id='.$cedula);

?>