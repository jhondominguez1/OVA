<?php
include (conex.php);
?>
<div class="form-add-trec">
	<div class="titulo-add-recurso">Agregar Usuario</div>
	<form role="form" method="post" action="addusuario.php">
  <div class="form-group">
    <label for="tipo_identificacion">Tipo identificación</label>
    <select required class="form-control" id="tipo_id" name="tipo_identificacion">
        <option value="1">Cedula de ciudadanía</option>
        <option value="2">Targeta de Identidad</option>
        <option value="3">Cedula Extrangería</option>
        <option value="4">Pasaporte</option>
    </select>
  </div>
  <div class="form-group">
      <label for="numero_identificacion">Numero de identificación</label>
      <input type="text" class="form-control" name="numero_identificacion">
  </div> 
  <div class="form-group">
      <label for="nombre_usuario">Nombre usuario</label>
      <input type="text" class="form-control" name="nombre_usuario">
  </div>            
  <div class="form-group">
    <label for="id_rol">Rol</label>
    <select required class="form-control" id="id_rol" name="id_rol">
        <option value="1">Docente</option>
        <option value="2">Estudiante</option>
        <option value="3">Administrador</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success" name="btn-add_user">Agregar</button>
</form>
</div>


