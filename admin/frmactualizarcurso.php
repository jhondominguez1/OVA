<meta charset=utf-8> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Actualizar Curso</title>

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
$id=$_GET['id'];
	$area=mysqli_query($conexion,"SELECT id_area_conocimiento, nombre_area_conocimiento FROM areas_conocimiento") or die ("Problema en la consulta select area");
	$registro=mysqli_query($conexion, "SELECT cursos.*, areas_conocimiento.nombre_area_conocimiento FROM cursos 
	INNER JOIN areas_conocimiento ON cursos.id_area_conocimiento=areas_conocimiento.id_area_conocimiento WHERE cursos.id_curso='$id'")or die ("Problemas en la consulta");
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
									<th>ID </th>
									<th>Curso</th>
									<th>Descripción</th>
									<th>Area de Conocimiento</th>
									</tr>";
	while ($reg=mysqli_fetch_array($registro)){
		echo "<tr><td>".$reg['id_curso']."</td><td>".$reg['nombre_curso']."</td><td>".$reg['descripcion_curso']."</td><td>".$reg['nombre_area_conocimiento']."</td></tr>";
	}
	
	echo "<form  action='actualizarcurso.php' method='POST'>
			<tr>
			<td><input type='text' name='nid_curso' value='$id' readonly='yes'></td>
			<td><input type='text'  name='ncurso'></td>
			<td><input type='text'  name='ndescripcion'></td>"; 

?> 

		<td><select name='narea'>
		<?php
		while($row=mysqli_fetch_row($area))	{
		echo" <option value='$row[0]'>$row[1]</opcion>";
		}
		?>
		</td>
		<tr><td colspan=4><center><input type='submit' name='actualizar' class='btn btn-primary' value='Actualizar' /></center><td>
		</tr></table>
		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		</body>
</html>