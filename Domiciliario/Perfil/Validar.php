<?php
  session_start();
  if(!isset($_SESSION['Perfil'])) 
    {
         header('Location: ../../');  
    }
?>
<?php 	 
include('../php/Conexion.php');
  session_start();

if (isset($_POST['Modificar'])) {
    $idUsuario =  $_SESSION['idUsuario'] ;
    $consulta = mysqli_query($conectar,"SELECT * from domiciliario where idUsuario = '$idUsuario'");
    $domiciliario = mysqli_fetch_array($consulta);
    $iddomiciliario = $domiciliario["iddomiciliario"];

	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$telefono = $_POST['telefono'];
	$documento = $_POST['n_Documento'];
	$TDocumento = $_POST['TDocumento'];
	$direccion = $_POST['direccion'];
	$Municipio = $_POST['Municipio'];
	$codigopostal = $_POST['codigopostal'];
	$descripcion = $_POST['descripcion'];

    $nombrefoto = $_FILES['Foto']['name'];
	$archivo = $_FILES['Foto']['tmp_name'];
	$ruta = "photos"."/".$documento;

	if (!file_exists($ruta)) {
		mkdir($ruta);
	}

	$ruta = $ruta."/".$nombrefoto;

	move_uploaded_file($archivo,$ruta);


	$query = "UPDATE domiciliario set  nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono',n_Documento = '$documento',  idTipoDocumento = '$TDocumento', direccion = '$direccion', idMunicipio = '$Municipio', codigopostal = '$codigopostal',  aboutme = '$descripcion', foto = '$ruta' where iddomiciliario = $iddomiciliario";

	$Actualizar = mysqli_query($conectar,$query);

	if ($Actualizar) {
	  //header("Location: ../Perfil.php?status=1");
		echo '<body onload="document.formulario.submit()">
           <form action="../Perfil.php" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="1">
           </body>
           </form> ';
		}
	else
		{
			 echo '<body onload="document.formulario.submit()">
           <form action="../Perfil.php" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="2">
           </body>
           </form> ';
		}
	

}



?>