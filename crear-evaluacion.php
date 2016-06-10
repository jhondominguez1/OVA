<?php
	include("../conex/conexion.php");
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
  <div class="form-group">
	<label for="id_evaluacion">Seleccione una Evaluación</label>
		<select class="form-control"  name="id_evaluacion" id="id_evaluacion">
			<option value="">Ninguno</option>
						<?php
						$consulta_evaluacion="SELECT * FROM evaluacion";
						$consulta_evaluacion2=mysqli_query($conexion,$consulta_evaluacion) or die ("PROBLEMAS DE CONSULTA");
						while ($fila=mysqli_fetch_array($consulta_evaluacion2)) {
						?>
						<option value="<?php echo $fila[0] ?>"><?php echo "$fila3[1]" ?></option> 
						<?php			
						}	
						?>

		</select>
</div> 
 
   <div class="form-group">
	<label for="id_pregunta">Seleccione una Pregunta</label>
	<select class="form-control"  name="id_pregunta" id="id_pregunta">
		<option value="">Ninguno</option>
					<?php
					$consulta_pregunta="SELECT * FROM preguntas";
					$consulta_pregunta2=mysqli_query($conexion,$consulta_pregunta) or die ("PROBLEMAS DE CONSULTA");
					while ($fila=mysqli_fetch_array($consulta_pregunta2)) {
					?>
					<option value="<?php echo $fila[0] ?>"><?php echo "$fila3[1]" ?></option> 
					<?php			
					}	
					?>

	</select>
 </div>  
  
 
	<form role="form" method="post" action="">
  <div class="form-group">
    <label for="num_pregunta">Numero de Respuestas</label>
    <input type="text" required class="form-control" id="" name="num_pregunta">
  </div>
  
  
 
 <center><button type="submit" class="btn btn-success" name="btn-add-trec">Crear Preguntas</button> </center>
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
	<div class="col-md-6">
	<select class="form-control"  name="id_respuesta" id="id_respuesta">
		<option value="">Ninguno</option>
					<?php
					$consulta_evaluacion="SELECT * FROM evaluacion";
					$consulta_evaluacion2=mysqli_query($conexion,$consulta_evaluacion) or die ("PROBLEMAS DE CONSULTA");
					while ($fila=mysqli_fetch_array($consulta_evaluacion2)) {
					?>
					<option value="<?php echo $fila[0] ?>"><?php echo "$fila3[1]" ?></option>
					<?php			
					}					
					?>
	</select>
	</div>
	
	<div class="col-md-6">
	<input type="text" class="form-control" id="" name="value_pregunta">
	</div>
 </div> 
 <br>
 <br>
 <center><button type="submit" class="btn btn-success" name="btn-add-trec">Crear Evaluacion</button> </center>
</form>
</div>
</div>		
		
<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/java.js"></script>	
