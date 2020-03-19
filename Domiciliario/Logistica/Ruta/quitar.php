<?php
  session_start();
  if(!isset($_SESSION['Perfil'])) 
    {
        header('Location: ../login/');  
    }
?>
<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

array_splice($_SESSION["carrito"], $indice, 1);
header("Location: ./addRuta.php?status=3");
?>