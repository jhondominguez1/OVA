<?php
require("../conex/conexion.php");
$id=$_GET['id'];
$registro=mysqli_query($conexion,"SELECT * FROM areas_conocimiento  WHERE id_area_conocimiento='$id'") or die ("Problema en la consulta");
if ($reg=mysqli_fetch_array($registro)){
	mysqli_query($conexion, "DELETE FROM areas_conocimiento WHERE id_area_conocimiento='$id'") or die ("Problema en la  consulta");
	echo"<script type=\"text/javascript\">alert('Área eliminada con exito'); window.location='areasconocimiento.php';</script>";
	}
?>

