<meta charset=utf-8> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Listas</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">



<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
		<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th {
    background-color: #000000;
    color: white;
}
th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>


									
<?php
require("../conex/conexion.php");
$id_usuario=$_GET['id'];
$registro=mysqli_query($conexion,"SELECT usuarios.*, roles.rol FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol WHERE id_usuario='$_GET[id]'") or die ("Problema en la consulta usuarios");

echo "<div class='row'>
	<div class='col-lg-12'>
		<div class='panel-heading'>
		Actualizando Datos
		</div>
		<div class='login-panel panel panel-default'>
			<div class='panel-body'>
				<div style='overflow-x:auto;'>
					<div class='col-lg-12'>
						<div class='panel panel-default'>
							<table>
						        <tr>
									<th data-field='tipo_identificacion' data-sortable='true' >ID </th>
									<th data-field='tipo_identificacion' data-sortable='true' >Tipo Identificación</th>
									<th data-field='numero_identificacion' data-sortable='true'>Número de Identificación</th>
									<th data-field='nombre_usuario'  data-sortable='true'>Nombre de usuario</th>
									<th data-field='password' data-sortable='true'>Password</th>
									<th data-field='rol' data-sortable='true'>Rol</th>
									</tr>";
	while ($reg=mysqli_fetch_array($registro)){
		echo "<tr><td>".$reg['id_usuario']."</td><td>".$reg['tipo_identificacion']."</td><td>".$reg['numero_identificacion']."</td><td>".$reg['nombre_usuario']."</td><td>".$reg['password']."</td><td>".$reg['rol']."</td></tr>";
	}
	
echo "<form action='actualizar.php' method='POST'> 
<tr><td><input type='text' name='nid_usuario' value='$id_usuario' hidden ></td>
<td><select  name='ntipo_identificacion'>
        <option value='Cedula de ciudadanía'>Cedula de ciudadanía</option>
        <option value='Tarjeta de Identidad'>Tarjeta de Identidad</option>
        <option value='Cedula Extrangería'>Cedula Extrangería</option>
        <option value='pasaporte'>Pasaporte</option>
        </select></td>
<td><input type='text' name='nnumero_identificacion' size=9></td>
<td><input type='text' name='nnombre_usuario' ></td>
<td><input type='password' name='npassword' ></td>
<td><select  name='nid_rol'>
        <option value='2'>Docente</option>
        <option value='3'>Estudiante</option>
        <option value='1'>Administrador</option>
        </select></td><tr>
	<tr>
	<td colspan='6'>
	<p class='submit'>
	<input type='submit' name='actualizar' class='btn btn-primary' value='Actualizar' />
	</p>
	</td></tr></form>";
?> 									
									
									
									
									
									
									
									
									
									
									
									

