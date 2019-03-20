<?php
    include_once('../Scripts/DBconexion.php');  
    $database = new Connection();
    $db = $database->open();
    $inactivo="INACTIVO";
      try{  
				$sql = "SELECT * FROM medicos ";
				$sl = "SELECT * FROM especialidades ";
        
        if(isset($_POST['consulta']))
        {
				$q = $_POST['consulta'] ;
				$sl = "SELECT * FROM especialidades ";
        $sql = "SELECT * FROM medicos WHERE
								no_empleado LIKE '%".$q."%' OR
								nombre LIKE '%".$q."%' OR
    						especialidad LIKE '%".$q."%'";
		    
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
					<td >NO. EMPLEADO	    </td>
					<td >NOMBRE		</td>
					<td >ESPECIALIDAD		</td>
					<td >ACCIÓN	</td>
					
				</tr>
			</thead>
			<tbody>";
			$special = "";
			foreach ($resultado as $row) {
				$res = $db->query($sl);
				foreach($res as $espe){
					if($row['especialidad']==$espe['id_especialidad']){
						$special = $espe['especialidad'];
					}
				}
				


				$var_id = $row['no_empleado'];
				
								
				$var_del_link = "#delete_".$row['no_empleado'];
				$var_del_ever = "<a  href=".$var_del_link."
				class='btn btn-danger btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-trash'></span>"."</a>";
				
				$var_up_link = "#edit_".$row['no_empleado'];
				$var_up_ever = "<a  href=".$var_up_link."
				class='btn btn-success btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
				
								
				$salida.='<tr>
							<td>'.$row['no_empleado'].'</td>
							<td>'.$row['nombre'].'</td>
							<td>'.$special.'</td>
													
							<td>'.$var_up_ever.$var_del_ever.'</td>';
							include('./borrar_editar_mod.php');

							
							
							
			
								
	
						
			$salida.='				
			
            
    
						</tr>';
	
			}
			$salida.="</tbody></table>";
			
		}else{
			$salida.="NO HAY DATOS :(";
		}
		echo $salida;	

	   
		

		
      }
      catch(PDOException $e){
        echo "Hubo un problema en la conexión: " . $e->getMessage();
	  }
	  

	  

      //Cerrar la Conexion
      $database->close();

    ?>  