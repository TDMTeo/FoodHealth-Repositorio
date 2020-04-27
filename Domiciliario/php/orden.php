<?php 
include("Conexion.php");
if (isset($_POST['Asignar'])) {

	$query = "select DISTINCT  ruta.Tiempo_Aproximado from cliente, pedido, estado, ruta, domiciliario where Cliente.idCliente = Pedido.idCliente and Pedido.idEstado = Estado.idEstado and pedido.idRuta = ruta.idRuta and Ruta.idDomiciliario = Domiciliario.iddomiciliario and domiciliario.iddomiciliario = '$idDomiciliario' and pedido.Tiempo_Estimado is null";
    $verificar = mysqli_query($conectar, $query);

    while ($tiempos = mysqli_fetch_array($verificar)) {
       $tiempo = $tiempos['Tiempo_Aproximado'];
    }

    $valorHoras = explode(":", $tiempo);

    $minutosTotales= ($valorHoras[0] * 60) + ($valorHoras[1]+ ($valorHoras[2] * ) );


     $idPedido = $_POST['idPedido'];
     $indexZ = $_POST['indexZ'];
     $tiempoEstimado = $_POST['tiempoEstimado'];
     $idDomiciliario = $_POST['idDomiciliario'];



    # $query = "update pedido set indexZ = '$indexZ', Tiempo_Estimado = '$tiempoEstimado' where idPedido = '$idPedido'";




     #$Asignar = mysqli_query($conectar, $query);
     /*if ($Asignar) {
     	   echo '<body onload="document.formulario.submit()">
           <form action="../" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="1">
           </body>
           </form> '; 
     }*/
}else{

}

 ?>