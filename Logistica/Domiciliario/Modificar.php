<?php 	 
include('../php/Conexion.php');

  session_start();

if (isset($_POST['Modificar'])) {
	$idDomiciliario = $_POST['update_id'];

	$TipoDocumento = $_POST['TDocumento'];
	$n_Documento = $_POST['Documento'];
	$nombres = $_POST['Nombre'];
	$apellidos = $_POST['Apellido'];
	$telefono = $_POST['Telefono'];
	$Municipio = $_POST['Municipio'];
	$Direccion = $_POST['Direccion'];
	$CodigoPostal = $_POST['CodigoPostal'];
	$Descripcion = $_POST['Descripcion'];


	$query = "UPDATE domiciliario set  idTipoDocumento = '$TipoDocumento', n_Documento = '$n_Documento', nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', idMunicipio = '$Municipio', direccion = '$Direccion', codigopostal = '$CodigoPostal',  aboutme = '$Descripcion' where idDomiciliario = $idDomiciliario";

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