<?php
require("../conex/conexion.php");
$var1=$_POST['nid_curso'];
$var2=$_POST['ndocente'];
if (isset($_POST['nid_curso']) && !empty($_POST['nid_curso']) 
	&& isset($_POST['ndocente']) &&!empty($_POST['ndocente'])){
		echo"$var1";
		echo"$var2";
	$registro=mysqli_query($conexion,"SELECT * FROM asignacion_docentes  WHERE id_curso='$_POST[nid_curso]'") or die ("Problema en la consulta 1");
	if ($reg=mysqli_fetch_array($registro)){
		mysqli_query($conexion, "UPDATE asignacion_docentes  set id_usuario='$_POST[ndocente]' WHERE id_curso='$_POST[nid_curso]'") or die ("Problemas en la segunda consulta");
							
		header("location:asignardocente.php");
	
	}
	else{
		echo"$var1";
		echo"$var2";
		echo"<script type=\"text/javascript\">alert('Debe digitar los datos para poder actualizar el registro'); window.location='asignardocente.php';</script>";
	}
        
}
else{
	echo"<script type=\"text/javascript\">alert('Debe digitar los datos para ser actualizados'); window.location='asignardocente.php';</script>";
}
?>