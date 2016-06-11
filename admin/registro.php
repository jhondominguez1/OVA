<?php 
require("../conex/conexion.php");

 
if(isset($_POST["register"])){
 
if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
 $full_name=$_POST['full_name'];
 $email=$_POST['email'];
 $username=$_POST['username'];
 $password=$_POST['password'];
 
 $query=mysql_query("SELECT * FROM usertbl WHERE username='".$username."'");
 $numrows=mysql_num_rows($query);
 
 if($numrows==0)
 {
 $sql="INSERT INTO usertbl
 (full_name, email, username,password)
 VALUES('$full_name','$email', '$username', '$password')";
 
$result=mysql_query($sql);
 
 if($result){
 $message = "Cuenta Correctamente Creada";
 } else {
 $message = "Error al ingresar datos de la informacion!";
 }
 
} else {
 $message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
 }
 
} else {
 $message = "Todos los campos no deben de estar vacios!";
}
}

if (!empty($message)) {
echo "<p class=\error\>" . "Mensaje: ". $message . "</p>";
} 
?>
 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registro</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><!-- texto del banner-->
		
			<div class="navbar-header">
				
				<a class="navbar-brand" href="registro.php"><span>Proyect</span>OVA</a>
			
			</div>		
	</nav>
	<br><br><br>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
			Registrarse
			</div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div class="form-group">
							
								<label for="user_login">Nombre Completo<br />
								<input type="text" name="full_name" id="full_name" class="input" size="32" value="" /></label>
								</p>
 
								<p>
								<label for="user_pass">E-mail<br />
								<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
								</p>
 
								<p>
								<label for="user_pass">Nombre De Usuario<br />
								<input type="text" name="username" id="username" class="input" value="" size="32" /></label>
								</p>
 
								<p>
								<label for="user_pass">Contraseña<br />
								<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
								</p>
 
								<p class="submit">
								<input type="submit" name="register" id="register" class="btn btn-primary" value="Registrar" />
								</p>
 
								<p class="regtext">¿Ya tienes una cuenta? <a href="login.html" >Entra Aquí.</a></p>
							</div>
						</fieldset>
					</form>
 
				</div>
			
		</div>
	</div>
</div>
</body>