<?php
    include('../Scripts/DBconexion.php');  
    
    $database = new Connection();
    $db = $database->open();
    $salida_null='<br><br><br><div class="alert alert-danger">'.'No hay resultados'.'</div>';
    $mensaje="";
    $min;
	
	try{  
		$sql = "SELECT * FROM facturas ";

		
				
        
       	if(isset($_POST['fec_inicial'])&&isset($_POST['fec_final']))
        {
			$q = $_POST['fec_inicial'];
			$q2 = $_POST['fec_final'];
			
			$sql = " SELECT * FROM facturas WHERE fec_ini LIKE '%".$q."%' OR fec_fin LIKE '%".$q."%'";		
	    
        }

       
		echo $salida = $q." ".$q2;	
		
	  
		

		
      }
      catch(PDOException $e){
        echo "Hubo un problema en la conexión: " . $e->getMessage();
	  }
	  

	  

      //Cerrar la Conexion
      $database->close();

    ?>  