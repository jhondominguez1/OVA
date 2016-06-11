<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!--<link rel="stylesheet" href="jqm/jquery.mobile-1.3.2.css">-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="fonts/style.css">
</head>
<body>
<!-- se pone estilos css al formulario y tabla -->
<!-- aqui se edittara la informacion de perfil del estudiante -->	
<form method="POST" action="actualizar-perfil-estudiante.php">
	
	<table border=1 align="center" class="form-add-trec">
		<tr class="form-group">
			<td colspan=5 align="center" class="titulo-add-recurso">Fórmulario Actualizar Perfil</td>
		</tr>
		<tr align="center" class="form-group">
			<td>Tipo Identificación</td>
			<td>Número identificación</td>
			<td>Nombres y Apellidos</td>
			<td>Actualizar</td>
		</tr>

<?php
include ("conexion.php");
$id_usuario=3;
$registroest=mysqli_query($conexion,"SELECT id_usuario, tipo_identificacion, numero_identificacion, nombre_usuario FROM usuarios
	WHERE id_usuario='$id_usuario'") or die("Problemas en la consulta");
while ($row=mysqli_fetch_array($registroest)){
?>
		<input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario'];?>"/>
		<tr class="form-group">
		<td><input type="text" name="tipo_identificacion" required class="form-control" value="<?php echo $row['tipo_identificacion'];?>"/></td>
		<td><input type="text" name="numero_identificacion" required class="form-control" value="<?php echo $row['numero_identificacion'];?>"/></td>
		<td><input type="text" name="nombre_usuario" required class="form-control" value="<?php echo $row['nombre_usuario'];?>"/></td>

		<td><input type="submit" value="Actualizar Datos" class="btn btn-success"></td>
		</tr>

<?php }?>

	</table>

</form>

</body>
</html>