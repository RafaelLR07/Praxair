
<div class="modal fade" id="edit_<?php echo $fila['id_oxigenos']; ?>" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Editar suministro</h4>
        </div>
        <div class="modal-body">
      
        <form method="POST" action="" onsubmit=" return valor();" >
        <div class="form-group">
          <label for="numempleado">Tipo de suministro</label>
          <input value="<?php echo $fila['tipo']; ?>" name="tipo" type="text" class="form-control" id="tipo" placeholder="Suministro" required>
        </div>

        <div class="form-group">
          <label for="numempleado">Precio</label>
          <input value="<?php echo $fila['precio']; ?>" name="precio" type="text" class="form-control" id="precio" placeholder="Precio" required>
        </div>
                
              <div class="row"><br><br><br></div>  
              <div class="btn-group col-lg-offset-8">
                
                <button onclick="valor();" name="editar" type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>


<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $fila['id_oxigenos']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Borrar Empleado</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
				<h2 class="text-center"><?php echo $fila['tipo'] ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="Oxigenos_methods/borrar_oxi.php?id=<?php echo $fila['id_oxigenos']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>