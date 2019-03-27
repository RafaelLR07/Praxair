<div class="container">
	<div class="input-group" id="cont_head">

  
  	<br>
<div class="col-xs-12">
		<div class="row">
			<?php 	
			 include('Visor/fechas.php');

			date_default_timezone_set('America/Mexico_City');
			$fecha = strftime("%Y-%m-%d");
			 ?>
		    <div class="formulario">
		    	<!-- caja de la busqueda 

					donde se coloca el rango tanto para consulta
					como para reporte
		    	-->
		    	
				<!-- Fecha de inicio -->				
				<input value="<?php echo $fecha?>" type="date" name="fecha_ini" id="fecha_ini" type="text" onblur="document.getElementById('busca_form1').value=this.value">
				
				<!-- Fecha final -->				
				<input value="<?php echo '2019-03-30'?>" type="date" name="fecha_end" id="fecha_end" type="text" onblur="document.getElementById('busca_form2').value=this.value">

				<button id="buscar_fec" name="buscar_fec"  type="" class="btn btn-warning btn-lg" type="button">
              		<span class="glyphicon glyphicon-search"></span> buscar
           		</button> 
			</div>
			<div>
			
				
				<form action="Facturas_methods/formatos/mensual.php" class="form_pa_ac" method="POST">
				<input type="" name="kuery_2"  value="0"  id="busca_form1">
				<input type="" name="kuery_2"  value="0"  id="busca_form2">
				
				<button onclick="document.getElementById('busca_form1').value=document.getElementById('fecha_ini').value;document.getElementById('busca_form2').value=document.getElementById('fecha_end').value;" id="boton_pdf" name="PDF" type="" class="btn btn-warning btn-lg" type="button">
              		<span class="glyphicon glyphicon-file"></span> Genera
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






