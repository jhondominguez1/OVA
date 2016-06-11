<?php
session_start();
?>
 
<?php require_once("conexion.php"); ?>

 
<?php
 
if(isset($_SESSION["session_user"])){
// echo "Session is set"; // for testing purposes
header("Location: intropage.php");
}
 
if(isset($_POST["login"])){
 
if(!empty($_POST['user']) && !empty($_POST['password'])) {
 $user=$_POST['user'];
 $password=$_POST['password'];
 
require_once 'conexion.php';
       $sql="SELECT * FROM logins WHERE login='".$user."' AND password='".$password."'";
       $query= mysqli_query($conexion,$sql);
       if (mysqli_num_rows($query)> 0) {
       while($row = mysqli_fetch_assoc($query)) 
       {
//$sql="SELECT * FROM usertbl WHERE user='".$user."' AND password='".$password."'" ;
//$query= mysqli_query($conDB,$sql);
//$numrows=mysqli_num_rows($query);

 $dbuser=$row['login'];
 $dbpassword=$row['password'];
 }
 
if($user == $dbuser && $password == $dbpassword)
 
{
 
 $_SESSION['session_user']=$user;
 
/* Redirect browser */
 header("Location: intropage.php");
 }
 } else {
 
$message = "Nombre de usuario ó contraseña invalida!";
 }
 
} else {
 $message = "Todos los campos son requeridos!";
}
}
?>
 
 <div class="container mlogin">
 <div id="login">
 <h1>Logueo</h1>
<form name="loginform" id="loginform" action="" method="POST">
 <p>
 <label for="user_login">Nombre De Usuario<br />
 <input type="text" name="user" id="user" class="input" value="" size="20" /></label>
 </p>
 <p>
 <label for="user_pass">Contraseña<br />
 <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
 </p>
 <p class="submit">
 <input type="submit" name="login" class="button" value="Entrar" />
 </p>
 <p class="regtext">No estas registrado? <a href="register.php" >Registrate Aquí</a>!</p>
</form>
 
</div>
 
</div>
 
 
 
 <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
