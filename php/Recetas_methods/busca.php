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
		
		$q2 = $_POST['valor2'] ;
        $sql = "SELECT id_recetas,diagnostico,indicaciones,medico,paciente, serie, fecha, oxigeno FROM 
		recetas WHERE paciente='$q2'";
        
        if(isset($_POST['consul']))
        {
		$q = $_POST['consul'] ;
		$q2 = $_POST['valor2'] ;
		
		
		
        $sql = "SELECT * FROM recetas WHERE
		paciente='$q2' AND(
		serie LIKE '%".$q."%' OR
		fecha LIKE '%".$q."%' OR
		oxigeno LIKE '%".$q."%')";
		    
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
					<td >Serie	    </td>
					<td >Fecha		</td>
					<td >Oxigeno	</td>
					<td > Paciente   </td>
					
				</tr>
			</thead>
			<tbody>";
			
			foreach ($resultado as $fila) {
				$oxigeno = $fila['oxigeno'];
				$kuery_oxi = "SELECT tipo from oxigenos WHERE id_oxigenos='$oxigeno'";
				$resultOxi_kuery = $db->query($kuery_oxi);
				foreach ($resultOxi_kuery as $oxi_name);

				//$var_link = "modificar.php?id=".$vari_update;
				$var_id = $fila['id_recetas'];
				$vari_update = "#modificar";
				$var_del = "#edit_";
				$var_del_link = $var_del.$fila['id_recetas'];
				$var_del_ever = "<a  href=".$var_del_link."
				class='btn btn-success btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
				
								
				$var_link = $vari_update.".php?id=".$var_id;
				$var_todo = "<a  href='$var_link'
				class='btn btn-success btn-sm'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
				
				$salida.='<tr>
							<td>'.$fila['serie'].'</td>
							<td>'.$fila['fecha'].'</td>
							<td>'.$oxi_name['tipo'].'</td>
							<td>'.$fila['paciente'].'</td>
							<td>'.$var_del_ever.'</td>';
					
							include('./borrar_editar_mod.php');

							
								
	
						
			$salida.='</tr>';
	
			}
			$salida.="</tbody></table>";
			
		}else{
			$salida.='<div class="alert alert-danger">Sin resultados</div>';
		}
		echo $salida;	

	   
		

		
      }
      catch(PDOException $e){
        echo "Hubo un problema en la conexión: " . $e->getMessage();
	  }
	  

	  

      //Cerrar la Conexion
      $database->close();

    ?>  