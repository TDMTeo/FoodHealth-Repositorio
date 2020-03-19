<?php 	 
include('../php/Conexion.php');
include('../../login/login.php');
  session_start();

if (isset($_POST['Modificar'])) {

	$idDomiciliario = $_POST['update_id'];

	$Documento = $_POST['n_Documento'];
	$Nombres = $_POST['nombres'];
	$Correo = $_POST['correo'];
	$Direccion = $_POST['Direccion'];
	$Telefono = $_POST['telefono'];

	$query = "UPDATE domiciliario set n_Documento = '$Documento', nombres = '$Nombres', correo ='$Correo', Direccion='$Direccion', telefono = $Telefono where idDomiciliario = $idDomiciliario";

	$Actualizar = mysqli_query($conectar,$query);

	if ($Actualizar) {
		header("Location: ../Domiciliarios.php?status=1");
		}
	else
		{
			echo $query;
		}
	
	
}



?>