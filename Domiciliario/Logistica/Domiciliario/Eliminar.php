<?php 

include('../php/Conexion.php');
include('../../login/login.php');
  session_start();

if (isset($_POST['Eliminar'])) {
	$idDomiciliario = $_POST['delete_id'];
	$query = "DELETE FROM domiciliario where idDomiciliario = $idDomiciliario";
	$borrar = mysqli_query($conectar, $query);
	if ($borrar) {
		header("Location: ../Domiciliarios.php?status=3");
		}
	else
		{
			echo "Recibe bien gvon";
		}
}


?>