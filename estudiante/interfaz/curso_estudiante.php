<?php session_start();
if (!isset($_SESSION['id_usuario'])) {
    
    header('location:login.php');
    }
if (isset($_GET['idc'])) {
    require('conexion.php'); 
    $l1="SELECT leccion.id_leccion, leccion.nombre_leccion, cursos.nombre_curso FROM cursos inner join asignacion_estudiantes on cursos.id_curso=asignacion_estudiantes.id_curso inner join usuarios on asignacion_estudiantes.id_usuario=usuarios.id_usuario inner join roles on roles.id_rol=usuarios.id_rol inner join leccion on leccion.id_curso=cursos.id_curso where cursos.id_curso=".$_GET['idc']." and usuarios.id_usuario=".$_SESSION['id_usuario']."";
    $cl1=mysqli_query($conexion,$l1) or die("problemas en la 1 consulta".$l1);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- php5 Shim and Respond.js IE8 support of php5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/php5shiv/3.7.0/php5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <!--Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
                
               <a class="navbar-brand" href="curso_estudiante.php">Bienvenido</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                 </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo " ".$_SESSION['nombre_usuario']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="formulario_estudiante.php"><i class="fa fa-fw fa-user"></i> Editar Perfil</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
               <ul class="nav navbar-nav side-nav">
                  
                            <?php
                             while ($lec=mysqli_fetch_array($cl1)){
                           
                            ?>
                     
                    <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#<?php echo $lec['id_leccion'];?>"><i class="fa fa fa fa-book fa-fw"></i> <?php echo " ".$lec['nombre_leccion'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="<?php echo $lec['id_leccion'];?>" class="collapse">
                                    <li>
                                <a href="recurso.php?idl=<?php echo $lec['id_leccion'];?>" ><i class="fa fa-edit"></i>Recursos </a>
                                
                                    </li>
                                    <li>
                                <a href="evaluaciones.php?idl=<?php echo $lec['id_leccion'];?>" ><i class="fa fa-edit"></i>Evaluaciones </a>
                                    </li>
                                </ul>
                    </li>           
              
                            <?php
                            }
}
                            ?>
                   </ul>               
                        
                        
                 

               
                
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php
                            $cv="SELECT cursos.nombre_curso, cursos.descripcion_curso, usuarios.nombre_usuario FROM cursos inner join asignacion_docentes on cursos.id_curso=asignacion_docentes.id_curso inner join usuarios on usuarios.id_usuario=asignacion_docentes.id_usuario where cursos.id_curso=".$_GET['idc'];
                            $cvc=mysqli_query($conexion,$cv) or die("problemas en la 1 consulta".$cv);
                            while ($l=mysqli_fetch_array($cvc)){
                                echo ' '.$l['nombre_curso']."</h1><br>";
                                echo ' '.$l['descripcion_curso']."<br><br>";
                                echo ' Docente: '.$l['nombre_usuario']."<br>";
                            
                            }
                            ?>
                        </h1>
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
