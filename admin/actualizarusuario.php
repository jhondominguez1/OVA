<?php 
//incluir archivo de conexion
include("conexion.php");
$id_usuario=$_POST['id_usuario'];
//establecer conexion con el servidor 
mysqli_query($conexion, "UPDATE usuarios SET nombre_usuario='$_POST[nombre_usuario]', numero_identificacion='$_POST[numero_identificacion]', tipo_identificacion='$_POST[tipo_identificacion]', id_rol='$_POST[id_rol]' WHERE id_usuario='$id_usuario'") or die ("problemas en la conexion");
echo "Datos actualizados de forma exitosa";
echo "<meta http-equiv='refresh' content='2;url=gestionarusuario.php'> ";
?>