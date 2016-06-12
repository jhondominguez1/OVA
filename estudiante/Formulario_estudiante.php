<!DOCTYPE html>
<?php 
     require('../conex/conexion.php'); 
    
?>
<html lang="es">
<head >
  <title>Login Estudiente</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<meta charset="UTF-8">


<link rel="stylesheet" href="../admin/css/bootstrap.min.css">

<script src="../admin/js/jquery-1.11.2.js"></script>
<script src="../admin//js/bootstrap.min.js"></script>
<script type="text/javascript">
  alert("Bienvedido al sistema de estudiante");
</script>
</head>
<body>


     <div class="panel-heading">
      <h1>Perfil Estudiante</h1>
    </div>

    
      <?php 
     require('../requires/menu.php'); 
    
      $cscursos="SELECT cursos.nombre_curso, cursos.descripcion_curso FROM cursos inner join asignacion_estudiantes on cursos.id_curso=asignacion_estudiantes.id_curso inner join usuarios on asignacion_estudiantes.id_usuario=usuarios.id_usuario inner join logins on logins.id_usuarios=usuarios.id_usuario inner join roles on roles.id_rol=usuarios.id_rol ";
       
    
        $cursos=mysqli_query($conexion,$cscursos) or die("problemas en la 1 consulta".$cscursos);
       ?>
       
    
    
     <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row>"
                     <div class="table-responsive">
                         <table  align="center"  class="table table-striped">
                            <tr>
                             <td colspan="9"><center><b>Cursos</b></center></td>
                            </tr>
                            <tr>
                             <td><b>Nombre del Curso</td>
                             <td><b>Descripcion </td> 
                            </tr>
                         <?php
                         while ($campos=mysqli_fetch_array($cursos))
                         {
                           ?>
                         <tr>
                           <td><?php echo $campos[0]?></td>
                           <td><?php echo $campos[1] ?></td> 
                         </tr>
                        <?php
                        }
                        ?>
                        </table>
                    </div>
                </div>            
           
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuario</div>
                    <div class="panel-body">        


                <form method="POST" action="actualizar-perfil-estudiante.php">                  
                <div align="center" class="form-add-trec">
                        <div class="form-group">
                            <div colspan=5 align="center" class="titulo-add-recurso">Actualizar Perfil</div>
                        </div>
                <!-- consulta -->
                <?php
                include ("conexion.php");
                $id_usuario=3;
                $registroest=mysqli_query($conexion,"SELECT id_usuario, tipo_identificacion, numero_identificacion, nombre_usuario FROM usuarios
                    WHERE id_usuario='$id_usuario'") or die("Problemas en la consulta");
                while ($row=mysqli_fetch_array($registroest)){
                ?>
                <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario'];?>"/>
                        
    <div class="panel panel-warning">
    <div class="panel-heading">Documento de Identificación</div>
      <div class="panel-body"><input type="text" name="tipo_identificacion" required class="form-control" value="<?php echo $row['tipo_identificacion'];?>"/></div>
    </div>
    <div class="panel panel-warning">
      <div class="panel-heading">Número de Identificación</div>
      <div class="panel-body"><input type="text" name="numero_identificacion" required class="form-control" value="<?php echo $row['numero_identificacion'];?>"/></div>
    </div>
    <div class="panel panel-warning">
      <div class="panel-heading">Nombres y Apellidos</div>
      <div class="panel-body"><input type="text" name="nombre_usuario" required class="form-control" value="<?php echo $row['nombre_usuario'];?>"/></div>
    </div>
    <div><input type="submit" value="Actualizar Datos" class="btn btn-warning"></div>

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
