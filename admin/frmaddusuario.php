<html>
    <title> Formulario Agregar Usuario</title>
    <head> 
       <meta charset="UTF-8">
<?php
include ("../conex/conexion.php");
?>
    </head>
    <body>
        <table align="center"><tr><td colspan="2" align="center" >
<div class="form-add-trec">
    <div class="titulo-add-recurso">Agregar Usuario</div></td>
	<tr><td><form role="form" method="post" action="addusuario.php">
  <div class="form-group">
      <div><label for="tipo_identificacion">Tipo identificación</label></td><td>
    <select required class="form-control" id="tipo_identificacion" name="tipo_identificacion">
        <option value="cedula">Cedula de ciudadanía</option>
        <option value="tarjeta">Targeta de Identidad</option>
        <option value="cedula ex">Cedula Extrangería</option>
        <option value="pasaporte">Pasaporte</option>
    </select></div>
  </div></td>
  <tr><td><div class="form-group">
      <label for="numero_identificacion">Numero de identificación</label></td>
      <td><input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
  </div> </td></tr>
 <tr><td> <div class="form-group">
      <label for="nombre_usuario">Nombre usuario</label></td>
      <td><input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario">
  </div>  </td></tr>          
  <tr><td><div class="form-group">
    <label for="id_rol">Rol</label></td>
    <td><select required class="form-control" id="id_rol" name="id_rol">
        <option value="2">Docente</option>
        <option value="3">Estudiante</option>
        <option value="1">Administrador</option>
        </select>
  </div></td></tr>
  <tr><td colspan="2"><button type="submit" class="btn btn-success" name="btn-add_user">Agregar</button></td></tr>
</form>
</div>
</table>
</body>

</html>