<?php
include ("../conex/conexion.php");
if (isset($_POST['nnumero_identificacion']) && !empty($_POST['nnumero_identificacion']) 
&& isset($_POST['nnombre_usuario']) &&!empty($_POST['nnombre_usuario'])
&& isset($_POST['nid_rol']) &&!empty($_POST['nid_rol'])){
	$registro=mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_usuario='$_POST[nid_usuario]'") or die ("Problema en la primera consulta");
if ($reg=mysqli_fetch_array($registro)){
	mysqli_query($conexion, "UPDATE usuarios set numero_identificacion='$_POST[nnumero_identificacion]', nombre_usuario='$_POST[nnombre_usuario]', id_rol='$_POST[nid_rol]' WHERE id_usuario='$_POST[nid_usuario]'") or die ("Problemas en la segunda consulta");
	
	header("location:listarusuarios.php");
}
}
else{
	echo"<script type=\"text/javascript\">alert('Debe digitar los datos para poder actualizar el registro'); window.location='listarusuarios.php';</script>";
}


?>