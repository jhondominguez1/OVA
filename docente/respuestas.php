<?php 
	//incluyendo archivos necesarios...
	require('./conex/conexion.php');

 ?>
 
<div class="form-add-trec">
	<div class="titulo-add-recurso">Agregar Respuestas</div>
	<form role="form" method="post" action="">
  <div class="form-group">
    <label for="nom-respuesta">Respuesta 1</label>
    <input type="text" required class="form-control" id="" name="respuesta_1">
  </div>
            
  <div class="form-group">
    <label for="nom-respuesta">Respuesta 2</label>
    <input type="text" required class="form-control" id="" name="respuesta_2">
  </div>
  
    <div class="form-group">
    <label for="nom-respuesta">Respuesta 3</label>
    <input type="text" required class="form-control" id="" name="respuesta_3">
  </div>
           
            
    <div class="form-group">
    <label for="nom-respuesta">Respuesta 4</label>
    <input type="text" required class="form-control" id="" name="respuesta_4">
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
 <br/>
   <center><button type="submit" class="btn btn-success" name="btn-add-resp">Crear Respuesta</button> </center>
            </div>
            </div>
 <!--Listando las resuestas que ya estan agregadas-->
<div class="lis-ti-rec">
<?php 
		//realizando la consulta--
		$sql = "SELECT * FROM preguntas_respuestas join preguntas";
		$query = mysqli_query($conexion,$sql);
	 ?>
	<table class"table">
               <tr>
                <th> Pregunta </th>
		<th> Respuesta 1 </th>
                <th> Respuesta 2 </th>
                <th> Respuesta 3 </th>
                <th> Respuesta 4 </th>
            </tr>
            <tr>
                        <td>Pregunta</td>
			<td>Respuesta 1</td>
                        <td>Respuesta 2</td>
                        <td>Respuesta 3</td>
                        <td>Respuesta 4</td>
                        <td colspan="2" width="30%";>Acciones</td>
		</tr>
		
		<!--Listando los tipos de recursos-->
		<?php while($fila=mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $fila[6]; ?></td>
                        <td><?php echo $fila['resp1']; ?></td>
                        <td><?php echo $fila['resp2']; ?></td>
                        <td><?php echo $fila['resp3']; ?></td>
                        <td><?php echo $fila['resp4']; ?></td>
                        <td align="center"><b class="icon-pencil"></b></td>
			<td><a href= "./docente/eliminar3.php?respuesta=<?php echo $fila['respuesta'];?>"<span class="icon-trash"></span></td>
		</tr>
		<?php } ?>
	</table>
</div>
	</table>
</div>


  <?php
//agrendando respuestas----
	if (isset($_POST['btn-add-resp'])) {
		
                $resp1 = $_POST['respuesta_1'];
                $resp2 = $_POST['respuesta_2'];
                $resp3 = $_POST['respuesta_3'];
                $resp4 = $_POST['respuesta_4'];
                $id_pregunta = $_POST['id_pregunta'];
		
		
			$sql4 ="INSERT INTO preguntas_respuestas VALUES('$id_pregunta','$resp1','$resp2','$resp3','$resp4')";
			$query=mysqli_query($conexion,$sql4);
                        echo $sql;
			echo "<script>
				alert('Respuesta agregada con exito..');
				window.location='./?op=4';
			</script>"	;	
			}
	
?>
   
    

