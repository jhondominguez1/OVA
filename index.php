<!DOCTYPE html>
<?php 
	//incluyendo archivos necesarios...
	require('./admin/conexion.php');

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
<!--//////////////////////Aqui termina el menu..Y comienza el contenido-->

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					
					<?php 
						//incluya aqui su formulario----
					if (isset($_GET['op'])) {
							if ($op==0) require('./admin/admin-tipo-recurso.php');


					}else{
						require('./admin/admin-tipo-recurso.php');
					}
					

					 ?>

				</div>
			</div>	
		
	</div>
</body>
		<script type="text/javascript" src="./js/jquery.js"></script>
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>
		<script type="text/javascript" src="./js/java.js"></script>	
</html>