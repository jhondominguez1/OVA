<?php  require('check_session.php'); ?>

<?php



 require("../conex/conexion.php");


$nom_curso = $_POST['nombre_curso'];
$desc_curso = $_POST['descripcion_curso'];
$area_conocimiento = $_POST['area_conocimiento'];


$db->query("INSERT INTO `cursos` (`id_curso`, `nombre_cursos`, `descripcion_curso`, `id_area_conocimiento`, `nombre_area-conocimiento`, `descripcion_area_conocimiento`) VALUES (NULL, '$nom_curso', '$desc_curso', '$$area_conocimiento');");


$db->debug();



$url="cursos.php";
echo "<script>window.location='$url';</script>";

?>
