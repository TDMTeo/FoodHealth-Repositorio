<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 4){
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
   <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <link rel="stylesheet" href="../../assets/css/sweetalert2.min.css">
   <script src="../../assets/css/sweetalert2.all.min.js"></script>
   <script src="../../assets/css/sweetalert2.min.js"></script>
  <title>Chef</title>
</head>
</html>
<?php
include "../conn.php";
if(isset($_POST['update'])){
				$idTipoAlimento = intval($_POST['idTipoAlimento']);
                $nombre = mysqli_real_escape_string($conn,(strip_tags($_POST['nombreTipo'], ENT_QUOTES)));
                $estado  = mysqli_real_escape_string($conn,(strip_tags($_POST['estado'], ENT_QUOTES)));
				$update = mysqli_query($conn, "UPDATE tipo_alimento SET nombreTipo='$nombre',estado= '$estado'  WHERE idTipoAlimento='$idTipoAlimento'") or die(mysqli_error());
				if($update){
					echo "<script>
                              Swal.fire({
                                icon: 'success',
                                title: '<strong><h2> Exito </h2></strong>',
                                html: '<h5> Tipo Alimento modificado correctamente </h5>',
                                type: 'success',
                                padding: '3em',
                                timer: 2000,
                                showConfirmButton: false
                                
                              }).then(function() {
                                window.location = '../../TipoAlimento.php';
                            });

                              </script>";
				}else{
					echo "<script>
                          Swal.fire({
                            icon: 'error',
                            title: '<strong><h2> Error </h2></strong>',
                            html: '<h5> Error al modificar el Tipo Alimento </h5>',
                            type: 'success',
                            padding: '3em',
                            timer: 2000,
                            showConfirmButton: false
                            
                          }).then(function() {
                            window.location = '../../TipoAlimento.php';
                        });

                          </script>";
				}
			}
  ?>