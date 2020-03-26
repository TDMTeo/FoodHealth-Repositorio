	<?php

include('../php/Conexion.php');

  session_start();
if (isset($_POST['Agregar'])) {
	
	$Usuario = $_POST['Usuario'];
	$Correo = $_POST['Correo'];
	$Clave = MD5($_POST['Contraseña']);
	$TipoDocumento = $_POST['TDocumento'];
	$n_Documento = $_POST['Documento'];
	$nombres = $_POST['Nombre'];
	$apellidos = $_POST['Apellido'];
	$telefono = $_POST['Telefono'];
	$Municipio = $_POST['Municipio'];
	$Direccion = $_POST['Direccion'];
	$CodigoPostal = $_POST['CodigoPostal'];
	$Descripcion = $_POST['Descripcion'];

	
	$query1= "INSERT INTO usuarios(usuario,correo,clave,perfil) VALUES ('$Usuario','$Correo','$Clave',7)";
	$guardar1 =mysqli_query($conectar, $query1);

	if ($guardar1) {
		$consulta = mysqli_query($conectar,"SELECT idUsuario from usuarios where Usuario = '$Usuario'");

		$a = mysqli_fetch_array($consulta);
		$idUsuario = $a["idUsuario"];

		$query2 = "INSERT INTO Domiciliario(idTipoDocumento,n_Documento,nombres,apellidos,telefono,idMunicipio,direccion,idUsuario,CodigoPostal,aboutme,estado) VALUES ('$TipoDocumento','$n_Documento','$nombres','$apellidos','$telefono','$Municipio','$Direccion','$idUsuario','$CodigoPostal','$Descripcion',1)";

		$guardar2 =mysqli_query($conectar, $query2);
		if ($guardar2) {
			//header("Location: ../Domiciliarios.php?status=2");
			 echo '<body onload="document.formulario.submit()">
           <form action="../Domiciliarios.php" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="1">
           </body>
           </form> ';
		}
		else{
			echo "Error al guardar en Domiciliario:";
			echo $query2;
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