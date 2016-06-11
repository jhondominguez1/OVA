<meta charset=utf-8> 
<?php
require("../conex/conexion.php");
$id_usuario=$_GET['id'];
$registro=mysqli_query($conexion,"SELECT usuarios.*, roles.rol FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol WHERE id_usuario='$_GET[id]'") or die ("Problema en la consulta usuarios");

echo "<table align=center ><tr><td>Id Usuario</td><td >Identificacion</td><td>Nombre de Usuario</td><td>Rol</td></tr>";
	while ($reg=mysqli_fetch_array($registro)){
		echo "<tr><td>".$reg['id_usuario']."</td><td>".$reg['numero_identificacion']."</td><td>".$reg['nombre_usuario']."</td><td>".$reg['rol']."</td></tr>";
	}
	
echo "<form action='actualizar.php' method='POST'> 
<tr><td><input type='text' name='nid_usuario' value='$id_usuario' readonly='readonly' size=6></td>
<td><input type='text' name='nnumero_identificacion' size=9></td>
<td><input type='text' name='nnombre_usuario' ></td>
<td><select  name='nid_rol'>
        <option value='2'>Docente</option>
        <option value='3'>Estudiante</option>
        <option value='1'>Administrador</option>
        </select></td><tr>
	<tr><td colspan='4'><button type='submit' name='actualizar'>Actualizar</button></td></tr></form>";
?> 

