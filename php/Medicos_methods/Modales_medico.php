

<div class="container">





<!-- REGISTRO DE MEDICO-->

  <div class="modal fade" id="regismedico" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Registrar Medico</h4>
        </div>
        <div class="modal-body">
      <!---->
        <form method="POST" action="./Medicos_methods/add_medico.php" onsubmit=" return valida_med();">
        <div class="form-group">
          <label for="numempleado">No de Empleado</label>
          <input name="num_empleado" type="number" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
        </div>
        <div class="form-group">
          <label for="paterno">Apellido Paterno</label>
          <input name="ap_paterno" type="text" class="form-control" id="paterno" placeholder="Apellido Paterno" required>
        </div>
        
        <div class="form-group">
          <label for="materno">Apellido Materno</label>
          <input name="ap_materno" type="text" class="form-control" id="materno" placeholder="Apellido Materno" required>
        </div>
        
        <div class="form-group">
          <label for="nombre">Nombre(s)</label>
          <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" required>
        </div>
        
        <div class="form-group">
          <label for="especialidad" class="col-sm-3 col-form-label col-form-label-lg">Especialidad</label>
          <div class="col-sm-9">
            <select  name="especialidad" class="form-control" id="especialidad" >
              <option selected >Elegir especialidad</option>
              <?php
              //incluimos el fichero de conexion
              
              include_once('Scripts/DBconexion.php');
              $database = new Connection();

              $db = $database->open();
              $consulta = 'SELECT * FROM especialidades';
                try{
                  foreach ($db->query($consulta) as $fila){
                    ?>
                    <option value="<?php  echo $fila['id_especialidad']  ?>"><?php  echo $fila['especialidad']  ?></option>  
                    <?php     
                  }


                }catch(PDOException $e){
                  echo "Error en la consulta de tipo ". $e->getMessage(); 
                }
                
                  //Cerrar la Conexion
                $database->close();
                


              ?>
                        </select>
                      </div>
                </div>
              <div class="row"><br><br><br></div>  
              <div class="btn-group col-lg-offset-8">
                <button onclick="valida_med();" type="submit" class="btn btn-warning btn-group-lg">Limpiar</button>
                <button name="agregar" type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- FIN -->




</div>
