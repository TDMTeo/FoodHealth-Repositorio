<?php
  session_start();
  if(!isset($_SESSION['Perfil'])) 
    {
         header('Location: ../../');  
    }
?>
<?php
if (!isset($_POST["Pedido"])) {
    return;
}
$Pedido = $_POST["Pedido"];
include_once "conexion.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM pedido WHERE idPedido = ? LIMIT 1;");
$sentencia->execute([$Pedido]);
$pedidos = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$pedidos) {
    header("Location: ./addRuta.php?status=4");
    exit;
}
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->idPedido == $Pedido) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $pedidos->cantidad = 1;
    $pedidos->total = $pedidos->precioVenta;
    array_push($_SESSION["carrito"], $pedidos);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;

    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta;
}
header("Location: ./addRuta.php");
