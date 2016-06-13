
<?php 
	//incluyendo archivos necesarios...
	require('./conex/conexion.php');

 ?>
 
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!--<link rel="stylesheet" href="jqm/jquery.mobile-1.3.2.css">-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../fonts/style.css">
</head>

<div class="form-add-trec">
  
  	<div class="titulo-add-recurso">Creando Evaluaciones</div>
<br>
<form role="form" method="post" action="">
  <div class="form-group">
	<label for="id_evaluacion">Seleccione una Evaluación</label>
		<select class="form-control"  name="id_evaluacion" id="id_evaluacion">
			
						<?php
						$consulta_evaluacion="SELECT * FROM evaluacion";
						$query=mysqli_query($conexion,$consulta_evaluacion) or die ("PROBLEMAS DE CONSULTA");
						while ($fila=mysqli_fetch_array($query)) {
						?>
						<option value="<?php echo $fila[0] ?>"><?php echo "$fila[1]" ?></option> 
						<?php			
						}	
						?>
		</select>
</div> 
<div class="form-group">
	<label for="id_pregunta">Seleccione una Pregunta</label>
	<select class="form-control"  name="id_pregunta" id="id_pregunta">
		
					<?php
					$consulta_pregunta="SELECT * FROM preguntas";
					$consulta_pregunta2=mysqli_query($conexion,$consulta_pregunta) or die ("PROBLEMAS DE CONSULTA");
					while ($fila=mysqli_fetch_array($consulta_pregunta2)) {
					?>
					<option value="<?php echo $fila[0] ?>"><?php echo "$fila[1]" ?></option> 
					<?php			
					}	
					?>

	</select>
 </div>  
  
 
	
  <div class="form-group">
    <label for="num_pregunta">Numero de Respuestas</label>
    <input type="text" required class="form-control" id="" name="num_pregunta">
</div> 
 <center><button type="submit" class="btn btn-success" name="btn-crea-preg">Crear Preguntas</button> </center>
</form>
</div>

<hr>
		
<div class="form-add-trec">
  
  	<div class="titulo-add-recurso"></div>
  <br>
  <div class="form-group">
	<label for="id_respuesta" class="valor">Seleccione una Respuesta</label>  <label for="value_pregunta">Asigne valor</label>

	<form role="form" method="post" action="">
	<div class="row">
	<input type="text" value="<?php echo $_POST['id_pregunta'] ?>" name="id_pregunta">
	<input type="text" value="<?php echo $_POST['id_evaluacion'] ?>" name="id_evaluacion">

	<?php 
	
		if (isset($_POST['btn-crea-preg'])) {
			
			$num_pregunta = $_POST['num_pregunta'];
			
		
		for ($i=0; $i < $num_pregunta ; $i++) { ?>
		<div class="col-md-6">
				<select class="form-control"  name="id_respuesta" id="id_respuesta">
				<?php
					$consulta_evaluacion="SELECT * FROM respuestas";
					$consulta_evaluacion2=mysqli_query($conexion,$consulta_evaluacion) or die ("PROBLEMAS DE CONSULTA");
					while ($fila=mysqli_fetch_array($consulta_evaluacion2)) {
					?>
					<option value="<?php echo $fila[0] ?>"><?php echo "$fila[1]" ?></option>
					<?php			
					}					
				?>
			</select>
		</div>
			<div class="col-md-6">
				<input type="text" class="form-control" id="" name="value_pregunta">
			</div>
	<?php } } ?>	
	
	
	
	
 </div> 
 <br>
 <br>
 <center><button type="submit" class="btn btn-success" name="btn-add-evaluacion">Crear Evaluacion</button> </center>
</form>
</div>
</div>		
		
		<?php 

		if (isset($_POST['btn-add-evaluacion'])) {
		
                    
	//valido que el nombre de la leccion no exista.. para ello debemos hacer la consulta a la base de datos-..
		//$sql = "SELECT * FROM evaluacion  WHERE nombre_evaluacion = '$nombre_evaluacion'";
		//$query = mysqli_query($conexion,$sql);
		//$numrwos=mysqli_num_rows($query);
		//echo $sql;
		/*if ($numrwos>0) {
			echo "<script>
				alert('El nombre ya existe...');
				window.location='./';
			</script>"	;
		}else{

		 }*/
			//si no existe hago el registro----
                        /*NOTA: Esta tabla requiere el id de curso por tanto se insertara 1 como id_curso, deberá ,modificarse cuando ya
                        esten los cursos*/
			$sql1 ="INSERT INTO evaluaciones_preguntas VALUES($_POST[id_evaluacion],$_POST[id_pregunta])";
			$query=mysqli_query($conexion,$sql1);
			echo "$sql1";
			foreach ($_POST as $key => $value) {
				//echo $key."<br>";
				//echo $value."<br>";

			$sql ="INSERT INTO preguntas_respuestas VALUES($_POST[id_pregunta],$value,$_POST[value_pregunta])";
			$query=mysqli_query($conexion,$sql);
			echo "$sql <br>";
			}

                        //echo $sql;
			echo "<script>
				alert('Datos Agregados con exito..');
				
			</script>"	;	
			
	}




		 ?>

