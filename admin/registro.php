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
<!-- texto del banner-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<a class="navbar-brand" href="registro.php"><span>Proyect</span>OVA</a>
	</div>		
</nav>
<br><br><br>

<!-- formulario registro-->
<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
			Registrarse
			</div>
				<div class="panel-body">
				
					<form role="form" method="post" action="addusuario.php">
						<fieldset>
							<div class="form-group">
							
								<label for="user_login">Tipo Identificación<br />
								<input type="text" name="tipo_identificacion" id="tipo_identificacion" class="input" size="32" value="Codigo Estudiante" readonly/></label>
								</p>
 
								<p>
								<label for="user_pass">Número<br />
								<input type="text" name="numero_identificacion" id="numero_identificacion" class="input" value="" size="32" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" /></label>
								</p>
 
								<p>
								<label for="user_pass">Nombre De Usuario<br />
								<input type="text" name="nombre_usuario" id="nombre_usuario" class="input" value="" size="32" /></label>
								</p>
 
								<p>
								<label for="user_pass">Contraseña<br />
								<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
								</p>
								<!-- oculto por defecto el rol es de estudiante-->
								<p>
								<input type="text" name="id_rol" id="id_rol" class="input" value="3" size="32" hidden/></label>
								</p>
								<input type="text" name="formulario" id="formulario" class="input" value="estudiante" size="32" hidden/></label>
								
								
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