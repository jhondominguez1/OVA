<?php
require("../conex/conexion.php");
if (isset($_POST['ncurso']) && !empty($_POST['ncurso']) 
	&& isset($_POST['ndescripcion']) &&!empty($_POST['ndescripcion'])
	&& isset($_POST['narea']) &&!empty($_POST['narea'])){
	$registro=mysqli_query($conexion,"SELECT * FROM cursos  WHERE id_curso='$_POST[nid_curso]'") or die ("Problema en la consulta 1");
	if ($reg=mysqli_fetch_array($registro)){
		mysqli_query($conexion, "UPDATE cursos set nombre_curso='$_POST[ncurso]',descripcion_curso='$_POST[ndescripcion]',id_area_conocimiento='$_POST[narea]' WHERE id_curso='$_POST[nid_curso]'") or die ("Problemas en la segunda consulta");
	
		header("location:crearcurso.php");
	
	}
	else{
		echo"<script type=\"text/javascript\">alert('Debe digitar los datos para poder actualizar el registro'); window.location='crearcurso.php';</script>";
	}
        
}
else{
	echo"<script type=\"text/javascript\">alert('Debe digitar los datos para ser actualizados'); window.location='crearcurso.php';</script>";
}
?>