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
      
      ?>      
      <!-- Fin-->

      <!-- Contenido del registro del paciente sistema PRAXAIR  include "ConsultaMedico.php";-->
        <?php include "Oxigenos_methods/Consulta_oxi.php"; ?>       
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
    <script src="Oxigenos_methods/file.js"></script>
  <!-- Fin-->
	</body>
</html>
