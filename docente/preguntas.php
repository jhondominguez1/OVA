
<?php 
	//incluyendo archivos necesarios...
	require('./conex/conexion.php');

 ?>
 
 <div class="form-add-trec">
 	Evaluación <?php
 	$sql = "SELECT fk_id_evaluacion FROM preguntas  WHERE nombre_pregunta = $nombre_pregunta";
 	$?>
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

<?php
//agrendando un nueva lección----
	if (isset($_POST['btn-add-pregunta'])) {
		$nombre_recurso = $_POST['nombre_pregunta'];
		            
	//valido que el nombre de la leccion no exista.. para ello debemos hacer la consulta a la base de datos-..
		$sql = "SELECT * FROM preguntas  WHERE nombre_pregunta = $nombre_pregunta";
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
			$sql ="INSERT INTO preguntas VALUES(NULL,'$nombre_pregunta')";
			$query=mysqli_query($conexion,$sql);
                        //echo $sql;
			echo "<script>
				alert('Datos Agregados con exito..');
				window.location='./?op=1';
			</script>"	;	
			}
	}
?>

