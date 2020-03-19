<?php 

include('../php/Conexion.php');
include('../../login/login.php');
require 'phpqrcode/qrlib.php';
  session_start();

if (isset($_POST['Modificar'])) {

  $Pedido_id = $_POST['Pedido_id'];
  $Documento  = $_POST['n_Documento'];

	$dir = "CodigosGenerados"."/".$Documento."/";
	
	if (!file_exists($dir)) {
		mkdir($dir);
	}

	$filename = $dir.$Pedido_id.'.png';
	      
	$tamanio = 15;
	$level = 'H';
	$frameSize = 1;
	$contenido = $Documento;

	QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

  $Estado = $_POST['Estado'];

    $query = "UPDATE pedido set CodigoQR = '$filename' where idPedido = $Pedido_id";

  $Actualizar = mysqli_query($conectar,$query);

  if ($Actualizar) {
    header("Location: index.php?status=1");
    }
  else
    {
      echo $query;
    }
  
  
}


 ?>