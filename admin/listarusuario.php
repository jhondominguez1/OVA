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

<div class="row">
	<div class="col-lg-12">
		<div class="panel-heading">
		Lista de Administradores
		</div>
		<div class="login-panel panel panel-default">
			<div class="panel-body">
				<div style="overflow-x:auto;">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<table>
						        <tr>
									<th data-field="tipo_identificacion" data-sortable="true" >Tipo Identificación</th>
									<th data-field="numero_identificacion" data-sortable="true">Número de Identificación</th>
									<th data-field="nombre_usuario"  data-sortable="true">Nombre de usuario</th>
									<th data-field="password" data-sortable="true">Password</th>
									<th data-field="rol" data-sortable="true">Rol</th>
									<th>Eliminar</th>
									<th>Actualizar</th>
								</tr>
								<?php
								include ("../conex/conexion.php");
								$registros=mysqli_query($conexion, "SELECT usuarios.*, roles.rol FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol where usuarios.id_rol = 1")or die ("Problemas en la consulta");
								while ($reg=mysqli_fetch_array($registros)){
								echo "<tr><td>".$reg['tipo_identificacion']."</td><td>".$reg['numero_identificacion']."</td><td>".$reg['nombre_usuario']."</td><td>'".md5($reg['password'])."</td><td>".$reg['rol']."</td><td><a href=./eliminarusuario.php?id=".$reg['id_usuario'].">Eliminar</a></td><td><a href=./frmactualizar.php?id=".$reg['id_usuario'].">Actualizar</a></td></tr>";
								}
								?>
						    </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel-heading">
		Lista de Docentes
		</div>
		<div class="login-panel panel panel-default">
			<div class="panel-body">
				<div style="overflow-x:auto;">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<table>
						        <tr>
									<th data-field="tipo_identificacion" data-sortable="true" >Tipo Identificación</th>
									<th data-field="numero_identificacion" data-sortable="true">Número de Identificación</th>
									<th data-field="nombre_usuario"  data-sortable="true">Nombre de usuario</th>
									<th data-field="password" data-sortable="true">Password</th>
									<th data-field="rol" data-sortable="true">Rol</th>
									<th>Eliminar</th>
									<th>Actualizar</th>
								</tr>
								<?php
								include ("../conex/conexion.php");
								$registros=mysqli_query($conexion, "SELECT usuarios.*, roles.rol FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol where usuarios.id_rol = 2")or die ("Problemas en la consulta");
								while ($reg=mysqli_fetch_array($registros)){
								echo "<tr><td>".$reg['tipo_identificacion']."</td><td>".$reg['numero_identificacion']."</td><td>".$reg['nombre_usuario']."</td><td>'".md5($reg['password'])."</td><td>".$reg['rol']."</td><td><a href=./eliminarusuario.php?id=".$reg['id_usuario'].">Eliminar</a></td><td><a href=./frmactualizar.php?id=".$reg['id_usuario'].">Actualizar</a></td></tr>";
								}
								?>
						    </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel-heading">
		Lista de Estudiantes
		</div>
		<div class="login-panel panel panel-default">
			<div class="panel-body">
				<div style="overflow-x:auto;">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<table>
						        <tr>
									<th data-field="tipo_identificacion" data-sortable="true" >Tipo Identificación</th>
									<th data-field="numero_identificacion" data-sortable="true">Número de Identificación</th>
									<th data-field="nombre_usuario"  data-sortable="true">Nombre de usuario</th>
									<th data-field="password" data-sortable="true">Password</th>
									<th data-field="rol" data-sortable="true">Rol</th>
									<th>Eliminar</th>
									<th>Actualizar</th>
								</tr>
								<?php
								include ("../conex/conexion.php");
								$registros=mysqli_query($conexion, "SELECT usuarios.*, roles.rol FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol where usuarios.id_rol = 3")or die ("Problemas en la consulta");
								while ($reg=mysqli_fetch_array($registros)){
								echo "<tr><td>".$reg['tipo_identificacion']."</td><td>".$reg['numero_identificacion']."</td><td>".$reg['nombre_usuario']."</td><td>'".md5($reg['password'])."</td><td>".$reg['rol']."</td><td><a href=./eliminarusuario.php?id=".$reg['id_usuario'].">Eliminar</a></td><td><a href=./frmactualizar.php?id=".$reg['id_usuario'].">Actualizar</a></td></tr>";
								}
								?>
						    </table>
							<br><br><br><br><br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
