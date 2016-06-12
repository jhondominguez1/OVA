<!--eliminando recursos-->

<?php 

require("../conex/conexion.php");

mysqli_query($conexion, "DELETE FROM recursos where nombre_recurso='$_GET[nombre_recurso]'") or die ("problemas en la conexion");
echo "<script>
				alert('Datos Eliminados con exito..');
	</script>";
echo "<script>
				window.location='./admin-recursos.php';
			</script>"	;
?>