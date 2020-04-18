<?php

include('../php/Conexion.php');

  session_start();
if (isset($_POST['Agregar'])) {
	
	$Usuario = $_POST['Usuario'];
	$Correo = $_POST['Correo'];
	$Clave = MD5($_POST['Contraseña']);
	$TipoDocumento = $_POST['tipoDocumento'];
	$n_Documento = $_POST['documento'];
	$nombres = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$telefono = $_POST['telefono'];
	$Municipio = $_POST['municipio'];
	$Direccion = $_POST['direccion'];
	$CodigoPostal = $_POST['codigoPostal'];
	$Descripcion = $_POST['descripcion'];

	$nombrefoto = $_FILES['userfile']['name'];
	$archivo = $_FILES['userfile']['tmp_name'];

	
	$query1= "INSERT INTO usuarios(usuario,correo,clave,perfil) VALUES ('$Usuario','$Correo','$Clave',7)";
	$guardar1 =mysqli_query($conectar, $query1);

	if ($guardar1) {
		$consulta = mysqli_query($conectar,"SELECT idUsuario from usuarios where Usuario = '$Usuario'");

		$a = mysqli_fetch_array($consulta);
		$idUsuario = $a["idUsuario"];


			$ruta = "../"."Perfil"."/"."photos"."/".$n_Documento;

			$rutaFoto = "photos"."/".$n_Documento; 

			if (!file_exists($ruta)) {
				mkdir($ruta);
			}

			$ruta = $ruta."/".$nombrefoto;

			$guardadoFoto = $rutaFoto."/".$nombrefoto; 

			move_uploaded_file($archivo,$ruta);	

		$query2 = "INSERT INTO Domiciliario(idTipoDocumento,n_Documento,nombres,apellidos,telefono,idMunicipio,direccion,idUsuario,CodigoPostal,aboutme,estado, foto) VALUES ('$TipoDocumento','$n_Documento','$nombres','$apellidos','$telefono','$Municipio','$Direccion','$idUsuario','$CodigoPostal','$Descripcion',1, '$guardadoFoto')";

		$guardar2 =mysqli_query($conectar, $query2);
		if ($guardar2) {

			//header("Location: ../Domiciliarios.php?status=2");
			 echo '<body onload="document.formulario.submit()">
           <form action="./" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="1">
           </body>
           </form> '; 

		}
		else{
			echo "Error al guardar en Domiciliario:";
			echo $query2;
		   /* echo '<body onload="document.formulario.submit()">
           <form action="./" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="1">
           </body>
           </form> '; */
		}
	}
	else{
		echo "<br>";
		echo $consulta;
		echo "Error al guardarlo en usuarios";
		echo $query1;
	}
	
	}
	
?>