<?php
    include('../Scripts/DBconexion.php');  
    include('../Visor/fechas.php');
    
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
			$sql = "SELECT  
			pacientes.nombre,
			pacientes.cedula,
		    facturas.id_factura,
			facturas.oxigeno,
			facturas.costo ,
			facturas.dias_fac,
			facturas.fec_ini,
			facturas.fec_fin,
			facturas.paciente,
			facturas.estado ,
			facturas.costo_fac 
			FROM pacientes inner join facturas
			WHERE facturas.paciente = pacientes.cedula AND 
		    facturas.fec_ini>='$q' AND facturas.fec_ini<='$q2'
			order by pacientes.nombre
";	
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
					<td>NOMBRE</td>
					<td>OXIGENO</td>
					<td>COSTO</td>
					<td>FECHA INICIO</td>
					<td>FECHA FINAL</td>
					<td>DIAS FACTURADOS</td>
					<td>COSTO TOTAL</td>
					<td>ACCIÓN</td>
					
					
				</tr>
			</thead>
			<tbody>";
			$special = "";
			$oxi_val="";
			foreach ($resultado as $row) {
				//variables de las fechas
				$q = $_POST['fec_inicial'];
				$q2 = $_POST['fec_final'];
				
				//modal de edicion de factura
				$var_up_link = "#edit_".$row['id_factura'];
				$var_up_ever = "<a  href=".$var_up_link."
				class='btn btn-success btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";


				//apartado para kue pueda vizualisarse los nombres de los oxigenos y
				//no su cedula
				
				$skl = "SELECT id_oxigenos, tipo FROM oxigenos";
				foreach ($db -> query($skl) as $fill){
					if($row['oxigeno'] == $fill['id_oxigenos']){
						$oxi_val = $fill['tipo'];
					}
				}
				
				/*
				$var_up_link = "#edit_".$row['id_factura'];
				$var_up_ever = "<a  href=".$var_up_link."
				class='btn btn-success btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
				*/
				$calculatorFechas = new funciones_varias();
				
				
				//Se guarda la cedula del paciente 
				$paciente = $row['paciente'];
				//Altas
				$altaPaciente = "SELECT * FROM altas WHERE cedula='$paciente' AND fecha_alta>='$q' AND fecha_alta<='$q2' ";

				//Baja
				$bajaPaciente = "SELECT * FROM bajas WHERE paciente='$paciente' AND fecha>='$q' AND fecha<='$q2'";	

				//Facturas mirror
				$cons_factm = "SELECT * from facturas_mirror
					WHERE fecha_update  = (
					    SELECT MAX(fecha_update)
					    FROM facturas_mirror WHERE paciente = '$paciente' 
					    AND fecha_update>='$q' AND  fecha_update<='$q2'
					) and  paciente = '$paciente' AND fecha_update>='$q' AND  fecha_update<='$q2'";

				//consultas de altas y bajas
				//consulta de altas
				$altasPacientes_kuery = $db -> query($altaPaciente);
				//consulta de bajas
				$bajasPacientes_kuery = $db -> query($bajaPaciente);

				//consulta a facturas mirror
				$facturasMirror_kuery = $db -> query($cons_factm);					

				/*
				se valida si el paciente es dato de alta en este
				mes se debera colocar como inicio de facturacion la
				fecha de la receta
				*/

				//hay altas
				if(($altasPacientes_kuery->rowCount())>0){
					$cons_rect = "SELECT * FROM recetas WHERE paciente='$paciente'";

					//consulta la factura_mirror
					$cons_factm = "SELECT * from facturas_mirror
					WHERE fecha_update  = (
					    SELECT MAX(fecha_update)
					    FROM facturas_mirror WHERE paciente = '$paciente' 
					    AND fecha_update>='$q' AND  fecha_update<='$q2'
					) and  paciente = '$paciente' AND fecha_update>='$q' AND  fecha_update<='$q2'";


					$recetasPacientes_kuery = $db -> query($cons_rect);
					foreach($recetasPacientes_kuery as $rec);
					$q = $rec['fecha'];

					//comprobacion de que hay una actualizacion
					$factuMirror_kuery = $db->query($cons_factm);
					if(($factuMirror_kuery->rowCount())>0){
						foreach ($factuMirror_kuery as $actu_update);
						$q = $actu_update['fec_ini'];
						$q2 = $actu_update['fec_fin'];
					}

				}
				//si hay bajas
				if(($bajasPacientes_kuery->rowCount())>0){
					$cons_rect = "SELECT fecha FROM bajas WHERE paciente='$paciente'";
					$recetasPacientes_kuery = $db -> query($cons_rect);
					foreach($recetasPacientes_kuery as $baja_down);
					$q2 = $baja_down['fecha'];

					//consulta la factura_mirror
					$cons_factm = "SELECT * from facturas_mirror
					WHERE fecha_update  = (
					    SELECT MAX(fecha_update)
					    FROM facturas_mirror WHERE paciente = '$paciente' 
					    AND fecha_update>='$q' AND  fecha_update<='$q2'
					) and  paciente = '$paciente' AND fecha_update>='$q' AND  fecha_update<='$q2'";
					//comprobacion de que hay una actualizacion
					$factuMirror_kuery = $db->query($cons_factm);
					if(($factuMirror_kuery->rowCount())>0){
						foreach($facturasMirror_kuery as $actu_update);
						$q = $actu_update['fec_ini'];
						$q2 = $actu_update['fec_fin'];
					}


				}

				//Si existe en facturas mirror debera poner los valores en
				//las fechas y en los precios

				$factuMirror_kuery = $db->query($cons_factm);
				if(($factuMirror_kuery->rowCount())>0){
					foreach($facturasMirror_kuery as $factu_update);
					$q = $factu_update['fec_ini'];
					$q2 = $factu_update['fec_fin'];
				}


				//consulta el nombre del paciente
				$skl = "SELECT nombre FROM pacientes WHERE cedula='$paciente'";
				foreach ($db -> query($skl) as $name);


				$dias_fac = $calculatorFechas->getDiasFac($q,$q2);
				$factura = $dias_fac * $row['costo'];
				$var_aco = $factura + $var_aco;
				
				
				
				$salida.='<tr>
	
							<td>'.$row['paciente'].'</td>
							<td>'.$name['nombre'].'</td>
							<td>'.$oxi_val.'</td>
							<td> $ '.$row['costo'].'</td>
							<td>'.$q.'</td>
							<td>'.$q2.'</td>
							<td>'.$dias_fac.'</td>
							<td> $ '.$factura.'</td>
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