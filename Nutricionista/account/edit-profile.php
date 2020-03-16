<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 3){
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
  <link rel="stylesheet" href="../../Chef/assets/css/sweetalert2.min.css">

   <script src="../../Chef/assets/css/sweetalert2.all.min.js"></script>
   <script src="../../Chef/assets/css/sweetalert2.min.js"></script>
  <title>Nutricionista</title>
</head>
</html>
<?php
include "../../Chef/conn/conn.php";
if(isset($_POST['update'])){
				$id = $_SESSION['idUsuario'];
         $nombres = mysqli_real_escape_string($conn,(strip_tags($_POST['nombres'], ENT_QUOTES)));
        $apellidos = mysqli_real_escape_string($conn,(strip_tags($_POST['apellidos'], ENT_QUOTES)));
        $tipodocumento = $_POST['tipodocumento'];
        $documento = mysqli_real_escape_string($conn,(strip_tags($_POST['documento'], ENT_QUOTES)));
        $direccion = mysqli_real_escape_string($conn,(strip_tags($_POST['direccion'], ENT_QUOTES)));

       $municipio  = $_POST['municipio'];
       
        $codigopostal  = mysqli_real_escape_string($conn,(strip_tags($_POST['codigopostal'], ENT_QUOTES)));
        $aboutme  = mysqli_real_escape_string($conn,(strip_tags($_POST['aboutme'], ENT_QUOTES)));

				$update = mysqli_query($conn, "UPDATE nutricionista SET nombres='$nombres', apellidos='$apellidos', idTipoDocumento='$tipodocumento', n_Documento='$documento', direccion='$direccion', idMunicipio='$municipio', codigopostal='$codigopostal', aboutme='$aboutme'  WHERE idUsuario='$id'") or die(mysqli_error());
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
                                window.location = '../user.php';
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
                            window.location = '../user.php';
                        });

                          </script>";
				}
			}
  ?>