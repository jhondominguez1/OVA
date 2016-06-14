<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Panels</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
<script>
function myFunction() {
    location.reload();
}
</script>

</body>
</html> 
<?php
include("conexion.php");
$id_usu=$_SESSION['id_usuario'];
            echo "este es el id".$id_usu;
            $cscursos="SELECT cursos.nombre_curso, cursos.descripcion_curso,cursos.id_curso, leccion.id_leccion FROM cursos 
                  inner join asignacion_estudiantes on cursos.id_curso=asignacion_estudiantes.id_curso 
                  inner join usuarios on asignacion_estudiantes.id_usuario=usuarios.id_usuario 
                  inner join roles on roles.id_rol=usuarios.id_rol inner join leccion on leccion.id_curso=cursos.id_curso where usuarios.id_usuario=".$id_usu;
                  echo $cscursos;
                   $cursos=mysqli_query($conexion,$cscursos) or die("problemas en la 1 consulta".$cscursos);
                    ?>
			
				<div class="panel panel-default">
					
						<ul class="nav nav-tabs">
                                                    <?php 
                                                            while ($cusu=mysqli_fetch_array($cursos)){
                                                                 echo "<li><a href='curso-estudiante.php?id=".$cusu[3]."'>".$cusu[0]."</a></li>";
              
                                                                }

                                                                 ?>
							<!--<li class="active"><a href="#tab1" onclick="myFunction()"  data-toggle="tab">Cursos</a></li>
							<li ><a href="#tab2" data-toggle="tab">Salir</a></li>
							
							
		
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1">
								<p><iframe id="bajo" name="bajo" src="curso-estudiante.php" frameborder=0 width=100% height=600px scrolling=yes> </iframe> </p>
							</div>
							<div class="tab-pane fade" id="tab2">
								<iframe id="principal" name="principal" src="cerrar.php" width=100% height=600px scrolling=no frameborder=0> </iframe>
							</div>-->
						</ul></div>
					</div>
				</div><!--/.panel-->
			</div><!--/.col-->
			
		</div><!-- /.row -->
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>



</body>

</html>

