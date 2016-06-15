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
        require('conexion.php');                                            
        if (isset($_GET['idcu'])) {
        $l1="SELECT leccion.id_leccion, leccion.nombre_leccion FROM cursos inner join asignacion_estudiantes on cursos.id_curso=asignacion_estudiantes.id_curso inner join usuarios on asignacion_estudiantes.id_usuario=usuarios.id_usuario inner join roles on roles.id_rol=usuarios.id_rol inner join leccion on leccion.id_curso=cursos.id_curso where cursos.id_curso=".$_GET['idcu']." and usuarios.id_usuario=".$_SESSION['id_usuario']."";
        $cl1=mysqli_query($conexion,$l1) or die("problemas en la 1 consulta".$l1);
        ?>
         <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
             <?php
            while ($lec=mysqli_fetch_array($cl1)){
                           
            ?>
            <li><a data-toggle="tab" href="#<?php echo $lec['id_leccion'];?>"><?php echo $lec['nombre_leccion'];?></a></li>
            <?php
            }
        
            ?>
          </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
              <h3>HOME</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <?php
            $l2="SELECT leccion.id_leccion, leccion.nombre_leccion FROM cursos inner join asignacion_estudiantes on cursos.id_curso=asignacion_estudiantes.id_curso inner join usuarios on asignacion_estudiantes.id_usuario=usuarios.id_usuario inner join roles on roles.id_rol=usuarios.id_rol inner join leccion on leccion.id_curso=cursos.id_curso where cursos.id_curso=".$_GET['idcu']." and usuarios.id_usuario=".$_SESSION['id_usuario']."";
        $c2=mysqli_query($conexion,$l1) or die("problemas en la 1 consulta".$l2);
         while ($lec2=mysqli_fetch_array($c2)){               
            ?>
             <div id="<?php echo $lec2['id_leccion'];?>" class="tab-pane ">
              <h3>locos</h3>
              <p>mostrar algo porfa</p>
            </div>
            <?php
            
        }
        }
            ?>
            
            

        
        

				
        </div><!--/.panel-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>



</body>

</html>
