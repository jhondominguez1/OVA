<?php
require("../conex/conexion.php");
if (isset($_POST['ntipo_identificacion']) && !empty($_POST['ntipo_identificacion'])
&& isset($_POST['nnumero_identificacion']) && !empty($_POST['nnumero_identificacion']) 
&& isset($_POST['nnombre_usuario']) &&!empty($_POST['nnombre_usuario'])
&& isset($_POST['nid_rol']) &&!empty($_POST['nid_rol'])){
	$registro=mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_usuario='$_POST[nid_usuario]'") or die ("Problema en la primera consulta");
if ($reg=mysqli_fetch_array($registro)){
	mysqli_query($conexion, "UPDATE usuarios set tipo_identificacion='$_POST[ntipo_identificacion]',numero_identificacion='$_POST[nnumero_identificacion]', nombre_usuario='$_POST[nnombre_usuario]',password='$_POST[npassword]', id_rol='$_POST[nid_rol]' WHERE id_usuario='$_POST[nid_usuario]'") or die ("Problemas en la segunda consulta");
	header("location:listarusuario.php");
}
}
else{
	echo"<script type=\"text/javascript\">alert('Debe digitar los datos para poder actualizar el registro'); window.location='listarusuario.php';</script>";
}

?>