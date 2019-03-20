


<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $cedula_uni ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Borrar paciente</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Desea dar de baja al paciente?</p>
                <h3 class="text-center"><?php echo $fila['cedula'] ?></h2>
                <h3 class="text-center"><?php echo $fila['nombre'] ?></h2>
				
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="./Pacientes_pend/borrar_pac.php?id=<?php echo $fila['cedula']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>