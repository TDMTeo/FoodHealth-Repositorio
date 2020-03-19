<?php

include "../conexion.php";

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];

$sql = mysqli_query($conn, "INSERT INTO usuarios(idUsuario, Nombres, Usuario, Correo, Clave, Perfil) VALUES(NULL, '$nombre', '$usuario', '$correo', MD5('$clave'), 2)") or die(mysqli_error());

if($sql){
	header ("location: index.php");
} else {
	echo "MAL";
}


?>