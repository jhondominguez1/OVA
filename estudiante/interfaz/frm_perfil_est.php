<!-- se daño el anterior por eso cambie el formulari -->

<?php
session_start();
?>

<!DOCTYPE html>
<?php 
     require('conexion.php'); 
?>
<html lang="es">
<head >
  <title>Actualizar Información</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">  
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="../../admin/js/jquery-1.11.2.js"></script>
<script src="../../admin//js/bootstrap.min.js"></script>
</head>
<body >
  
      <?php 
    $cscursos="SELECT cursos.nombre_curso, cursos.descripcion_curso 
    FROM cursos 
    inner join asignacion_estudiantes on cursos.id_curso=asignacion_estudiantes.id_curso 
    inner join usuarios on asignacion_estudiantes.id_usuario=usuarios.id_usuario 
    inner join roles on roles.id_rol=usuarios.id_rol ";
    $cursos=mysqli_query($conexion,$cscursos) or die("problemas en la 1 consulta".$cscursos);
       ?>
       
<!-- ojala y porfin deje subir esto -->


     <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Perfil Estudiante</a>
            </div>
        </nav>
<br>

        <div class="row">
            <div class="col-md-4">
                <div class="row>"
                     <div class="table-responsive">

                </div>
            </div>            
           
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Usuario</b></div>
                    <div class="panel-body">        


                <form method="POST" action="actualizar-perfil-estudiante.php">                  
                <div align="center" class="form-add-trec">
                <!-- consulta -->
                <?php
                include ("conexion.php");
                $id_usu=$_SESSION['id_usuario'];
                $registroest=mysqli_query($conexion,"SELECT id_usuario, tipo_identificacion, numero_identificacion, nombre_usuario FROM usuarios
                    WHERE id_usuario='$id_usu'") or die("Problemas en la consulta");
                while ($row=mysqli_fetch_array($registroest)){
                ?>
                <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario'];?>"/>
                        
                <div class="panel panel-info">
                <div class="panel-heading">Documento de Identificación</div>
                  <div class="panel-body"><input type="text" name="tipo_identificacion" required class="form-control" value="<?php echo $row['tipo_identificacion'];?>"/></div>
                </div>
                <div class="panel panel-info">
                  <div class="panel-heading">Número de Identificación</div>
                  <div class="panel-body"><input type="text" name="numero_identificacion" required class="form-control" value="<?php echo $row['numero_identificacion'];?>"/></div>
                </div>
                <div class="panel panel-info">
                  <div class="panel-heading">Nombres y Apellidos</div>
                  <div class="panel-body"><input type="text" name="nombre_usuario" required class="form-control" value="<?php echo $row['nombre_usuario'];?>"/></div>
                </div>
                <div><input type="submit" value="Actualizar Datos" class="btn btn-primary"></div>

                <?php }?>
                </div>
                </form>

                    </div>
                </div>
            </div>
            
          </div>
        </div>


</body>
</html>
