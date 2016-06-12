<html>
    
    <head> 
		<meta charset='UTF-8'>
		<title> Crear Curso</title>
</head>
	<body>
		<table align="center">
		<tr>
        <td colspan="5" align="center" >Crear Curso</td>
		</tr>
		<tr>
		<td>Curso</td><td>Descripción </td><td>Area del Conocimiento</td><td colspan=2>Acciones </td>
		</tr>
		<?php
		include ("../conex/conexion.php");
			$area=mysqli_query($conexion,"SELECT id_area_conocimiento, nombre_area_conocimiento FROM areas_conocimiento") or die ("Problema en la consulta select area");
			$registros=mysqli_query($conexion, "SELECT cursos.*, areas_conocimiento.nombre_area_conocimiento FROM cursos
			INNER JOIN areas_conocimiento ON cursos.id_area_conocimiento=areas_conocimiento.id_area_conocimiento;
			")or die ("Problemas en la consulta");
			while ($reg=mysqli_fetch_array($registros)){
				echo "<tr><td>".$reg['nombre_curso']."</td><td>".$reg['descripcion_curso']."</td><td>".$reg['nombre_area_conocimiento']."</td><td><a href=./eliminarcurso.php?id=".$reg['id_area_conocimiento'].">Eliminar</a></td><td><a href=./frmactualizarcurso.php?id=".$reg['id_area_conocimiento'].">Actualizar</a></td></tr>";
			}
	    ?>
		<form  action="addcurso.php" method="POST">
		<tr>
		<td><input type="text"  name="curso"></td>
		<td><input type="text"  name="descripcion"></td>
		<td><select name='area'>
		<?php
		while($row=mysqli_fetch_row($area))	{
		echo" <option value='$row[0]'>$row[1]</opcion>";
		}
		?>
		</td>
		<td colspan=2><center><input type="submit"  value="Crear Curso"></center></td>
		</tr>
		</form>
		</table>
	</body>

</html>