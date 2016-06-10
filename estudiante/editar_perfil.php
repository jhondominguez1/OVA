<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Perfil</title>
</head>
<body>
	<form action="actualizar.php" method="GET">
	<table border=1 align="center">
		<tr>
			<td colspan=4 align="center">Fórmulario Editar Perfil</td>
		</tr>
		<tr>
			<td align="center">ID</td>
			<td align="center">NOMBRE</td>
			<td align="center">APELLIDO</td>
			<td align="center">CURSOS</td>
		</tr>

			<?php
			include("conexion.php");
			$id_est = $_GET['id_est'];
			$registro = mysqli_query($conexion, "SELECT id_est,titulo,descripcion,fecha,mes,ano,fk_id_usuario,categoria
				FROM articulo WHERE id_est='$id_est'") or die ("Problemas en la consulta");
			while ($row = mysqli_fetch_array($registro)) {
			?>

				<tr>
					<td> <input type="text" name="id_est" value="<?php echo $row['id_est']; ?>"/></td>
					<td> <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" /></td>
					<td> <input type="text" name="apellido" value="<?php echo $row['apellido']; ?>" /></td>
					<td> <input type="text" name="cursos" value="<?php echo $row['cursos']; ?>" /></td>
						
					<table>
					<tr>
						<td><p><input type="submit" Value="Actualizar Datos"></td>
					</tr>
					</table>
				</tr>
			<?php } ?>
	</table>
	</form>	
</body>
</html>