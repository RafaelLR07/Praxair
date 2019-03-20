<div class="container">

  <!-- REGISTRO DE SUMINISTRO-->
  <div class="modal fade" id="suministro" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Registrar nuevo suministro de oxigeno</h4>
        </div>
        <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="paterno">Nombre del nuevo suministro</label>
                <input type="suministro" class="form-control" id="suministro" placeholder="Ingrese nuevo suministro" required>
              </div>
              <div class="form-group">
                <label for="materno">Costo</label>
                <input type="number" class="form-control" id="costo" min="1" max="10000" placeholder="Ingrese Precio" required>
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
            <form>
              <div class="form-group">
                <label for="numempleado">Numero de Empleado</label>
                <input type="text" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
              </div>
              <div class="form-group">
                <label for="paterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="paterno" placeholder="Apellido Paterno" required>
              </div>
              <div class="form-group">
                <label for="materno">Apellido Materno</label>
                <input type="text" class="form-control" id="materno" placeholder="Apellido Materno" required>
              </div>
              <div class="form-group">
                <label for="nombre">Nombre(s)</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
              </div>
                <div class="form-group row">
                    <label for="tipousuario" class="col-sm-4 col-form-label col-form-label-lg">Tipo de Usuario</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="tipousuario">
                          <option selected>Eliga opcion</option>
                          <option value="1">Administrador</option>
                          <option value="2">Usuario</option>
                        </select>
                      </div>
                </div>
              <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" placeholder="Contraseña" required>
              </div>
              <div class="form-group">
                <label for="contraseña2">Repetir Contraseña</label>
                <input type="password" class="form-control" id="contraseña2" placeholder="**********" required>
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
            <form>
              <div class="form-group">
                <label for="numempleado">Numero de Empleado</label>
                <input type="text" class="form-control" id="numempleado" placeholder="Numero de Empleado" required>
              </div>
              <div class="form-group">
                <label for="paterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="paterno" placeholder="Apellido Paterno" required>
              </div>
              <div class="form-group">
                <label for="materno">Apellido Materno</label>
                <input type="text" class="form-control" id="materno" placeholder="Apellido Materno" required>
              </div>
              <div class="form-group">
                <label for="nombre">Nombre(s)</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
              </div>
                <div class="form-group">
                    <label for="especialidad" class="col-sm-3 col-form-label col-form-label-lg">Especialidad</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="especialidad" >
                          <option selected>Eliga Especialidad</option>
                          <option value="1"></option>
                          <option value="2"></option>
                        </select>
                      </div>
                </div>
              <div class="row"><br><br><br></div>  
              <div class="btn-group col-lg-offset-8">
                <button type="submit" class="btn btn-warning btn-group-lg">Limpiar</button>
                <button type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- FIN -->



<!-- REGISTRO DE receta-->

  <div class="modal fade" id="receta" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Nueva Receta</h4>
        </div>
        <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="">Numero de serie</label>
                <input type="text" class="form-control" id="" placeholder="Numero de serie"  required>
              </div>
              <div class="form-group">
                <label for="">Fecha</label>
                <input type="date" class="form-control" id="" placeholder="Fecha" required>
              </div>
              <div class="form-group">
                  <label for="especialidad" class="col-sm-3 col-form-label col-form-label-lg">Suministro</label>
                  <div class="col-sm-9">
                      <select class="form-control" id="especialidad" >
                        <option selected>Eliga Especialidad</option>
                        <option value="1"></option>
                        <option value="2"></option>
                      </select>
                  </div>
              </div>
              <div class="form-group">
                <label for="observaciones">Diagnostico:</label>
                <textarea class="form-control" rows="3" ></textarea>
              </div>
              <div class="form-group">
                <label for="observaciones">Indicaciones:</label>
                <textarea class="form-control" rows="4" ></textarea>
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

  <!-- FIN -->


</div>
