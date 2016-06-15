<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>index</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><!-- texto del banner-->
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><span>Proyect</span>OVA</a>
		</div>		
	</nav>
		
		
		<!--titulo menu --->
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
                            <?php
                            
				echo 'Bienvenido estudiante <br>'.$_SESSION['nombre_usuario'];
                            ?>
			</div>
		</form>
		
		<!-- menu -->
		
		<ul class="nav menu">
			<li><a href="#" target="principal"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Mis cursos</a></li>
                        <?php
                        require('conexion.php');
                        if(isset($_SESSION['id_usuario'])){ 
                            $id_usu=$_SESSION['id_usuario'];
                            //echo "este es el id".$id_usu;
                                $cscursos="SELECT cursos.nombre_curso, cursos.descripcion_curso,cursos.id_curso, leccion.id_leccion FROM cursos 
                                 inner join asignacion_estudiantes on cursos.id_curso=asignacion_estudiantes.id_curso 
                                   inner join usuarios on asignacion_estudiantes.id_usuario=usuarios.id_usuario 
                                    inner join roles on roles.id_rol=usuarios.id_rol inner join leccion on leccion.id_curso=cursos.id_curso where usuarios.id_usuario=".$id_usu;
                                                 //echo $cscursos;
                                    $cursos=mysqli_query($conexion,$cscursos) or die("problemas en la 1 consulta".$cscursos);   
                                    while ($cusu=mysqli_fetch_array($cursos)){
                                                                 echo "<li><a href='curso-estudiante.php?id=".$cusu[3]."'>".$cusu[0]."</a></li>";
              
                                                                }
                        }
                        ?>
			<li><a href="#" target="principal"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>Editar Perfil</a></li>
			<li><a href="#" target="principal"> login</a></li><!--solo esta para probar el formulario login, esta opcion no existe en el menu administrador-->
			<li><a href="#"> opcion2</a></li>
			<li><a href="#"> opcion3</a></li>
			
			
			<li role="presentation" class="divider"></li>
			<li><a href="cerrar.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> salir</a></li>
		</ul>

	</div><!--imagen casa / inicio-->
		
	<div>
	<iframe id="principal" name="principal" src="#" width=100% height=600px scrolling=no frameborder=0> </iframe>
	
	</div>
                                        
                                						
		
                        

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
