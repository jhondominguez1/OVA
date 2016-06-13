<?php
require("../conex/conexion.php");
$id=$_GET['id'];
$registro=mysqli_query($conexion,"SELECT * FROM asignacion_docentes  WHERE id_curso='$id'") or die ("Problema en la consulta");
if ($reg=mysqli_fetch_array($registro)){
	mysqli_query($conexion, "DELETE FROM asignacion_docentes WHERE id_curso='$id'") or die ("Problema en la  consulta");
	echo"<script type=\"text/javascript\">alert('Asignacion eliminada con exito'); window.location='asignardocente.php';</script>";
	}
?>

