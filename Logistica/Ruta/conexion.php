<?php
// se hizo este cambio para verificar el probable problema que vamos a tener con los puertos de victor
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "foodhealth";
try{
<<<<<<< HEAD
	$base_de_datos = new PDO('mysql:host=localhost:3307;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
=======
	$base_de_datos = new PDO('mysql:host=localhost:3308;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
>>>>>>> 1951efc51197fa38ca5b6980a25417ca62674c02
	 $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>