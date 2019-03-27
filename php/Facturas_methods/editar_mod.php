<div class="modal fade" id="edit_<?php echo $row['id_factura']; ?>" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Editar Factura</h4>
        </div>
        <div class="modal-body">
      
        <form method="POST" action="./Facturas_methods/update_fact.php?id=<?php echo $row['id_factura']; ?>" >
        <div class="form-group">
          <label for="paciente">Paciente</label>
          <input value="<?php echo $row['paciente']; ?>" name="paciente" type="text" class="form-control" id="paciente" placeholder="Ceudla de paciente" readonly>
        </div>
       
       <div class="form-group">
          <label for="estado">Estado</label>
          <input value="<?php echo $row['estado'] ?>" name="estado" type="text" class="form-control" id="estado" placeholder="Apellido Paterno" readonly>
        </div>
        
        <div class="form-group">
          <label for="oxigeno">Oxigeno</label>
          <input value="<?php echo $row['oxigeno']?>" name="oxigeno" type="text" class="form-control" id="oxigeno" placeholder="Apellido Materno" readonly>
        </div>

        <div class="form-group">
          <label for="costo_u">Costo unitario</label>
          <input value="<?php echo $row['costo']?>" name="costo_u" type="text" class="form-control" id="costo_u" placeholder="Apellido Materno" readonly>
        </div>
        
        
        <div class="form-group">
          <label for="fec_ini">Fecha de inicio</label>
          <input value="<?php echo $row['fec_ini']?>" name="fec_ini" type="date" class="form-control" id="fec_ini">
        </div>

        <div class="form-group">
          <label for="fec_ini">Fecha de inicio</label>
          <input value="<?php echo $row['fec_fin']?>" name="fec_fin" type="date" class="form-control" id="fec_fin">
        </div>
        

              <div class="btn-group col-lg-offset-8">
                <button type="submit" class="btn btn-warning btn-group-lg">Limpiar</button>
                <button name="editar" type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
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