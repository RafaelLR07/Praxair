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
          <!---->
            <form method="POST" action="./Oxigenos_methods/add_oxi.php" onsubmit=" return valida_oxi();">
              <div class="form-group">
                <label for="paterno">Nombre del nuevo suministro</label>
                <input  name="nombre" type="text" class="form-control" id="nombre" placeholder="Ingrese nuevo suministro" required>
              </div>
              <div class="form-group">
                <label for="materno">Costo</label>
                <input name="costo" type="number" class="form-control" id="costo" min="1" max="10000" placeholder="Ingrese Precio" required>
              </div>
              <div class="btn-group col-lg-offset-8">
                <p id="solo_letras" ></p>
                <p id="solo_numeros" ></p>
                <button onclick = "valida_oxi();" name="agregar" type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- FIN-->