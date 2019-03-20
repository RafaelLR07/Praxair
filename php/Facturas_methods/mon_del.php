<?php
	
	include_once('../Scripts/DBconexion.php');    

	if(isset($_GET['id'])){
		$database = new Connection();
    	$db = $database->open();
		//actualizar el monto
		$valor = $_GET['id'];
		$valor_mes = $_GET['ido'];

	$sql = "UPDATE monto_anual SET monto = monto -'$valor_mes' WHERE id_monto = '$valor'";

		//if-else statement in executing our query
		$_SESSION['message'] = ( $db->exec($sql) ) ? 'Monto actualizado correctamente' : 'No se puso actualizar monto';
	}
	

	header('location: ../Facturas.php');

?>