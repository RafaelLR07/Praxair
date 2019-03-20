<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $co['id_monto'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Finalizar Facturación</h4></center>
            </div>
            <div class="modal-body">  
              <p class="text-center">¿Finalizar facturacion del mes?</p>
        
      </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="Facturas_methods/mon_del.php?ido=<?php echo $var_aco; ?>&id=<?php echo $co['id_monto']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>