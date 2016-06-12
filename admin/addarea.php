<?php
require("../conex/conexion.php");
if (isset($_POST['area']) && !empty($_POST['area']) 
	&& isset($_POST['descripcion']) &&!empty($_POST['descripcion'])){
	mysqli_query($conexion, "INSERT INTO areas_conocimiento(nombre_area_conocimiento,descripcion_area_conocimiento) VALUES('$_POST[area]','$_POST[descripcion]')") or die ("Problemas en la consulta");
	//echo "Los datos han sido insertados con exito";
	echo"<script type=\"text/javascript\">alert('Los datos se insertaron correctamente'); window.location='areasconocimiento.php';</script>";
        
}
else{
	echo"<script type=\"text/javascript\">alert('Debe digitar los datos para ser insertados'); window.location='areasconocimiento.php';</script>";
}
?>
