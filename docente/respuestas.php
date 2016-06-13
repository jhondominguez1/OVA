<?php 
	//incluyendo archivos necesarios...
	require('./conex/conexion.php');

 ?>
 
<div class="form-add-trec">
	<div class="titulo-add-recurso">Agregrar Respuetas</div>
	<form role="form" method="post" action="">
  <div class="form-group">
    <label for="nom-respuesta">Nombre de la respuesta</label>
    <input type="text" required class="form-control" id="" name="nombre_respuesta">
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
		$sql = "SELECT * FROM respuestas";
		$query = mysqli_query($conexion,$sql);
	 ?>
	<table class"table">
		<th colspan="3"> Respuestas </th>
		<tr>
			<td>Respuesta</td>
            <td colspan="2" width="30%";>Acciones</td>
		</tr>
		
		<!--Listando los tipos de recursos-->
		<?php while($fila=mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $fila['respuesta']; ?></td>
            <td align="center"><b class="icon-pencil"></b></td>
			<td><a href= "./docente/eliminar3.php?respuesta=<?php echo $fila['respuesta'];?>"<span class="icon-trash"></span></td>
		</tr>
		<?php } ?>
	</table>
</div>


 <?php
//agrendando respuestas----
	if (isset($_POST['btn-add-resp'])) {
		$nombre_resp = $_POST['nombre_respuesta'];
		$sql = "SELECT * FROM respuestas  WHERE respuesta = '$nombre_resp'";
		$query = mysqli_query($conexion,$sql);
		$numrwos=mysqli_num_rows($query);
		echo $sql;
		if ($numrwos>0) {
			echo "<script>
				alert('El nombre ya existe...');
				window.location='./?op=4';
			</script>"	;
		}else{
		
			$sql ="INSERT INTO respuestas VALUES(NULL,'$nombre_resp')";
			$query=mysqli_query($conexion,$sql);
                        //echo $sql;
			echo "<script>
				alert('Respuesta agregada con exito..');
				window.location='./?op=4';
			</script>"	;	
			}
	}
?>
   
    

