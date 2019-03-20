<!-- REGISTRO DE Usuario-->
<div class="modal fade" id="edit_<?php echo $row['no_empleado']; ?>" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
 <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Editar Usuario</h4>
        </div>

        <div class="modal-body">
            <form method="POST" action="./Usuarios_methods/update_users.php?id=<?php echo $row['no_empleado']; ?>">
              <div class="form-group">
                <label for="numempleado">ID de Empleado</label>
                <input value="<?php echo $row['no_empleado']; ?>" name="no_empleado" type="text" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
              </div>

              <div class="form-group">
                <label for="paterno">Nombre</label>
                <input value="<?php echo $row['nombre']; ?>" name="nombre" type="text" class="form-control" id="paterno" placeholder="Apellido Paterno, Materno Nombre(s)" required>
              </div>
              
              <div class="form-group row">
                    <label for="tipousuario" class="col-sm-4 col-form-label col-form-label-lg">Tipo de Usuario</label>
                    <div class="col-sm-8">

                        <select name="tipo_user" class="form-control" id="tipousuario">
                          <option>Eliga opcion</option>
                          <?php 
                            if($row['tipo_usuario']=='Administrador'){
                                ?>
                                <option value="Administrador" selected>Administrador</option>
                                <option value="Usuario">Usuario</option>

                                <?php
                            }else{
                                ?>
                                <option value="Administrador">Administrador</option>
                                <option value="Usuario" selected >Usuario</option>
                                <?php
                            }
                            
                          ?>
                          
                          
                        </select>
                      </div>
                </div>
              <div class="form-group">
                <label for="contraseña">Contraseña antigua</label>
                <input value="<?php echo $row['pass']; ?>"  name="contra" type="password" class="form-control" id="contraseña" placeholder="Contraseña" required>
              </div>
              <div class="form-group">
                <label for="contraseña2">Nueva contraseña</label>
                <input name="contra_2" type="password" class="form-control" id="contraseña2" placeholder="" required>
              </div>
            
              <div class="btn-group col-lg-offset-8">
                <button type="submit" class="btn btn-warning btn-group-lg">Limpiar</button>
                <button name="editar" type="submit" class="btn btn-primary btn-group-lg">Editar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- FIN-->

  <!-- Delete -->

<div class="modal fade" id="delete_<?php echo $row['no_empleado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Borrar Usuario</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['nombre'] ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="Usuarios_methods/borrar_user.php?id=<?php echo $row['no_empleado']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>