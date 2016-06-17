<!DOCTYPE html>
<?php
session_start();
$_POST['nombre_usuario']=$_SESSION['nombre_usuario'];

include("../conex/conexion.php");
$registro=mysqli_query($conexion,"SELECT id_usuario, tipo_identificacion, numero_identificacion, nombre_usuario, password
	FROM usuarios") or die ("Hay problemas en la consulta");

?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Estudiante</title>
	<link href="css/styles.css" rel="stylesheet">
</head>
<body>
	<style>
		table {
			margin-top: 10px;
			margin-right: 150px;
		    border-collapse: collapse;
		    width: 60%;
		    float: center;
		    
		}
		th {
		    background-color: #000000;
		    color: white;
		}
		th, td {
		    text-align: center;
		    padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}
	</style>




<table align="center">
	<tr>
		<th >Tipo Identificación</th>
		<th >Número de Identificación</th>
		<th >Nombre de usuario</th>
		<th >Password</th>
	</tr>

	<?php  while ($campo=mysqli_fetch_array($registro)) { if ($campo['nombre_usuario']==$_POST['nombre_usuario']) {

	echo "<tr>
	          <td>".$campo['tipo_identificacion']."</td>
	          <td>".$campo['numero_identificacion']."</td>
	          <td>".$campo['nombre_usuario']."</td>
	          <td>".$campo['password']."</td>
	      </tr>";


	 } }?>


	<tr>
		<td>

			<a href="frmestudiante.php?id_usuario=<?php echo $campo	['id_usuario'];?>" target="_blank   ">
				Editar Perfil
			</a>

		</td>
	</tr>

</table>







</body>
</html>