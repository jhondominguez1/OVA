<!-- Archivo para actualizar la informacion de estudiante en la BD -->
<!-- ya esta funcionando -->
<?php
$id_usuario = $_POST['id_usuario'];
$tipo_identificacion = $_POST['tipo_identificacion'];
$numero_identificacion = $_POST['numero_identificacion'];
$nombre_usuario = $_POST['nombre_usuario'];

include("conexion.php");


$registro=mysqli_query($conexion,"SELECT id_usuario, tipo_identificacion, numero_identificacion, nombre_usuario
	FROM usuarios 
	WHERE id_usuario='$id_usuario'") or die("Problemas en la consulta");
if($re=mysqli_fetch_array($registro)){
mysqli_query($conexion,"UPDATE usuarios set id_usuario='$id_usuario', tipo_identificacion='$tipo_identificacion', numero_identificacion='$numero_identificacion', nombre_usuario='$nombre_usuario' WHERE id_usuario='$id_usuario'") or die("Problemas al actualizar");
echo "Nombre actualizado de forma exitosa";
echo "<META HTTP-EQUIV=Refresh CONTENT='1; URL=frm-editar-perfil-estudiante.php'>";
}
else{
	echo "El Usuario no existe";
}
echo "<META HTTP-EQUIV=Refresh CONTENT='1; URL=Formulario_Estudiante.php'>";
?>
