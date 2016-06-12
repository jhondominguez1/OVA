<html>
<?php
$id=$_POST['id_usuario'];





?>

<body>
	<table border='1' width='80%' bordercolor="#F12727" bgcolor="#639449">
	<tr>


		<th>id_usuario</th>
		<th>nombre_usuario</th>
		<th>numero_identificacion</th>
		<th>tipo_identificacion</th>
		<th>id_rol</th>
		<th>Actualizar</th>
	</tr>
	<tr>
	<?php
	require('conexion.php');
	$result=mysqli_query($conexion,"SELECT * FROM usuarios where id_usuario='$id'") or die ("problemas al realizar la consulta");
		while ($selec=mysqli_fetch_array($result)){
	echo "<form name=form1 action=actualizarusuario.php method=POST>";
	echo "<td><input type=text name='id_usuario' value='".$_POST['id_usuario']."' readonly></td>";
	echo "<td><input type=text name='nombre_usuario' value='".$selec['nombre_usuario']."'></td>";
	echo "<td><input type=text name='numero_identificacion' value='".$selec['numero_identificacion']."'></td>";
	echo "<td><select class='form-control' name='tipo_identificacion'>
    	<option value='cc' >Cedula de ciudadania</option>
    	<option value='ti' >Tarjeta de identidad</option>
    	<option value='ce' >Cedula de extranjeria</option>
  </select></td>";
  echo "<td><select name='id_rol'>";		
$resultado = mysqli_query($conexion,"SELECT * FROM roles");
if (mysqli_num_rows($resultado) > 0) {
	while ($row = mysqli_fetch_assoc($resultado)){
		$id_rol = $row['id_rol'];
		echo "<option value='$id_rol'>".$row['rol']."</option>";
	} 
}
		echo "</select></td>";
	echo "<td><input type=submit value=Actualizar></td>";
	echo "</form>";
}
	?>
	</tr>
</table>