<?php
require("../conex/conexion.php");
$id=$_GET['id'];
$registro1=mysqli_query($conexion,"SELECT * FROM asignacion_docentes  WHERE id_usuario='$id'") or die ("Problema en la consulta 1");
$registro=mysqli_query($conexion,"SELECT * FROM usuarios  WHERE id_usuario='$id'") or die ("Problema en la consulta2");
if ($reg=mysqli_fetch_array($registro1)){
	mysqli_query($conexion, "DELETE FROM asignacion_docentes WHERE id_usuario='$id'") or die ("Problema en la  consulta3");
	}
if ($reg=mysqli_fetch_array($registro)){	
	mysqli_query($conexion, "DELETE FROM usuarios WHERE id_usuario='$id'") or die ("Problema en la  consulta4");
	echo"<script type=\"text/javascript\">alert('Usuario eliminado con exito'); window.location='listarusuario.php';</script>";
	}
?>
