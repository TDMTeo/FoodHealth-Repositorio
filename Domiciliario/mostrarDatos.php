<?php  

session_start();
include("php/Conexion.php");

     $idUsuario = $_SESSION['idUsuario'];

     $consulta = mysqli_query($conectar,'Select * From Usuarios,domiciliario where usuarios.idUsuario = domiciliario.idUsuario and  usuarios.idUsuario = '. $idUsuario);

     $informacion = mysqli_fetch_array($consulta);

     $nombre = $informacion["nombres"];

     $apellidos = $informacion["apellidos"];

     $nombreCompleto = $nombre. ' '. $apellidos;

     $foto = $informacion["foto"];
    
    $idDomiciliario = $informacion["iddomiciliario"];

    $query = "select pedido.indexZ,pedido.idPedido, concat(nombre,' ',apellido) as 'Nombre', FechaEntrega, pedido.DireccionPredeterminada, pedido.Tiempo_Estimado from cliente, pedido, estado, ruta, domiciliario where Cliente.idCliente = Pedido.idCliente and Pedido.idEstado = Estado.idEstado and pedido.idRuta = ruta.idRuta and Ruta.idDomiciliario = Domiciliario.iddomiciliario and domiciliario.iddomiciliario = '$idDomiciliario' order by pedido.indexZ";

     $consulta = mysqli_query($conectar,$query);


     echo "

		<table class='table'>
			<tr>
				<th>#</th>
				<th>Orden</th>
				<th>Direccion</th>
				<th>Tiempo Estimado</th>
			</tr>
     ";


     while ($ordenPedidos = mysqli_fetch_array($consulta)) {
     	echo "
		<tr>
			<td>".$ordenPedidos["idPedido"]."</td>
			<td id='ordenPedido' data-idorden='".$ordenPedidos["idPedido"]."' contenteditable>".$ordenPedidos["indexZ"]."</td>
			<td>".$ordenPedidos["DireccionPredeterminada"]."</td>
			<td id='tiempoEstimado' data-idtiempo='".$ordenPedidos["idPedido"]."' contenteditable>".$ordenPedidos["Tiempo_Estimado"]."</td>
		</tr>
     	";
     }


     echo "</table>";

?>