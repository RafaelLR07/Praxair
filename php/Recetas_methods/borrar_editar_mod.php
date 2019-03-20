
<div class="modal fade" id="edit_<?php echo $rows['serie']; ?>" role="dialog">
    
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Editar receta</h4>
        </div>
        <div class="modal-body">
      
        <form method="POST" action="" >
        
        <?php include_once('Scripts/DBconexion.php');
            $database = new Connection(); ?> 
        <div class="form-group">
          <label for="numempleado">Numero de receta</label>
          <input value="<?php echo $rows['serie']; ?>" name="serie" type="text" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
        </div>

        <div class="form-group">
          <label for="numempleado">Fecha</label>
          <input value="<?php echo $rows['fecha']; ?>" name="fecha" type="date" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
        </div>

        <div class="form-group">
          <label for="numempleado">Diagnostico</label>
          <input value="<?php echo $rows['diagnostico']; ?>" name="diagnostico" type="text" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
        </div>

        <div class="form-group">
          <label for="numempleado">Indicaciones</label>
          <input value="<?php echo $rows['indicaciones']; ?>" name="indicaciones" type="text" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
        </div>

        <div class="form-group">
          <label for="numempleado">Paciente</label>
          <input readonly value="<?php echo $rows['paciente']; ?>" name="paciente" type="text" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
        </div>

        <div class="form-group">
          <label for="numempleado">Oxigeno</label>
          <input value="<?php echo $rows['diagnostico']; ?>" name="oxigeno" type="text" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
        </div>
          
        
        <div class="form-group">

          <label for="numempleado">Medico</label>
          <?php
            
            $db = $database->open();
            $variable = $rows['medico'];
            $info_medic = "SELECT * FROM medicos WHERE no_empleado='$variable'";
            $nombre_medic = "";
            foreach ($db -> query($info_medic) as $filas) {
              $nombre_medic = $filas['nombre'];
            }
            
            

          ?>
          <input value="<?php echo $nombre_medic; ?>" name="medico" type="text" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
        </div>
                
              <div class="row"><br><br><br></div>  
              <div class="btn-group col-lg-offset-8">
                
                <button name="editar" type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>