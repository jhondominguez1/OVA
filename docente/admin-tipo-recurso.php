<div class="form-add-trec">
	<div class="titulo-add-recurso">Agregrar Tipo de Recurso</div>
	<form role="form" method="post" action="">
  <div class="form-group">
    <label for="nom-recurso">Nombre del recurso</label>
    <input type="text" required class="form-control" id="" name="nombre_tipo_recurso">
  </div>
  <div class="form-group">
	<label for="">Descripción</label>
	<textarea class="form-control" required rows="4" name="descripcion_tipo_recurso"></textarea>
 </div>  
  <button type="submit" class="btn btn-success" name="btn-add-trec">Enviar</button>
</form>
</div>
<!--Listando los recursos que ya estan agregados-->
<div class="lis-ti-rec">
	<?php 
		//realizando la consulta--
		$sql = "SELECT * FROM tipos_recursos";
		$query = mysqli_query($conexion,$sql);
	 ?>
	<table class"table">
		<th colspan="3"> Tipos de Recursos</th>
		<tr>
			<td>Nombre</td>
                        <td>Descripción</td>
			<td colspan="2" width="30%";>Acciones</td>
		</tr>
		<!--Listando los tipos de recursos-->
		<?php while($fila=mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $fila['nombre_tipo_recurso']; ?></td>
                        <td><?php echo $fila['descripcion_tipo_recurso']; ?></td>
			<td align="center"><b class="icon-pencil"></b></td>
			<td><a href= "./docente/eliminar2.php?nombre_tipo_recurso=<?php echo $fila['nombre_tipo_recurso'];?>"<span class="icon-trash"></span></td>
		</tr>
		<?php } ?>
	</table>
</div>


<?php 
	//agrendando un tipo de recurso----
	if (isset($_POST['btn-add-trec'])) {
		$nombre_tipo_recurso = $_POST['nombre_tipo_recurso'];
		$descripcion_tipo_recurso = $_POST['descripcion_tipo_recurso'];
	//valido que el nombre de tipo recurso no exista.. para ello debemos hacer la consulta a la base de datos-..
		$sql = "SELECT * FROM tipos_recursos WHERE nombre_tipo_recurso = '$nombre_tipo_recurso'";
		$query = mysqli_query($conexion,$sql);
		$numrwos=mysqli_num_rows($query);
		
		if ($numrwos>0) {
			echo "<script>
				alert('El nombre ya existe...');
				window.location='./';
			</script>"	;
		}else{
			//si no existe hago el registro----
			$sql ="INSERT INTO tipos_recursos VALUES(NULL,
				'$nombre_tipo_recurso',
				'$descripcion_tipo_recurso')";
			$query=mysqli_query($conexion,$sql);
			echo "<script>
				alert('Datos Agregados con exito..');
				window.location='./';
			</script>"	;	
			}
	}
 ?>