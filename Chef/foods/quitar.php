<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 4){
    session_destroy();
    header('location: ../../');
  }

?>

<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

array_splice($_SESSION["carrito"], $indice, 1);
header("Location: ./addFood.php?status=3");
?>