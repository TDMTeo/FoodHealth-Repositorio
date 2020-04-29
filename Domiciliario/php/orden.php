<?php 
include("Conexion.php");
 
     $id = $_POST['id'];
     $texto = $_POST['texto'];
     $columna = $_POST['columna'];

    $query = "UPDATE pedido SET $columna = '$texto' WHERE idPedido = '$id'";

     $Asignar = mysqli_query($conectar, $query);
     if ($Asignar) {
     	   echo 'Se han actualizado los datos'; 
     }else{
        echo 'Error al actualizar los datos'. mysqli_error();
        exit();
     }

 ?>