<html>
<?php
$id=$_POST['id_curso'];





?>

<body bgcolor="#125612">
	<table border='1' width='80%' bordercolor="#F12727" bgcolor="#639449">
	<tr>


		<th>id_curso</th>
		<th>nombre_curso</th>
		<th>descripcion_curso</th>
		<th>id_area_conocimiento</th>
		
		<th>Actualizar</th>
	</tr>
	<tr>
	<?php
	require('conexion.php');
	$result=mysqli_query($conexion,"SELECT * FROM cursos where id_curso='$id'") or die ("problemas al realizar la consulta");
		while ($selec=mysqli_fetch_array($result)){
	echo "<form name=form1 action=actualizar.php method=POST>";
	echo "<td><input type=text name='id_curso' value='".$_POST['id_curso']."' readonly></td>";
	echo "<td><input type=text name='nombre_curso' value='".$selec['nombre_curso']."'></td>";
	echo "<td><input type=text name='descripcion_curso' value='".$selec['descripcion_curso']."'></td>";
	echo "<td><input type=text name='id_area_conocimiento' value='".$selec['id_area_conocimiento']."'></td>";

	echo "<td><input type=submit value=Actualizar></td>";
	echo "</form>";
}
	?>
	</tr>
</table>