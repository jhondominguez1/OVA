
<?php 
	//incluyendo archivos necesarios...
	require('./conex/conexion.php');

 ?>
 
 <div class="form-add-trec">
 	<div class="titulo-add-recurso">Agregrar Pregunta</div>
	<form role="form" method="post" action="">
  <div class="form-group">
    <label for="nom-pregunta">Nombre de la pregunta</label>
    <input type="text" required class="form-control" id="" name="nombre_pregunta">
  </div>
            <div class="form-group">
                <br>
                <center><button type="submit" class="btn btn-success" name="btn-pregunta">Agregar Pregunta</button> </center>
             </div>
    </form>         
</div>

 <!--Listando las preguntas que ya estan agregadas-->
<div class="lis-ti-rec">
	<?php 
		//realizando la consulta--
		$sql = "SELECT * FROM preguntas";
		$query = mysqli_query($conexion,$sql);
	 ?>
	<table class"table">
		<th colspan="3"> Preguntas </th>
		<tr>
			<td>Pregunta</td>
            <td colspan="2" width="30%";>Acciones</td>
		</tr>
		

		<!--Listando los tipos de recursos-->
		<?php while($fila=mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $fila['pregunta']; ?></td>
            <td align="center"><b class="icon-pencil"></b></td>
			<td><a href= "./docente/eliminar4.php?pregunta=<?php echo $fila['pregunta'];?>"<span class="icon-trash"></span></td>
		</tr>
		<?php } ?>
	</table>
</div>

<?php
//agrendando un nueva lección----
	if (isset($_POST['btn-pregunta'])) {
		$nombre_pregunta = $_POST['nombre_pregunta'];
		            
	//valido que el nombre de la leccion no exista.. para ello debemos hacer la consulta a la base de datos-..
		$sql = "SELECT * FROM preguntas  WHERE pregunta = '$nombre_pregunta'";
		$query = mysqli_query($conexion,$sql);
		$numrwos=mysqli_num_rows($query);
		//echo $sql;
		if ($numrwos>0) {
			echo "<script>
				alert('El nombre ya existe...');
				window.location='./?op=5';
			</script>"	;
		}else{
			//si no existe hago el registro----
                        /*NOTA: Esta tabla requiere el id de curso por tanto se insertara 1 como id_curso, deberá ,modificarse cuando ya
                        esten los cursos*/
			$sql ="INSERT INTO preguntas VALUES(NULL,'$nombre_pregunta')";
			$query=mysqli_query($conexion,$sql);
                        //echo $sql;
			echo "<script>
				alert('Datos Agregados con exito..');
				window.location='./?op=5';
			</script>"	;	
			}
	}
?>

