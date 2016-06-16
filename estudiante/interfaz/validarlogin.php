<meta charset= "UTF-8">
<?php
include("conexion.php");

$usu=$_POST['nombre_usuario'];
$pss=$_POST['password'];

$i=mysqli_query($conexion,"SELECT id_usuario FROM usuarios WHERE nombre_usuario='$usu' AND password='$pss'") or die("error en la consulta");
$r= mysqli_fetch_row($i);
$c=$r[0];
//echo $c;<?php



if (isset($usu) && !empty($usu) && isset($pss) &&!empty($pss)){

$result=mysqli_query($conexion,"SELECT nombre_usuario, password, id_rol, id_usuario FROM usuarios WHERE nombre_usuario='$usu' AND password='$pss'") or die("error en la consulta");
if($row = mysqli_fetch_row($result))
	{
		if ($row[2]==1)
		{
			session_start();  
			//Almacenamos el nombre de usuario en una variable de sesión usuario
			$_SESSION['nombre_usuario'] = $usu;  
			//Redireccionamos a la pagina: index.php
			header("Location: index.html");
		}
		elseif($row[2]==2)
		{
			session_start();
			$_SESSION['nombre_usuario'] = $usu;  
			header("Location: ../index.php");
		}
			elseif($row[2]==3)
		{
			session_start();

			$_SESSION['id_usuario'] = $c;
			 $_SESSION['nombre_usuario'] = $usu;
			header("Location: index.php");
		
		}
	}
	
}

//echo $pss;

echo"<script type=\"text/javascript\">alert('El nombre de usuario o la contraseña son incorrectos!'); window.location='login.php';</script>";

?>