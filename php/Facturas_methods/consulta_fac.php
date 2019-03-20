
<div class="container">
	<div class="input-group" id="cont_head">
  
  	<br>
<div class="col-xs-12">
		<div class="row">
			<?php 	
			date_default_timezone_set('America/Mexico_City');
			$fecha = strftime("%Y-%m");
			 ?>
		    <div class="formulario">
		    	<!-- caja de la busqueda -->
		    	
				
				<input value="<?php echo $fecha?>" type="month" name="fecha" id="fecha" type="text" onblur="document.getElementById('busca2').value=this.value">

				<button id="buscar_fec" name="buscar_fec"  type="" class="btn btn-warning btn-lg" type="button">
              		<span class="glyphicon glyphicon-search"></span> buscar
           		</button> 
			</div>
			<div>
			
				
				<form action="Facturas_methods/formatos/mensual.php" class="form_pa_ac" method="POST">
				<input type="hidden" name="kuery_2"  value="0"  id="busca2">
				
				<button onclick="document.getElementById('busca2').value=document.getElementById('fecha').value" id="boton_pdf" name="PDF" type="" class="btn btn-warning btn-lg" type="button">
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






