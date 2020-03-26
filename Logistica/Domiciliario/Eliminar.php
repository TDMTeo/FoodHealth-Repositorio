<?php 

include('../php/Conexion.php');

  session_start();

if (isset($_POST['Eliminar'])) {
	$idDomiciliario = $_POST['delete_id'];
	$Cambio = 0;
	$query = "UPDATE domiciliario set estado = '$Cambio'  where iddomiciliario = '$idDomiciliario'";
	$borrar = mysqli_query($conectar, $query);
	if ($borrar) {
		 // header("Location: ../Domiciliarios.php?status=3");
		 echo '<body onload="document.formulario.submit()">
           <form action="../Domiciliarios.php" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="3">
           </body>
           </form> ';
		}
	else
		{
			echo $query;
		}
}


?>