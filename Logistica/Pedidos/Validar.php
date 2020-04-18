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

  if ($Actualizar) {
   // header("Location: ../Pedidos.php?status=1");
   echo '<body onload="document.formulario.submit()">
           <form action="Estado.php" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="1">
           </body>
           </form> ';
    }
  else
    {
      echo $query;
    }
  
  
}



?>
