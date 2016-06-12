<?php
require("../conex/conexion.php");
$id=$_GET['id'];
$registro=mysqli_query($conexion,"SELECT * FROM cursos  WHERE id_curso='$id'") or die ("Problema en la consulta");
if ($reg=mysqli_fetch_array($registro)){
	mysqli_query($conexion, "DELETE FROM cursos WHERE id_curso='$id'") or die ("Problema en la  consulta");
	echo"<script type=\"text/javascript\">alert('Curso eliminado con exito'); window.location='crearcurso.php';</script>";
	}
?>