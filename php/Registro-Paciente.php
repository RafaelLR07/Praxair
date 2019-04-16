<!DOCTYPE html>
<html lang="en">
    <head>
		  <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../js/login.css">
      <link rel="icon" type="image/png" href="images/icon.png">
      <title>PRAXAIR</title>    
   	</head>
  <!-- Encabezado de pagina del sistema PRAXAIR-->
		<?php include "Pagina/Header.php"; ?>    		
	<!-- Fin-->
	<body>
  <?php
      session_start();
      include_once('Scripts/DBconexion.php');

      
      $name="";
      if(isset($_SESSION['u_usuario'])){
        $name = $_SESSION['u_usuario'];
      }else{
        header("Location: ../index.php");
      }
    ?>
	<!-- Navegacion del usuario administrador del sistema PRAXAIR-->
  
    <?php 
      $variable = $_SESSION['u_rol'];
      if($variable=="Usuario"){
        include "Pagina/Navegador-medico.php";  
      }else if($variable=="Administrador"){
        include "Pagina/Navegador-administrador.php"; 
      }else{
        header("Location:../index.php");
      }
    ?>    		
	<!-- Fin-->
  <div class="container">
      <form method="POST" action="Pacientes_methods/add_paciente.php" onsubmit="return valida_pac_reg()" id="pacii">
        <div class="row main">
            <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Datos del Paciente</h3></strong><hr>
              </div>
              <div class="form-group col-md-12">
                    <div class="form-group row">
                      <label for="cedula" class="col-sm-4 col-form-label col-form-label-lg">Cédula de Afiliacion</label>
                      <div class="col-sm-8">
                        <input maxlength="12" minlength="12" onkeyup="mayus(this)" name="cedula" type="text" class="form-control form-control-sm" id="cedula" placeholder="Cédula Afiliacion" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Paciente" class="col-sm-4 col-form-label col-form-label-lg">Numero de Paciente</label>
                      <div class="col-sm-8">
                        <input  min="1" max="99999999999" onkeyup="mayus(this)" name="no_paciente" type="number" class="form-control form-control-sm" id="Paciente" placeholder="Numero Paciente" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Paterno" class="col-sm-4 col-form-label col-form-label-lg">Apellido Paterno</label>
                      <div class="col-sm-8">
                        <input maxlength="22" onkeyup="mayus(this)" name="ap_paterno" type="text" class="form-control form-control-sm" id="Paterno" placeholder="Apellido Paterno"  required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">Apellido Materno</label>
                      <div class="col-sm-8">
                        <input maxlength="21" onkeyup="mayus(this)" name="ap_materno" type="text" class="form-control form-control-sm" id="Materno" placeholder="Apellido Materno" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Nombre" class="col-sm-4 col-form-label col-form-label-lg">Nombre(s)</label>
                      <div class="col-sm-8">
                        <input maxlength="22" onkeyup="mayus(this)" name="nombre" type="text" class="form-control form-control-sm" id="Nombre" placeholder="Nombre" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="telefono" class="col-sm-4 col-form-label col-form-label-lg">Telefono</label>
                      <div class="col-sm-8">
                        <input name="telefono" type="text" class="form-control form-control-sm" id="telefono" placeholder="Telefono" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="fecha" class="col-sm-4 col-form-label col-form-label-lg">Fecha de nacimiento</label>
                      <div class="col-sm-8">
                        <input name="fecha_nac" type="date" class="form-control form-control-sm" id="fecha" placeholder="Fecha de nacimiento">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="edad" class="col-sm-4 col-form-label col-form-label-lg">Edad</label>
                      <div class="col-sm-8">
                        <input min="10" max="120" name="edad" type="number" class="form-control form-control-sm" id="edad" placeholder="Edad">
                      </div>
                    </div>
              </div>
              
              <p id="solo_letras"></p>


              <div class="btn-group col-sm-5 col-lg-offset-7">
                <input onclick="LimpiarPacientes_11();" type="button" class="btn btn-warning btn-block" value="Limpiar"/>
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
                          <input maxlength="22" onkeyup="mayus(this)" name="ap_paterno_f" type="text" class="form-control form-control-sm" id="Paterno_fav" placeholder="Apellido Paterno" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">Apellido Materno</label>
                      <div class="col-sm-8">
                          <input maxlength="21" onkeyup="mayus(this)" name="ap_materno_f" type="text" class="form-control form-control-sm" id="Materno_fav" placeholder="Apellido Materno" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="Nombre" class="col-sm-4 col-form-label col-form-label-lg">Nombre(s)</label>
                      <div class="col-sm-8">
                        <input maxlength="22" onkeyup="mayus(this)" name="nombre_f" type="text" class="form-control form-control-sm" id="Nombre_fav" placeholder="Nombre" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="Parentesco" class="col-sm-4 col-form-label col-form-label-lg">Parentesco</label>
                      <div class="col-sm-8">
                      <input maxlength="45" onkeyup="mayus(this)" name="parentesco" type="text" class="form-control form-control-sm" id="Parentesco" placeholder="Parentesco" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="Email" class="col-sm-4 col-form-label col-form-label-lg">Correo Electronico</label>
                      <div class="col-sm-8">
                        <input maxlength="45" name="email" type="Email" class="form-control form-control-sm" id="Email" placeholder="Correo Electronico">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="telefono" class="col-sm-4 col-form-label col-form-label-lg">Telefono</label>
                      <div class="col-sm-8">
                        <input name="telefono_fav" id="telefono_fav" type="text" class="form-control form-control-sm" id="telefono" placeholder="Telefono">
                      </div>
                  </div>
                  <div class="form-group row"></div><br><br><br>

                </div>
                  <div class="btn-group col-sm-5 col-lg-offset-7">
                    <input onclick="LimpiarPacientes_22()" type="button" class="btn btn-warning btn-block" value="Limpiar"/>
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
                        <input maxlength="45" onkeyup="mayus(this)" name="ciudad" type="text" class="form-control form-control-sm" id="ciudad" placeholder="Ciudad" required >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="municipio" class="col-sm-4 col-form-label col-form-label-lg">Municipio</label>
                      <div class="col-sm-8">
                        <input maxlength="45" onkeyup="mayus(this)" name="municipio" type="text" class="form-control form-control-sm" id="municipio" placeholder="Municipio">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="colonia" class="col-sm-4 col-form-label col-form-label-lg">Colonia</label>
                      <div class="col-sm-8">
                        <input maxlength="45" onkeyup="mayus(this)" name="colonia" type="text" class="form-control form-control-sm" id="colonia" placeholder="Colonia" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="cp" class="col-sm-4 col-form-label col-form-label-lg">Codigo Postal</label>
                      <div class="col-sm-8">
                        <input name="cp" type="number" class="form-control form-control-sm" id="cp" placeholder="Codigo Postal">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="calle" class="col-sm-4 col-form-label col-form-label-lg">Calle</label>
                      <div class="col-sm-8">
                        <input onkeyup="mayus(this)" name="calle" type="text" class="form-control form-control-sm" id="calle" placeholder="Calle">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="calle2" class="col-sm-4 col-form-label col-form-label-lg">Entre Calle 1</label>
                      <div class="col-sm-8">
                        <input maxlength="45" onkeyup="mayus(this)" name="calle_1" type="text" class="form-control form-control-sm" id="calle1" placeholder="Entre Calle">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="calle2" class="col-sm-4 col-form-label col-form-label-lg">Entre Calle 2</label>
                      <div class="col-sm-8">
                        <input maxlength="45" onkeyup="mayus(this)" name="calle_2" type="text" class="form-control form-control-sm" id="calle2" placeholder="Entre Calle">
                      </div>
                    </div>  

                    <div class="form-group row">
                      <label for="exterior" class="col-sm-4 col-form-label col-form-label-lg">Numero Exterior</label>
                      <div class="col-sm-8">
                        <input name="num_ext"  type="number" class="form-control form-control-sm" id="exterior" placeholder="Numero Exterior">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="interior" class="col-sm-4 col-form-label col-form-label-lg">Numero Interior</label>
                      <div class="col-sm-8">
                        <input name="num_int"  type="number" class="form-control form-control-sm" id="interior" placeholder="Numero Interior">
                      </div>
                    </div>      
                    
                     <div class="form-group row">
                      <label for="exterior" class="col-sm-4 col-form-label col-form-label-lg">Planta alta</label>
                      <div class="col-sm-8">
                        <input name="pa"  type="checkbox" value="true" class="form-control form-control-sm" id="pa"/>
                      </div>
                    </div>

                </div>  
            <div class="btn-group col-sm-5 col-lg-offset-7">
              <input onclick="LimpiarPacientes_3()" type="button" class="btn btn-warning btn-block" value="Limpiar"/>
            </div><br><br>   
          </div>
          <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Observaciones</h3></strong><hr>
              </div>
              <div class="form-group col-md-12">
                    <div class="form-group">
                      <label for="observaciones">Observaciones:</label>
                      <textarea maxlength="200" onkeyup="mayus(this)" name="observaciones"  class="form-control" rows="16"></textarea>
                    </div>
                    <div class="form-group col-lg-offset-8">
                        <input type="button" class="btn btn-warning btn-md" value="Limpiar"/>
                        <button type="submit" class="btn btn-success btn-md">
                        Registrar
                        </button>
                    </div>                    
              </div>
          </div>
        </div>
     </form>
  </div>

  


  


  <!-- Script-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/logicapraxair.js"></script>
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
