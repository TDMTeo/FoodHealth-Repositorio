<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 4){
    session_destroy();
    header('location: ../../');
  }

?>
<?php


$total = $_POST["nombreAlimento"];
$tipo = $_POST["tipoAlimiento"];
include_once "conexion.php";



$sentencia = $base_de_datos->prepare("INSERT INTO alimentos(idTipoAlimento, nombreAlimento, estado) VALUES (?, ?, 1);");
$sentencia->execute([$tipo, $total]);

$sentencia = $base_de_datos->prepare("SELECT idAlimento FROM alimentos ORDER BY idAlimento DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->idAlimento;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO ingredientes_usados(idIngrediente, idAlimento, cantidad) VALUES (?, ?, ?);");
//$sentenciaExistencia = $base_de_datos->prepare("UPDATE productos SET existencia = existencia - ? WHERE id = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id, $idVenta, $producto->cantidad]);
	//$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./index.php?status=2");
?>