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


		
	<!--cargar formulario segun la opcion escogida-->
		<div class="row">
			<div class="col-lg-12">
				
					<div class="panel-heading">
					USUARIOS
					</div>
					
							<div class="login-panel panel panel-default">
							
								<div class="panel-body">
								<form role="form" method="post" action="addusuario.php">
									<fieldset>
										<div class="form-group">
											<label for="tipo_identificacion">Tipo identificación</label>
											<p>
											<select required class="form-control" id="tipo_identificacion" name="tipo_identificacion" style="width: 290px;">
												<option value="Cedula Ciudadania">Cedula de ciudadanía</option>
												<option value="Tarjeta Identidad">Tarjeta de Identidad</option>
												<option value="Codigo Estudiante">Codigo Estudiante</option>
											</select>
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
											<input type="password" name="password" id="password" class="input" value="" size="32" />
											</label>
											</p>
											<label for="user_pass">Rol</label>
											<p>
											<select required name="id_rol" id="id_rol" class="form-control" style="width: 290px;"/>
												<option value="1">Administrador</option>
												<option value="2">Docente</option>
												<option value="3">Estudiante</option>
											</select>
											</p>
							
											<input type="text" name="formulario" id="formulario" class="input" value="admin" size="32" hidden/></label>
											<p class="submit">
											<input type="submit" name="register" id="register" class="btn btn-primary" value="Registrar" />
											</p>
											<br><br><br><br><br><br>
										</div>
									</fieldset>
								</form>
								</div>			
							</div>
							</div>
						</div>
					</div>
                </div>


</html>