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
        .global{
          width:50%;
          margin-left: auto;
          margin-right:auto;

        }

        .title{
          font-size: 24px;
          margin-left: 12px;

          
        }

      </style>
   	</head>
  <!-- Encabezado de pagina del sistema PRAXAIR-->
		<?php include "Pagina/Header.php"; ?>    		
	<!-- Fin-->
	<body>
  

  <?php
      session_start();
      include_once('Scripts/DBconexion.php');

      $fecha = strftime("%Y-%m-%d");
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
      <div class="global">
      <h3 class="title">PRIMER REC</h3>
      <form method="POST" action="Recetas_methods/add_first_rec.php"  >
        <form method="POST" action="Recetas_methods/add_first_rec.php" >
            
              <input value="<?php echo $idd?>" name="idd" type="hidden" class="form-control" id="" placeholder="Numero de serie"  required>
            
              <div class="form-group">
                <label for="">Numero de serie</label>
                <input name="no_serie" type="text" class="form-control" id="" placeholder="Numero de serie"  required>
              </div>

              <div class="form-group">
                <label for="">Fecha</label>
                <input value="<?php echo $fecha?>" name="fecha" type="date" class="form-control" id="" placeholder="Fecha" readonly required >
              </div>
              
              <div class="form-group">
                <label for="observaciones">Diagnostico:</label>
                <textarea name="diagnostico" class="form-control" rows="3" ></textarea>
              </div>
              <div class="form-group">
                <label for="observaciones">Indicaciones:</label>
                <textarea name="indicaciones" class="form-control" rows="4" ></textarea>
              </div>
              
              <div class="form-group">
                <label for=""> Estado </label>
                <input value="ACTIVO" readonly name="estado" type="text" class="form-control" id="" placeholder="Estado"  required>
              </div>
              
              <div class="form-group">
                <label for="">Paciente</label>
                <input  name="paciente" type="text" class="form-control" id="" placeholder="Paciente"  required>
              </div>
              
              <div class="form-group">
                <label for="">Oxigeno</label>
                <select onchange="" name = "oxigeno" class="form-control" id="oxigeno" >
                        <option selected>Eliga oxigeno</option>
                        <?php
                              
                $database = new Connection();
                $db = $database->open();
                $consulta = 'SELECT * FROM oxigenos';
                  try{
                    foreach ($db->query($consulta) as $fila){
                      ?>
                      <option value="<?php  echo $fila['id_oxigenos']  ?>"><?php  echo $fila['tipo']."  $".$fila['precio'];  ?></option>  
                      <?php     
                    }


                  }catch(PDOException $e){
                    echo "Error en la consulta de tipo ". $e->getMessage(); 
                  }
                  
                
                


              ?>

                        ?>

                       

              </select>
              <p id="p"></p>
              <div class="form-group">
                <label for="">Medico</label>
                <select onchange="" name ="medico" class="form-control" id="especialidad" >
                        <option selected>Eliga medico</option>
                        <?php 

              $consulta = 'SELECT * FROM medicos';
                try{
                  foreach ($db->query($consulta) as $fila){
                    ?>
                    <option value="<?php  echo $fila['no_empleado']  ?>"><?php  echo $fila['nombre'] ?></option>  
                    <?php     
                  }


                }catch(PDOException $e){
                  echo "Error en la consulta de tipo ". $e->getMessage(); 
                }
                
                  //Cerrar la Conexion
                $database->close();
                


              ?>
                        ?>
                       

              </select>
              </div>
                
              

              <div class="btn-group col-lg-offset-8">
                <button class="btn btn-warning btn-group-lg">Limpiar</button>
                <button type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
              </div>
            </form>
     </form>
    </div>
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
