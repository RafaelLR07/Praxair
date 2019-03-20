  <div class="container">
	<div class="input-group" id="cont_head">
	
	<br>
<div class="col-xs-12">
		<div class="row">
		    <div class="formulario">
		    	<input type="text" name="caja_busqueda" id="caja_busqueda" type="text" class="form-control" placeholder="Buscar" onblur="document.getElementById('busca2').value=this.value">
				
			</div>
			<div>
			
				
				

				<button style="margin-left:80%" id="more" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#suministro"
			    >
			    	<span class="glyphicon glyphicon-plus"></span> Nuevo oxigeno
			    </button>

			</div>
			
			<div id="datos" class="table-responsive">
				<!-- DAtos de query  -->	
			</div>

		</div>
	</div>
</div>
  <!-- Navegacion del usuario administrador del sistema PRAXAIR-->
    <?php include "Modales_oxi.php"; ?>       
  <!-- Fin-->






