<!--eliminando lecciones-->

<?php 

require("../conex/conexion.php");

mysqli_query($conexion, "DELETE FROM respuestas where respuesta='$_GET[respuesta]'") or die ("problemas en la conexion");
echo "<script>
				alert('Datos Eliminados con exito..');
	</script>";
echo "<META HTTP-EQUIV=Refresh CONTENT='2>";