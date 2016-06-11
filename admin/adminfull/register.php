<?php require_once("conexion.php"); ?>

 
 <?php
 
if(isset($_POST["register"])){
 
if(!empty($_POST['tipo_identificacion']) && !empty($_POST['numero_identificacion']) && !empty($_POST['nombre_usuario'])) {
 $tipo_identificacion=$_POST['tipo_identificacion'];
 $numero_identificacion=$_POST['numero_identificacion'];
 $nombre_usuario=$_POST['nombre_usuario'];

require_once 'conexion.php';
  
$sql="SELECT * FROM usuarios WHERE numero_identificacion='".$numero_identificacion."'";
$query= mysqli_query($conexion,$sql);
$numrows=mysqli_num_rows($query);

 if($numrows==0)
 {
 $sql="INSERT INTO usuarios(tipo_identificacion,numero_identificacion,nombre_usuario,id_rol) values('$_POST[tipo_identificacion]','$_POST[numero_identificacion]','$_POST[nombre_usuario]','3')";
 
$result=mysqli_query($conexion,$sql);
 
 if($result){
 $message = "Cuenta Correctamente Creada";
 }else{
	echo "<div class=holder-error>Error, al ingresar datos</div>";

}
 
}else{
	echo "<div class=holder-error>Error, el usuario ya existe intenta con otro</div>";

}
 
}else{
	echo "<div class=holder-error>Debes llenar todos los campos</div>";

}
}
?>
 
<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
 
<div class="container mregister">
 <div id="login">
 <h1>Registrar</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
 <p>
 <label for="user_login">Tipo de identificacion<br />
 <select class="form-control" id="sel1" name="tipo_identificacion">
    	<option value='cc' >Cedula de ciudadania</option>
    	<option value='ti' >Tarjeta de identidad</option>
    	<option value='ce' >Cedula de extranjeria</option>
  </select>
 </p>
 
 <p>
 <label for="user_pass">Numero_identificacion<br />
 <input type="text" name="numero_identificacion" id="numero_identificacion" class="input" value="" size="32" /></label>
 </p>
 
 <p>
 <label for="user_pass">Nombre De Usuario<br />
 <input type="text" name="nombre_usuario" id="nombre_usuario" class="input" value="" size="20" /></label>
 </p>
 
 
<p class="submit">
 <input type="submit" name="register" id="register" class="button" value="Registrar" />
 </p>
 
 <p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>
</form>
 
 </div>
 </div>
