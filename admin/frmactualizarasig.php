<meta charset=utf-8> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Actualizando Datos</title>

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
$curso=$_GET['id'];
$registro=mysqli_query($conexion,"SELECT  cursos.nombre_curso, usuarios.nombre_usuario FROM usuarios, cursos, asignacion_docentes  WHERE asignacion_docentes.id_curso =cursos.id_curso and asignacion_docentes.id_usuario=usuarios.id_usuario and asignacion_docentes.id_curso='$_GET[id]'") or die ("Problema en la consulta select usuarios");
$user=mysqli_query($conexion,"SELECT id_usuario, nombre_usuario id_rol FROM usuarios WHERE id_rol=2") or die ("Problema en la consulta select usuarios");
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
									<th data-field='id' data-sortable='true' >Curso </th>
									<th data-field='id_usuario' data-sortable='true' >Docente</th>
								</tr>";
								while ($reg=mysqli_fetch_array($registro)){
								echo "<tr><td>".$reg['nombre_curso']."</td><td>".$reg['nombre_usuario']."</td></tr>";
								}
								echo "<form action='actualizarasig.php' method='POST'> 
								<tr><td><input type='text' name='nid_curso' value='$curso' hidden></td>
								<td><select name='ndocente'>";
									
									while($row=mysqli_fetch_row($user))	{
								echo"	<option value=$row[0]>$row[1]</opcion>";
									}
									
								echo"</td></tr>
								<tr>
								<td colspan='2'>
								<p class='submit'>
								<input type='submit' name='actualizar' class='btn btn-primary' value='Actualizar' />
								</p>
								</td></tr></form>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>";
?> 									
									
									
									
									
									
									
									
									
									
									
									

