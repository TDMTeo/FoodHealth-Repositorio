<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 4){
    session_destroy();
    header('location: ../../');
  }

?>
<?php

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

header("Location: ./");
?>