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
   
    

