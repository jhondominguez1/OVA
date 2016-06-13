<!--eliminando lecciones-->

<?php 

require("../conex/conexion.php");

mysqli_query($conexion, "DELETE FROM tipos_recursos where nombre_tipo_recurso='$_GET[nombre_tipo_recurso]'") or die ("problemas en la conexion");
echo "<script>
				alert('Datos Eliminados con exito..');
	</script>";
echo "<script>
				window.location='./';
			</script>"	;
			echo "<META HTTP-EQUIV=Refresh CONTENT='2>";
?>