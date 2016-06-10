<div class="form-add-trec">
	<div class="titulo-add-recurso">Agregrar Recursos</div>
	<form role="form" method="post" action="">
            
    <div class="form-group">
    <label for="nom-recurso">Nombre del Recurso</label>
    <input type="text" required class="form-control" id="" name="nombre_recurso">
  </div>
            
  <div class="form-group">
    <label for="nom-recurso">Tipo de Recurso</label>
    <?php 
	//realizando la consulta--
		$sql_c = "SELECT * FROM tipos_recursos";
		$query_c = mysqli_query($conexion,$sql_c);
     ?>
    <select class="form-control" name="id_tipo_recurso">
       <?php while($fila_c=mysqli_fetch_array($query_c)) {  ?>
        <option value="<?php echo $fila_c['id_tipo_recurso'] ?>"><?php echo $fila_c['nombre_tipo_recurso'] ?></option>
       <?php } ?>
    </select>
  </div>
   
   <div class="form-group">
    <label for="nom-recurso">Link del Recurso</label>
    <input type="text" required class="form-control" id="" name="link_recurso">
  </div>         
  <!--###Aqui se listan las lecciones creadas-->          
  <div class="form-group">
    <label for="nom-recurso">Lección</label>
    <?php 
	//realizando la consulta--
		$sql_c = "SELECT * FROM leccion";
		$query_c = mysqli_query($conexion,$sql_c);
     ?>
    <select class="form-control" name="id_leccion">
       <?php while($fila_c=mysqli_fetch_array($query_c)) {  ?>
        <option value="<?php echo $fila_c['id_leccion'] ?>"><?php echo $fila_c['nombre_leccion'] ?></option>
       <?php } ?>
    </select>
  </div> 
 
  <button type="submit" class="btn btn-success" name="btn-add-recurso">Enviar</button>
</form>
</div>
<!--Listando las lecciones que ya estan agregadas-->
<div class="lis-ti-rec">
	<?php 
		//realizando la consulta--
		$sql = "SELECT * FROM recursos natural join tipos_recursos natural join leccion";
		$query = mysqli_query($conexion,$sql);
                //echo $sql;
	 ?>
	<table class"table">
		<th colspan="3">Recursos</th>
		<tr>
			<td>Nombre</td>
                        <td>Tipo</td>
                        <td>Acceso</td> 
                        <td>Lección</td> 
                        <td colspan="2" width="32%";>Acciones</td>
		</tr>
		<!--Código php para  listar las leccions-->
		<?php while($fila=mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $fila['nombre_recurso']; ?></td>
                        <td><?php echo $fila['nombre_tipo_recurso']; ?></td>
                        <td><?php echo $fila['link_recurso']; ?></td>
                        <td><?php echo $fila['nombre_leccion']; ?></td>
			<td align="center"><b class="icon-pencil"></b></td>
			<td><span class="icon-trash"></span></td>
		</tr>
		<?php } ?>
	</table>
</div>


