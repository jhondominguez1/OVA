<?php
require("../conex/conexion.php");
$id=$_GET['id'];
$registro=mysqli_query($conexion,"SELECT * FROM usuarios  WHERE id_usuario='$id'") or die ("Problema en la consulta");
if ($reg=mysqli_fetch_array($registro)){
	
	
	mysqli_query($conexion, "DELETE FROM usuarios WHERE id_usuario='$id'") or die ("Problema en la  consulta");
	echo"<script type=\"text/javascript\">alert('Usuario eliminado con exito'); window.location='listarusuarios.php';</script>";
	}
?>
