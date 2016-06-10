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

<?php
//agrendando un nueva lección----
	if (isset($_POST['btn-add-recurso'])) {
		$nombre_recurso = $_POST['nombre_recurso'];
		$id_tipo_recurso = $_POST['id_tipo_recurso'];
                $link_recurso= $_POST['link_recurso'];
                $id_leccion= $_POST['id_leccion'];               
	//valido que el nombre de la leccion no exista.. para ello debemos hacer la consulta a la base de datos-..
		$sql = "SELECT * FROM recursos  WHERE id_leccion = $id_leccion and id_tipo_recurso = $id_tipo_recurso";
		$query = mysqli_query($conexion,$sql);
		$numrwos=mysqli_num_rows($query);
		echo $sql;
		if ($numrwos>0) {
			echo "<script>
				alert('El nombre ya existe...');
				window.location='./?op=1';
			</script>"	;
		}else{
			//si no existe hago el registro----
                        /*NOTA: Esta tabla requiere el id de curso por tanto se insertara 1 como id_curso, deberá ,modificarse cuando ya
                        esten los cursos*/
			$sql ="INSERT INTO recursos VALUES(NULL,'$nombre_recurso','$id_tipo_recurso','$link_recurso','$id_leccion')";
			$query=mysqli_query($conexion,$sql);
                        //echo $sql;
			echo "<script>
				alert('Datos Agregados con exito..');
				window.location='./?op=1';
			</script>"	;	
			}
	}
?>

