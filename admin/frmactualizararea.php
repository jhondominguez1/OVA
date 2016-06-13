<meta charset=utf-8> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Actualizar Area</title>

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

	$registro=mysqli_query($conexion, "SELECT * FROM areas_conocimiento WHERE id_area_conocimiento='$id'")or die ("Problemas en la consulta");
	
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
								<th>ID</th>
								<th>Áreas del Conocimiento</th>
								<th>Descrición</th>
								</tr>";
	while ($reg=mysqli_fetch_array($registro)){
		echo "<tr><td>".$reg['id_area_conocimiento']."</td><td>".$reg['nombre_area_conocimiento']."</td><td>".$reg['descripcion_area_conocimiento']."</td></tr>";
	}
	
echo "<form  action='actualizararea.php' method='POST'>
		<tr>
		<td><input type='text' name='nid_area' value='$id' readonly='yes'></td>
		<td><input type='text'  name='narea'></td>
		<td><input type='text'  name='ndescripcion'></td>
		<tr><td colspan=3><center><input type='submit' class='btn btn-primary' value='Actualizar'></center><td>
		</tr></table>";
	
?> 