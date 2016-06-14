<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
         header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cursos Estudiantes</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <!--<link rel="stylesheet" href="jqm/jquery.mobile-1.3.2.css">-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">  
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link rel="stylesheet" type="text/css" href="fonts/style.css">


</head>
<body class="t1">

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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <a class="navbar-brand" href="../index.php">Ova Electiva II</a> 
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Seleccione Curso<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php 
         

                
                while ($cusu=mysqli_fetch_array($cursos)){
                   echo "<li><a href='curso-estudiante.php?id=".$cusu[3]."'>".$cusu[0]."</a></li>";
              
                  }

                   ?>
            
          </ul>
        </li>
      </ul>
 
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav">
        <li><a href="Formulario_estudiante.php">Editar Perfil</a></li>
        <li><a href="cerrar_sesion.php" >Cerrar Sesión</a></li>


      </ul>

    </div>
  </div>
</nav>

<?php
if (isset($_GET['id'])) {
  $c=$_GET['id'];
    echo "este es el curso actual".$c;
    $sql1="SELECT leccion.id_leccion,recursos.id_recurso,recursos.nombre_recurso,evaluacion.id_evaluacion, evaluacion.nombre_evaluacion from leccion
inner join recursos on leccion.id_leccion=recursos.id_leccion
inner join evaluacion on evaluacion.id_leccion=leccion.id_leccion where leccion.id_leccion=".$c;

//echo $sql1;

$resul=mysqli_query($conexion,$sql1) or die("problemas en la 1 consulta".$sqll);

?> 
<div data-role="row">
  <div class="col-md-4">
    <div data-rol="row">
         <div class="col-sm-2 sidenav">
         <div class="well">
            <?php 
         

                
                while ($leccion=mysqli_fetch_array($resul)){
                   echo "<li><button name='boton' id='".$leccion[1]."' type='button' class='btn btn-primary btn-lg'>".$leccion[2]."</a></li>";
              
                 }

                   ?>

      

      </div>
      <div class="well">
       <button name="boton" id="boton2" type="button" class="btn btn-primary btn-lg">Contenido</button>
      </div>
       <div class="well">
       <button name="boton" id="boton3" type="button" class="btn btn-primary btn-lg">Evaluaciones</button>
      </div>
       <div class="well">
       <button name="boton" id="boton4" type="button" class="btn btn-primary btn-lg">Notas</button>
      </div>
    </div>
  </div>
  <div class="col-md-8">
  </div>
</div>
  <?php
   
  # code...
}
?>
<table width="100%" height="500" border="0" class="t1">
  <tr>
    <td width="20%">
   
    </td>

    <td  width="80%" align="center">
     <div id="capa"><img src="imgs/bienvenidos.jpg" align="rigth"></div>
    <br>
    
    </td>
    
    
  </tr>

</table>




<footer class="footer text-center">
  <p class="pfooter">Universidad de Nariño <br>© All RIGHTS RESERVED<br>2016</p>
</footer>

</body>

</body>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/java.js"></script> 
</html>