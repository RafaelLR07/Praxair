<?php
	
	include_once('../Scripts/DBconexion.php');   
	include_once('../Visor/fechas.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
            $id = $_GET['id'];
            $fec_ini = $_POST['fec_ini'];
			$costo_u = $_POST['costo_u'];
			$oxigeno = $_POST['oxigeno'];

			date_default_timezone_set('America/Mexico_City');
        	$fecha = $fec_ini;
        	$fechas_functions = new funciones_varias();
        	$fecha_regis = $fecha;
        	$fecha_ini = $fecha_regis;
        	$fecha_fin = $fechas_functions->getFin($fecha_regis);

        	$dias_fac = $fechas_functions->getDiasFac($fecha_ini,$fecha_fin);
        	$factura_dias = $dias_fac*$costo_u;
			/*
			echo 'fecha inicio'.$fecha_ini .'<br>';
        	echo  'fecha fin'.$fecha_fin .'<br>';
        	echo  'dias facturados'.$dias_fac .'<br>';
        	echo  'costo de factura'.$factura_dias .'<br>';
        	echo  'factura'. $id .'<br>';*/

        	
			$sql = "UPDATE facturas SET fec_ini = '$fecha_ini', fec_fin = '$fecha_fin ', dias_fac = '$dias_fac', costo_fac = '$factura_dias'     WHERE id_factura = '$id'";

			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Empleado actualizado correctamente' : 'No se puso actualizar empleado';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	
	}else 
		//actualizar el monto
		if(isset($_POST['mon_up'])){
		$database = new Connection();
		$db = $database->open();
		$valor = $_GET['id'];
		$mont = $_POST['mon'];
		
		$sql = "UPDATE monto_anual SET monto = '$mont'WHERE id_monto = '$valor'";

		//if-else statement in executing our query
		$_SESSION['message'] = ( $db->exec($sql) ) ? 'Monto actualizado correctamente' : 'No se puso actualizar monto';
	}


	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: ../Facturas.php');

?>