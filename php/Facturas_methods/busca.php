<?php
    include('../Scripts/DBconexion.php');  
    
    $database = new Connection();
    $db = $database->open();
    $salida_null='<br><br><br><div class="alert alert-danger">'.'No hay resultados'.'</div>';
    $mensaje="";
    $min;
	
	try{  

		$sql = "SELECT * FROM facturas ";
						
        if(isset($_POST['fec_inicial']) && isset($_POST['fec_final']))
        {
			
        	$q = $_POST['fec_inicial'];
			$q2 = $_POST['fec_final'];
			$sql = "SELECT * FROM facturas 
			WHERE fec_ini>='$q' AND fec_ini<='$q2' order by paciente";	
	    }

		$salida="";
		$var_aco=0;


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
				 
					<td>PACIENTE</td>
					<td>ESTADO</td>
					<td>OXIGENO</td>
					<td>COSTO</td>
					<td>FECHA INICIO</td>
					<td>FECHA FINAL</td>
					<td>DIAS FACTURADOS</td>
					<td>COSTO TOTAL</td>
					<td>ACCION</td>

					
				</tr>
			</thead>
			<tbody>";
			$special = "";
			$oxi_val="";
			foreach ($resultado as $row) {
			
				$skl = "SELECT id_oxigenos, tipo FROM oxigenos";
				foreach ($db -> query($skl) as $fill){
					if($row['oxigeno'] == $fill['id_oxigenos']){
						$oxi_val = $fill['tipo'];
					}
				}
								
				/*$var_del_link = "#delete_".$row['paciente'];
				$var_del_ever = "<a  href=".$var_del_link."
				class='btn btn-danger btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-trash'></span>"."</a>";*/
				
				$var_up_link = "#edit_".$row['id_factura'];
				$var_up_ever = "<a  href=".$var_up_link."
				class='btn btn-success btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
				
				//$var_aco = $row['costo_fac']+$var_aco;
				$var_aco+=1;

				$salida.='<tr>
	
							<td>'.$row['paciente'].'</td>
							<td>'.$row['estado'].'</td>
							<td>'.$oxi_val.'</td>
							<td> $ '.$row['costo'].'</td>
							<td>'.$row['fec_ini'].'</td>
							<td>'.$row['fec_fin'].'</td>
							<td>'.$row['dias_fac'].'</td>
							<td> $ '.$row['costo_fac'].'</td>
							
													
							<td>'.$var_up_ever.'</td>';
							include('./editar_mod.php');

			$salida.='</tr>';
	
			}

			$salida.="</tbody></table>";
			 $value = "$ ".$var_aco." pesos";
			$mensaje.= '<div class="row">';
			$mensaje.='<div style="height: 60px;" class="alert alert-warning col-md-6 ">'.'Total de facturacion del mes:   '.$value.'</div>';


			$mon_query = "SELECT * FROM monto_anual";
		    $resul = $db->query($mon_query);

		    foreach ($resul as $co);
		    $var_link22 = "#edit_".$co['id_monto'];
		    $var_link33 = "#delete_".$co['id_monto'];

		    $button = "<a  href='$var_link22' style='margin-left:50%;' class='btn btn-success btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
			include('./monAnual_mod.php');
			$button2 = "<a  href='$var_link33' class='btn btn-danger btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-send'></span>"."</a>";

			include('./monDel.php');
			//$mensaje = 
			$mensaje .= '<div class="alert alert-success col-md-6">'.'Presupuesto anual:    '.$co['monto'].$button.$button2.'</div>';

			$mensaje .= '</div>';
			echo $mensaje;

			

			
			
			
		}else{
			$salida.= $salida_null;
		}

		echo $salida;	
		
	  
		

		
      }
      catch(PDOException $e){
        echo "Hubo un problema en la conexión: " . $e->getMessage();
	  }
	  

	  

      //Cerrar la Conexion
      $database->close();

    ?>  