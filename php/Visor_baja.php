<!DOCTYPE html>
<html lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../js/login.css">
      <link rel="icon" type="image/png" href="images/icon.png">
      <title>PRAXAIR</title>    


      <style>

        iframe{
            width: 70%;
            height: 500px;
            display: block;

            
        }

        .responsiva{
        
        }
        
        h3{
            margin-right: auto;
            margin-left: auto;
            text-align: center;
        }

      </style>
    </head>
    
  <!-- Encabezado de pagina del sistema PRAXAIR-->
    <?php include "Pagina/Header.php"; ?>       
  <!-- Fin-->
  <body>
  
    <div id="container">
      <!-- Navegacion del usuario administrador del sistema PRAXAIR-->
    <?php
    
      session_start();
      
      $name="";
      
      if(isset($_SESSION['u_usuario'])){
        $name = $_SESSION['u_usuario'];
      }else{
        header("Location: ../index.php");
      }
    
        $variable = $_SESSION['u_rol'];
        
        if($variable=="Usuario"){
          include "Pagina/Navegador-medico.php";  
        }else if($variable=="Administrador"){
          include "Pagina/Navegador-administrador.php"; 
                } else{
                    header("Location:../index.php");
                }
        

        $id = $_GET['id'];
        $ido = $_GET['ido'];
        $soli = $_GET['rem'];
        

        ?>
        
      <!-- Fin-->
      
      <!-- Contenido del registro del paciente sistema PRAXAIR  -->
      <!--<center><iframe src="Visor/dist/Presentación1.pdf" width="700" height="780" style=""></iframe></center>-->
      <div class="baja">
        <h3>Baja de usuario</h3>
        <center><iframe  src="./Visor/baja_user.php?rem=<?php echo $soli; ?>&ido=<?php echo $ido; ?>&id=<?php echo $id; ?>"></iframe></center>
      </div>



      
      
      <!-- Fin-->

    </div>

    <!-- Pie de pagina del sistema PRAXAIR-->
      <?php include "Pagina/Footer.php"; ?>              
    <!-- Fin del pie pagina-->  

    <!-- Script-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/logicapraxair.js"></script>
    <!--jquery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap's JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  <!-- Fin-->
  </body>
</html>


