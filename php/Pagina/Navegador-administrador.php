<?php
echo "
	<div class='container'>
		<div  class='row'>
			<div class='col-xs-12'>
				<nav class='navbar navbar-default navbar-fixed' role='group'>
					<a href='index.php' class='navbar-brand'> <img id='icono-nav' alt='Brand' src='images/icon.png'>ISSSTE</a>
					<ul class='nav navbar-nav nav nav-pills'>
						<li> 
							<a href='#' data-toggle='dropdown'>Pacientes <span class='caret'></span> </a>
							<ul class='dropdown-menu'>
								<li> <a href='Registro-Paciente.php'>Registrar Paciente</a></li>
								<li> <a href='index.php' id='Usuario'>Pacientes activos</a></li>
								<li> <a href='Inactivos.php' id='Usuario'>Pacientes inactivos</a></li>
								<li> <a href='Pacientes_pend.php' id='Usuario'>Pacientes pendientes</a></li>
							</ul>	
						</li>
						<li>
							<a href='#' data-toggle='dropdown'>Empleados <span class='caret'></span> </a>
							<ul class='dropdown-menu'>
								<li> <a href='Medicos.php'>Medicos</a></li>
								<li> <a href='Usuario.php' id='Usuario'>Usuarios</a></li>
							</ul>
						</li>		
						<li>
							<a href='#' data-toggle='dropdown'>Suministro de oxigenos<span class='caret'></span> </a>
							<ul class='dropdown-menu'>
								<li> <a href='Suministro.php'>Suministro de oxigenos</a></li>
								<li> <a href='Facturas.php'>Facturacion</a></li>
							</ul>
						</li>	

											
					</ul>
					<ul class='nav navbar-nav navbar-right'>
						<li> <p class='navbar-text'>Usuario: <strong>$name </strong> online</p></li>
						
						<li> <a href='../index.php'>Cerrar Sesión</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
";?>