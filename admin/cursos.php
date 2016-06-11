<?php  require('check_session.php'); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cursos</title>


   <!-- para conexion base datos-->

   <?php 

require("../conex/conexion.php");
   ?>
   

    <!-- fin para conexion base datos-->



  </head>
  <body>
   

       <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
           <ul class="nav sidebar-nav">
                
               
               <?php require('menu.php'); ?>

               
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1>Gestion de Cursos</h1>
                        




 <button type="button" class="btn btn-default" > <a href="nuevo_curso.php" > Nuevo curso </a> </button>

 <p>



 









<?php
$resultadocons= $db -> get_results(" SELECT  `titulo_art` , `fecha_art` FROM `articulos`");

//$db->debug();
$numerofilas= $db->num_rows;




if ($numerofilas>0){   ?> 









<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Panel heading</div>

  <!-- Table -->
  <table class="table">
    
  <tr>
      
      <th>T&iacute;tulo</th>
      <th>Fecha</th>
      <th>Acci&oacute;n</th>

  </tr>




<?php

foreach ($resultadocons as $resultadocons) {
    

    $titulo_art = $resultadocons->titulo_art;
    $fecha_art = $resultadocons->fecha_art;




echo "


  <tr>
      
      <td>$titulo_art  </td>
      <td>  $fecha_art  </td>
      <td>
          
<span class='glyphicon glyphicon-edit'></span>
<span class='glyphicon glyphicon-trash'></span>


      </td>

  </tr>


";


}












?>








  </table>
</div>

















<?php

 }else{   


echo "esta vacia la tabla";

}

?>













                       

























                               
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<script src="js/thememenu.js"></script>

  </body>
</html>