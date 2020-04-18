<?php 	 
include('../php/Conexion.php');

  session_start();

if (isset($_POST['Modificar'])) {
	$idDomiciliario = $_POST['update_id'];

	$TipoDocumento = $_POST['tipoDocumento'];
	$n_Documento = $_POST['documento'];
	$nombres = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$telefono = $_POST['telefono'];
	$Municipio = $_POST['tipoMunicipio'];
	$Direccion = $_POST['direccion'];
	$CodigoPostal = $_POST['codigoPostal'];
	$Descripcion = $_POST['descripcion'];


	$query = "UPDATE domiciliario set  idTipoDocumento = '$TipoDocumento', n_Documento = '$n_Documento', nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', idMunicipio = '$Municipio', direccion = '$Direccion', codigopostal = '$CodigoPostal',  aboutme = '$Descripcion' where idDomiciliario = $idDomiciliario";

	$Actualizar = mysqli_query($conectar,$query);

	if ($Actualizar) {
		 //header("Location: ../Domiciliarios.php?status=1");
		echo '<body onload="document.formulario.submit()">
           <form action="./" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="2">
           </body>
           </form> ';
		}
	else
		{
			echo $query;
		}
	

}



?>