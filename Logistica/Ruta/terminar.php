<?php
  session_start();
  if(!isset($_SESSION['Perfil'])) 
    {
          header('Location: ../../');  
    }
?>

<?php

$Tiempo_aproximado = $_POST["Tiempo_Aproximado"];
$JefeLogistica = $_POST["JefeLogistica"];
$Domiciliario = $_POST["domiciliario"];
include_once "../php/Conexion.php";

$sentencia = $base_de_datos->prepare("INSERT INTO ruta(idJefeLogistica, iddomiciliario, Tiempo_Aproximado) VALUES (?, ?, ?);");
$sentencia->execute([$JefeLogistica, $Domiciliario, $Tiempo_aproximado]);

$sentencia = $base_de_datos->prepare("SELECT idRuta FROM ruta ORDER BY idRuta DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
//$idVenta = $resultado === false ? 1 : $resultado->idRuta;

$base_de_datos->beginTransaction();

$Cantidad = 0;
foreach ($_SESSION["carrito"] as $cantidad) {
  $Cantidad = $Cantidad  + 1;
}

//$sentencia = $base_de_datos->prepare("INSERT INTO pedidos(idIngrediente, idAlimento, cantidad) VALUES (?, ?, ?);");
$sentencia = $base_de_datos->prepare("UPDATE pedido SET idRuta = ? WHERE idPedido = ?;");
$sentencia1 = $base_de_datos->prepare("UPDATE pedido SET idEstado = 2   WHERE idPedido = ?;");
$Lleva = 0;
$Otro = 0;
 function numeroRandom($Cantidad,$Lleva,$Otro){  
  include ("conexion.php");
     $Random = mt_rand(1,$Cantidad);
     $Lleva = $Random;
     $Otro = $Random;
     if ($Random == $Lleva) {
        $Random = mt_rand(1,$Cantidad);
     }
     if ($Random == $Otro) {
        $Random = mt_rand(1,$Cantidad);
     }
      return $Random;
  }


$sentencia2 = $base_de_datos->prepare("UPDATE pedido SET indexZ = ? WHERE idPedido = ?;");

foreach ($_SESSION["carrito"] as $producto) {
  $sentencia->execute([$resultado->idRuta, $producto->idPedido]);
  $sentencia1->execute([$producto->idPedido]);
  $sentencia2->execute([numeroRandom($Cantidad,$Lleva,$Otro),$producto->idPedido]);
	//$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
}




//if ($sentencia) {
$base_de_datos->commit();

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

       echo '<body onload="document.formulario.submit()">
           <form action="./" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="1">
           </body>
           </form> ';
//}
//else{
	
//}
?>