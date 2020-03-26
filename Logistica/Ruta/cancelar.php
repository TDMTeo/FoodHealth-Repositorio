<?php
  session_start();
  if(!isset($_SESSION['Perfil'])) 
    {
          header('Location: ../../');  
    }
?>
<?php

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

header("Location: ./");
?>