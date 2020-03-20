<?php
  session_start();
  if(!isset($_SESSION['Perfil'])) 
    {
        header('Location: ../login/');  
    }
?>

<?php

$Tiempo_aproximado = $_POST["Tiempo_Aproximado"];
$JefeLogistica = $_POST["JefeLogistica"];
$Domiciliario = $_POST["domiciliario"];
include_once "conexion.php";

$sentencia = $base_de_datos->prepare("INSERT INTO ruta(idJefeLogistica, iddomiciliario, Tiempo_Aproximado) VALUES (?, ?, ?);");
$sentencia->execute([$JefeLogistica, $Domiciliario, $Tiempo_aproximado]);

$sentencia = $base_de_datos->prepare("SELECT idRuta FROM ruta ORDER BY idRuta DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
//$idVenta = $resultado === false ? 1 : $resultado->idRuta;

$base_de_datos->beginTransaction();
//$sentencia = $base_de_datos->prepare("INSERT INTO pedidos(idIngrediente, idAlimento, cantidad) VALUES (?, ?, ?);");
$sentencia = $base_de_datos->prepare("UPDATE pedido SET idRuta = ? WHERE idPedido = ?;");
$sentencia1 = $base_de_datos->prepare("UPDATE pedido SET idEstado = 2   WHERE idPedido = ?;");
foreach ($_SESSION["carrito"] as $producto) {
  $sentencia->execute([$resultado->idRuta, $producto->idPedido]);
  $sentencia1->execute([$producto->idPedido]);
	//$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
}
//if ($sentencia) {
$base_de_datos->commit();

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./index.php?status=2");
//}
//else{
	
//}
?>