<?php
require("../conex/conexion.php");
if (isset($_POST['curso']) && !empty($_POST['curso']) 
	&& isset($_POST['descripcion']) &&!empty($_POST['descripcion'])
	&& isset($_POST['area']) &&!empty($_POST['area'])){
	mysqli_query($conexion, "INSERT INTO cursos(nombre_curso,descripcion_curso, id_area_conocimiento) VALUES('$_POST[curso]','$_POST[descripcion]','$_POST[area]')") or die ("Problemas en la consulta");
	echo"<script type=\"text/javascript\">alert('Los datos se insertaron correctamente'); window.location='crearcurso.php';</script>";
        
}
else{
	echo"<script type=\"text/javascript\">alert('Debe digitar los datos para ser insertados'); window.location='crearcurso.php';</script>";
}
?>
