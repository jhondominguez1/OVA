<html>
    <title> Areas del Conocimiento</title>
    <head> 
       <meta charset='UTF-8'>

</head>
	<body>
		<table align="center">
		<tr>
        <td colspan="5" align="center" >Áreas del Conocimiento</td>
		</tr>
		<tr>
		<td>Áreas del Conocimiento</td><td>Descripción </td><td>Eliminar </td><td>Actualizar </td>
		</tr>
		<?php
		include ("../conex/conexion.php");

			$registros=mysqli_query($conexion, "SELECT * FROM areas_conocimiento ")or die ("Problemas en la consulta");
			while ($reg=mysqli_fetch_array($registros)){
				echo "<tr><td>".$reg['nombre_area_conocimiento']."</td><td>".$reg['descripcion_area_conocimiento']."</td><td><a href=./eliminararea.php?id=".$reg['id_area_conocimiento'].">Eliminar</a></td><td><a href=./actualizararea.php?id=".$reg['id_area_conocimiento'].">Actualizar</a></td></tr>";
			}
	    ?>
		<form  action="addarea.php" method="POST">
		<tr>
		<td><input type="text"  name="area"></td>
		<td><input type="text"  name="descripcion"></td>
		<td colspan=2><center><input type="submit"  value="Agregar"></center></td>
		</tr>
		</form>
		</table>
	</body>

</html>

