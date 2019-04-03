<?php  
	$vari='Usuario'
?>
			
<div class="container">
	<div class="input-group" id="cont_head">
	
	<br>
	<div class="col-xs-12">
		<div class="row">
		    <div class="formulario">
		    	<input type="text" name="caja_busqueda" id="caja_busqueda" type="text" class="form-control" placeholder="Buscar">
				
			</div>
			<div>
			
				
				<form action="Pacientes_methods/pdf.php" class="form_pa_ac" method="POST">
				<!--<input type="hidden" name="kuery_2"  type="text" value="0"  id="busca2">
			
				<button id="boton_pdf" name="PDF" type="" class="btn btn-warning btn-lg" type="button">
              		<span class="glyphicon glyphicon-minus-sign"></span> Genera
           		</button> -->
				</form>
				
				<!-- echo si session igual a medico muestra medic y admi en else case -->
				<?php 
					
					if ($variable==$vari) {
						?>
						<button id="more" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Paciente"
			    onclick="window.location.href='./Registro-Paciente_med.php'">
			    	<span class="glyphicon glyphicon-plus"></span> Nuevo paciente
			    </button>
			
					<?php
					}else{
						?>
							<button id="more" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Paciente"
				    onclick="window.location.href='./Registro-Paciente.php'">
				    	<span class="glyphicon glyphicon-plus"></span> Nuevo paciente
				    </button>
			    <?php
					}
				?>

					

			</div>
			
			<div id="datos" class="table-responsive">
				<!-- DAtos de query  -->	
			</div>

		</div>
	</div>
</div>







