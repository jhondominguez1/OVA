<!DOCTYPE html>
<?php 
        //Este es el index del docente cuando ingresa su user y pass....
	//incluyendo archivos necesarios...
	require('./conex/conexion.php');

 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!--<link rel="stylesheet" href="jqm/jquery.mobile-1.3.2.css">-->
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<link rel="stylesheet" type="text/css" href="./fonts/style.css">
</head>
<body>
	<div id="contenedor">
		<header>
			<?php require('./requires/menu.php'); ?>
		</header>
<!--////////////
//////////Aqui termina el menu..Y comienza el contenido-->
        <center><img src="logo.png" width="1024px" height="720px"></center>


		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					
					<div  class="modal fade" id="login" tabindex="-1" role="dialog">
                                            <div class="modal-dialog">   
                                               <div class="modal-content"> 
                                                  <div class="modal-header">
                                                     <h3>Ingresar</h3>
                                                  </div>
                                                  <div class="modal-body">
                                                     <form role="form" action="verificar_login.php" method="POST">
                                                       <div class="form-group">
                                                         <label for="usuario">Usuario</label>
                                                         <input type="text" class="form-control" name="usuario"
                                                                placeholder="Usuario">
                                                       </div>
                                                       <div class="form-group">
                                                         <label for="password">Contraseña</label>
                                                         <input type="password" class="form-control" name="password" 
                                                                placeholder="Contraseña">
                                                       </div>

                                                       <input type="submit" class="btn btn-default" value="Ingresar">
                                                     </form>               
                                                 </div>
                                                 <div class="modal-footer">

                                                 </div>

                                             </div>
                                            </div>
                                         </div>
				</div>
			</div>	
		
	</div>
</body>
		<script type="text/javascript" src="./js/jquery.js"></script>
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>
		<script type="text/javascript" src="./js/java.js"></script>	
</html>