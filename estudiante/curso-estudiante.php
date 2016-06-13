

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <!--<link rel="stylesheet" href="jqm/jquery.mobile-1.3.2.css">-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">  
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link rel="stylesheet" type="text/css" href="fonts/style.css">

  <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 
    <!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
    <script type="text/javascript">
      $(document).ready(function() {
        $("#boton1").click(function(event) {
          $("#capa").load('parte1curso.php');
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#boton2").click(function(event) {
          $("#capa").load('parte2curso.php');
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#boton3").click(function(event) {
          $("#capa").load('parte3curso.php');
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#boton4").click(function(event) {
          $("#capa").load('parte4curso.php');
        });
      });
    </script>
</head>
<body class="t1">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <a class="navbar-brand" href="../index.php">Ova Electiva II</a> 
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Seleccione Curso<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Biología</a></li>
            <li><a href="#">Matemáticas</a></li>
            <li><a href="#">Lenguaje</a></li>
          </ul>
        </li>
      </ul>
 
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav">
        <li><a href="Formulario_estudiante.php">Editar Perfil</a></li>
        <li><a href="">Cerrar Sesión</a></li>
      </ul>

    </div>
  </div>
</nav>


<table width="100%" height="500" border="0" class="t1">
  <tr>
    <td width="20%">
    <div class="col-sm-2 sidenav">
      <div class="well">
       <button name="boton" id="boton1" type="button" class="btn btn-primary btn-lg">Comenzar Curso</button>
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
    </td>

    <td  width="80%">
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