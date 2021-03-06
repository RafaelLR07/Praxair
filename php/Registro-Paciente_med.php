<!DOCTYPE html>
<html lang="en">
    <head>
		  <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../js/login.css">
      <link rel="icon" type="image/png" href="images/icon.png">
      <title>PRAXAIR</title>    
      <style type="text/css">
        .cont  {
         
          
        }
        form{
          
          
        }
        .go{
          width: 40%;
          margin-right: auto;
          margin-left: auto;
        }
        

      </style>

   	</head>
  <!-- Encabezado de pagina del sistema PRAXAIR-->
		<?php include "Pagina/Header.php"; ?>    		
	<!-- Fin-->
	<body>
  <?php
      include_once('Scripts/DBconexion.php');
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
<!-- Pacientes_methods/add_paciente_medic.php -->
<div class="container">
      <form method="POST" action="Pacientes_methods/add_paciente_medic.php" onsubmit="return valida_pac()" >
        <div class="row main">
            <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Datos del Paciente</h3></strong><hr>
              </div>
              <div id="div_pac" class="form-group col-md-12">
                    <div class="form-group row">
                      <label for="cedula" class="col-sm-4 col-form-label col-form-label-lg">Cédula de Afiliacion</label>
                      <div class="col-sm-8">
                        <input maxlength="12" onkeyup="mayus(this)" name="cedula" id="cedula" type="text" class="form-control form-control-sm" id="cedula" placeholder="Cédula Afiliacion" maxlength="12" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Paciente" class="col-sm-4 col-form-label col-form-label-lg">Edad</label>
                      <div class="col-sm-8">
                        <input name="edad" type="number" class="form-control form-control-sm" id="edad" placeholder="Edad" maxlength="3" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="paterno" class="col-sm-4 col-form-label col-form-label-lg">Apellido Paterno</label>
                      <div class="col-sm-8">
                        <input maxlength="22" name="ap_paterno" type="text" onkeyup="mayus(this)" class="form-control form-control-sm" id="Paterno" placeholder="Apellido Paterno" maxlength="20" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="materno" class="col-sm-4 col-form-label col-form-label-lg">Apellido Materno</label>
                      <div class="col-sm-8">
                        <input maxlength="21" name="ap_materno" type="text" onkeyup="mayus(this)" class="form-control form-control-sm" id="materno" placeholder="Apellido Materno" maxlength="20" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nombre" class="col-sm-4 col-form-label col-form-label-lg">Nombre(s)</label>
                      <div class="col-sm-8">
                        <input maxlength="22" name="nombre" type="text" class="form-control form-control-sm" onkeyup="mayus(this)" id="nombre" placeholder="Nombre" maxlength="25" required>
                      </div>
                    </div>
                    
                   
                    
              </div>
                           
            </div>
            <div class="col-xs-6 col-md-*">
              <div class="panel-heading" align="center">
                <strong><h3>Ficha medica</h3></strong><hr>
              </div>
              <div class="form-group col-md-12">
                  <div class="form-group row">
                      <label for="diagnostico" class="col-sm-4 col-form-label col-form-label-lg">Diagnostico</label>
                      <div class="col-sm-8">
                          <textarea maxlength="100" name="diagnostico" onkeyup="mayus(this)" type="text" class="form-control  form-control-sm" id="diagnostico" placeholder="Diagnostico" maxlength="100" required></textarea>

                      </div>
                  </div>
                  
                  <div class="form-group row">
                      <label for="diagnostico"  class="col-sm-4 col-form-label col-form-label-lg">Indicaciones</label>
                      <div class="col-sm-8">
                          <textarea maxlength="1200" name="indicaciones" onkeyup="mayus(this)" type="text" class="form-control  form-control-sm" id="indicaciones" placeholder="Contenido ficha medica" required></textarea>

                      </div>
                  </div>
                  

                </div>

                  <div class="btn-group col-sm-5 col-lg-offset-7">
                    <button onclick="valida_pac();" type="submit" class="btn btn-success btn-block" >Guardar</button>
                  </div>                
            </div>
        </div>
      </form>
    </div>
    <br><br><br>
    <script type="text/javascript" src="../js/jquery.min.js"></script>

    <script type="text/javascript" src="../js/logicapraxair.js"></script>