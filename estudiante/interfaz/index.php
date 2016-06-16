<?php session_start();
if (!isset($_SESSION['id_usuario'])) {
    
    header('location:login.php');
    }
require('conexion.php');
if(isset($_SESSION['id_usuario'])){ 
    $id_usu=$_SESSION['id_usuario'];
    //echo "este es el id".$id_usu;
    $cscursos="SELECT cursos.nombre_curso, cursos.descripcion_curso,cursos.id_curso FROM cursos 
               inner join asignacion_estudiantes on cursos.id_curso=asignacion_estudiantes.id_curso 
               inner join usuarios on asignacion_estudiantes.id_usuario=usuarios.id_usuario 
               inner join roles on roles.id_rol=usuarios.id_rol  where usuarios.id_usuario=".$id_usu;
               //echo $cscursos;
    $cursos=mysqli_query($conexion,$cscursos) or die("problemas en la 1 consulta".$cscursos);
                        
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ProyectOva</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">  
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
      $(document).ready(function() {
        $("#boton1").click(function(event) {
          $("#capa").load('curso_estudiante.php');
        });
      });
      
    </script>
  
</head>
<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only"></span>                    
                </button>
                <a class="navbar-brand" href="index.php">ProyectOva</a>
            </div>
            <!-- Top Menu Items -->

            <ul class="nav navbar-right top-nav">     
             <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['nombre_usuario'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Ver Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Editar Pefil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        
            <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa fa fa-book fa-fw"></i> Mis Cursos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <?php
                                while ($cusu=mysqli_fetch_array($cursos)){
                                    echo "<li>
                                           <a target='formularios' href='curso_estudiante.php?idc=".$cusu[2]."'>".$cusu[0]."</a>
                                          </li>";              
                                }
                            }
                            ?>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a  href="curso_estudiante.php" target="formularios"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                   </ul>
            </div>
      </nav>
    </div>

<div class="mg principal"> <iframe class="sm" style="width: 90%; height: 80%" name="formularios" ></iframe></div>
        
         
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
