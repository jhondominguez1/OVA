<?php

include ("conexion.php");
if (isset($_POST['tipo_identificacion']) && !empty($_POST['tipo_identificacion']) && isset($_POST['numero_identificacion']) &&!empty($_POST['numero_identificacion'])&& isset($_POST['nombre_usuario']) &&!empty($_POST['nombre_usuario'])&& isset($_POST['id_rol']) &&!empty($_POST['id_rol'])){
	mysqli_query($conexion, "INSERT INTO usuarios(tipo_identificacion,numero_identificacion,nombre_usuario,id_rol) VALUES('$_POST[tipo_identificacion]','$_POST[numero_identificacion]','$_POST[nombre_usuario]','$_POST[id_rol]')") or die ("Problemas en la consulta");
	//echo "Los datos han sido insertados con exito";
	echo"<script type=\"text/javascript\">alert('Los datos se insertaron correctamente'); window.location='frmaddusuario.php';</script>";
        
}
else{
	echo"<script type=\"text/javascript\">alert('Debe digitar los datos para ser insertados'); window.location='frmaddusuario.php';</script>";
}
?>
