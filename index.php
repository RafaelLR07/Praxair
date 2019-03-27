<!DOCTYPE html>
<html lang="en">
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="js/login.css">
        <link rel="icon" type="image/png" href="images/icon.png">
        <title>PRAXAIR</title>    
   	</head>
   	
   	<!-- Encabezado de pagina del sistema PRAXAIR-->
	<?php include "php/Pagina/Header.php"; ?>    		
	<!-- Fin-->
	<body>
    <div class="col-md-12">
		<div class="container">
			<div class="row main">
			<div class="panel-heading">
	          	<div class="panel-title text-center">
	            	<h2 class="title">Inicio de Sesión</h2>
	          	</div>
	      	</div>
        <form action="proccess.php" method="POST" class="col-md-4 col-md-offset-4">
          	<div class="form-group ">
				<label for="name" class="cols-sm-3 control-label">Usuario</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" style="font-size:18px;" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="usuario" id="user"  placeholder="Usuario" required/>
						</div>
					</div>
			</div>
          	<div class="form-group">
				<label for="name" class="cols-sm-3 control-label">Contraseña</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="font-size:18px;" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="contra" id="password"  placeholder="Contraseña" required/>
						</div>
					</div>
			</div>

        <button type="submit" class="btn btn-info btn-block ">Ingresar</button>
      </form>
    </div>	
	</body>
   	<!-- Pie de pagina del sistema PRAXAIR-->
	    <?php include "PHP/Pagina/Footer.php"; ?>    	    		
	<!-- Fin-->
</html>
