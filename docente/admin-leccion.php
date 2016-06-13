<div class="form-add-trec">
	<div class="titulo-add-recurso">Agregrar Lección</div>
	<form role="form" method="post" action="">
  <div class="form-group">
    <label for="nom-recurso">Nombre de la lección</label>
    <input type="text" required class="form-control" id="" name="nombre_leccion">
  </div>
  <!--###Aqui se listan los cursos creados-->          
  <div class="form-group">
    <label for="nom-recurso">Asignar a curso</label>
   	<select class="form-control"  name="id_curso" id="id_curso">
			
						<?php
						$consulta_cursos="SELECT * FROM cursos";
						$query_cursos=mysqli_query($conexion,$consulta_cursos) or die ("PROBLEMAS DE CONSULTA");
						while ($fila=mysqli_fetch_array($query_cursos)) {
						?>
						<option value="<?php echo $fila[0] ?>"><?php echo "$fila[1]" ?></option> 
						<?php			
						}	
						?>
        </select>
  </div> 
  <!--##############################################################################-->
  <div class="form-group"> 
	<label for="">Descripción</label>
	<textarea class="form-control" required rows="4" name="descripcion_leccion"></textarea>
 </div>  
  <button type="submit" class="btn btn-success" name="btn-add-leccion">Enviar</button>
</form>
</div>
<!--Listando las lecciones que ya estan agregadas-->
<div class="lis-ti-rec">
	<?php 
		//realizando la consulta--
		$sql = "SELECT * FROM leccion inner join cursos on cursos.id_curso = leccion.id_curso";
		$query = mysqli_query($conexion,$sql);
	 ?>
	<table class"table">
		<th colspan="3"> Lecciones</th>
		<tr>
			<td>Nombre</td>
                        <td>Descripción</td>
                        <td>Curso asignado</td> 
			<td colspan="2" width="32%";>Acciones</td>
		</tr>
		<!--Código php para  listar las leccions-->
		<?php 
                $sql2 = "SELECT * FROM leccion";
		$query2 = mysqli_query($conexion,$sql2);
                while($fila=mysqli_fetch_array($query2)) { ?>
		<tr>
			<td><?php echo $fila[1]; ?></td>
                        <td><?php echo $fila[2]; ?></td>
                        <td><?php echo $fila[3]; ?></td>
			<td align="center"><b class="icon-pencil"></b></td>
			<td><a href= "./docente/eliminar1.php?nombre_leccion=<?php echo $fila['nombre_leccion'];?>"<span class="icon-trash"></span></td>
		</tr>
		<?php } ?>
	</table>
</div>


<?php 
	//agrendando un nueva lección----
	if (isset($_POST['btn-add-leccion'])) {
		$nombre_leccion = $_POST['nombre_leccion'];
		$descripcion_leccion = $_POST['descripcion_leccion'];
                $id_curso = $_POST['id_curso'];
	//valido que el nombre de la leccion no exista.. para ello debemos hacer la consulta a la base de datos-..
		$sql = "SELECT * FROM leccion  WHERE nombre_leccion = '$nombre_leccion'";
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
			$sql ="INSERT INTO leccion VALUES(NULL,'$nombre_leccion','$descripcion_leccion',$id_curso)";
			$query=mysqli_query($conexion,$sql);
                        //echo $sql;
			echo "<script>
				alert('Datos Agregados con exito..');
				window.location='./?op=1';
			</script>"	;	
			}
	}
 ?>
