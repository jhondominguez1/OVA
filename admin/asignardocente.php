<html>
    
    <head> 
		
		
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title> Asignacion Docente</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


	<link href="css/thememenu.css" rel="stylesheet">
</head>
	<body>
		<table align="center">
		<tr>
        <td colspan="5" align="center" >Asignacion Docente</td>
		</tr>
		<tr>
		<td>Curso</td><td>Docente</td><td colspan=2>Acciones </td>
		</tr>
		<?php
		include ("../conex/conexion.php");
			$curso=mysqli_query($conexion,"SELECT id_curso, nombre_curso FROM cursos") or die ("Problema en la consulta select curso");
			$user=mysqli_query($conexion,"SELECT id_usuario, nombre_usuario id_rol FROM usuarios WHERE id_rol=2") or die ("Problema en la consulta select usuarios");
			$registros=mysqli_query($conexion, "SELECT asignacion_docentes.*, cursos.nombre_curso, cursos.descripcion_curso, usuarios.nombre_usuario FROM asignacion_docentes
			INNER JOIN cursos ON cursos.id_curso=asignacion_docentes.id_curso
			INNER JOIN usuarios ON usuarios.id_usuario=asignacion_docentes.id_usuario;")or die ("Problemas en la consulta");
			while ($reg=mysqli_fetch_array($registros)){
				echo "<tr><td>".$reg['nombre_curso']."</td><td>".$reg['nombre_usuario']."</td><td>
				<a href=./frmactualizar.php?id=".$reg['id_curso']."><span class='glyphicon glyphicon-edit'></span></a>
				<a href=./eliminarasignardocente.php?id=".$reg['id_curso']."><span class='glyphicon glyphicon-trash'></span></a>
				</td></tr>";
			}
	    ?>
		<form  action="addasignardocente.php" method="POST">
		<tr>
		<td><select name='curso'>
		<?php
		while($row=mysqli_fetch_row($curso))	{
		echo" <option value='$row[0]'>$row[1]</opcion>";
		}
		?>
		</td>
		<td><select name='docente'>
		<?php
		while($row=mysqli_fetch_row($user))	{
		echo" <option value='$row[0]'>$row[1]</opcion>";
		}
		?>
		</td>
		<td colspan=2><center><input type="submit"  value="Asignar Docente"></center></td>
		</tr>
		</form>
		</table>
	</body>

</html>