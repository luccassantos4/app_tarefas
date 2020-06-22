<?php

  session_start();
  $ID = $_SESSION['IDUSUARIO'];
  
  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
  header('Location: index.php?login=erro2');
}

?>