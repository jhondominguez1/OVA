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


