<?php
require("../conex/conexion.php");
if (isset($_POST['curso']) && !empty($_POST['curso']) 
	&& isset($_POST['docente']) &&!empty($_POST['docente'])){
	$registro=mysqli_query($conexion,"SELECT id_curso FROM asignacion_docentes ") or die ("Problema en la consulta");
	$reg=mysqli_fetch_array($registro);
	$cur=$_POST['curso'];
	if ($reg[0]<>$cur){
	mysqli_query($conexion, "INSERT INTO asignacion_docentes(id_curso,id_usuario) VALUES('$_POST[curso]','$_POST[docente]')") or die ("Problemas en la consulta");
	
	echo"<script type=\"text/javascript\">alert('Los datos se insertaron correctamente'); window.location='asignardocente.php';</script>";
	}
	else{echo"<script type=\"text/javascript\">alert('Ya existe asignacion para este curso'); window.location='asignardocente.php';</script>"; 
	}
}
else{
	echo"<script type=\"text/javascript\">alert('Debe digitar los datos para ser insertados'); window.location='asignardocente.php';</script>";
}
?>