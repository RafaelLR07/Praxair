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
        $sql = "SELECT * FROM oxigenos";
        
        if(isset($_POST['consulta']))
        {
		$q = $_POST['consulta'] ;
		
        $sql = "SELECT * FROM oxigenos WHERE
		id_oxigenos LIKE '%".$q."%' OR
		tipo LIKE '%".$q."%' OR
        precio LIKE '%".$q."%'
        
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
                    <td >Costo		</td>
                    <td >Acción		</td>
					
				</tr>
			</thead>
			<tbody>";
			
			foreach ($resultado as $fila) {
				
				//$var_link = "modificar.php?id=".$vari_update;
				$var_id = $fila['id_oxigenos'];
				
				
				$var_del_link = "#delete_".$fila['id_oxigenos'];
				$var_del_ever = "<a  href=".$var_del_link."
				class='btn btn-danger btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-trash'></span>"."</a>";
				
								
				$var_up_link = "#edit_".$fila['id_oxigenos'];
				$var_up_ever = "<a  href=".$var_up_link."
				class='btn btn-success btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
				
				$salida.='<tr>
							<td>'.$fila['id_oxigenos'].'</td>
							<td>'.$fila['tipo'].'</td>
							<td>'.$fila['precio'].'</td>
														
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