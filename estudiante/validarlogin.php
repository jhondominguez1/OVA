<meta charset= "UTF-8">
<?php
include("conexion.php");

if (isset($_POST['nombre_usuario']) && !empty($_POST['nombre_usuario']) && isset($_POST['password']) &&!empty($_POST['password'])){

$result=mysqli_query($conexion,"SELECT nombre_usuario, password, id_rol FROM usuarios WHERE nombre_usuario='$_POST[nombre_usuario]' AND password='$_POST[password]'") or die("error en la consulta");
if($row = mysqli_fetch_row($result))
	{
		if ($row[2]==1)
		{
			session_start();  
			//Almacenamos el nombre de usuario en una variable de sesión usuario
			$_SESSION['nombre_usuario'] = $nombre_usuario;  
			//Redireccionamos a la pagina: index.php
			header("Location: index.html");
		}
		elseif($row[2]==2)
		{
			session_start();
			$_SESSION['nombre_usuario'] = $nombre_usuario;  
			header("Location: ../index.php");
		}
			elseif($row[2]==3)
		{
			session_start();
			$_SESSION['nombre_usuario'] = $nombre_usuario;  
			header("Location: curso-estudiante.php");
		}
	}
	
}
echo"<script type=\"text/javascript\">alert('El nombre de usuario o la contraseña son incorrectos!'); window.location='login.php';</script>";

?>