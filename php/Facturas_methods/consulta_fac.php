<div class="container">
	<div class="input-group" id="cont_head">

  
  	<br>
<div class="col-xs-12">
		<div class="row">
			<?php 	
			 include('Visor/fechas.php');

			date_default_timezone_set('America/Mexico_City');
			$fecha = strftime("%Y-%m-%d");

			//instanciamos el objeto fechas para sacar los calculos
			//propios de estas inicio y final de mes por defecto
			$fechas_object = new funciones_varias();
			$fecha_inicio = $fechas_object->get_init_month($fecha);
			$fecha_final = $fechas_object->getFin($fecha);
			 ?>
		    <div class="formulario">
		    	<!-- caja de la busqueda 

					donde se coloca el rango tanto para consulta
					como para reporte
		    	-->
		    	
				<!-- Fecha de inicio -->
				<label for="">Fecha inicial</label>				
				<input value="<?php echo $fecha_inicio?>" type="date" name="fecha_ini" id="fecha_ini" type="text" onblur="document.getElementById('busca_form1').value=this.value">
				
				<!-- Fecha final -->	
				<label for="">Fecha final</label>			
				<input value="<?php echo $fecha_final?>" type="date" name="fecha_end" id="fecha_end" type="text" onblur="document.getElementById('busca_form2').value=this.value">

				<button id="buscar_fec" name="buscar_fec"  type="" class="btn btn-warning btn-lg" type="button">
              		<span class="glyphicon glyphicon-search"></span> buscar
           		</button> 
			</div>
			<div>
			
				<!-- Reporte de facturacion -->
				<form action="Facturas_methods/formatos/mensual.php" class="form_pa_ac" method="POST">
				<input type="hidden" name="kuery_1"  value="0"  id="busca_form1">
				<input type="hidden" name="kuery_2"  value="0"  id="busca_form2">
				
				<button onclick="document.getElementById('busca_form1').value=document.getElementById('fecha_ini').value;document.getElementById('busca_form2').value=document.getElementById('fecha_end').value;" id="boton_pdf" name="PDF" type="" class="btn btn-warning btn-lg" type="button">
              		<span class="glyphicon glyphicon-file"></span> Factura
           		</button> 
				</form>
				
				<!-- Reporte de censo -->
				<form action="Facturas_methods/formatos/censo.php" class="form_pa_ac" method="POST">
				<input type="hidden" name="censo1"  value="0"  id="censo1">
				<input type="hidden" name="censo2"  value="0"  id="censo2">
				
				<button onclick="document.getElementById('censo1').value=document.getElementById('fecha_ini').value;document.getElementById('censo2').value=document.getElementById('fecha_end').value;" id="boton_pdf" name="PDF" type="" class="btn btn-warning btn-lg" type="button">
              		<span class="glyphicon glyphicon-file"></span> Censo
           		</button> 
				</form>
				
					
			</div>
			
			<div id="datos" class="table-responsive">
				<!-- DAtos de query  -->	
			</div>

		</div>
	</div>
</div>

  <!-- Navegacion del usuario administrador del sistema PRAXAIR-->
    <!--include "Modales_medico.php"; -->       
  <!-- Fin-->






