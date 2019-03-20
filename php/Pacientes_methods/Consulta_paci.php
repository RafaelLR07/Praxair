<?php  
				
	$vari='Usuario'

?>
			
<div class="container">
	<div class="input-group" id="cont_head">
	
	<br>
	

  <style type="text/css">
  	   .foraneos{
			margin-left: 
  	   }

       .reportes{
			margin-top: 10px;
			width: 100%;
			background: beige;
			display: none;
			
			padding: 8px;

		}

		.form-rep{
			background: white;
			border: 1px solid;
			border-color: #ccc;
			border-radius: 1%;
			width: 200px;
			height: 37px;
			margin: 5px;
			padding: 5px;
			color: #555;


		}
		hr{
			background: #269abc;
		}
       
       label{
       	margin-left: 0px;
       }
		
	    
	   /*estilos de formulario de generacion de pdf*/
	   .unline{
	   	display: inline;
	   }

	   #pdf_fecha{
	   			
	   }

      </style>

	  <button id="mostrar" class="btn btn-info" onclick="mostrar_repor()"> Filtros y reportes </button>

	  <div class="reportes" id="reportes">
		<div class="fechas">
			<div>
				<h4>Reporte por fechas</h4>
				<label for="" id="header-search">Fecha inicial</label>
				<input name="fec_inicial" id="fec_inicial" type="date" class="form-rep" onblur="document.getElementById('fecha_in').value=this.value">
				<label for="">Fecha final</label>
				<input name="fec_final" id="fec_final" type="date" class="form-rep" onblur="document.getElementById('fecha_end').value=this.value">

				<button name="busca" type="button" class="btn btn-success" onclick="captura()">
					<span class="glyphicon glyphicon-search"></span> Busca</button>
				
				<form action="Pacientes_methods/Reportes/repor_dates.php" method="POST" class="unline" onsubmit="return cap_rep_fechas();">
					<input id="fecha_in" name="fecha_in" type="hidden">
					<input id="fecha_end" name="fecha_end" type="hidden">
					<button id="pdf_fecha" onclick="cap_rep_fechas()" name="reporte" type="submit" class="btn btn-warning">
					<span class="glyphicon glyphicon-file"></span>Generar pdf
					</button>
				</form>
				
			</div>
		</div>
		<hr>
		
		<div class="foraneos">
			
				<h4>Reporte de ubicación</h4>
				<label for="">Seleccionar</label>
				<select id="local" name="" id="" class="form-rep" onblur="document.getElementById('for_local').value=this.value">
					<option value="elegir">Elige una opción</option>
					<option value="foraneos">Foraneos</option>
					<option value="XALAPA">Locales</option>
				</select>
				<button onclick="foraneos_form();" type="button" class="btn btn-success">
					<span class="glyphicon glyphicon-search"></span> Busca</button>
			<form method="POST" action="Pacientes_methods/Reportes/repor_ubication.php" class="unline"  onsubmit="return val_for_local();">
				<input id="for_local" name="for_local" type="hidden" >
				<button name="reporte" type="submit" class="btn btn-warning">
					<span class="glyphicon glyphicon-file"></span>Generar pdf</button>
			</form>
		</div>

	   </div>	
	


	<div class="col-xs-12">
		<div class="row">
		    <div class="formulario">
		    	<input type="text" name="caja_busqueda" id="caja_busqueda" type="text" class="form-control" placeholder="Buscar" onblur="document.getElementById('busca2').value=this.value">
				
			</div>
			<div>
			
				
			<form action="Pacientes_methods/pdf.php" class="form_pa_ac" method="POST">

				<input type="hidden" name="kuery_2"  type="text" value="0"  id="busca2">
			
				<button id="boton_pdf" name="PDF" type="" class="btn btn-warning btn-lg" type="button">
              		<span class="glyphicon glyphicon-file"></span> Genera
           		</button> 

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
</div>






