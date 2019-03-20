<!DOCTYPE html>
<html lang="en">
    <head>
		  <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../../js/login.css">
      <link rel="icon" type="image/png" href="../../images/icon.png">
      <title>PRAXAIR</title>    
   	</head>
  
     
  <!-- Encabezado de pagina del sistema PRAXAIR-->
	  	<?php include "../Pagina/Header.php"; ?>    		
	<!-- Fin-->
	<body>
  
	<!-- Navegacion del usuario administrador del sistema PRAXAIR-->
  <?php
      session_start();
      echo $_SESSION['u_usuario'];
      $name="lansdlk";
      
      if(isset($_SESSION['u_usuario'])){
        $name = $_SESSION['u_usuario'];
      }else{
        header("Location: ../index.php");
      }
    ?>
		<?php include "../Pagina/Navegador-administrador.php"; ?>    		
	<!-- Fin-->
  <div class="container">
      <form>
        <div class="row main">
            <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Datos del Paciente</h3></strong><hr>
              </div>
              <div class="form-group col-md-12">
                    <div class="form-group row">
                      <label for="cedula" class="col-sm-4 col-form-label col-form-label-lg">MKs</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="cedula" placeholder="Cédula Afiliacion" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Paciente" class="col-sm-4 col-form-label col-form-label-lg">Numero de Paciente</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="Paciente" placeholder="Numero Paciente" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Paterno" class="col-sm-4 col-form-label col-form-label-lg">Apellido Paterno</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="Paterno" placeholder="Apellido Paterno" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">Apellido Materno</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="Materno" placeholder="Apellido Materno" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Nombre" class="col-sm-4 col-form-label col-form-label-lg">Nombre(s)</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="Nombre" placeholder="Nombre" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="telefono" class="col-sm-4 col-form-label col-form-label-lg">Telefono</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" id="telefono" placeholder="Telefono" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="fecha" class="col-sm-4 col-form-label col-form-label-lg">Fecha de nacimiento</label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control form-control-sm" id="fecha" placeholder="Fecha de nacimiento" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="edad" class="col-sm-4 col-form-label col-form-label-lg">Edad</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" id="edad" placeholder="Edad" required>
                      </div>
                    </div>
              </div>
              <div class="btn-group col-sm-5 col-lg-offset-7">
                <input type="button" class="btn btn-warning btn-block" value="Limpiar"/>
              </div>               
            </div>
            <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Datos Familiar del Paciente</h3></strong><hr>
              </div>
              <div class="form-group col-md-12">
                  <div class="form-group row">
                      <label for="Paterno" class="col-sm-4 col-form-label col-form-label-lg">Apellido Paterno</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="Paterno" placeholder="Apellido Paterno" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">Apellido Materno</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="Materno" placeholder="Apellido Materno" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="Nombre" class="col-sm-4 col-form-label col-form-label-lg">Nombre(s)</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="Nombre" placeholder="Nombre" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="Parentesco" class="col-sm-4 col-form-label col-form-label-lg">Parentesco</label>
                      <div class="col-sm-8">
                          <select class="form-control" id="Parentesco">
                            <option selected>Eliga opcion</option>
                            <option value="1">Abuelo      </option>
                            <option value="2">Abuela      </option>
                            <option value="3">Tio         </option>
                            <option value="4">Tia          </option>
                            <option value="5">Padre       </option>
                            <option value="6">Madre       </option>
                            <option value="7">Hijo        </option>
                            <option value="8">Hija        </option>
                            <option value="9">Padrastro   </option>
                            <option value="10">Madrastra   </option>                            
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="Email" class="col-sm-4 col-form-label col-form-label-lg">Correo Electrico</label>
                      <div class="col-sm-8">
                        <input type="Email" class="form-control form-control-sm" id="Email" placeholder="Correo Electrico" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="telefono" class="col-sm-4 col-form-label col-form-label-lg">Telefono</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" id="telefono" placeholder="Telefono" required>
                      </div>
                  </div>
                  <div class="form-group row"></div><br><br><br>

                </div>
                  <div class="btn-group col-sm-5 col-lg-offset-7">
                    <input type="button" class="btn btn-warning btn-block" value="Limpiar"/>
                  </div>                
            </div>
        </div>
        <div class="row main"></div>
        <div class="row main">
          <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Datos Domicilio del Paciente</h3></strong><hr>
              </div>
                <div class="form-group col-md-12">
                    <div class="form-group row">
                      <label for="ciudad" class="col-sm-4 col-form-label col-form-label-lg">Ciudad</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="ciudad" placeholder="Ciudad" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="municipio" class="col-sm-4 col-form-label col-form-label-lg">Municipio</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="municipio" placeholder="Municipio" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="colonia" class="col-sm-4 col-form-label col-form-label-lg">Colonia</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="colonia" placeholder="Colonia" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="cp" class="col-sm-4 col-form-label col-form-label-lg">Codigo Postal</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="cp" placeholder="Codigo Postal" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="calle" class="col-sm-4 col-form-label col-form-label-lg">Calle</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="calle" placeholder="Calle" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="calle2" class="col-sm-4 col-form-label col-form-label-lg">Entre Calles</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="calle2" placeholder="Entre Calle">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exterior" class="col-sm-4 col-form-label col-form-label-lg">Numero Exterior</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="exterior" placeholder="Numero Exterior">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="interior" class="col-sm-4 col-form-label col-form-label-lg">Numero Interior</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="interior" placeholder="Numero Interior">
                      </div>
                    </div>                                                                   
                </div>  
            <div class="btn-group col-sm-5 col-lg-offset-7">
              <input type="button" class="btn btn-warning btn-block" value="Limpiar"/>
            </div><br><br>   
          </div>
          <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Observaciones del Medico</h3></strong><hr>
              </div>
              <div class="form-group col-md-12">
                    <div class="form-group">
                      <label for="observaciones">Observaciones:</label>
                      <textarea class="form-control" rows="16" ></textarea>
                    </div>
                    <div class="form-group col-lg-offset-8">
                        <input type="button" class="btn btn-warning btn-md" value="Limpiar"/>
                        <input type="button" class="btn btn-success btn-md" value="Registrar"/>
                    </div>                    
              </div>
          </div>
        </div>
     </form>
  </div>




  <!-- Script-->
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/logicapraxair.js"></script>
  <!--jquery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <!-- Bootstrap's JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  <!-- Fin-->
  <!-- Pie de pagina del sistema PRAXAIR-->
    <?php include "Pagina/Footer.php"; ?>                              
  <!-- Fin del pie pagina-->	
	</body>
</html>
