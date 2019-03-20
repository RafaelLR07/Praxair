
<div class="container">
	<div class="input-group" id="cont_head">
	
	<br>
	<div class="col-xs-12">
		<div class="row">
		    <div class="formulario">
		    	<input type="text" name="caja_busqueda" id="caja_busqueda" type="text" class="form-control" placeholder="Buscar" onblur="document.getElementById('busca2').value=this.value">
				
			</div>
			<div>
			
				
				<form action="Pacientes_methods/pdf.php" class="form_pa_ac" method="POST">
				<input type="hidden" name="kuery_2"  type="text" value="0"  id="busca2">
				<!--
				<button id="boton_pdf" name="PDF" type="" class="btn btn-warning btn-lg" type="button">
              		<span class="glyphicon glyphicon-minus-sign"></span> Genera
           		</button> -->
				</form>

				<button id="more" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#usuarios">
			    	<span class="glyphicon glyphicon-plus"></span> Nuevo usuario
			    </button>

			</div>
			
			<div id="datos" class="table-responsive">
				<!-- DAtos de query  -->	
			</div>

		</div>
	</div>
</div>








  <!-- Navegacion del usuario administrador del sistema PRAXAIR-->
    <?php include "Modales_users.php"; ?>       
  <!-- Fin-->









