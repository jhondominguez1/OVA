
<!-- eliminar usuario -->


<?php 
if (isset($_POST['delete_usuario'])) {
	require_once'conexion.php';

	$id_usuario=mysqli_real_escape_string($conexion,$_POST['id_usuario']);
	if ($id_usuario) {
		$existe = mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_usuario='$id_usuario'") OR die("<dic class=error-mensahe>No se pudo seleccionar las Base de datos.");

if (mysqli_num_rows($existe) !=0) {
	
while ($row = mysqli_fetch_assoc($existe)) {
	
mysqli_query($conexion,"DELETE FROM usuarios WHERE id_usuario='$id_usuario'") or die ("<div class=error-mensaje>No se pudo seleccionar la tabla usuarios de la base de datos.</div>");

echo "<div class=holder-ok>'El usuario' se elimino correctamente.</div>";
mysqli_close($conexion);


}// fin del while

} else echo "<div class=holder-error>El usuario se ha eliminado de la base de datos.</div>";


	} else echo "<div class=holder-error>Debes rellenar todos los campos.</div>";

} // fin del if isset

?>

 <form method="POST" action="">
	<fieldset>
		<legend>Eliminar usuario</legend>
	
	Nombre del usuario: 
		<select name="id_usuario">
			<option value="">Nombre usuarios</option>
			
			<?php
require_once'conexion.php';

$sql= "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion,$sql);

if (mysqli_num_rows($resultado) > 0) {
	while ($row = mysqli_fetch_assoc($resultado)) {
		$id_usuario = $row['id_usuario'];
		echo "<option value='$id_usuario'>".$row['nombre_usuario']."</option>";
		
	} 
}

			?>



		</select>
		<br /><br />


<br /><br />
<input type="submit" name="delete_usuario" value="Eliminar usuario">

	</fieldset>

</form>

<!-- fin eliminar usuario -->



<!-- INICIO ACTUALIZAR -->




 <form method="POST" action="formactualizarusuario.php">
	<fieldset>
		<legend>Modificar usuario</legend>
	
	Nombre del usuario: 
		<select name="id_usuario">
			<option value="">Nombre usuarios</option>
			
			<?php
require_once'conexion.php';

$sql= "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion,$sql);

if (mysqli_num_rows($resultado) > 0) {
	while ($row = mysqli_fetch_assoc($resultado)) {
		$id_usuario = $row['id_usuario'];
		echo "<option value='$id_usuario'>".$row['nombre_usuario']."</option>";
		
	} 
}

			?>



		</select>
		<br /><br />


<br /><br />
<input type="submit" name="modificar" value="Modificar usuario">

	</fieldset>

</form>
<!-- FIN ACTUALIZAR -->