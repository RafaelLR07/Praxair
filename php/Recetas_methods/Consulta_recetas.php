<?php  
					/*ini_set('date.timezone'.'America/Mexico_City');
					$time = date('H:i:s', time());
					$time2 = date('Y-m-d, H:i:s', time());
					echo date("g:i a", strtotime($time));
					print'<br>';
					echo $time2. '<br>';*/

					//este si funciona para la hora
					//date_default_timezone_set('America/Mexico_City');
					//$fecha = date("H:i:s");
					
					
			        

			

				?>
				
<div class="container">
		<input  type="hidden" name="filtro" id="filtro" value=<?php  echo  $id;  ?>>
	<div class="input-group" id="cont_head">
	
	<br>
	<div class="col-xs-12">
		<div class="row">
			
		    <div class="formulario">
		    	<input type="text" name="caja_busqueda" id="caja_busqueda" type="text" class="form-control" placeholder="Buscar" >
			
				
			</div>
			<div>
			
				
				<form action="Pacientes_methods/pdf.php" class="form_pa_ac" method="POST">
					<!--
				<input type="hidden" name="kuery_2"  type="text" value="0"  id="busca2">
				
				<button id="boton_pdf" name="PDF" type="" class="btn btn-warning btn-lg" type="button">
              		<span class="glyphicon glyphicon-minus-sign"></span> Genera
           		</button> -->
				</form>

				<?php 
					$recetas_query = "SELECT * FROM recetas WHERE paciente ='$id'";
					$resultado_rec = $db->query($recetas_query);
					if(($resultado_rec->rowCount())>0){
						?>
						<button id="more" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#receta_pos">
			    			<span class="glyphicon glyphicon-plus"></span>Nueva recet</button>
						<?php
						
					}else{
						?>
						<button id="more" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#receta">			    
			    		<span class="glyphicon glyphicon-plus"></span> Nueva Receta
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
<?php 
	include 'Modales.php';
	include 'Modales_first.php';
?>






