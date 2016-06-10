<?php
	include("conexion.php");

?>
<div class="form-add-trec">
	<div class="titulo-add-recurso">Crear Evaluación</div>
	<form role="form" method="post" action="">
  <div class="form-group">
    <label for="nom-recurso">Título</label>
    <input type="text" required class="form-control" id="" name="nombre_evaluacion">
  </div>
  <div class="form-group">
	<label for="">Lección</label>
	<select class="form-control"  name="id_leccion">
		<option value="">Ninguno</option>
					<?php
					$consulta_leccion="SELECT * FROM leccion";
					$consulta_leccion2=mysqli_query($conexion,$consulta_leccion) or die ("PROBLEMAS DE CONSULTA");
					while ($fila=mysqli_fetch_array($consulta_leccion2)) {
					?>

					<option value="<?php echo $fila[0] ?>"><?php echo "$fila3[1]" ?></option> 
					<?php			
					}	
					?>

	</select>
 </div>  
  <button type="submit" class="btn btn-success" name="btn-add-trec">Crear</button>
</form>
</div>
<?php
//agrendando un nueva lección----
	if (isset($_POST['btn-add-recurso'])) {
		$nombre_evaluacion = $_POST['nombre_evaluacion'];
		$id_leccion = $_POST['id_leccion'];
                    
	//valido que el nombre de la leccion no exista.. para ello debemos hacer la consulta a la base de datos-..
		$sql = "SELECT * FROM evaluacion  WHERE id_leccion = $id_leccion";
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
			$sql ="INSERT INTO evaluacion VALUES(NULL,'$nombre_evaluacion','$id_leccion')";
			$query=mysqli_query($conexion,$sql);
                        //echo $sql;
			echo "<script>
				alert('Datos Agregados con exito..');
				window.location='./?op=1';
			</script>"	;	
			}
	}
?>

