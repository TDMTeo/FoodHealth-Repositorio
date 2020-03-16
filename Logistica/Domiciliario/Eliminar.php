<?php 

include('../php/Conexion.php');

  session_start();

if (isset($_POST['Eliminar'])) {
	$idDomiciliario = $_POST['delete_id'];
	$Cambio = 0;
	$query = "UPDATE domiciliario set estado = '$Cambio'  where iddomiciliario = '$idDomiciliario'";
	$borrar = mysqli_query($conectar, $query);
	if ($borrar) {
		header("Location: ../Domiciliarios.php?status=3");
		}
	else
		{
			echo $query;
		}
}


?>