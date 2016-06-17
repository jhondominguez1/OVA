<?php session_start();
if (!isset($_SESSION['id_usuario'])) {
    
    header('location:login.php');
    }
if (isset($_GET['idl'])) {
    require('conexion.php'); 
    $l="SELECT cursos.id_curso,cursos.nombre_curso FROM cursos inner join leccion on leccion.id_curso=cursos.id_curso where leccion.id_leccion=".$_GET['idl'];
    $cl=mysqli_query($conexion,$l) or die("problemas en la 1 consulta".$l);
    $r="SELECT * FROM recursos inner join tipos_recursos on recursos.id_tipo_recurso=tipos_recursos.id_tipo_recurso inner join leccion on leccion.id_leccion=recursos.id_leccion where leccion.id_leccion=".$_GET['idl'];
    $cr=mysqli_query($conexion,$r) or die("problemas en la 1 consulta".$r);
    $r2="SELECT * FROM recursos inner join tipos_recursos on recursos.id_tipo_recurso=tipos_recursos.id_tipo_recurso inner join leccion on leccion.id_leccion=recursos.id_leccion where leccion.id_leccion=".$_GET['idl'];
    $cr2=mysqli_query($conexion,$r2) or die("problemas en la 1 consulta".$r2);

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
               <ul class="nav navbar-nav ">
                                   
                <?php
                         while ($lec=mysqli_fetch_array($cl)){
                           
                    ?>
                    <li>
                        <a href="curso_estudiante.php?idc=<?php echo $lec['id_curso'];?>" ><i class="fa fa-fw fa-dashboard"></i>Lecciones\Evaluaciones
                        </a>
                    </li>
                    <li>
                        <a href="curso_estudiante.php?idc=<?php echo $lec['id_curso'];?>" ><i class="fa fa-fw fa-dashboard"></i><?php echo $lec['id_curso'];?>
                        </a>
                    </li>
                    <?php
                    }

                    ?>
               </ul>
               <a class="navbar-brand" href="#"></a>
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
                    <li><a href="#">Recuros Disponibles</a></li>
                    
                    <li>
                        <ul>
                     <?php
                           while ($rec2=mysqli_fetch_array($cr2)){

                           ?>
                           <li>
                               <a href="#"><i class="fa fa-check-square-o"></i><?php echo " ".$rec2['nombre_recurso'];?></a>                        
                           </li>
                           <?php
                           }

                           ?>
                        </ul>
                    </li>
                    
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
                         while ($rec=mysqli_fetch_array($cr)){
                           
                    ?>
                    <li>
                        <h1></i><?php echo $rec['nombre_recurso'];?></h1>
                        
                        
                    </li>
                    <?php
                    }
}
                    ?>
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
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
