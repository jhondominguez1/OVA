<?php 
if (isset($_POST['insert_articulo'])) {
	require_once'conexion.php'; 
	$nombre_curso= mysqli_real_escape_string($conexion,$_POST['nombre_curso']);
	$descripcion_curso= mysqli_real_escape_string($conexion,$_POST['descripcion_curso']);
	$id_area_conocimiento= mysqli_real_escape_string($conexion,$_POST['id_area_conocimiento']);
	

$sql="SELECT * FROM cursos WHERE nombre_curso='$nombre_curso'";
$existencia= mysqli_query($conexion,$sql);

if ($existe=mysqli_fetch_object($existencia)) {
	echo "<div class=holder-error>El 'nombre_curso' que ha introducido ya existe en tabla 'cursos'.</div>";
}
elseif ($nombre_curso && $descripcion_curso && $id_area_conocimiento ) {
	$sql= "INSERT INTO cursos (nombre_curso,descripcion_curso,id_area_conocimiento) VALUES('$nombre_curso','$descripcion_curso','$id_area_conocimiento')";

	mysqli_query($conexion,$sql);

	echo "<div class=holder-ok> Su 'articulo' fue publicado con exito.</div>";
	mysqli_close($conexion);// cerrar concexion

}else echo "<div class=holder-error>Debes llenar todos los campos obligatorios(*) para insertar 'articulo' nuevo.</div>";

}

// fin insertar articulo nuevo en la base de datos

 ?>

 <form method="POST" action="">
	<fieldset>
		<legend>Insertar un Articulo BD</legend>

		
		Nombre curso: <input type="text" name="nombre_curso" placeholder="*" /><br/ >

		Descripciòn del curso: <textarea name="descripcion_curso" placeholder="*"></textarea><br/ >

		Area del conocimiento: 
		<select name="id_area_conocimiento">
			<option value="">Nombre area</option>
			
			<?php
require_once'conexion.php';

$sql= "SELECT * FROM areas_conocimiento";
$resultado = mysqli_query($conexion,$sql);

if (mysqli_num_rows($resultado) > 0) {
	while ($row = mysqli_fetch_assoc($resultado)) {
		$id_area_conocimiento = $row['id_area_conocimiento'];
		echo "<option value='$id_area_conocimiento'>".$row['nombre_area_conocimiento']."</option>";
		
	}
}

			?>



		</select>





<br /><br />


<br /><br />
<input type="submit" name="insert_articulo" value="Publicar Articulo">

	</fieldset>

</form>


<!-- eliminar curso -->


<?php 
if (isset($_POST['delete_articulo'])) {
	require_once'conexion.php';

	$id_curso=mysqli_real_escape_string($conexion,$_POST['id_curso']);
	if ($id_curso) {
		$existe = mysqli_query($conexion,"SELECT * FROM cursos WHERE id_curso='$id_curso'") OR die("<dic class=error-mensahe>No se pudo seleccionar las Base de datos.");

if (mysqli_num_rows($existe) !=0) {
	
while ($row = mysqli_fetch_assoc($existe)) {
	
mysqli_query($conexion,"DELETE FROM cursos WHERE id_curso='$id_curso'") or die ("<div class=error-mensaje>No se pudo seleccionar la tabla cursos de la base de datos.</div>");

echo "<div class=holder-ok>'El curso' se elimino correctamente.</div>";
mysqli_close($conexion);


}// fin del while

} else echo "<div class=holder-error>El curso se ha eliminado de la base de datos.</div>";


	} else echo "<div class=holder-error>Debes rellenar todos los campos.</div>";

} // fin del if isset

?>

 <form method="POST" action="">
	<fieldset>
		<legend>Eliminar curso</legend>
	
	Nombre del curso: 
		<select name="id_curso">
			<option value="">Nombre cursos</option>
			
			<?php
require_once'conexion.php';

$sql= "SELECT * FROM cursos";
$resultado = mysqli_query($conexion,$sql);

if (mysqli_num_rows($resultado) > 0) {
	while ($row = mysqli_fetch_assoc($resultado)) {
		$id_curso = $row['id_curso'];
		echo "<option value='$id_curso'>".$row['nombre_curso']."</option>";
		
	} 
}

			?>



		</select>
		<br /><br />


<br /><br />
<input type="submit" name="delete_articulo" value="Eliminar curso">

	</fieldset>

</form>

<!-- fin eliminar curso -->



<!-- INICIO ACTUALIZAR -->




 <form method="POST" action="formactualizar.php">
	<fieldset>
		<legend>Modificar curso</legend>
	
	Nombre del curso: 
		<select name="id_curso">
			<option value="">Nombre cursos</option>
			
			<?php
require_once'conexion.php';

$sql= "SELECT * FROM cursos";
$resultado = mysqli_query($conexion,$sql);

if (mysqli_num_rows($resultado) > 0) {
	while ($row = mysqli_fetch_assoc($resultado)) {
		$id_curso = $row['id_curso'];
		echo "<option value='$id_curso'>".$row['nombre_curso']."</option>";
		
	} 
}

			?>



		</select>
		<br /><br />


<br /><br />
<input type="submit" name="modificar" value="Modificar curso">

	</fieldset>

</form>
<!-- FIN ACTUALIZAR -->






