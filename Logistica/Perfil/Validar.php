<?php
  session_start();
  if(!isset($_SESSION['Perfil'])) 
    {
         header('Location: ../../');  
    }
?>
<?php 	 
include('../php/Conexion.php');


if (isset($_POST['Modificar'])) {
    $idUsuario =  $_SESSION['idUsuario'] ;
    $consulta = mysqli_query($conectar,"SELECT * from jefe_logistica where idUsuario = '$idUsuario'");
    $jefe_logistica = mysqli_fetch_array($consulta);
    $idjefe_logistica = $jefe_logistica["idjefe_logistica"];

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


	$query = "UPDATE jefe_logistica set  nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono',n_Documento = '$documento',  idTipoDocumento = '$TDocumento', direccion = '$direccion', idMunicipio = '$Municipio', codigopostal = '$codigopostal',  aboutme = '$descripcion', foto = '$ruta' where idjefe_logistica = $idjefe_logistica";

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