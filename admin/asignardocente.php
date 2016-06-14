<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Asignar Docente</title>
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
		Lista de Cursos
		</div>
		<div class="login-panel panel panel-default">
			<div class="panel-body">
				<div style="overflow-x:auto;">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<table>
								<tr>
									<th data-field="curso" data-sortable="true" ><strong>Curso</strong></th>
									<th data-field="docente" data-sortable="true"><strong>Docente</strong></th>
									<th data-field="acciones" data-sortable="true" colspan=2><strong>Acciones</strong></th>
								</tr>
								<?php
								include ("../conex/conexion.php");
								$curso=mysqli_query($conexion,"SELECT id_curso, nombre_curso FROM cursos") or die ("Problema en la consulta select curso");
								$user=mysqli_query($conexion,"SELECT id_usuario, nombre_usuario id_rol FROM usuarios WHERE id_rol=2") or die ("Problema en la consulta select usuarios");
								$registros=mysqli_query($conexion, "SELECT asignacion_docentes.*, cursos.nombre_curso, cursos.descripcion_curso, usuarios.nombre_usuario FROM asignacion_docentes
								INNER JOIN cursos ON cursos.id_curso=asignacion_docentes.id_curso
								INNER JOIN usuarios ON usuarios.id_usuario=asignacion_docentes.id_usuario;")or die ("Problemas en la consulta");
								while ($reg=mysqli_fetch_array($registros)){
								echo "<tr><td>".$reg['nombre_curso']."</td><td>".$reg['nombre_usuario']."</td><td>
								<a href=./frmactualizarasig.php?id=".$reg['id_curso']."><span class='glyphicon glyphicon-edit'></span></a></td>
								<td><a href=./eliminarasignardocente.php?id=".$reg['id_curso']."><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
								}
								?>
								<form  action="addasignardocente.php" method="POST">
									<tr>
									<td><select name='curso'>
									<?php
									while($row=mysqli_fetch_row($curso))	{
									echo" <option value='$row[0]'>$row[1]</opcion>";
									}
									?>
									</td>
									<td><select name='docente'>
									<?php
									while($row=mysqli_fetch_row($user))	{
									echo" <option value='$row[0]'>$row[1]</opcion>";
									}
									?>
									</td>
									<td colspan=2><center><input type="submit" class="btn btn-primary" value="Asignar"></center></td>
									</tr>
								</form>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>