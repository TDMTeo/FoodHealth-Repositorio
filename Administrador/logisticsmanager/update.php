<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 1){
    session_destroy();
    header('location: ../../');
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
   <link rel="icon" type="image/png" href="../../Chef/assets/img/favicon.png">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <title>Administrador</title>
</head>
</html>
<?php
include "../../Chef/conn/conn.php";
if(isset($_POST['update'])){
				$id = intval($_POST['id']);
                $tipodocumento = $_POST['tipodocumento'];
                $documento  = mysqli_real_escape_string($conn,(strip_tags($_POST['documento'], ENT_QUOTES)));
                $nombres  = mysqli_real_escape_string($conn,(strip_tags($_POST['nombres'], ENT_QUOTES)));
                $apellidos = mysqli_real_escape_string($conn,(strip_tags($_POST['apellidos'], ENT_QUOTES)));
                $telefono  = mysqli_real_escape_string($conn,(strip_tags($_POST['telefono'], ENT_QUOTES)));
                $municipio = $_POST['municipio'];
                $direccion = mysqli_real_escape_string($conn,(strip_tags($_POST['direccion'], ENT_QUOTES)));
                $codigopostal = mysqli_real_escape_string($conn,(strip_tags($_POST['codigopostal'], ENT_QUOTES)));
                if(isset($_POST['estado'])){
                  $estado  = $_POST['estado'];
                  $estado = "1";
                } else {
                  $estado = "0";
                }
                
				
				$update = mysqli_query($conn, "UPDATE  jefe_logistica SET idTipoDocumento='$tipodocumento', n_Documento='$documento', nombres='$nombres', apellidos='$apellidos', telefono='$telefono', idMunicipio='$municipio', direccion='$direccion', codigopostal='$codigopostal', estado='$estado'  WHERE  idjefe_logistica='$id'") or die(mysqli_error());
				if($update){
					echo "<script>
                              Swal.fire({
                                icon: 'success',
                                title: '<strong><h2> Exito </h2></strong>',
                                html: '<h5> Modificado correctamente </h5>',
                                type: 'success',
                                padding: '3em',
                                timer: 2000,
                                showConfirmButton: false
                                
                              }).then(function() {
                                window.location = '../logisticsmanager/';
                            });

                              </script>";
				}else{
					echo "<script>
                          Swal.fire({
                            icon: 'error',
                            title: '<strong><h2> Error </h2></strong>',
                            html: '<h5> Error al modificar </h5>',
                            type: 'success',
                            padding: '3em',
                            timer: 2000,
                            showConfirmButton: false
                            
                          }).then(function() {
                            window.location = '../logisticsmanager/';
                        });

                          </script>";
				}
			}
  ?>