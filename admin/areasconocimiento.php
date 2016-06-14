<!DOCTYPE html>
<html lang="en">
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
		Lista Areas de Conocimiento
		</div>
		<div class="login-panel panel panel-default">
			<div class="panel-body">
				<div style="overflow-x:auto;">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<table>
						        
								<tr>
									<th data-field="areasc" data-sortable="true" >Áreas del Conocimient</th>
									<th data-field="descripcion" data-sortable="true">Descrición</th>
									<th data-field="eliminar"  data-sortable="true">Eliminar</th>
									<th data-field="actualizar" data-sortable="true">Actualizar</th>
								</tr>
		<?php
		include ("../conex/conexion.php");

			$registros=mysqli_query($conexion, "SELECT * FROM areas_conocimiento ")or die ("Problemas en la consulta");
			while ($reg=mysqli_fetch_array($registros)){
				echo "<tr><td>".$reg['nombre_area_conocimiento']."</td><td>".$reg['descripcion_area_conocimiento']."</td><td><a href=./eliminararea.php?id=".$reg['id_area_conocimiento']."><span class='glyphicon glyphicon-trash'></span></a></td><td><a href=./frmactualizararea.php?id=".$reg['id_area_conocimiento']."><span class='glyphicon glyphicon-edit'></span></a></td></tr>";
			}
	    ?>
		<form  action="addarea.php" method="POST">
		<tr>
		<td><input type="text"  name="area"></td>
		<td><input type="text"  name="descripcion"></td>
		<td colspan=2><center><input type="submit" class="btn btn-primary" value="Agregar"></center></td>
		</tr>
		</form>
		</table>
	</body>

</html>

