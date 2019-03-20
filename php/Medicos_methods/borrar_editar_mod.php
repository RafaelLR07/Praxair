<div class="modal fade" id="edit_<?php echo $row['no_empleado']; ?>" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Editar Medico</h4>
        </div>
        <div class="modal-body">
      
        <form method="POST" action="./Medicos_methods/update_medic.php?id=<?php echo $row['no_empleado']; ?>" >
        <div class="form-group">
          <label for="numempleado">Numero de Empleado</label>
          <input value="<?php echo $row['no_empleado']; ?>" name="num_empleado" type="text" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
        </div>
      
              
    <div class="form-group">
        <label for="nombre">Nombre(s)</label>
        <input name="nombre" value="<?php echo $row['nombre']?>" type="text" class="form-control" id="nombre" placeholder="Nombre" required>
    </div>
        
        <?php include_once('../Scripts/DBconexion.php');
            $database = new Connection(); ?>    

        <div class="form-group">
        <label for="especialidad" class="col-sm-3 col-form-label col-form-label-lg">Especialidad</label>
        <div class="col-sm-9">
            <select  name="especialidad" class="form-control" id="especialidad" >
            
            <?php
            $var_id = $row['no_empleado'];
            $db = $database->open();
            $consulta = 'SELECT * FROM especialidades';
            $info_medic = "SELECT * FROM medicos WHERE no_empleado='$var_id'";
            $var_info_medic="";
            foreach($db->query($info_medic) as $fill){
                $var_info_medic = $fill['especialidad'];
                
            }    
            try{
                foreach ($db->query($consulta) as $fila){
                    if($var_info_medic == $fila['id_especialidad']){
                        ?>
                        <option selected value=" <?php echo $row['especialidad'];?>"> <?php echo $fila['especialidad'];?></option>
                        <?php
                    }else{
                    ?>
                    <option value="<?php  echo $fila['id_especialidad']  ?>"><?php  echo $fila['especialidad']  ?></option>  
                       
                    <?php   
                    }  
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
                <button type="submit" class="btn btn-warning btn-group-lg">Limpiar</button>
                <button name="editar" type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>


<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['no_empleado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Borrar Empleado</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['nombre'] ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="Medicos_methods/borrar_medic.php?id=<?php echo $row['no_empleado']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>