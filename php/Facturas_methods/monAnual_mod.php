


<div class="modal fade" id="edit_<?php echo $co['id_monto']; ?>" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title" align="center">Editar Medico</h4>
        </div>
        <div class="modal-body">
      
        <form method="POST" action="./Facturas_methods/update_fact.php?id=<?php echo $co['id_monto']; ?>" >
        <div class="form-group">
          <label for="paciente">Monto anual</label>
          <input step="0.01" value="<?php echo $co['monto']; ?>" name="mon" type="number" class="form-control" id="mon" placeholder="Monto anual" required>
        </div>
       
            <div class="btn-group col-lg-offset-8">
                
                <button name="mon_up" type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

<!--<div class="form-group">
          <label for="fec_fin">Fecha de facturacion</label>
          <input value=" echo $row['fec_fin']" name="fec_fin" type="date" class="form-control" id="fec_fin" placeholder="Apellido Materno">
        </div>
        
        <div class="form-group">
          <label for="dias_fac">Dias facturados</label>
          <input value=" echo $row['dias_fac']" name="dias_fac" type="text" class="form-control" id="dias_fac" placeholder="Apellido Materno" readonly>
        </div>

        <div class="form-group">
          <label for="costo_fac">Facturacion</label>
          <input value=" echo $row['costo_fac']" name="costo_fac" type="text" class="form-control" id="costo_fac" placeholder="Apellido Materno" readonly>
        </div> -->