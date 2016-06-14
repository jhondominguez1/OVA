<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Listas</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">



<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

		<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th {
    background-color: #000000;
    color: white;
}
th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>

<div class="row">
	<div class="col-lg-12">
		<div class="panel-heading">
		Lista de Cursos
		</div>
		<div class="login-panel panel panel-default">
			<div class="panel-body">
				<div style="overflow-x:auto;">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<table>
						        <tr>
									<th data-field="curso" data-sortable="true" >Curso</th>
									<th data-field="descripcion" data-sortable="true">Descrición</th>
									<th data-field="area_conocimiento"  data-sortable="true">Area del Conocimiento</th>
									<th data-field="acciones" data-sortable="true" colspan=2>Acciones</th>
								</tr>
								<?php
								include ("../conex/conexion.php");
								$area=mysqli_query($conexion,"SELECT id_area_conocimiento, nombre_area_conocimiento FROM areas_conocimiento") or die ("Problema en la consulta select area");
								$registros=mysqli_query($conexion, "SELECT cursos.*, areas_conocimiento.nombre_area_conocimiento FROM cursos
								INNER JOIN areas_conocimiento ON cursos.id_area_conocimiento=areas_conocimiento.id_area_conocimiento;")or die ("Problemas en la consulta");
								while ($reg=mysqli_fetch_array($registros)){
								echo "<tr><td>".$reg['nombre_curso']."</td><td>".$reg['descripcion_curso']."</td><td>".$reg['nombre_area_conocimiento']."</td><td><a href=./eliminarcurso.php?id=".$reg['id_curso']."><span class='glyphicon glyphicon-trash'></span></a></td><td><a href=./frmactualizarcurso.php?id=".$reg['id_curso']."><span class='glyphicon glyphicon-edit'></span></a></td></tr>";
								}
								?>
								<form  action="addcurso.php" method="POST">
								<tr>
								<td><input type="text"  name="curso"></td>
								<td><input type="text"  name="descripcion"></td>
								<td><select name='area'>
								<?php
								while($row=mysqli_fetch_row($area))	{
								echo" <option value='$row[0]'>$row[1]</opcion>";
								}
								?>
								</td>
								<td colspan=2><center><input type="submit" class="btn btn-primary" value="Crear Curso"></center></td>
								</tr>
								</form>
							</table>
						</div>	
					</div>
				</div>	
			</div>	
		</div>	
	</div>	
</div>	
</body>

</html>