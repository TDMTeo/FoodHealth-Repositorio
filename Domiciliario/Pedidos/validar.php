<?php
  session_start();
  if(!isset($_SESSION['Perfil'])) 
    {
         header('Location: ../../');  
    }
?>
<?php    
include('../php/Conexion.php');

if (isset($_POST['Modificar'])) {

  $estado_id = $_POST['Estado_id'];
  $Estado = $_POST['Estado'];

   $query = "UPDATE pedido set idEstado = '$Estado' where idPedido = $estado_id";
  $Actualizar = mysqli_query($conectar,$query);

  $idUsuario = $_SESSION['idUsuario'];
  $de = $idUsuario;

      $consulta = mysqli_query($conectar,"SELECT idRuta from pedido where idPedido = '$estado_id'");
      $a = mysqli_fetch_array($consulta);
      $idRuta = $a["idRuta"];

      $consulta2 = mysqli_query($conectar,"SELECT * from Ruta where idRuta = '$idRuta'");
      $b = mysqli_fetch_array($consulta2);
      $idJefeLogistica = $b["idJefeLogistica"];

      $consulta3 = mysqli_query($conectar,"SELECT * from Jefe_Logistica where idjefe_logistica = '$idJefeLogistica'");
      $c = mysqli_fetch_array($consulta3);
      $idJefeLogistica = $c["idUsuario"];


  $para = $idJefeLogistica; 
  $asunto = "Cambio de estado en el pedido ";
  $mensaje = "Se ha cambiado el estado de un pedido a complicaciones";
  $fecha_envio = "2020-03-31";
  $hora_envio = "15:41:40" ;
  $leido = "no";
  $fecha_lectura = "2020-03-31" ;
  $hora_lectura = "15:41:40" ;

    $query2 = "INSERT INTO notificaciones(de,para,asunto,mensaje,fecha_envio,hora_envio,leido,fecha_lectura,hora_lectura) values ('$de','$para','$asunto','$mensaje','$fecha_envio','$hora_envio','$leido','$fecha_lectura','$hora_lectura');";

  $Actualizar = mysqli_query($conectar,$query);

  $Notificacion = mysqli_query($conectar,$query2);

  if ($Notificacion) {
   // header("Location: ../Pedidos.php?status=1");
   echo '<body onload="document.formulario.submit()">
          <form action="./" method="post" name="formulario">
         <input type="hidden" name="mensaje" value="1">
         </body>
         </form> ';
   // echo $query2;
    }
  else
    {
      echo $query2;
    }
  
  
}



?>
