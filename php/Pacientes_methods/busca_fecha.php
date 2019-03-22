<?php 

    include_once('../Scripts/DBconexion.php');  
    $database = new Connection();
	$db = $database->open();
	$activo="ACTIVO";

	session_start();
    $name="";
  
    if(isset($_SESSION['u_usuario'])){
        $name = $_SESSION['u_usuario'];
        $no_user = $_SESSION['u_nouser'];
      }else{
        header("Location: ../index.php");
      }
 
	 $variable = $_SESSION['u_rol'];



	 /*
		Inicia el file de consulta y busqueda de pacientes
		con respecto a un rango de fecha dado en un formulario
		enviado a travez de AJAX


	 */

	 //la salida de impresion
	 $salida_null='<div class="alert alert-danger">'.'No hay resultados'.'</div>';
	 $salida="";
	 
	if(isset($_POST['fec_inicial'])&&isset($_POST['fec_final'])){
	 
	try{  
		
		$fec_inicial = $_POST['fec_inicial'];
		$fec_final = $_POST['fec_final'];
		

	$sql = "SELECT pacientes.no_paciente, pacientes.nombre, altas.cedula, altas.fecha_alta
			FROM pacientes INNER JOIN altas
			WHERE 
			ciudad!='' AND
			estado='$activo' 
			AND (pacientes.cedula = altas.cedula) 
			AND (altas.fecha_alta>='$fec_inicial' 
			AND  altas.fecha_alta<='$fec_final')";

	
        /*
       
		$vari_update="update";
		$var_link="";
		$var_id="";
		$var_del="";
		$var_del_link="";
		$var_del_ever="";*/

		$resultado = $db -> query($sql);
		if (($resultado->rowCount())>0) {
			
			$salida.="<table class='table table-striped' id='tabla_resultado'>
			<thead>
				<tr class='table-bordered'>
					<td >Cédula	    </td>
					<td >Nombre		</td>
					<td >Fecha de alta	</td>
					
				</tr>
			</thead>
			<tbody>";
			
			foreach ($resultado as $fila) {
				
				//$var_link = "modificar.php?id=".$vari_update;
				$var_id = $fila['cedula'];
				
				$vari_update = "modificar";
				$var_del = "#delete_";
				$var_del_link = $var_del.$fila['no_paciente'];
				$var_del_ever = "<a  href=".$var_del_link."
				class='btn btn-danger btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-trash'></span>"."</a>";
				
								
				$var_link = $vari_update.".php?id=".$var_id;
				$var_todo = "<a  href='$var_link'
				class='btn btn-success btn-sm'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
				
				$salida.='<tr>
							<td>'.$fila['cedula'].'</td>
							<td>'.$fila['nombre'].'</td>
							<td>'.$fila['fecha_alta'].'</td>
							
							
							<td>'.$var_todo.$var_del_ever.'</td>';
							include('./mod_eliminar.php');

							
							
							
			
								
	
						
			$salida.='</tr>';
	
			}
			$salida.="</tbody></table>";
			
		}else{
			$salida.=$salida_null;
		}
		echo $salida;	

	   
		

		
      	 }
      	catch(PDOException $e){
        	echo "Hubo un problema en la conexión: " . $e->getMessage();
	    }
	  
	  } 

	  else if(isset($_POST['valor'])){
	  		 
		try{  
		
	     $ubicacion = $_POST['valor'];
	     if($ubicacion!='XALAPA'){
	     	 $sql = "SELECT pacientes.ciudad,pacientes.no_paciente, pacientes.nombre, altas.cedula, altas.fecha_alta
			FROM pacientes INNER JOIN altas
			WHERE 
			ciudad!='' AND
			estado='$activo' 
			AND (pacientes.cedula = altas.cedula) 
			AND (pacientes.ciudad!='$ubicacion')";
	     }else{

		    $sql = "SELECT pacientes.ciudad,pacientes.no_paciente, pacientes.nombre, altas.cedula, altas.fecha_alta
			FROM pacientes INNER JOIN altas
			WHERE estado='$activo' 
			AND (pacientes.cedula = altas.cedula) 
			AND (pacientes.ciudad='$ubicacion')";
	     }
		 
		


	
        
			$resultado = $db -> query($sql);
			if (($resultado->rowCount())>0) {
			
			   $salida.="<table class='table table-striped' id='tabla_resultado'>
				   <thead>
					<tr class='table-bordered'>
						<td >Cédula	    </td>
						<td >Nombre		</td>
						<td >Fecha de alta	</td>
						<td >Ciudad	</td>

						
				</tr>
			</thead>
			<tbody>";
			
			foreach ($resultado as $fila) {
				
				//$var_link = "modificar.php?id=".$vari_update;
				$var_id = $fila['cedula'];
				
				$vari_update = "modificar";
				$var_del = "#delete_";
				$var_del_link = $var_del.$fila['no_paciente'];
				$var_del_ever = "<a  href=".$var_del_link."
				class='btn btn-danger btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-trash'></span>"."</a>";
				
								
				$var_link = $vari_update.".php?id=".$var_id;
				$var_todo = "<a  href='$var_link'
				class='btn btn-success btn-sm'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
				
				$salida.='<tr>
							<td>'.$fila['cedula'].'</td>
							<td>'.$fila['nombre'].'</td>
							<td>'.$fila['ciudad'].'</td>
							<td>'.$fila['fecha_alta'].'</td>
							
							
							<td>'.$var_todo.$var_del_ever.'</td>';
							include('./mod_eliminar.php');

							
							
							
			
								
	
						
			$salida.='</tr>';
	
			}
			$salida.="</tbody></table>";
			
		}else{
			$salida.=$salida_null;
		}
		echo $salida;	

	   
		

		
      	 }
      	catch(PDOException $e){
        	echo "Hubo un problema en la conexión: " . $e->getMessage();
	    }

	  }



      //Cerrar la Conexion
      $database->close();

    
 ?>