
    <head> 
       <meta charset='UTF-8'>
		<title> Actualizar Area del Conocimiento</title>
	</head>
<?php
require("../conex/conexion.php");
$id=$_GET['id'];

	$registro=mysqli_query($conexion, "SELECT * FROM areas_conocimiento WHERE id_area_conocimiento='$id'")or die ("Problemas en la consulta");
	
	echo "<table align=center ><tr><td>Id Ärea </td><td >Ärea del Conocimiento </td><td >Descripcion </td></tr>";
	while ($reg=mysqli_fetch_array($registro)){
		echo "<tr><td>".$reg['id_area_conocimiento']."</td><td>".$reg['nombre_area_conocimiento']."</td><td>".$reg['descripcion_area_conocimiento']."</td></tr>";
	}
	
echo "<form  action='actualizararea.php' method='POST'>
		<tr>
		<td><input type='text' name='nid_area' value='$id' readonly='readonly'></td>
		<td><input type='text'  name='narea'></td>
		<td><input type='text'  name='ndescripcion'></td>
		<tr><td colspan=3><center><input type='submit' value='Actualizar'></center><td>
		</tr></table>";
	
?> 