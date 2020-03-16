<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 4){
    session_destroy();
    header('location: ../../');
  }

?>
<?php
if(!isset($_GET["idAlimento"])) exit();
$id = $_GET["idAlimento"];
include_once "conexion.php";
//$sentencia = $base_de_datos->prepare("UPDATE alimentos SET estado='0' WHERE idAlimento = ?;");
//$resultado = $sentencia->execute([$id]);
//if($resultado === TRUE){
	//header("Location: ./index.php?status=1");
	//exit;
//}
//else echo "Algo salió mal";
?>