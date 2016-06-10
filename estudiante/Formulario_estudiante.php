<html lang="es">
<?php session_start();
require('./conex/conexion.php');
?>
<head >
  <title>Login Estudiente</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<meta charset="UTF-8">


<link rel="stylesheet" href="Resources/css/bootstrap.min.css">

<script src="Resources/js/jquery-1.11.2.js"></script>
<script src="Resources/js/bootstrap.min.js"></script>
</head>
<body>


     <div class="panel-heading">
      <h1>Perfil Estudiante</h1>
    </div>

     <div >
      <?php 
      require('./requires/menu.php');
       ?>
       </div>
    
     <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Recursos</div>
                    <div class="panel-body">                                          
                        <form role="form" >
                                                
                            <button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-lock"></span> Entrar</button>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
