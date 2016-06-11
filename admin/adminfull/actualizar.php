<?php 
//incluir archivo de conexion
include("conexion.php");
$id_curso=$_POST['id_curso'];
//establecer conexion con el servidor 
mysqli_query($conexion, "UPDATE cursos SET nombre_curso='$_POST[nombre_curso]', descripcion_curso='$_POST[descripcion_curso]', id_area_conocimiento='$_POST[id_area_conocimiento]' WHERE id_curso='$id_curso'") or die ("problemas en la conexion");
echo "Datos actualizados de forma exitosa";
echo "<meta http-equiv='refresh' content='2;url=gestionarcurso.php'> ";
?>