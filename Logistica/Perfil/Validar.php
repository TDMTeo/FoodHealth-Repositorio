<?php 	 
include('../php/Conexion.php');
  session_start();

if (isset($_POST['Modificar'])) {
    $idUsuario =  $_SESSION['idUsuario'] ;
    $consulta = mysqli_query($conectar,"SELECT * from jefe_logistica where idUsuario = '$idUsuario'");
    $jefe_logistica = mysqli_fetch_array($consulta);
    $idjefe_logistica = $jefe_logistica["idjefe_logistica"];

	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$telefono = $_POST['telefono'];
	$TDocumento = $_POST['TDocumento'];
	$direccion = $_POST['direccion'];
	$Municipio = $_POST['Municipio'];
	$codigopostal = $_POST['codigopostal'];
	$descripcion = $_POST['descripcion'];


	$query = "UPDATE jefe_logistica set  nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', idTipoDocumento = '$TDocumento', direccion = '$direccion', idMunicipio = '$Municipio', codigopostal = '$codigopostal',  aboutme = '$descripcion' where idjefe_logistica = $idjefe_logistica";

	$Actualizar = mysqli_query($conectar,$query);

	if ($Actualizar) {
		header("Location: ../Perfil.php?status=1");
		}
	else
		{
			echo $query;
		}
	

}



?>