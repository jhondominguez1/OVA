<!--eliminando lecciones-->

<?php 

require("../conex/conexion.php");

mysqli_query($conexion, "DELETE FROM leccion where nombre_leccion='$_GET[nombre_leccion]'") or die ("problemas en la conexion");
echo "<script>
				alert('Datos Eliminados con exito..');
	</script>";
echo "<script>
				window.location='./admin-leccion.php';
			</script>"	;
?>