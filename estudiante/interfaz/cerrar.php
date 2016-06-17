<?php
session_start(); 

if(isset($_SESSION['id_usuario'])){
    //echo"ya casi";
      session_destroy();
      header('Location:login.php');
  }  

  else {
      
  	 session_destroy();
      header('Location:login.php');
  }

?>
