<?php
session_start(); 

if(isset($_SESSION['id_tipo'])){
    //echo"ya casi";
      session_destroy();
      header('Location: http://localhost/OVA/estudiante/login.php');
  }  

  else {
      
  	 session_destroy();
      header('Location: http://localhost/OVA/estudiante/login.php');
  }

?>
