<?php
  session_start();
  if(!isset($_SESSION['Perfil'])) 
    {
         header('Location: ../../');  
    }
?>
<?php 

include('../php/Conexion.php');

require 'phpqrcode/qrlib.php';


if (isset($_POST['Modificar'])) {

  $Pedido_id = $_POST['Pedido_id'];
  $Valor = $_POST['Valor'];
  $Documento  = $_POST['n_Documento'];

	$dir = "CodigosGenerados"."/".$Documento."/";
	
	if (!file_exists($dir)) {
		mkdir($dir);
	}

	$filename = $dir.$Pedido_id.'.png';
	      
	$tamanio = 15;
	$level = 'H';
	$frameSize = 1;
  if ($Documento == $Valor ) {
      $contenido = $Documento;
  }
  else{
     $contenido = $Valor;
  }

	QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);



    $query = "UPDATE pedido set CodigoQR = '$filename' where idPedido = $Pedido_id";

  $Actualizar = mysqli_query($conectar,$query);

  if ($Actualizar) {
    //header("Location: index.php?status=1");
       echo '<body onload="document.formulario.submit()">
           <form action="index.php" method="post" name="formulario">
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