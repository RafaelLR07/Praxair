<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
include_once('../Scripts/DBconexion.php'); 
//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM pacientes";
$pacientes=$mysqli->query($query);

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['pacientes']))
{
	$q=$mysqli->real_escape_string($_POST['pacientes']);
	$query="SELECT * FROM pacientes WHERE
		cedula LIKE '%".$q."%' OR
		no_paciente LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		telefono LIKE '%".$q."%' OR
		edad LIKE '%".$q."%' OR
		ciudad LIKE '%".$q."%' OR
		email_familiar LIKE '%".$q."%' OR
		familiar_responsable LIKE '%".$q."%' OR
		telefono_familiar LIKE '%".$q."%' ";
}

$buscarPacientes=$mysqli->query($query);
if ($buscarPacientes->num_rows > 0)
{
	$tabla.=
	'<table class="table table-striped">
		<thead>
			<tr>
				<th>Cedula</th>
				<th>No.Paciente</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Edad</th>
				<th>Ciudad</th>
				<th>Email</th>
				<th>Familiar</th>
				<th>Tel.Familiar</th>
			</tr>
			</thead>';

	while($filaPacientes= $buscarPacientes->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaPacientes['cedula'].'</td>
			<td>'.$filaPacientes['no_paciente'].'</td>
			<td>'.$filaPacientes['nombre'].'</td>
			<td>'.$filaPacientes['telefono'].'</td>
			<td>'.$filaPacientes['edad'].'</td>
			<td>'.$filaPacientes['ciudad'].'</td>
			<td>'.$filaPacientes['email_familiar'].'</td>
			<td>'.$filaPacientes['familiar_responsable'].'</td>
			<td>'.$filaPacientes['telefono_familiar'].'</td>

		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}

echo $tabla;
?>
