<!--eliminando lecciones-->

<?php 

require("../conex/conexion.php");

mysqli_query($conexion, "DELETE FROM evaluacion where nombre_evaluacion='$_GET[nombre_evaluacion]'") or die ("problemas en la conexion");
echo "<script>
				alert('Datos Eliminados con exito..');
	</script>";
echo "<script>
				window.location='./';
			</script>"	;
			echo "<META HTTP-EQUIV=Refresh CONTENT='2>";
?>