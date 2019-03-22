<?php
    include_once('../Scripts/DBconexion.php');  
    $database = new Connection();
	$db = $database->open();
	$activo="ACTIVO";

	session_start();
    $name="";
  
    if(isset($_SESSION['u_usuario'])){
        $name = $_SESSION['u_usuario'];
      }else{
        header("Location: ../index.php");
      }
 
	 $variable = $_SESSION['u_rol'];
	 
	 
	try{  
        $sql = "SELECT no_paciente, cedula, nombre, ciudad, municipio, telefono, familiar_responsable
		 FROM pacientes  WHERE estado='$activo' AND ciudad=''";
        
        if(isset($_POST['consulta']))
        {
		$q = $_POST['consulta'] ;
		
        $sql = "SELECT * FROM pacientes WHERE
		ciudad ='' AND estado='$activo' AND(
		cedula LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
        ciudad LIKE '%".$q."%' OR
        municipio LIKE '%".$q."%' OR
        telefono LIKE '%".$q."%' OR
		familiar_responsable LIKE '%".$q."%')
		";
		    
        }

		$salida="";
		$vari_update="update";
		$var_link="";
		$var_id="";
		$var_del="";
		$var_del_link="";
		$var_del_ever="";

		$resultado = $db -> query($sql);
		if (($resultado->rowCount())>0) {
			
			$salida.="<table class='table table-striped' id='tabla_resultado'>
			<thead>
				<tr class='table-bordered'>
					<td >Cédula	    </td>
					<td >Nombre		</td>
					<td >Ciudad		</td>
					<td >Municipio	</td>
					<td >Telefono	</td>							
					<td >Responsable</td>
					<td >Acción		</td>
				</tr>
			</thead>
			<tbody>";
			
			foreach ($resultado as $fila) {
				
				//$var_link = "modificar.php?id=".$vari_update;
				$var_id = $fila['cedula'];

				$var_city = $fila['ciudad'];
				$vari_update = "Modifi_inicial";

				
				list($var1, $var2) = explode("/", $fila['cedula']);
				$cedula_uni = $var1.$var2;
				

				$var_del_link = "#delete_".$cedula_uni;
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
							<td>'.$fila['municipio'].'</td>
							<td>'.$fila['ciudad'].'</td>
							<td>'.$fila['telefono'].'</td>
							<td>'.$fila['familiar_responsable'].'</td>
							
							<td>'.$var_todo.$var_del_ever.'</td>';
							include('./mod_eliminar.php');

							
							
							
			
								
	
						
			$salida.='				
			
            
    
						</tr>';
	
			}
			$salida.="</tbody></table>";
			
		}else{
			$salida.='<div class="alert alert-danger">Sin resultados</div>';		}
		echo $salida;	

	   
		

		
      }
      catch(PDOException $e){
        echo "Hubo un problema en la conexión: " . $e->getMessage();
	  }
	  

	  

      //Cerrar la Conexion
      $database->close();

    ?>  