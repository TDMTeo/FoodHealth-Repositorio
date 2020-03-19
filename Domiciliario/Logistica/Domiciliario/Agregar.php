	<?php

include('../php/Conexion.php');
include('../../login/login.php');
  session_start();
if (isset($_POST['Agregar'])) {
	
	$Usuario = $_POST['Usuario'];
	$Contraseña = $_POST['Contraseña'];
	$Nombre = $_POST['Nombre'];
	$Apellido = $_POST['Apellido'];
	$Correo = $_POST['Correo'];
	$Direccion = $_POST['Direccion'];
	$Telefono = $_POST['Telefono'];
	$Documento = $_POST['Documento'];


	$Nombres = $Nombre.' 	'.$Apellido;

	$Clave = MD5($Contraseña);
	
	$query1 ="INSERT INTO Domiciliario(n_Documento,nombres,correo,telefono,Direccion) VALUES ('$Documento','$Nombres','$Correo','$Telefono','$Direccion')";
	$guardar1 = mysqli_query($conectar, $query1);

	$query2 ="INSERT INTO Usuarios(Nombres,Usuario,correo,clave,Perfil) VALUES ('$Nombres','$Usuario','$Correo','$Clave',2)";
	$guardar2 = mysqli_query($conectar, $query2);
	

	if ($guardar1) {
		header("Location: ../Domiciliarios.php?status=2");
		}
	elseif ($guardar2) {
		header("Location: ../Domiciliarios.php?status=2");
	}
	else
		{
			echo $Usuario;
			echo "<br>";
			echo $Contraseña;
			echo "<br>";
			echo $Nombre;
			echo "<br>";
			echo $Apellido;
			echo "<br>";
			echo $Nombres;
			echo "<br>";
			echo $Correo;
			echo "<br>";
			echo $Direccion;
			echo "<br>";
			echo $Telefono;
			echo "<br>";
			echo $Documento;
		}
	
	}
	
?>
