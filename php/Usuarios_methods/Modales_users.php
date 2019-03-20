<!-- REGISTRO DE Usuario-->
<div class="modal fade" id="usuarios" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
 <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Registrar Usuario</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="./Usuarios_methods/add_user.php">
              <div class="form-group">
                <label for="numempleado">No. de Empleado</label>
                <input name="no_empleado" type="number" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
              </div>
              
              <div class="form-group">
                <label for="paterno">Apellido paterno</label>
                <input onkeyup="javascript:this.value = this.value.toUpperCase()" name="ap_paterno" type="text" class="form-control" id="paterno" placeholder="Apellido Paterno" required>
              </div>

              <div class="form-group">
                <label for="materno">Apellido materno</label>
                <input onkeyup="javascript:this.value = this.value.toUpperCase()" name="ap_materno" type="text" class="form-control" id="materno" placeholder="Apellido Materno" required>
              </div>

              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input onkeyup="javascript:this.value = this.value.toUpperCase()" name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre(s)" required>
              </div>
              
              <div class="form-group row">
                    <label for="tipousuario" class="col-sm-4 col-form-label col-form-label-lg">Tipo de Usuario</label>
                    <div class="col-sm-8">

                        <select name="tipo_user" class="form-control" id="tipousuario">
                          <option selected>Eliga opcion</option>
                          <option value="Administrador">Administrador</option>
                          <option value="Usuario">Usuario</option>
                        </select>
                      </div>
                </div>
              <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input name="contra" type="password" class="form-control" id="contraseña" placeholder="Contraseña" required>
              </div>
              <div class="form-group">
                <label for="contraseña2">Repetir Contraseña</label>
                <input name="contra_2" type="password" class="form-control" id="contraseña2" placeholder="**********" required>
              </div>
              <div class="btn-group col-lg-offset-8">
                <button type="submit" class="btn btn-warning btn-group-lg">Limpiar</button>
                <button type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- FIN-->