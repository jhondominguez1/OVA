<?php
require("../conex/conexion.php");
if (isset($_POST['narea']) && !empty($_POST['narea']) 
	&& isset($_POST['ndescripcion']) &&!empty($_POST['ndescripcion'])){
	$registro=mysqli_query($conexion, " SELECT * FROM areas_conocimiento WHERE id_area_conocimiento='$_POST[nid_area]' ") or die ("Problemas en la consulta");
	if ($reg=mysqli_fetch_array($registro)){
		mysqli_query($conexion, "UPDATE areas_conocimiento set nombre_area_conocimiento='$_POST[narea]',descripcion_area_conocimiento='$_POST[ndescripcion]' WHERE id_area_conocimiento='$_POST[nid_area]'") or die ("Problemas en la segunda consulta");
	
		header("location:areasconocimiento.php");
	
	}
	else{
		echo"<script type=\"text/javascript\">alert('Debe digitar los datos para poder actualizar el registro'); window.location='areasconocimiento.php';</script>";
	}
	}
else{
	echo"<script type=\"text/javascript\">alert('Debe digitar los datos para ser actualizados'); window.location='areasconocimiento.php';</script>";
	}
	
?>