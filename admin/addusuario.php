<?php

require("../conex/conexion.php");

$nombre_usuario=$_POST['nombre_usuario'];	
$formulario=$_POST['formulario'];

 //verificamos si el user exite con un condicional
$q=mysqli_query($conexion,"SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario'");

 $contar = mysqli_num_rows($q);
 if($contar > 0){
//si el usuario existe entonces redirecciona a la pagina de registro, segun si se esta en el registro de administrador o el registro de estudiante
  if($formulario == 'admin'){
	
		echo"<script type=\"text/javascript\">alert('El nombre de usuario ya existe por favor ingrese un nombre valido'); window.location='frmaddusuario.php';</script>";
	}
	else if($formulario == 'estudiante'){
		echo"<script type=\"text/javascript\">alert('El nombre de usuario ya existe por favor ingrese un nombre valido'); window.location='registro.php';</script>";
	}
}

else{
	
if (isset($_POST['tipo_identificacion']) && !empty($_POST['tipo_identificacion']) && isset($_POST['numero_identificacion']) &&!empty($_POST['numero_identificacion'])&& isset($_POST['nombre_usuario']) &&!empty($_POST['nombre_usuario'])&& isset($_POST['password']) &&!empty($_POST['password'])&& isset($_POST['id_rol']) &&!empty($_POST['id_rol'])){


mysqli_query($conexion, "INSERT INTO usuarios(tipo_identificacion,numero_identificacion,nombre_usuario,password,id_rol) VALUES('$_POST[tipo_identificacion]','$_POST[numero_identificacion]','$_POST[nombre_usuario]','$_POST[password]','$_POST[id_rol]')") or die ("Problemas en la consulta");
	//echo "Los datos han sido insertados con exito";
	//echo"<script type=\"text/javascript\">alert('Los datos se guardaron correctamente'); window.location='login.html';</script>";
   
   if($formulario == 'admin'){
	
		echo"<script type=\"text/javascript\">alert('Los datos se guardaron correctamente'); window.location='frmaddusuario.php';</script>";
	}
	else if($formulario == 'estudiante'){
		echo"<script type=\"text/javascript\">alert('Los datos se guardaron correctamente'); window.location='login.html';</script>";
	}
		
}
else{
	//echo"<script type=\"text/javascript\">alert('Debe digitar los datos para ser insertados'); window.location='frmaddusuario.php';</script>";
  if($formulario == 'admin'){
		echo"<script type=\"text/javascript\">alert('Debe digitar los datos para ser insertados'); window.location='frmaddusuario.php';</script>";
	}
	else if($formulario == 'estudiante'){
		echo"<script type=\"text/javascript\">alert('Los datos se guardaron correctamente'); window.location='registro.php';</script>";
	}
	
	}
   
}
	
	
	
	


?>
