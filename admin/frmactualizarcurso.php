<html>
    <head> 
       <meta charset='UTF-8'>
		<title> Actualizar Curso</title>
	</head>
	<body>
<?php
require("../conex/conexion.php");
$id=$_GET['id'];
	$area=mysqli_query($conexion,"SELECT id_area_conocimiento, nombre_area_conocimiento FROM areas_conocimiento") or die ("Problema en la consulta select area");
	$registro=mysqli_query($conexion, "SELECT cursos.*, areas_conocimiento.nombre_area_conocimiento FROM cursos 
	INNER JOIN areas_conocimiento ON cursos.id_area_conocimiento=areas_conocimiento.id_area_conocimiento WHERE cursos.id_curso='$id'")or die ("Problemas en la consulta");
	echo "<table align=center><tr><td>Id Curso</td><td >Curso </td><td >Descripcion </td><td >Ärea del conocimiento </td></tr>";
	while ($reg=mysqli_fetch_array($registro)){
		echo "<tr><td>".$reg['id_curso']."</td><td>".$reg['nombre_curso']."</td><td>".$reg['descripcion_curso']."</td><td>".$reg['nombre_area_conocimiento']."</td></tr>";
	}
	
	echo "<form  action='actualizarcurso.php' method='POST'>
			<tr>
			<td><input type='text' name='nid_curso' value='$id' readonly='readonly'></td>
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
		<tr><td colspan=4><center><input type='submit' value='Actualizar'></center><td>
		</tr></table>
		</body>
</html>