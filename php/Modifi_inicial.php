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
    $id = $_GET['id'];
    
    //incluimos el fichero de conexion
    include_once('Scripts/DBconexion.php');

    $database = new Connection();
    $db = $database->open();
    
      $sql = "SELECT * FROM pacientes WHERE cedula = '$id' ";
      

    $row;
    foreach($db->query($sql) as $row){
     // echo $row['nombre'];
    }
    //echo '<br>';
    //echo $row['telefono'];

  ?>
	<!-- Navegacion del usuario administrador del sistema PRAXAIR-->
  <?php
      session_start();
      
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
      <form method="POST" action="Pacientes_pend/update_paciente.php?id=<?php echo $row['cedula'];?>"  >
        <div class="row main">
            <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Datos del Paciente</h3></strong><hr>
              </div>
              <div class="form-group col-md-12">

                    <div class="form-group row">
                      <label for="cedula" class="col-sm-4 col-form-label col-form-label-lg">Cédula de Afiliacion</label>
                      <div class="col-sm-8">
                        <input maxlength="12" minlength="12" value="<?php echo $row['cedula'] ?>" name="cedula" type="text" class="form-control form-control-sm" id="cedula" placeholder="Cédula Afiliacion" onkeyup="mayus(this)" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Paciente" class="col-sm-4 col-form-label col-form-label-lg">Numero de Paciente</label>
                      <div class="col-sm-8">
                        <input min="1" max="99999999999" value="<?php echo $row['no_paciente'] ?>" name="no_paciente" type="number" class="form-control form-control-sm" id="Paciente" placeholder="Numero Paciente"  onkeyup="mayus(this)">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="Nombre" class="col-sm-4 col-form-label col-form-label-lg">Apellido paterno Materno Nombre(s)</label>
                      <div class="col-sm-8">
                        <input maxlength="65" value="<?php echo  $row['nombre'];?>" name="nombre" type="text" class="form-control form-control-sm" id="Nombre" placeholder="Apellido paterno Materno Nombre(s)" onkeyup="mayus(this)">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="telefono" class="col-sm-4 col-form-label col-form-label-lg">Telefono</label>
                      <div class="col-sm-8">
                        <input min="1111111" max="9999999999"  value="<?php echo $row['telefono'] ?>" name="telefono" type="number" class="form-control form-control-sm" id="telefono" placeholder="Telefono"  />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="fecha" class="col-sm-4 col-form-label col-form-label-lg">Fecha de nacimiento</label>
                      <div class="col-sm-8">
                        <input value="<?php echo $row['fecha_nacimiento'] ?>" name="fecha_nac" type="date" class="form-control form-control-sm" id="fecha" placeholder="Fecha de nacimiento" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="edad" class="col-sm-4 col-form-label col-form-label-lg">Edad</label>
                      <div class="col-sm-8">
                        <input  max="120" value="<?php echo $row['edad'] ?>" name="edad" type="number" class="form-control form-control-sm" id="edad" placeholder="Edad" >
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="edad" class="col-sm-4 col-form-label col-form-label-lg">Estado</label>
                      <div class="col-sm-8">
                        <input value="<?php echo $row['estado'] ?>" name="estado" type="text" class="form-control form-control-sm" id="estado" placeholder="Estado" onkeyup="mayus(this)" readonly>
                      </div>
                    </div>

              </div>
              <div class="btn-group col-sm-5 col-lg-offset-7">
                <input type="button" onclick="LimpiarPacientes_1();" class="btn btn-warning btn-block" value="Limpiar"/>
              </div>               
            </div>
            <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Datos Familiar del Paciente</h3></strong><hr>
              </div>
              <div class="form-group col-md-12">
              <?php 
                
                  
              ?>
                                     
                      
                  <div class="form-group row">
                      <label for="Nombre" class="col-sm-4 col-form-label col-form-label-lg">Apellido paterno Materno Nombre(s)</label>
                      <div class="col-sm-8">
                        <input maxlength="65" value="<?php echo $row['familiar_responsable']; ?>" name="nombre_f" type="text" class="form-control form-control-sm" id="Nombre_fav" placeholder="Apellido paterno Materno Nombre(s)" onkeyup="mayus(this)">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="Parentesco" class="col-sm-4 col-form-label col-form-label-lg">Parentesco</label>
                      <div class="col-sm-8">
                          <input name="parentesco" class="form-control" id="Parentesco" onkeyup="mayus(this)">
                           
                          
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="Email" class="col-sm-4 col-form-label col-form-label-lg">Correo Electronico</label>
                      <div class="col-sm-8">
                        <input  value="<?php echo $row['email_familiar'] ?>" name="email" type="Email" class="form-control form-control-sm" id="Email" placeholder="Correo Electrico" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="telefono" class="col-sm-4 col-form-label col-form-label-lg">Telefono</label>
                      <div class="col-sm-8">
                        <input  value="<?php echo $row['telefono_familiar'] ?>" name="telefono_fav" type="number" class="form-control form-control-sm" id="telefono_fav" placeholder="Telefono" >
                      </div>
                  </div>
                  <div class="form-group row"></div><br><br><br>

                </div>
                  <div class="btn-group col-sm-5 col-lg-offset-7">
                    <input onclick="LimpiarPacientes_2();" type="button" class="btn btn-warning btn-block" value="Limpiar"/>
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
                        <input maxlength="45" value="<?php echo $row['ciudad'] ?>" name="ciudad" type="text" class="form-control form-control-sm" id="ciudad" placeholder="Ciudad" onkeyup="mayus(this)">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="municipio" class="col-sm-4 col-form-label col-form-label-lg">Municipio</label>
                      <div class="col-sm-8">
                        <input maxlength="45" value="<?php echo $row['municipio'] ?>" name="municipio" type="text" class="form-control form-control-sm" id="municipio" placeholder="Municipio" onkeyup="mayus(this)">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="colonia" class="col-sm-4 col-form-label col-form-label-lg">Colonia</label>
                      <div class="col-sm-8">
                        <input  value="<?php echo $row['colonia'] ?>" name="colonia" maxlength="45" type="text" class="form-control form-control-sm" id="colonia" placeholder="Colonia" onkeyup="mayus(this)">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="cp" class="col-sm-4 col-form-label col-form-label-lg">Codigo Postal</label>
                      <div class="col-sm-8">
                        <input  maxlength="45" value="<?php echo $row['cp'] ?>" name="cp" type="text" class="form-control form-control-sm" id="cp" placeholder="Codigo Postal" onkeyup="mayus(this)">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="calle" class="col-sm-4 col-form-label col-form-label-lg">Calle</label>
                      <div class="col-sm-8">
                        <input maxlength="45"  value="<?php echo $row['calle'] ?>" name="calle" type="text" class="form-control form-control-sm" id="calle" placeholder="Calle" onkeyup="mayus(this)">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="calle2" class="col-sm-4 col-form-label col-form-label-lg">Entre Calle 1</label>
                      <div class="col-sm-8">
                        <input  maxlength="45" value="<?php echo $row['entre_calle1'] ?>" name="calle_1" type="text" class="form-control form-control-sm" id="calle1" placeholder="Entre Calle" onkeyup="mayus(this)">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="calle2" class="col-sm-4 col-form-label col-form-label-lg">Entre Calle 2</label>
                      <div class="col-sm-8">
                        <input maxlength="45" value="<?php echo $row['entre_calle2'] ?>" name="calle_2" type="text" class="form-control form-control-sm" id="calle2" placeholder="Entre Calle" onkeyup="mayus(this)">
                      </div>
                    </div>  

                    <div class="form-group row">
                      <label for="exterior" class="col-sm-4 col-form-label col-form-label-lg">Numero Exterior</label>
                      <div class="col-sm-8">
                        <input  value="<?php echo $row['numero_exterior'] ?>" name="num_ext"  type="text" class="form-control form-control-sm" id="exterior" placeholder="Numero Exterior">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="interior" class="col-sm-4 col-form-label col-form-label-lg">Numero Interior</label>
                      <div class="col-sm-8">
                        <input  value="<?php echo $row['numero_interior'] ?>" name="num_int"  type="text" class="form-control form-control-sm" id="interior" placeholder="Numero Interior">
                      </div>
                    </div>                                                                   
                </div>  
            <div class="btn-group col-sm-5 col-lg-offset-7">
              <input onclick="LimpiarPacientes_3();" type="button" class="btn btn-warning btn-block" value="Limpiar"/>
            </div><br><br>   
          </div>
          <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Observaciones del Medico</h3></strong><hr>
              </div>
              <div class="form-group col-md-12">
                    <div class="form-group">
                      <label for="observaciones">Observaciones:</label>
                      <textarea maxlength="200" id="observaciones" value="" name="observaciones" onkeyup="mayus(this)" class="form-control" rows="16" ><?php echo $row['observaciones'];?></textarea>
                    </div>
                    <div class="form-group col-lg-offset-8">
                        <input onclick="limpiar_area();" type="button" class="btn btn-warning btn-md" value="Limpiar"/>
                        <button name="editar" type="submit" class="btn btn-success btn-md">
                        Registrar
                        </button>
                    </div>                    
              </div>
          </div>
        </div>
     </form>
  </div>


  <br><br><br><br>
  
  <center><h1>Recetas del paciente <?php echo $row['nombre'] ?></h1></center>
  
  <?php 
    
    include "Recetas_methods/Consulta_recetas.php"; 
    //include "REcetas_methods/Modales.php";
    
    ?>   





  <!-- Script-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/logicapraxair.js"></script>
  <!--jquery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <!-- Bootstrap's JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="Recetas_methods/file.js"></script>
  <!-- Fin-->
  <!-- Pie de pagina del sistema PRAXAIR-->
    <?php include "Pagina/Footer.php"; ?>                              
  <!-- Fin del pie pagina-->	
	</body>
</html>
