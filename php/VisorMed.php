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
          iframe{
            width:70%;
            height: 600px;
            
          }
          .nota{
            margin-left: auto;
            margin-right: auto;
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
      $names =   $_SESSION['u_usuario'];
      if($variable=="Usuario"){
        include "Pagina/Navegador-medico.php";  
      }else if($variable=="Administrador"){
        include "Pagina/Navegador-administrador.php"; 
      }else{
        header("Location:../index.php");
      }
    ?>    		
	<!-- Fin-->

  <?php
    
    $valor = $_GET['id'];
    $valor_user = $_GET['ido'];
   

    ?>
  <div class="container">
    
    <div class="nota">
        <center><h3>Nota medica</h3></center>
        <center><iframe  src="./Visor/nota_med.php?ido=<?php echo $valor_user; ?>& id=<?php echo $valor; ?>">RESPONSIVA</iframe></center>
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
