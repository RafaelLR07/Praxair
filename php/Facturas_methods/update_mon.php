<?php
	
	include_once('../Scripts/DBconexion.php');   
	

	if(isset($_POST['mon_up'])){
		$valor = $_GET['id'];
		$mont = $_POST['mon'];
		$query = "";

	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	//header('location: ../Facturas.php');

?>