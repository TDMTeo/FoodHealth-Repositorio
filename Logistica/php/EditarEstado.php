
<?php    
include('../php/Conexion.php');
include('../../login/login.php');
  session_start();

if (isset($_POST['Modificar'])) {

  $estado_id = $_POST['Estado_id'];

  $Estado = $_POST['Estado'];

    $query = "UPDATE pedido set idEstado = '$Estado' where idPedido = $estado_id";

  $Actualizar = mysqli_query($conectar,$query);

  if ($Actualizar) {
    header("Location: ../Pedidos.php?status=1");
    }
  else
    {
      echo $query;
    }
  
  
}



?>
