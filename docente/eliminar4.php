<!--eliminando lecciones-->

<?php 

require("../conex/conexion.php");

mysqli_query($conexion, "DELETE FROM preguntas where pregunta='$_GET[pregunta]'") or die ("problemas en la conexion");
echo "<script>
				alert('Datos Eliminados con exito..');
	</script>";
echo "<script>
				window.location='./';
			</script>"	;
			echo "<META HTTP-EQUIV=Refresh CONTENT='2>";
?>