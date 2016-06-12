<html>
    <title> Listar Usuarios</title>
    <head> 
       <meta charset="UTF-8">

</head>
	<body>
		<table align="center">
		<tr>
        <td colspan="5" align="center" >Usuarios</td>
		</tr>
		<tr>
		<td>Tipo Identificacion </td><td>Numero de Identificacion </td><td> Nombre de usuario</td><td> Password </td><td>Rol </td><td>Eliminar </td><td>Actualizar </td>
		</tr>
		<?php
		include ("../conex/conexion.php");

			$registros=mysqli_query($conexion, "SELECT usuarios.*, roles.rol FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol")or die ("Problemas en la consulta");
			while ($reg=mysqli_fetch_array($registros)){
				echo "<tr><td>".$reg['tipo_identificacion']."</td><td>".$reg['numero_identificacion']."</td><td>".$reg['nombre_usuario']."</td><td>'".md5($reg['password'])."</td><td>".$reg['rol']."</td><td><a href=./eliminarusuario.php?id=".$reg['id_usuario'].">Eliminar</a></td><td><a href=./frmactualizar.php?id=".$reg['id_usuario'].">Actualizar</a></td></tr>";
			}
	    ?>
		</table>
	</body>

</html>
