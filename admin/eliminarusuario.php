<?php
include ("../conex/conexion.php");
$id=$_GET['id'];
$registro=mysqli_query($conexion,"SELECT * FROM usuarios  WHERE id_usuario='$id'") or die ("Problema en la primera consulta");
if ($reg=mysqli_fetch_array($registro)){
	
	
	mysqli_query($conexion, "DELETE FROM usuarios WHERE id_usuario='$id'") or die ("Problemas en la  consulta");
	header("location:listarusuarios.php");
}
?>